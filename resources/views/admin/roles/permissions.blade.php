@extends('adminlte::page')

@section('title', 'Permission Manage')

@section('content_header')
    <h1>Permission Manage</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Assign Permissions to <strong class="text-info"> {{ $role->name }}
                                </strong></h4>
                        </div>
                        <div class="card-body" style="height:600px; overflow-y:auto;>

                            <div class="row">

                                <form action="{{ route('roles.assignPermissions', $role->id) }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="permissions" class="h5">Permissions</label>
                                        <div>
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                                        value="{{ $permission->id }}" id="permission{{ $permission->id }}"
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="permission{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success mt-5">Assign Permissions</button>
                                </form>



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
