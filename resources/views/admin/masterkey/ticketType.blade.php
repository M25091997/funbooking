@extends('adminlte::page')


@section('title', 'Ticket Type')

@section('content_header')
    <a href="{{ route('ticketType.create') }}" class="btn btn-sm btn-dark float-right"> <i class="fa fa-plus"
            aria-hidden="true"> </i> Add Ticket Type</a>
    <h4>Ticket Type</h4>
@stop
@section('content')
    <div class="card">
        <div class="card-header"> Ticket Type List </div>
        <div class="card-body">
            <div class="table-responsive">
                {{ $response->links() }}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Type </th>
                            <th>Rules</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($response))
                            @foreach ($response as $single)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>   
                                    <td>{{ $single->name }}</td>
                                    <td>{!! $single->rules !!}</td>
                                    {{-- <td><input type="checkbox" name="my-checkbox" class="check is_verified"
                                            {{ $single->is_verified ? 'checked' : '' }} data-bootstrap-switch
                                            data-off-color="danger" data-on-color="success" data-off-text="" data-on-text=""
                                            data-switch-sm></td> --}}
                                    <td><div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="is_active"
                                                class="checkbox custom-control-input" id="switch{{ $single->id }}"
                                                {{ $single->is_active ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="switch{{ $single->id }}"></label>
                                        </div>
                                    </div>
                                </td>
                     
                                    <td>
                                        <form action="{{ route('ticketType.destroy', $single) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, you want to delete this?')">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('ticketType.edit', $single) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>
            <button class="toastsDefaultAutohide d-none">sfas</button>

        </div>
    </div>
@endsection
