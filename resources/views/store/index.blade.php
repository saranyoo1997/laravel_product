@extends('layout.front')




@section('content')
    <!-- Header-->
    <header class="bg-secondary py-5"
        style="
        background: url('https://media.istockphoto.com/id/858610680/th/%E0%B8%A3%E0%B8%B9%E0%B8%9B%E0%B8%96%E0%B9%88%E0%B8%B2%E0%B8%A2/%E0%B8%95%E0%B8%A5%E0%B8%B2%E0%B8%94%E0%B8%8A%E0%B9%89%E0%B8%AD%E0%B8%9B%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%87%E0%B8%9A%E0%B8%99%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%87%E0%B9%80%E0%B8%9A%E0%B8%A5%E0%B8%AD.jpg?s=612x612&w=0&k=20&c=_X7x9MhH1soylUTnrU2gTDr5N0CTaaoUZfn3Aro9aCA=');
        background-blend-mode: multiply;
">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white" style="text-shadow: 1px 1px 5px rgba(0,0,0,0.6);">
                <h1 class="display-4 fw-bolder">Saranyoo</h1>
                <p class="lead fw-normal text-white mb-0">
                    Everyday is a fresh start. &mdash; ทุกวันคือการเริ่มต้นใหม่
                </p>
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
                            {{-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." /> --}}
                            <img class="card-img-top" src="https://picsum.photos/450/300" alt="..." />
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
                                <form action="{{ route('addcart', $product) }}" method="post">
                                    @csrf

                                    <div class="modal fade" id="{{ 'product_' . $product->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="{{ 'product_' . $product->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="{{ 'product_' . $product->id }}Label">
                                                        {{ $product->name }}

                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row mb-2">
                                                        <div class="col">Product Name</div>
                                                        <div class="col">{{ $product->name }}</div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col">Product Price</div>
                                                        <div class="col">{{ $product->price }}</div>
                                                    </div>

                                                    <input class="form-control" type="number" name="number" min="1"
                                                        max="1000" placeholder="Number of Product" value="1">
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
