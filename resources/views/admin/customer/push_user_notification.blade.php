@extends('adminlte::page')

@section('title', 'Push Notification ')

@section('content_header')
    <h1>Push Notification </h1>
@stop
@section('plugins.Summernote', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Notification </h4>
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

                    <form
                        action="{{ isset($response) ? route('user_notification.update', $response->id) : route('user_notification.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($response))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Choose...</option>                                       
                                        <option value="email">Email</option>                                       
                                        <option value="sms">SMS</option>                                       
                                        <option value="push">Push</option>                                       
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Notification Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', $response->title ?? '') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id">Select User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Choose user...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id', $park->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        <!-- message -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-adminlte-text-editor label="Message" name="message"
                                        placeholder="write attraction" rows="5">
                                        {{ old('message', $response->message ?? '') }}
                                        </x-adminlte-text-editorname>

                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            <a href="{{ route('user_notification.index') }}" class="btn btn-sm btn-danger">Cancel</a>

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
