@extends('adminlte::page')

@section('title', 'Parks')

@section('content_header')
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
                                    <th>Park </th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $single)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->park->name }}</td>
                                        <td>{{ $single->name }}</td>
                                        <td>{{ $single->email }}</td>
                                        <td>{{ $single->rating }}/5 <i class="fa fa-star" aria-hidden="true"
                                                style="color: gold"></i></td>
                                        <td style="width: 40%">{{ $single->review }}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status" class="checkbox custom-control-input" id="switch{{ $single->id }}"
                                                        {{ $single->status == 1 ? 'checked' : '' }} 
                                                        onchange="changeStatus({{ $single->id }}, this)">
                                        
                                                    <label class="custom-control-label" for="switch{{ $single->id }}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('reviews.destroy', $single) }}" method="POST"
                                                onsubmit="return validate();">
                                                @csrf
                                                @method('delete')
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
        function changeStatus(id, checkbox) {
            if (!confirm('Are you sure you want to change the status?')) {
                checkbox.checked = !checkbox.checked;
                return;
            }


            fetch(`/admin/reviews/${id}/updateStatus`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        status: checkbox.checked ? 1 : 0
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.status) {
                        alert('Failed to update status');
                        checkbox.checked = !checkbox.checked; 
                    }else{
                        alert(data.message);

                    }
                  
                })
                .catch(error => {
                    alert('Error updating status');
                    checkbox.checked = !checkbox.checked;
                });
        }
    </script>

    <script>
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
