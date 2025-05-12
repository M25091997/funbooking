@extends('adminlte::page')

@section('title', 'Admin | Support Staff')

@section('content_header')
    <h4>Support Staff</h4>
@stop

@section('content')

@section('plugins.BootstrapSwitch', true)
@section('plugins.KrajeeFileinput', true)

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4> {{ isset($response) ? 'Edit' : 'Add' }} Staff </h4>
        </div>

        <div class="card-body">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            <form action="{{ isset($response) ? route('staff.update', $response->id) : route('staff.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($response))
                    @method('PUT')
                @endif

                <div class="row">
                    <x-adminlte-select2 label="Select Category" name="category_id" fgroup-class="col-12" required>
                        <option value="">Choose...</option>
                        @foreach (App\Models\Category::where('status', true)->get() as $category)
                            <option value="{{ $category->id }}"
                                {{ isset($response) && $response->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>


                <div class="row">
                    <x-adminlte-select2 label="Select Parks" name="park_id" fgroup-class="col-12" required>
                        <option value="">Choose...</option>
                        @foreach ($parks as $park)
                            <option value="{{ $park->id }}"
                                {{ isset($response) && $response->park_id == $park->id ? 'selected' : '' }}>
                                {{ $park->name }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>

                <div class="row">
                    <x-adminlte-select2 label="Select His Role" name="role" fgroup-class="col-12" required>
                        <option value="">Choose...</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ isset($response) && $response->park_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </x-adminlte-select2>
                    {{-- <x-adminlte-select2 label="Select His Role" name="role" fgroup-class="col-12" required>
                        <option value="">Select role(vendor name)..</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ isset($response) && $response->park_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }} ({{$role->user->name}})</option>
                        @endforeach
                    </x-adminlte-select2> --}}
                </div>


                <div class="row">
                    <x-adminlte-input name="name" label="Staff Name:" placeholder="name"
                        value="{{ $response->name ?? old('name') }}" fgroup-class="col-md-12" required />
                </div>

                <div class="row">
                    <x-adminlte-input name="email" label="Staff Email:" placeholder="email id"
                        value="{{ $response->email ?? old('email') }}" fgroup-class="col-md-12" required />
                </div>

                <div class="row">
                    <x-adminlte-input name="mobile" label="Staff mobile:" placeholder="mobile no"
                        value="{{ $response->mobile ?? old('mobile') }}" fgroup-class="col-md-12" required />
                </div>
                <div class="row">
                    <x-adminlte-input name="aadhaar_no" label="Aadhaar no:" placeholder="aadhaar no"
                        value="{{ $response->aadhaar_no ?? old('aadhaar_no') }}" fgroup-class="col-md-12" required />
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" rows="3" class="form-control" placeholder="address">{{ old('address', $response->address ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" rows="3" class="form-control" placeholder="other info">{{ old('remarks', $response->remarks ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <x-adminlte-input type="file" name="photo" label="Staff Photo:" placeholder="upload photo"
                        value="{{ $response->photo ?? old('photo') }}" fgroup-class="col-md-12"  {{ isset($response) ? '' : 'required' }} />
                </div>
                <div class="row">
                    <x-adminlte-input type="file" name="document" label="Document:" placeholder="upload document"
                        value="{{ $response->document ?? old('document') }}" fgroup-class="col-md-12" {{ isset($response) ? '' : 'required' }}  />
                </div>

                <div class="row mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="is_active" value="1" type="checkbox" role="switch"
                            id="flexSwitchCheckChecked"
                            {{ isset($response) && $response->is_active == true ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Is Active</label>
                    </div>

                </div>

                <div class="position-relative row form-check">
                    <div class="col-sm-10 offset-sm-2">
                        <x-adminlte-button class="btn-sm" type="submit"
                            label=" {{ isset($response) ? 'Update' : 'Create' }}  Staff " theme="success"
                            icon="fas fa-lg fa-save" />
                        <a href="{{ route('subscriptionBenefit.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
