@extends('adminlte::page')

@section('title', 'Permission Manage')

@section('content_header')
    <h1>Permission Manage</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Create Permission</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ isset($role) ? route('permissions.update', $role->id) : route('permissions.store') }}"
                                method="POST">
                                @csrf
                                @if (isset($role))
                                    @method('PUT')
                                @endif
                                <div class="box-body">

                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1">Permission Name</label> <small
                                            class="text-danger">*</small>
                                        <input autofocus="" id="name" name="name" type="text"
                                            class="form-control" value="{{ $feetype->name ?? null }}" autocomplete="off">
                                        <span class="text-danger"></span>
                                    </div>

                                    {{-- <div class="form-group mb-3">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"> {{ $feetype->description ?? null }} </textarea>
                                        <span class="text-danger"></span>
                                    </div> --}}

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success btn-md">Save</button>
                                </div>

                            </form>




                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Permission List</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">


                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Created At</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
