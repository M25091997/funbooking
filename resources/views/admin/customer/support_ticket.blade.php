@extends('adminlte::page')

@section('title', 'Admin | Customer Ticket Created')

@section('content_header')
    <h4>Customer Ticket Created</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Customer Ticket List</h5>
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
                                    <th>Date</th>
                                    <th>Support Type</th>
                                    <th>Customer Name</th>

                                    <th>Subject</th>
                                    <th>Query</th>
                                    <th>Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $single)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->created_at->format('d-M-Y') }}</td>
                                        <td>{{ $single->supportType->name }}</td>
                                        <td>{{ $single->user->name }}</td>
                                        <td>{{ $single->subject }} </td>
                                        <td>{{ $single->message }} </td>
                                        <td><span
                                                class="badge text-uppercase {{ $single->status == 'open' ? 'badge-success' : 'badge-danger' }}">
                                                {{ $single->status }} </span> </td>
                                        {{-- <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name=""
                                                        class="checkbox custom-control-input" id="switch{{ $single->id }}"
                                                        {{ $single->is_active == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="switch{{ $single->id }}"></label>
                                                </div>
                                            </div>
                                        </td> --}}

                                        <td>
                                            <a href="javascript:0" class="btn btn-sm btn-info ticketReply" title="reply"
                                                data-id="{{ $single->id }}" data-toggle="modal"
                                                data-target="#modal-default"><i class="fa fa-reply"></i></a>

                                            {{-- <form id="logout-form" action="{{ route('plan.destroy', $single) }}"
                                                method="POST" onsubmit="return confirm('Are you sure, you want to delete this plan?')">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('plan.edit', $single) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                               
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i></button>

                                                        <a href="{{ route('support_ticket.reply', $single) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-reply"></i></a>
                                            </form> --}}
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

    <div class="modal fade" id="modal-default" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('support_ticket.reply')}}" method="POST">
                    @csrf
                    <input type="hidden" id="support_ticket_id" name="support_ticket_id" value="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Ticket Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">Choose...</option>
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Subject:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div> --}}
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message on Reply:</label>
                            <textarea class="form-control" rows="3" name="message" id="message-text" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
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
        const replyButtons = document.getElementsByClassName('ticketReply'); 
        const ticketField = document.getElementById('support_ticket_id');

        Array.from(replyButtons).forEach(button => {
            button.addEventListener('click', (event) => {
                const id = button.getAttribute('data-id'); 
                ticketField.value = id;
            });
        });




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
