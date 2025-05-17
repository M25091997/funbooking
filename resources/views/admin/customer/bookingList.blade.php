@extends('adminlte::page')

@section('title', 'Admin | Support Staff')

@section('content_header')

    <h4>Booking </h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Booking List</h5>
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
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Park Name</th>
                                    <th>Booking Date</th>
                                    <th>Amount</th>
                                    <th>Trancaction No</th>
                                    <th>Status</th>
                                    <th>Mode</th>
                                    <th>Date</th>
                                    <th>Total Ticket</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $single)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->user->name }}</td>
                                        <td>{{ $single->user->mobile }} </td>
                                        <td>{{ $single->user->city }} </td>
                                        <td>{{ $single->park->name ?? null }} </td>
                                        <td>{{ $single->booking_date ?? null }} </td>
                                        <td>{{ $single->total_amount ?? null }} </td>
                                        <td>{{ $single->transaction_no ?? null }} </td>
                                        <td>{{ $single->booking_status ?? null }} </td>
                                        <td>{{ $single->method ?? null }} </td>
                                        <td>{{ $single->created_at->format('d/m/Y') ?? null }} </td>
                                        <td>{{ $single->bookingDetails->sum('quantity') ?? null }} </td>
                                        <td><i class="fa fa-download" aria-hidden="true"></i></td>

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




                                        {{-- <td>
                                            <form id="logout-form" action="{{ route('booking.destroy', $single) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure, you want to delete this Customer ?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                                {{ $records->links() }}

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
