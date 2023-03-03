@extends('layouts.base')

@section('content')
    @php
        $validateError = json_decode($errors);
        $error = [
            'email' => $validateError->email[0] ?? '',
            'password' => $validateError->password[0] ?? '',
        ];
    @endphp

    <div class="d-flex flex-column justify-content-center" style="height: 100vh">
        <div class="row">
            <div class="col"></div>

            <div class="col-sm-12 col-md-8 col-lg-6">

                <div class="card card-info">
                    <div class="card-header text-center">
                        <h3 class="card-title">Login</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="formLogin" method="POST" action="">
                        @csrf
                        <div class="card-body">
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
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <p>Don't have account ? <a href="/register">Register</a></p>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right">Sign in</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>

            <div class="col"></div>

        </div>
    </div>
@endsection
