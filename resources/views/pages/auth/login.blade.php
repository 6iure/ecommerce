@extends('layouts.app')

@section('content')
    <div id="login-page" class="page">

        @include('components.errors')

        <form method="post" action="{{ route('login.submit') }}">

            @csrf

            <section class="vh-100">

                <div class="container py-5 h-100">

                    <div class="row d-flex justify-content-center align-items-center h-100">

                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                            <div class="card shadow-2-strong" style="border-radius: 1rem;">

                                <div class="card-body p-5 text-center">

                                    <h3 class="mb-5">Log in</h3>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX-2">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX-2">Senha</label>
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                        <label class="form-check-label" for="form1Example3"> Lembrar senha</label>
                                    </div>

                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </form>

    </div>

@endsection
