@extends('adminlte::page')

@section('title', 'Parks')

@section('content_header')
<a href="{{ route('parks.create') }}" class="btn btn-sm btn-dark float-right"> <i class="fa fa-plus"
    aria-hidden="true"> </i> Add New Park </a>

    <h1>Parks</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Park List</h4>
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
                                    <th>Category</th>
                                    <th>Address</th>
                                    <th>District</th>
                                    <th>Featured </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($parks)
                                    @php $i = $parks->currentPage()==1?0:($parks->currentPage()-1)*15; @endphp
                                    @foreach ($parks as $single)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $single->name }}</td>
                                    <td>{{ $single->category->name }}</td>
                                    <td>{{ $single->address }}</td>
                                    <td>{{ $single->district }}</td>
                                    <td><div class="form-group">
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
                                        <form id="logout-form" action="{{ route('parks.destroy',$single) }}" method="POST" onsubmit="return validate();" >
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('parks.edit',$single) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{-- <ul class="pagination pagination-month justify-content-center">
                            @php
                                $next=$parks->currentPage()+1;
                                $prev=$parks->currentPage()-1;
                            @endphp
                            @if ($parks->currentPage()>1)
                            <li class="page-item">
                                <a href="{{ route('faq.index') }}?page={{ $prev }}" class="page-link">Previous</a>
                            </li>
                            @endif
                            @if ($parks->currentPage()!=$parks->lastPage())
                            <li class="page-item">
                                <a href="{{ route('faq.index') }}?page={{ $next }}" class="page-link">Next</a>
                            </li>
                            @endif
                        </ul> --}}
                        <x-pagination :testimonials="$parks" />
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); 
        function validate(){
            if(!confirm("Confirm delete this Park?")){
                return false;
            }
        }
        $(document).ready(function(){
            $('.toastsDefaultSuccess').click(function() {
                var body=$(this).text();
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Success',
                    subtitle: '',
                    body: body
                })
            });
            $('.toastsDefaultDanger').click(function() {
                var body=$(this).text();
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    subtitle: '',
                    body: body
                })
            });
            if($('#success-msg')){
                $('#success-msg').trigger('click');
            }
            if($('#error-msg')){
                $('#error-msg').trigger('click');
            }
        });
    </script>
@stop