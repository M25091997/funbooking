@extends('adminlte::page')

@section('title', 'Admin | Support Staff')

@section('content_header')

    <h4>Guest Customer's</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Customer List</h5>
        </div>

        <x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    {{-- <th>Role</th> --}}
                                    <th>Referral Code</th>
                                    <th>Wallet</th>
                                    {{-- <th>Wallet His</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $single)
                                    @php $wallet = App\Models\CustomerWallet::where('user_id', $single->id)->first(); @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->name }}</td>
                                        <td>{{ $single->email }} </td>
                                        <td>{{ $single->mobile }} </td>
                                        <td>{{ $single->city }} </td>
                                        <td>{{ $single->referral_code ?? null }} </td>
                                        <td>₹ {{ $wallet->balance ?? 0.0 }} <a
                                                href="{{route('admin.customers.walletHistory', $wallet->id ?? '#')}}">
                                                <i class="fas fa-wallet" style="color:hsl(54, 100%, 50%)"></i> </a></td>
                                        {{-- <td>
                                            @php
                                                $user = App\Models\User::find($single->user_id);
                                                $roles = $user ? $user->roles : collect();
                                            @endphp

                                            @if ($roles->isNotEmpty())
                                                @foreach ($roles as $role)
                                                    {{ $role->name }}
                                                @endforeach
                                            @else
                                                No Role Assigned
                                            @endif
                                        </td> --}}


                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name=""
                                                        class="checkbox custom-control-input" id="switch{{ $single->id }}"
                                                        {{ $single->status == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="switch{{ $single->id }}"></label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <form id="logout-form" action="{{ route('admin.customers.destroy', $single) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure, you want to delete this Customer ?')">
                                                @csrf
                                                @method('delete')                                               
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");


        $(document).ready(function() {
            $('.toastsDefaultSuccess').click(function() {
                var body = $(this).text();
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Success',
                    subtitle: '',
                    body: body
                })
            });
            $('.toastsDefaultDanger').click(function() {
                var body = $(this).text();
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    subtitle: '',
                    body: body
                })
            });
            if ($('#success-msg')) {
                $('#success-msg').trigger('click');
            }
            if ($('#error-msg')) {
                $('#error-msg').trigger('click');
            }
        });
    </script>
@stop
