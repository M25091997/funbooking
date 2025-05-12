@extends('adminlte::page')

@section('title', 'Testimonials')

@section('content_header')
    <h1>Testimonials</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>@if ($form=='add') Add Testimonial @else Edit Testimonial @endif</h4>
        </div>
<x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form @if ($form=='add')action="{{ route('testimonials.store') }}" @else action="{{ route('testimonials.update',$testimonial) }}" @endif method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="form-label">Name</label>
                            <input type="text" name="name" class="form-control" @if ($form=='edit')value="{{ $testimonial->name }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Location</label>
                            <input type="text" name="location" class="form-control" @if ($form=='edit')value="{{ $testimonial->location }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Rating</label>
                            <input type="number" name="rating" class="form-control" @if ($form=='edit')value="{{ $testimonial->rating }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Content</label>
                            <textarea name="content" id="content" cols="30" rows="3" class="form-control" required> @if ($form=='edit'){{ $testimonial->content }} @endif</textarea>
                      @error('content') <span class="text-danger">{{$message}} </span> @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="form-label">Image</label>
                            <input type="file" name="image" >
                        </div> --}}
                        <div class="form-group">
                            @if ($form=='add')
                            <button type="submit" class="btn btn-sm btn-success">Save Testimonial</button>
                            @else
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Update Testimonial</button>
                            <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-danger">Cancel</a>
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
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Rating</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($testimonials)
                                    @php $i = $testimonials->currentPage()==1?0:($testimonials->currentPage()-1)*15; @endphp
                                    @foreach ($testimonials as $single)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $single->name }}</td>
                                    <td>{{ $single->location }}</td>
                                    <td>{{ $single->rating }}</td>
                                    <td>{{ $single->content }}</td>
                                    <td>
                                        <form id="logout-form" action="{{ route('testimonials.destroy',$single) }}" method="POST" onsubmit="return validate();" >
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('testimonials.edit',$single) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                                $next=$testimonials->currentPage()+1;
                                $prev=$testimonials->currentPage()-1;
                            @endphp
                            @if ($testimonials->currentPage()>1)
                            <li class="page-item">
                                <a href="{{ route('testimonials.index') }}?page={{ $prev }}" class="page-link">Previous</a>
                            </li>
                            @endif
                            @if ($testimonials->currentPage()!=$testimonials->lastPage())
                            <li class="page-item">
                                <a href="{{ route('testimonials.index') }}?page={{ $next }}" class="page-link">Next</a>
                            </li>
                            @endif
                        </ul> --}}
                        <x-pagination :testimonials="$testimonials" />
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
            if(!confirm("Confirm delete this testimonial?")){
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