@extends('adminlte::page')

@section('title', 'Admin | Customer Subscription')

@section('content_header')
    <h4>Customer Subscription</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Customer Subscription List</h5>
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
                                    <th>Customer Name</th>
                                    <th>Category</th>
                                    <th>Paln Name</th>
                                    <th>Date</th>
                                    <th>Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $single)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->name }}</td>
                                        <td>{{ $single->category->name }}</td>
                                        <td>₹ {{ $single->price }}</td>
                                        <td>{{ $single->duration_days }} days</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name=""
                                                        class="checkbox custom-control-input" id="switch{{ $single->id }}"
                                                        {{ $single->is_active == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="switch{{ $single->id }}"></label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <form id="logout-form" action="{{ route('plan.destroy', $single) }}"
                                                method="POST" onsubmit="return confirm('Are you sure, you want to delete this plan?')">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('plan.edit', $single) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
