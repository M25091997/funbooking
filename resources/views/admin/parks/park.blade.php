@extends('adminlte::page')

@section('title', 'Parks')

@section('content_header')
    <h1>Parks</h1>
@stop
@section('plugins.Summernote', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                @if ($form == 'add')
                    Add
                @else
                    Edit
                @endif Park
            </h4>
        </div>
        <x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        </div>
                    @endif

                    <form action="{{ isset($park) ? route('parks.update', $park->id) : route('parks.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($park))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $park->name ?? '') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $park->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- State and District -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">State</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="">Select State</option>
                                        @if (!empty($areas))
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}"
                                                    @if ($form == 'edit' && $park->state == $area->name) selected @endif>{{ $area->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input type="hidden" name="state" id="state"
                                        value="@if ($form == 'edit') {{ $park->state }} @endif">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Districts</label>
                                    <select name="area_id" id="area_id" class="form-control"
                                        data-value="@if ($form == 'edit') {{ $park->area_id }} @endif">
                                        <option value="">Select District</option>
                                    </select>
                                    <input type="hidden" name="district" id="district"
                                        value="@if ($form == 'edit') {{ $park->district }} @endif">
                                </div>
                            </div>


                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state_id">State</label>
                                    <select name="state" id="state_id" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}"
                                                {{ old('state_id', $park->state ?? '') == $area->id ? 'selected' : '' }}>
                                                {{ $area->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area_id">District</label>
                                    <select name="area_id" id="area_id" class="form-control">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>

                        <!-- Address & Location -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" rows="3" class="form-control">{{ old('address', $park->address ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location (Embed Google Maps)</label>
                                    <textarea name="location" id="location" rows="3" class="form-control">{{ old('location', $park->location ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Timings -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="opening_time">Opening Time</label>
                                    <input type="time" name="opening_time" class="form-control"
                                        value="{{ old('opening_time', $park->opening_time ?? '') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="closing_time">Closing Time</label>
                                    <input type="time" name="closing_time" class="form-control"
                                        value="{{ old('closing_time', $park->closing_time ?? '') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="booking_threshold">Booking Time Upto</label>
                                    <input type="time" name="booking_threshold" class="form-control"
                                        value="{{ old('booking_threshold', $park->booking_threshold ?? '') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="helpline">Help Line </label>
                                    <input type="text" name="helpline" class="form-control"
                                        value="{{ old('helpline', $park->helpline ?? '') }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Attractions -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-adminlte-text-editor label="Attraction" name="attraction"
                                        placeholder="write attraction" rows="5">
                                        {{ old('attraction', $park->attraction ?? '') }}
                                        </x-adminlte-text-editorname>

                                </div>
                            </div>
                        </div>

                        <!-- Booking Rate -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Booking Rate</h3>
                            </div>
                            <div class="card-body">
                                @php
                                    $ticketType  = App\Models\TicketType::where('is_active', 1)->get();
                                    
                                    // $existingPrices = $park->ticketPrices->keyBy('ticket_type_id') ; // Retrieve existing prices
                                    $existingPrices = isset($park) ? $park->ticketPrices->keyBy('ticket_type_id') : collect(); 
                                @endphp
                            
                                @foreach ($ticketType as $single)
                                    @php
                                        $existingPrice = $existingPrices[$single->id] ?? null; // Check if ticket type exists in the saved data
                                    @endphp
                            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ticket_type_id">Ticket Type</label>
                                                <select name="ticket_type_id[]" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="{{ $single->id }}" 
                                                        {{ $existingPrice ? 'selected' : '' }}>
                                                        {{ $single->name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mrp">Booking MRP</label>
                                                <input type="text" name="mrp[]" class="form-control" 
                                                    value="{{ $existingPrice->mrp ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Booking Price</label>
                                                <input type="text" name="price[]" class="form-control" 
                                                    value="{{ $existingPrice->price ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            {{-- <div class="card-body">
                                @php $ticketType  = App\Models\TicketType::where('is_active', 1)->get(); @endphp
                                @foreach ($ticketType as $single)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ticket_type_id">Ticket Type</label>
                                                <select name="ticket_type_id[]" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="{{ $single->id }}">{{ $single->name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mrp">Booking MRP</label>
                                                <input type="text" name="mrp[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Booking Price</label>
                                                <input type="text" name="price[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> --}}
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="exampleInputFile">Images (Multiple)</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="images[]" multiple>
                            </div>
                        </div>

                        <!-- Closing Days -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Choose Closing Days</h3>
                            </div>
                            <div class="card-body">
                                @php
                                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                                if(isset($park))
                                {
                                    $selectedDays = $park->closing_days ? json_decode($park->closing_days, true) : collect(); 

                                }else{
                                    $selectedDays = collect();

                                }

                            

                                @endphp
                            
                                @foreach ($days as $day)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="closing_days[]" 
                                            value="{{ $day }}" 
                                            {{ in_array($day, $selectedDays) ? 'checked' : '' }}> {{-- Check if day exists --}}
                                        <label class="form-check-label">{{ $day }}</label>
                                    </div>
                                @endforeach
                            </div>
                            

                            {{-- <div class="card-body">
                                @php $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']; @endphp
                                @foreach ($days as $day)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="closing_days[]"
                                            value="{{ $day }}">
                                        <label class="form-check-label">{{ $day }}</label>
                                    </div>
                                @endforeach
                            </div> --}}
                        </div>
                        <div class="row mb-5">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" value="1" id="customSwitch1"   {{isset($park) && $park->status == 1 ? 'checked':'' }}>
                                <label class="custom-control-label" for="customSwitch1">Featured Status </label>
                            </div>
                        </div>

                        

                        <!-- Buttons -->
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-sm btn-success">{{ $form == 'add' ? 'Save Park' : 'Update Park' }}</button>
                            @if ($form == 'edit')
                                <a href="{{ route('parks.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // $('body').on('change', '#state_id', function() {
            //     var state_id = $(this).val();
            //     var area_id = $('#area_id').attr('data-value');
            //     area_id = area_id ? area_id.trim() : ''; // Ensure area_id is properly trimmed

            //     if (!state_id) {
            //         // If no state is selected, clear the area dropdown and exit early
            //         $('#area_id').html('<option value="">Select District</option>');
            //         return;
            //     }

            //     // Clear the area dropdown and show a loading message
            //     $('#area_id').html('<option value="">Loading...</option>');

            //     // Send an AJAX request to fetch districts based on selected state
            //     $.ajax({
            //         url: "{{ route('getdistricts') }}", // Ensure this route is correct
            //         type: 'POST',
            //         dataType: 'json',
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             state_id: state_id
            //         },
            //         beforeSend: function() {
            //             // Optional: Display a loading spinner (you can use your preferred spinner)
            //             $('#area_id').html('<option value="">Loading...</option>');
            //         },
            //         success: function(data) {
            //             // Check if the response is valid
            //             if (data && Object.keys(data).length > 0) {
            //                 // Clear existing options, except the default
            //                 var options = '<option value="">Select District</option>';
            //                 $.each(data, function(key, district) {
            //                     options +=
            //                         `<option value="${district.id}">${district.name}</option>`;
            //                 });

            //                 // Update the dropdown with new options
            //                 $('#area_id').html(options);

            //                 // If there is a pre-selected area_id, set it and trigger change
            //                 if (area_id) {
            //                     $('#area_id').val(area_id).trigger('change');
            //                 }
            //             } else {
            //                 $('#area_id').html(
            //                     '<option value="">No districts available</option>');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             console.error('AJAX request failed: ', error);
            //             $('#area_id').html('<option value="">Error loading districts</option>');
            //         }
            //     });
            // });

            $('body').on('change', '#state_id', function() {
                var state_id = $(this).val();
                var area_id = $('#area_id').attr('data-value');
                area_id = area_id.trim();
                if (state_id != '') {
                    $('#state').val($('#state_id option:selected').text());
                }
                $('#area_id option:gt(0)').remove();
                $.ajax({
                    url: "{{ route('getdistricts') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        state_id: state_id
                    },
                    success: function(data) {
                        if (data != '[]' && data != 'null') {
                            data = JSON.parse(data);
                            for (var i in data) {
                                $('#area_id').append('<option value="' + data[i]['id'] + '">' +
                                    data[i]['name'] + '</option>');
                            }
                            if (area_id != '') {
                                $('#area_id').val(area_id).trigger('change');
                            }
                        }
                    }
                });
            });


            $('body').on('change', '#area_id', function() {
                var area_id = $(this).val();
                if (area_id != '') {
                    $('#district').val($('#area_id option:selected').text());
                }
            });
            $('.toastsDefaultSuccess').click(function() {
                var body = $(this).text();
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Success',
                    subtitle: '',
                    body: body
                })
            });
            $('.toastsDefaultDanger').click(function() {
                var body = $(this).text();
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    subtitle: '',
                    body: body
                })
            });
            if ($('#success-msg')) {
                $('#success-msg').trigger('click');
            }
            if ($('#error-msg')) {
                $('#error-msg').trigger('click');
            }
            $('#state_id').trigger('change');
        });
    </script>
@stop
