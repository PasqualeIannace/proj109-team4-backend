@extends('layouts.app')

@section('content')

{{-- VERIFICA PASSWORD CLIENT SIDE --}}
<script>
    window.onload = function() {
        var password = document.getElementById("password")
        var confirmPassword = document.getElementById("password-confirm");

        function validatePassword() {
            if (password.value != confirmPassword.value) {
                confirmPassword.setCustomValidity("Le password non corrispondono");
            } else {
                confirmPassword.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;
    }
</script>


{{-- FORM REGISTRAZIONE --}}
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" pattern=".{8,}"
                                    title="La password deve contenere almeno 8 caratteri">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" pattern=".{8,}"
                                    title="La password deve contenere almeno 8 caratteri">
                            </div>
                        </div>

                        <!-- New fields for UserSeeder -->
                        <div class="mb-4 row">
                            <label for="activity_name" class="col-md-4 col-form-label text-md-right">{{ __('Activity
                                Name') }}</label>
                            <div class="col-md-6">
                                <input id="activity_name" type="text"
                                    class="form-control @error('activity_name') is-invalid @enderror"
                                    name="activity_name" value="{{ old('activity_name') }}" required>
                                @error('activity_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="logo_activity" class="form-label">Carica Immagine</label>
                                <input type="file" class="form-control @error('logo_activity') is-invalid @enderror"
                                    id="logo_activity" name="logo_activity">
                                @error('logo_activity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address')
                                    }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="VAT_number" class="col-md-4 col-form-label text-md-right">{{ __('VAT
                                    Number') }}</label>
                                <div class="col-md-6">
                                    <input id="VAT_number" type="text"
                                        class="form-control @error('VAT_number') is-invalid @enderror" name="VAT_number"
                                        value="{{ old('VAT_number') }}" required>
                                    @error('VAT_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="exampleSelect" class="form-label">Select Restaurant Type/s</label>
                                <select class="form-select" name="types[]" id="types" multiple>

                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection