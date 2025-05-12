@extends('adminlte::page')

@section('title', 'Admin | Subscription Plans')

@section('content_header')
    <h4>Subscription Plans</h4>
@stop

@section('content')

@section('plugins.BootstrapSwitch', true)
@section('plugins.KrajeeFileinput', true)

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4> {{ isset($response) ? 'Edit' : 'Add' }} Subscription Plan </h4>
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
            <form action="{{ isset($response) ? route('plan.update', $response->id) : route('plan.store') }}"
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
                    <x-adminlte-input name="name" label="Subscription Plan Name:" placeholder="name"
                        value="{{ $response->name ?? old('name') }}" fgroup-class="col-md-12" required />
                </div>


                <div class="row">
                    <x-adminlte-input type="number" name="price" step="0.01" label="Price:"
                        placeholder="price" value="{{ $response->price ?? old('price') }}"
                        fgroup-class="col-md-12" required />
                </div>
                

                <div class="row">
                    <x-adminlte-input type="number" name="duration_days" label="Duration:" placeholder="days"
                        value="{{ $response->duration_days ?? old('duration_days') }}" fgroup-class="col-md-12" required />
                </div>
                <div class="row">
              
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description(Optional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $park->description ?? '') }}</textarea>
                    </div>
                </div>
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
                            label="  {{ isset($response) ? 'Update' : 'Create' }}  Subscription Plan " theme="success"
                            icon="fas fa-lg fa-save" />
                        <a href="{{ route('plan.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
