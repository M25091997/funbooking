@extends('adminlte::page')

@section('title', 'FAQs')

@section('content_header')
    <h1>FAQs</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>FAQ List</h4>
            <a href="{{ route('faq.create') }}" class="float-right btn btn-primary">Add FAQ</a>
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
                                    <th>Section</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($faqs)
                                    @php $i = $faqs->currentPage()==1?0:($faqs->currentPage()-1)*15; @endphp
                                    @foreach ($faqs as $single)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $single->section }}</td>
                                    <td>{{ $single->question }}</td>
                                    <td>{{ $single->answer }}</td>
                                    <td>
                                        <form id="logout-form" action="{{ route('faq.destroy',$single) }}" method="POST" onsubmit="return validate();" >
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('faq.edit',$single) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                                $next=$faqs->currentPage()+1;
                                $prev=$faqs->currentPage()-1;
                            @endphp
                            @if ($faqs->currentPage()>1)
                            <li class="page-item">
                                <a href="{{ route('faq.index') }}?page={{ $prev }}" class="page-link">Previous</a>
                            </li>
                            @endif
                            @if ($faqs->currentPage()!=$faqs->lastPage())
                            <li class="page-item">
                                <a href="{{ route('faq.index') }}?page={{ $next }}" class="page-link">Next</a>
                            </li>
                            @endif
                        </ul> --}}
                        <x-pagination :testimonials="$faqs" />
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
            if(!confirm("Confirm delete this FAQ?")){
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