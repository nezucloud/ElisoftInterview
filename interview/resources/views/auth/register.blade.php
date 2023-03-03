@extends('layouts.base')

@section('content')
    @php
        $validateError = json_decode($errors);
        $error = [
            'name' => $validateError->name[0] ?? '',
            'password' => $validateError->password[0] ?? '',
            'email' => $validateError->email[0] ?? '',
        ];
    @endphp

    <div class="d-flex flex-column justify-content-center" style="height: 100vh">
        <div class="row">
            <div class="col"></div>

            <div class="col-sm-12 col-md-8 col-lg-6">

                <div class="card card-info">
                    <div class="card-header text-center">
                        <h3 class="card-title">Register</h3>
                    </div>

                    <form class="form-horizontal" id="formRegister" method="POST" action="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $error['name'] ? 'is-invalid' : '' }}"
                                        id="name" placeholder="Full Name" name="name" required
                                        value="{{ old('name') }}">
                                    @if ($error['name'])
                                        <div class="invalid-feedback">
                                            {{ $error['name'] }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control {{ $error['email'] ? 'is-invalid' : '' }}"
                                        id="email" placeholder="Email" name="email" required
                                        value="{{ old('email') }}">
                                    @if ($error['email'])
                                        <div class="invalid-feedback">
                                            {{ $error['email'] }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control {{ $error['password'] ? 'is-invalid' : '' }}"
                                        id="password" placeholder="Password" name="password" minlength="8" required
                                        value="{{ old('password') }}">
                                    @if ($error['password'])
                                        <div class="invalid-feedback">
                                            {{ $error['password'] }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirmPassword"
                                        placeholder="Confirm Password" minlength="8" required
                                        value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="termOfUse" required>
                                        <label class="form-check-label" for="termOfUse">Agree <a href="#">Term of
                                                use</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right">Register</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>

            <div class="col"></div>

        </div>
    </div>
@endsection

@section('script')
    <script src="script/InvalidNode.js"></script>
    <script>
        'use-strict';

        $('#confirmPassword, #password').on('input', function(event) {
            validatePassword();
        })

        $('#formRegister').on('submit', function(event) {
            event.preventDefault();

            const password = $('#password').val();
            const confirmPassword = $('#confirmPassword').val();

            if (!Boolean(password) || password != confirmPassword) {
                alert('Password must be filled/matched each other');
                return;
            }

            $('#formRegister').unbind('submit').submit();
        });

        function validatePassword() {
            const confirmPasswordElement = $('#confirmPassword');
            const confirmPassword = confirmPasswordElement.val();;
            const password = $('#password').val();

            const invalidPasswordFeedback = $('#confirmPasswordInvalid');

            if (!invalidPasswordFeedback.length && password != confirmPassword) {
                confirmPasswordElement
                    .addClass('is-invalid')
                    .after(invalidNode('confirmPassword', 'Confirm password must be exact match with password'));
            } else if (invalidPasswordFeedback.length && password == confirmPassword) {
                confirmPasswordElement.removeClass('is-invalid');
                invalidPasswordFeedback.remove();
            }
        }
    </script>
@endsection
