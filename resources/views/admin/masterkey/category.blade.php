@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>@if ($form=='add') Add Category @else Edit Category @endif</h4>
        </div>
<x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form @if ($form=='add')action="{{ route('category.store') }}" @else action="{{ route('category.update',$category) }}" @endif method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="form-label">Name</label>
                            <input type="text" name="name" class="form-control" @if ($form=='edit')value="{{ $category->name }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" required> @if ($form=='edit'){{ $category->description }} @endif</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="form-label">Image</label>
                            <input type="file" name="image" >
                        </div> --}}
                        <div class="form-group">
                            @if ($form=='add')
                            <button type="submit" class="btn btn-sm btn-success">Save Category</button>
                            @else
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Update Category</button>
                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories)
                                    @php $i = $categories->currentPage()==1?0:($categories->currentPage()-1)*15; @endphp
                                    @foreach ($categories as $single)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $single->name }}</td>
                                    <td>{{ $single->description }}</td>
                                    <td>
                                        <form id="logout-form" action="{{ route('category.destroy',$single) }}" method="POST" onsubmit="return validate();" >
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('category.edit',$single) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                                $next=$categories->currentPage()+1;
                                $prev=$categories->currentPage()-1;
                            @endphp
                            @if ($categories->currentPage()>1)
                            <li class="page-item">
                                <a href="{{ route('categories.index') }}?page={{ $prev }}" class="page-link">Previous</a>
                            </li>
                            @endif
                            @if ($categories->currentPage()!=$categories->lastPage())
                            <li class="page-item">
                                <a href="{{ route('categories.index') }}?page={{ $next }}" class="page-link">Next</a>
                            </li>
                            @endif
                        </ul> --}}
                        <x-pagination :testimonials="$categories" />
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
            if(!confirm("Confirm delete this category?")){
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