@extends('adminlte::page')

@section('title', 'Support Type')

@section('content_header')
    <h4>Customer support type</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5> {{ isset($support) ? 'Edit' : 'Add' }} Support Type </h5>
                </div>

                <div class="card-body">
                    <form
                        action="{{ isset($support) ? route('support_type.update', $support->id) : route('support_type.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($support))
                            @method('PUT')
                        @endif


                        <div class="row">
                            <x-adminlte-select2 label="Select Category" name="category_id" fgroup-class="col-12" required>
                                <option value="">Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($support) && $support->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>


                        <div class="form-group">
                            <label for="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $support->name ?? null }}"
                                required>
                        </div>

                        <div class="form-group">

                            <div class="form-check form-switch">
                                <input class="form-check-input" name="is_active" value="1" type="checkbox"
                                    role="switch" id="flexSwitchCheckChecked"
                                    {{ isset($support) && $support->is_active == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Is Active</label>
                            </div>

                        </div>
                        <div class="position-relative row form-check mb-4 mt-3">
                            <div class="col-sm-10 offset-sm-2 pt-3">
                                <x-adminlte-button class="btn-sm" type="submit"
                                    label="  {{ isset($support) ? 'Update' : 'Save' }}  Support Type " theme="success"
                                    icon="fas fa-lg fa-save" />
                                <a href="{{ route('support_type.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h5> Added Support List </h5>
                </div>
                <x-toast />


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $single)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->category->name }}</td>
                                        <td>{{ $single->name }}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name=""
                                                        class="checkbox custom-control-input"
                                                        id="switch{{ $single->id }}"
                                                        {{ $single->is_active == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="switch{{ $single->id }}"></label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <form action="{{ route('support_type.destroy', $single) }}" method="POST"
                                                onsubmit="return  confirm('Are you sure, you want to delete this Support?')">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('support_type.edit', $single) }}"
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
