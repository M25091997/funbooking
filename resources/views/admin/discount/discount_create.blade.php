@extends('adminlte::page')

@section('title', 'Admin | Offers and Discounts')

@section('content_header')
    <h4> Offers and Discounts</h4>
@stop

@section('content')

@section('plugins.BootstrapSwitch', true)
@section('plugins.KrajeeFileinput', true)

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4> {{ isset($response) ? 'Edit' : 'Add' }} Offers and Discounts </h4>
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
            <form action="{{ isset($response) ? route('discount.update', $response->id) : route('discount.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($response))
                    @method('PUT')
                @endif

                <div class="row">
                    <x-adminlte-select2 label="Select Discount Type" name="discount_type_id" fgroup-class="col-12"
                        required>
                        <option value="">Choose...</option>
                        @foreach (App\Models\DiscountType::where('is_active', true)->get() as $type)
                            <option value="{{ $type->id }}"
                                {{ isset($response) && $response->discount_type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}</option>
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
                    <x-adminlte-input name="name" label="Offers Name:" placeholder="name"
                        value="{{ $response->name ?? old('name') }}" fgroup-class="col-md-12" required />
                </div>


                <div class="row">
                    <x-adminlte-input name="code" label="Coupon Code:" placeholder="code"
                        value="{{ $response->code ?? old('code') }}" fgroup-class="col-md-12" />
                </div>
                <div class="row">
                    <x-adminlte-input type="number" name="discount" step="0.01" label="Discount Value:"
                        placeholder="discount" value="{{ $response->discount ?? old('discount') }}"
                        fgroup-class="col-md-12" required />
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="category_id">Discount Type:</label>
                        <div class="input-group">
                            <select id="type" name="type" class="form-control select2-hidden-accessible"
                                required="required" tabindex="-1" aria-hidden="true">
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

                <div class="row">
                    <x-adminlte-input type="date" name="valid_from" label="Valid From:" placeholder="valid from"
                        value="{{ $response->valid_from ?? old('valid_from') }}" fgroup-class="col-md-12" required />
                </div>
                <div class="row">
                    <x-adminlte-input type="date" name="valid_until" label="Valid Until:" placeholder="valid until"
                        value="{{ $response->valid_until ?? old('valid_until') }}" fgroup-class="col-md-12" required />
                </div>
                <div class="row">
                    <x-adminlte-input type="number" name="usage_limit" label="Usage Limit:" placeholder="usage limit"
                        value="{{ $response->usage_limit ?? old('usage_limit') }}" fgroup-class="col-md-12" />
                </div>



                <div class="row">
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
                            label="  {{ isset($response) ? 'Update' : 'Create' }}  Coupon " theme="success"
                            icon="fas fa-lg fa-save" />
                        <a href="{{ route('discount.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
