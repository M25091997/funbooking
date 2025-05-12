<?php

namespace App\Http\Controllers;

use App\Models\CustomerWallet;
use App\Models\CustomerWalletHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    //
    public function requestOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $mobile = $request->mobile;

        // Generate OTP
        $otp = rand(101010, 999999);

        session(['otp' => $otp, 'mobile' => $mobile]);
        session()->save();

        return response()->json(['message' => 'OTP sent successfully', 'otp' => $otp, 'mobile' => $mobile]);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp.*' => 'required|regex:/^\d{1}$/'
        ]);
        //dd($validator);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $mobile = session('mobile');
        $otp = is_array($request->otp) ? implode('', $request->otp) : $request->otp;

        // Verify OTP
        if (session()->has('otp') && session()->has('mobile') && session('otp') == $otp && session('mobile') == $mobile) {

            $data = [
                'name' => 'Guest',
                'email' => $request->email,
                'mobile' => $mobile,
                'status' => 1,
                'referral_code' => User::generateReferralCode(),
            ];

            \Log::info($data);


            $user = User::where('mobile', $mobile)
                ->where('status', 1)
                ->first();

            if (!$user) {
                $user = User::create($data);
            }

            Auth::login($user);

            // Assign role only if not already assigned
            if (!$user->hasRole('Customer')) {
                $user->assignRole('Customer');
            }

            CustomerWallet::create([
                'user_id' => $user->id,
            ]);

            $referrer = User::where('referral_code', $request->referral_code)->first();

            if ($referrer) {
                // Store referral relationship, e.g., give a bonus
                $user->referred_by = $referrer->id;
                $user->save();
            }


            // Clear OTP from session
            session()->forget(['otp', 'mobile']);

            return response()->json(['message' => 'Logged in successfully']);
        } else {
            return response()->json(['error' => 'Invalid OTP'], 401);
        }
    }

    public function customers()
    {
        $response =  User::role('Customer')->get();
        return view('admin.customer.index', compact('response'));
    }

    public function walletHistory($wallet_id)
    {
        $response =  CustomerWalletHistory::where('wallet_id', $wallet_id)->get();
        return view('admin.customer.walletHistory', compact('response'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
