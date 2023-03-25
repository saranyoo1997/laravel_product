@extends('layout.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="input-name" class="form-label">Input Name</label>
                        <input type="text" value="{{ old('name') }}"
                            class="form-control @error('name')is-invalid @enderror" id="input-name"name='name'
                            placeholder="name">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="input-name" class="form-label">Input Slug</label>
                        <input type="text" value="{{ old('slug') }}"
                            class="form-control @error('slug')is-invalid @enderror" id="input-slug"name='slug'
                            placeholder="slug">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="input-name" class="form-label">Input Price</label>
                        <input type="text" value="{{ old('price') }}"
                            class="form-control @error('name')is-invalid @enderror" id="input-price"name='price'
                            placeholder="price">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                   

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection