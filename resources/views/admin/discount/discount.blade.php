@extends('adminlte::page')

@section('title', ' Offers and Discounts')

@section('content_header')
    <a href="{{ route('discount.create') }}" class="btn btn-sm btn-primary float-right"> <i class="fa fa-plus"
            aria-hidden="true"> </i> Add Discount </a>
    <h4> Offers and Discounts</h4>
@stop
@section('plugins.BootstrapSwitch', true)
@section('content')
    <div class="card">
        <div class="card-header">Offers and Discounts List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Coupon Code</th>
                            <th>Offer's Name</th>
                            <th>Discount</th>
                            <th>Type</th>
                            <th>Valid</th>
                            <th>Usage Limit </th>
                            <th>Used Count</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($response))
                            @foreach ($response as $single)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $single->code }}</td>
                                    <td>{{ $single->name }}</td>
                                    <td>{{ $single->discount }}</td>
                                    <td>{{ $single->type }}</td>
                                    <td>{{ $single->valid_from }} - {{ $single->valid_until }}</td>

                                    <td> {{ $single->usage_limit }}</td>
                                    <td> {{ $single->used_count }}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="" class="checkbox custom-control-input"
                                                    id="switch{{ $single->id }}"
                                                    {{ $single->is_active == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="switch{{ $single->id }}"></label>
                                            </div>
                                        </div>
                                    </td>


                                    <td>
                                        <form id="logout-form" action="{{ route('discount.destroy', $single) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure, you want to delete this discount?')">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('discount.edit', $single) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            <button class="toastsDefaultAutohide d-none">sfas</button>

        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        $('#check').bootstrapSwitch('state', $(this).prop('checked'));


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
            $('.check').each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
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
