@extends('adminlte::page')

@section('title', 'Admin | Support Staff')

@section('content_header')

    <h4> Customer's Wallet History </h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Wallet History</h5>
        </div>

        <x-toast />
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Park</th>
                                    {{-- <th>Role</th> --}}
                                    <th>Transaction Id</th>
                                    <th>Remarks</th>
                                    <th>Date</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $single)
                                    @php $wallet = App\Models\CustomerWallet::where('user_id', $single->id)->first(); @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $single->user_id }}</td>                                    
                                        <td>{{ $single->type  }} </td>
                                        <td>{{ $single->amount ?? 0.00 }} </td>
                                        <td>{{ $single->park_id ?? null }} </td>
                                        <td>{{ $single->transaction_id }} </td>
                                        <td>{{ $single->remarks }} </td>
                                        <td>{{ $single->created_at->format('d-M-Y') }} </td>
                                       
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div>

                    </div>
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
        console.log("Hi, I'm using the Laravel-AdminLTE package!");


        $(document).ready(function() {
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
        });
    </script>
@stop
