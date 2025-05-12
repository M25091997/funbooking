@session('success')
    <button type="button" class="btn btn-default toastsDefaultSuccess d-none" id="success-msg">
    {{ session('success') }}
    </button>
@endsession
@session('error')
    <button type="button" class="btn btn-default toastsDefaultDanger d-none" id="error-msg">
    {{ session('error') }}
    </button>
@endsession