@extends('layouts.admin')

@push('title')
<title>Dashboard | Jagriti Vidyalaya</title>
@endpush

@section('main-section')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Permission</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                <li class="breadcrumb-item active">Permission</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Create Permission</h4>
                        </div>
                        <div class="card-body">
                         
                            <div class="row">

                                <form action="{{ isset($role) ? route('roles.update', $role->id) : route('permissions.store') }}" method="POST">
                                    @csrf
                                    @if(isset($role))
                                        @method('PUT')
                                    @endif
                                    <div class="box-body">
                                   
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Permission Name</label> <small class="text-danger">*</small>
                                            <input autofocus="" id="name" name="name" type="text" class="form-control" value="{{$feetype->name ?? null}}" autocomplete="off">
                                            <span class="text-danger"></span>
                                        </div>
                                        
                                        {{--<div class="form-group mb-3">
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
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Created Permission </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">


                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>                                           
                                            {{-- <th>Status</th> --}}
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-info">Assign Permissions</a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
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
    </div>
</div>
</div>
</div>




<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<style>
    .form-check-input:checked {
        background-color: #2ab57d;
    }


    .pagination {
        float: inline-end;

    }

    ul li {
        list-style: none;
    }
</style>
@endsection