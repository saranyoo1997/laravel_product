@extends('layout.front')




@section('content')
    <!-- Header-->
    <header class="bg-secondary py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">saranyoo</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <!-- Product price-->
                                    {{ $product->price }}฿
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                {{-- <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="">Add Cart</a></div> --}}
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-primary mt-auto" data-bs-toggle="modal"
                                        data-bs-target="#{{ 'product_' . $product->id }}">
                                        Cart
                                    </button>

                                </div>


                                <!-- Modal -->
                                <form action="{{route('store',$product)}}" method="post">
                                    @csrf

                                    <div class="modal fade" id="{{ 'product_' . $product->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="{{ 'product_' . $product->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="{{ 'product_' . $product->id }}Label">
                                                            {{$product->name}}
                                                        
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                        <div class="row mb-2">
                                                            <div class="col">Product Name</div>
                                                            <div class="col">{{$product->name}}</div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col">Product Price</div>
                                                            <div class="col">{{$product->price}}</div>
                                                        </div>

                                                    <input class="form-control" type="number" name="number" min="1" max="1000" placeholder="Number of Product" value="1">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                                </form>
                              
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
