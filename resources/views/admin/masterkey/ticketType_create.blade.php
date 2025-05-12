@extends('adminlte::page')

@section('title', 'Admin | Category Attribute Type')

@section('content_header')
    <h4> Ticket Type </h4>
@stop

@section('content')

@section('plugins.Summernote', true)
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4> {{ isset($response) ? 'Edit' : 'Add' }} Ticket Type </h4>
            </div>

            <div class="card-body">
                <form
                    action="{{ isset($response) ? route('ticketType.update', $response->id) : route('ticketType.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($response))
                        @method('PUT')
                    @endif

                    {{--         
                    <div class="row">
                        <x-adminlte-select2 label="Select Category" name="category_id" fgroup-class="col-12" required>
                            <option value="">Choose...</option>
                            @foreach ([] as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset($response) && $response->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div> --}}
                    {{-- <div class="row">
                        <x-adminlte-select2 label="Select Sub Category" name="sub_category_id" fgroup-class="col-12" required>
                            <option value="">Choose...</option>
                            @foreach ($subCategories as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset($response) && $response->sub_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div> --}}
                    <div class="row">
                        <x-adminlte-input name="name" label="Name" placeholder=""
                            value="{{ $response->name ?? old('name') }}" fgroup-class="col-12" />
                    </div>
                                  
                            <x-adminlte-text-editor label="Pricing Rules" name="rules" placeholder="rules...">
                                {{ $response->rules ?? old('rules') }}
                                </x-adminlte-text-editorname>

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="is_active" value="1" id="customSwitch1"   {{isset($response) && $response->is_active ? 'checked':'' }}>
                                    <label class="custom-control-label" for="customSwitch1">Is Active </label>
                                </div>
                 
            

                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                            <x-adminlte-button class="btn-sm" type="submit"
                                label="  {{ isset($response) ? 'Update' : 'Save' }}  Ticket Type " theme="success"
                                icon="fas fa-lg fa-save" />
                            <a href="{{ route('ticketType.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-6"></div>
</div>

@endsection
