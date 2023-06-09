@extends('layout.blank')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>

                                    <form action="{{ route('register.store') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control form-control-user" id="name"
                                                aria-describedby="emailHelp" placeholder="Firstname...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="{{ old('username') }}" name="username"
                                                class="form-control form-control-user" id="username"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" value="{{ old('password') }}"
                                                class="form-control form-control-user" id="password" name="password"
                                                placeholder="Password">
                                        </div>

                                        <center><button type="submit" class="btn btn-primary">Submit</button></center>
                                        <hr>


                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="col-lg-12">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>

    </div>
@endsection
