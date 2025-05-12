@extends('adminlte::page')

@section('title', 'Admin | Promotional Poster')

@section('content_header')
    <h1> Promotional Poster </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> {{ isset($response) ? 'Edit' : 'Add' }} Promotional Poster </h4>
        </div>
<x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ isset($response) ? route('promotional_poster.update', $response->id) : route('promotional_poster.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($response))
                            @method('PUT')
                        @endif
        
                        <div class="form-group">
                            <label for="form-label">Title</label> <span class="text-danger">*</span>
                            <input type="text" name="title" class="form-control" value="{{ $response->title ?? old('title') }}" placeholder="poster title"  required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Link</label>
                            <input type="url" name="link" class="form-control" value="{{ $response->link  ?? old('link')}}" placeholder="link for redirect">
                        </div>
                        <div class="form-group">
                            <label for="form-label">Button Text</label>
                            <input type="text" name="btn_txt" class="form-control" value="{{ $response->btn_txt  ?? old('btn_txt')}}"  placeholder="btn titile">
                        </div>
                        <div class="form-group">
                            <label for="form-label">Image Or Poster</label>
                            <input type="file" name="image" {{ isset($response) ? '' : 'required' }} >
                        </div>

                        
                        <div class="form-group">

                            <div class="form-check form-switch">
                                <input class="form-check-input" name="is_active" value="1" type="checkbox"
                                    role="switch" id="flexSwitchCheckChecked"
                                    {{ isset($support) && $support->is_active == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Is Active</label>
                            </div>

                        </div>


                        <div class="form-group mt-3">
                          
                            <button type="submit" class="btn btn-sm btn-success">  {{ isset($response) ? 'Update' : 'Save' }} Poster </button>                           
                            <a href="{{ route('promotional_poster.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4> {{ isset($response) ? 'Edit' : 'Add' }} Promotional Poster </h4>
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
                                    <th>Title</th>
                                    <th width="40%">Image</th>
                                    <th>Link</th>
                                    <th>Btn Txt</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                             @foreach ($posters as $single)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $single->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage').'/'.$single->image }}" alt="{{ $single->title }}" class="img-fluid">
                                    </td>
                                    <td>
                                        @if (!empty($single->link))
                                            <a href="{{ $single->link }}" class="btn btn-sm btn-info" target="_blank">Open Link</a>
                                        @endif
                                    </td>
                                    <td>{{ $single->btn_txt }}</td>
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
                                        <form id="logout-form" action="{{ route('promotional_poster.destroy',$single) }}" method="POST" onsubmit="return validate();" >
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('promotional_poster.edit',$single) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
        function validate(){
            if(!confirm("Confirm delete this Promotion Banner?")){
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