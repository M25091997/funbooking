@extends('adminlte::page')

@section('title', 'Role Manage')

@section('content_header')
    <h1>Role Manage</h1>
@stop

@section('content')

<section class="content">
   <div class="container-fluid">

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Roles</h4>
                    </div>
                    <div class="card-body">
                       
                   

                            <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" method="POST">
                                @csrf
                                @if(isset($role))
                                    @method('PUT')
                                @endif
                                <div class="box-body">
                               
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1">Role Name</label> <small class="text-danger">*</small>
                                        <input autofocus="" id="name" name="name" type="text" class="form-control" value="{{$role->name ?? old('name')}}" autocomplete="off">
                                      @error('name')  <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="2"> {{ $role->description ?? old('description') }} </textarea>
                                        @error('description')  <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Parent s/w</label>
                                        <select class="form-control" name="type_id">                                        
                                          <option value="1" selected>All</option>
                                          <option value="2"> Water Park</option>
                                         
                                        </select>
                                      </div> --}}

                                </div><!-- /.box-body -->

                              
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success btn-md">Create Role</button>                
                                </div>
                             

                            </form>




                  
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0"> Role List</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">


                            {{-- <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"> --}}
                            <table id="productTable" class="table productTable_wrapper  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Vendor</th>                                           
                                        <th>Name</th>                                           
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>

                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->user->name ?? '--' }}</td>
                                    {{-- <td>{{ $role->name }}</td> --}}
                                    <td>{{ \Illuminate\Support\Str::beforeLast($role->name, '-') }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ ($role->created_at)->format('d M Y') }}</td>
                                    <td>
                                        {{-- @can('edit-role') --}}
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                        {{-- @endcan --}}

                                        {{-- @can('add-permission') --}}
                                        <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-info">Assign Permissions</a>
                                        {{-- @endcan --}}

                                        {{-- @can('delete-role') --}}
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        {{-- @endcan --}}
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
</section>
@endsection