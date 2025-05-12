@extends('adminlte::page')

@section('title', 'FAQs')

@section('content_header')
    <h1>FAQs</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>@if ($form=='add') Add FAQ @else Edit FAQ @endif</h4>
        </div>
<x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form @if ($form=='add')action="{{ route('faq.store') }}" @else action="{{ route('faq.update',$faq) }}" @endif method="post">
                        @csrf
                        <div class="form-group">
                            <label for="form-label">Section</label>
                            <input type="text" name="section" class="form-control" @if ($form=='edit')value="{{ $faq->section }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Question</label>
                            <input type="text" name="question" class="form-control" @if ($form=='edit')value="{{ $faq->question }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="form-label">Answer</label>
                            <textarea name="answer" id="answer" cols="30" rows="3" class="form-control" required> @if ($form=='edit'){{ $faq->answer }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            @if ($form=='add')
                            <button type="submit" class="btn btn-sm btn-success">Save FAQ</button>
                            @else
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Update FAQ</button>
                            <a href="{{ route('faq.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            @endif
                        </div>
                    </form>
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
            if(!confirm("Confirm delete this faq?")){
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