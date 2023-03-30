@extends('layout.front')

@section('content')

@php
    $verticalMenuJson = file_get_contents(base_path('resources/json/thai_provinces.json'));
    $data = json_decode($verticalMenuJson);

    foreach($data['RECORDS'] as $record) {
        echo $record['name_th'];
    }
   
@endphp


<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Address Details</h1>
                            </div>
                            <form action="" method="post" class="user">
                                @csrf
                                <div class="form-group mb-4">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-user"
                                   
                                        placeholder="Enter name...">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="number" name="tel" value="{{ old('tel') }}" class="form-control form-control-user"
                                       placeholder="Enter Phone Number">
                                </div>

                                <div class="form-group mb-4">
                                    <select name="province" id="province" class="form-control form-control-user" >
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>

                                <div class="form-group mb-4">
                                    <select name="amphur" id="amphur" class="form-control form-control-user" >
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                        
                                <div class="form-group mb-4">
                                    <select name="tambon" id="tambon" class="form-control form-control-user" >
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>

                             
                    

                            </form>
                       
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







   
@endsection
