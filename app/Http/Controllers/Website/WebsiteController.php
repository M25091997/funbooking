<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Bannerimages;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Faq;
use App\Models\Favorite;
use App\Models\Park;
use App\Models\ParkImage;
use App\Models\Plan;
use App\Models\PromotionalPoster;
use App\Models\Review;
use App\Models\Subscription;
use App\Models\SupportTicket;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::latest()->paginate(30);
        $bannerimages = Bannerimages::latest()->paginate(5);
        $featureParks = Park::where('is_active', true)->where('status', true)->get();
        $posters = PromotionalPoster::where('is_active', true)->latest()->take(2)->get();
        $faqs = Faq::where('status', 1)->get();
        $subscriptions = Plan::with('benefits')->where('is_active', true)->get();
        $discounts = Discount::where('is_active', 1)->get();
        return view("website.home", ['testimonials' => $testimonials, 'bannerimages' => $bannerimages, 'featureParks' => $featureParks, 'promotionalPosters' => $posters, 'faqs' => $faqs, 'subscriptions' => $subscriptions, 'discounts' => $discounts]);
    }

    public function details($slug)
    {
        $park =   Park::where('slug', $slug)->firstOrFail();
        return view("website.details", compact('park'));
    }

    public function reviewStore(Request $request, int $park_id)
    {
        $park = Park::findOrFail($park_id);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:150',
        ]);

        $park->reviews()->updateOrCreate(
            [
                'email' => $validated['email'],
                'park_id' => $park_id,
            ],
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'rating' => $validated['rating'],
                'review' => $validated['review'],
                'user_id' => Auth::id(),
            ]
        );

        return redirect()->back()->with('success', 'Your review has been saved successfully.');
    }



    public function faq()
    {
        $faqs = Faq::where('section', 'FAQ')->get();
        return view("website.faq", ['faqs' => $faqs]);
    }

    public function favorites()
    {
        $favorites = [];
        if (Auth::check()) {
            $favorites = Favorite::where('user_id', Auth::id())->with('park')->get();
        }

        return view("website.favorites", ['favorites' => $favorites]);
    }

    public function about()
    {
        return view("website.aboutus");
    }

    public function support()
    {
        return view("website.support");
    }

    public function ticket_create(Request $request)
    {
        $validated = $request->validate([
            'support_type_id' => 'required|exists:support_types,id',
            'park_id' => 'nullable|exists:parks,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5048',
        ]);

        $validated['user_id'] = Auth::id();

        SupportTicket::create($validated);

        return redirect()->back()->with('success', 'Support ticket created successfully.');
    }

    // public function categoryGallery(Request $request)
    // {
    //     $parks = Park::with('parkImage')->get(); // only one img get related park
    //     return view('website.gallery', compact('parks'));  
    // }


    // public function gallery(Request $request, $slug)
    // {
    //     $category = Category::where('slug', $slug)->first();
    //     $parks = Park::with('parkImage')->where('category_id', $category->id)->get(); // all img related park

    //     return view('website.gallery', compact('parks'));

    // }

    public function categoryGallery(Request $request)
    {
        $parks = Park::with(['parkImage' => function ($query) {
            $query->limit(1);
        }])->where('is_active', 1)->get();

        return view('website.category-gallery', compact('parks'));
    }

    public function gallery(Request $request, string $slug)
    {
        $park = Park::where('slug', $slug)->firstOrFail();
        $images = ParkImage::where('park_id', $park->id)->get();

        return view('website.gallery', compact('images'));
    }
}
