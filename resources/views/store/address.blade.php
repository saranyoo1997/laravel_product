@extends('layout.front')

@section('content')

    @php
        $verticalMenuJson = file_get_contents(base_path('resources/json/thai_provinces.json'));
        $data = json_decode($verticalMenuJson);
        $provinces = $data->RECORDS;
        
        $verticalMenuJson = file_get_contents(base_path('resources/json/thai_amphures.json'));
        $data = json_decode($verticalMenuJson);
        $amphurs = $data->RECORDS;
        
        $verticalMenuJson = file_get_contents(base_path('resources/json/thai_tambons.json'));
        $data = json_decode($verticalMenuJson);
        $tambons = $data->RECORDS;
        
        // dd($provinces,$amphurs,$tambons);
        
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

                                <form action="{{route('storeAddress')}}" method="post" class="user">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-user" placeholder="ชื่อ-นามสกุล">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="number" name="tel" value="{{ old('tel') }}"
                                            class="form-control form-control-user" placeholder="หมายเลขโทรศัพท์">
                                    </div>

                                    <div class="form-group mb-4">
                                        <select name="province_id" id="province" class="form-select form-select-user">
                                            <option value='' selected disabled>จังหวัด</option>
                                            @foreach ($provinces as $record)
                                                <option value="{{ $record->id }}" @selected($record->id==old('province_id'))>{{ $record->name_th}}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="form-group mb-4">
                                        <select name="amphur_id" id="amphur"  class="form-select form-control-user">
                                            <option value="">อำเภอ</option>

                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <select name="tambon_id" id="tambon" class="form-select form-control-user">
                                            <option value="">ตำบล</option>

                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input name="zipcode" id="zip" placeholder="รหัสไปรษณีย์" class="form-control form-control-user">
                                     
                                    </div>

                                    <div class="form-group mb-4">
                                        <input name="name" id="name" placeholder="ชื่อผู่รับ" class="form-control form-control-user">
                                     
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit
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

@section('script')
   @vite('resources/js/selectaddress.js')
@endsection
