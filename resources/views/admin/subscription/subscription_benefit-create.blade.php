@extends('adminlte::page')

@section('title', 'Admin | Subscription Benefit')

@section('content_header')
    <h4>Subscription Benefit</h4>
@stop

@section('content')

@section('plugins.BootstrapSwitch', true)
@section('plugins.KrajeeFileinput', true)

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4> {{ isset($response) ? 'Edit' : 'Add' }}  Benefit </h4>
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
            <form action="{{ isset($response) ? route('subscriptionBenefit.update', $response->id) : route('subscriptionBenefit.store') }}"
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
                    <x-adminlte-select2 label="Select Plan" name="plan_id" fgroup-class="col-12" required>
                        <option value="">Choose...</option>
                        @foreach (App\Models\Plan::where('is_active', true)->get() as $plan)
                            <option value="{{ $plan->id }}"
                                {{ isset($response) && $response->plan_id == $plan->id ? 'selected' : '' }}>
                                {{ $plan->name }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>

                <div class="row">
                    <x-adminlte-select2 label="Select Parks" name="park_id" fgroup-class="col-12" required>
                        <option value="">Choose...</option>
                        @foreach (App\Models\Park::where('is_active', true)->get() as $park)
                            <option value="{{ $park->id }}"
                                {{ isset($response) && $response->park_id == $park->id ? 'selected' : '' }}>
                                {{ $park->name }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>


                <div class="row">
                    <x-adminlte-input name="name" label="Benefit Name:" placeholder="name"
                        value="{{ $response->name ?? old('name') }}" fgroup-class="col-md-12" required />
                </div>
                (Optional)

                <div class="row">
                    <x-adminlte-input type="number" name="discount" step="0.01" label="Discount Value:"
                        placeholder="discount" value="{{ $response->discount ?? old('discount') }}"
                        fgroup-class="col-md-12"  />
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="category_id">Discount Type:</label>
                        <div class="input-group">
                            <select id="type" name="type" class="form-control select2-hidden-accessible"
                                 tabindex="-1" aria-hidden="true">
                                <option value="">Choose...</option>
                                <option value="fixed"
                                    {{ isset($response) && $response->type == 'fixed' ? 'selected' : '' }}>Fixed
                                </option>
                                <option value="percentage"
                                    {{ isset($response) && $response->type == 'percentage' ? 'selected' : '' }}>
                                    Percentage
                                </option>
                            </select>
                        </div>
                    </div>
                </div>



                {{--               
                <div class="row">
              
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description(Optional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $park->description ?? '') }}</textarea>
                    </div>
                </div>
                </div> --}}



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
                            label="  {{ isset($response) ? 'Update' : 'Create' }}  Benefit " theme="success"
                            icon="fas fa-lg fa-save" />
                        <a href="{{ route('subscriptionBenefit.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
