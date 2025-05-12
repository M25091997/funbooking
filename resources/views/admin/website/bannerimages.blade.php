@extends('adminlte::page')

@section('title', 'Banner Images')

@section('content_header')
    <h1>Banner Images</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>@if ($form=='add') Add Banner Image @else Edit Banner Image @endif</h4>
        </div>
<x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form @if ($form=='add')action="{{ route('bannerimages.store') }}" @else action="{{ route('bannerimages.update',$bannerimage) }}" @endif method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="form-label">Title</label>
                            <input type="text" name="title" class="form-control" @if ($form=='edit')value="{{ $bannerimage->title }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Link</label>
                            <input type="url" name="link" class="form-control" @if ($form=='edit')value="{{ $bannerimage->link }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Image</label>
                            <input type="file" name="image"  @if ($form=='add')required @endif>
                        </div>
                        <div class="form-group">
                            @if ($form=='add')
                            <button type="submit" class="btn btn-sm btn-success">Save Banner Image</button>
                            @else
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Update Banner Image</button>
                            <a href="{{ route('bannerimages.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Title</th>
                                    <th width="60%">Image</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($bannerimages)
                                    @php $i = $bannerimages->currentPage()==1?0:($bannerimages->currentPage()-1)*15; @endphp
                                    @foreach ($bannerimages as $single)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $single->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage').'/'.$single->image }}" alt="{{ $single->title }}" class="img-fluid">
                                    </td>
                                    <td>
                                        @if (!empty($single->link))
                                            <a href="{{ $single->link }}" class="btn btn-sm btn-info" target="_blank">Open Link</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form id="logout-form" action="{{ route('bannerimages.destroy',$single) }}" method="POST" onsubmit="return validate();" >
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('bannerimages.edit',$single) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                                $next=$bannerimages->currentPage()+1;
                                $prev=$bannerimages->currentPage()-1;
                            @endphp
                            @if ($bannerimages->currentPage()>1)
                            <li class="page-item">
                                <a href="{{ route('bannerimages.index') }}?page={{ $prev }}" class="page-link">Previous</a>
                            </li>
                            @endif
                            @if ($bannerimages->currentPage()!=$bannerimages->lastPage())
                            <li class="page-item">
                                <a href="{{ route('bannerimages.index') }}?page={{ $next }}" class="page-link">Next</a>
                            </li>
                            @endif
                        </ul> --}}
                        <x-pagination :testimonials="$bannerimages" />
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
            if(!confirm("Confirm delete this Banner Image?")){
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