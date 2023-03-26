@extends('layout.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="input-name" class="form-label">Input Name</label>
                        <input type="text" value="{{ old('name') }}"
                            class="form-control @error('name')is-invalid @enderror" id="input-name" name='name'
                            placeholder="name">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="input-slug" class="form-label">Input Slug</label>
                        <input type="text" value="{{ old('slug') }}"
                            class="form-control @error('slug')is-invalid @enderror" id="input-slug" name='slug'
                            placeholder="slug">

                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="input-category" class="form-label">Input Category</label>
                        {{-- <input type="text" value="{{ old('price') }}"
                            class="form-control @error('category_id')is-invalid @enderror" id="input-category"name='category_id'
                            placeholder="category_id"> --}}

                        <select class="form-control @error('category_id')is-invalid @enderror" name="category_id">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
                                </option>
                            @endforeach


                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="input-price" class="form-label">Input Price</label>
                        <input type="text" value="{{ old('price') }}"
                            class="form-control @error('price')is-invalid @enderror" id="input-price"name='price'
                            placeholder="price">

                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3 row">
                        <label   for="input-image" class="form-label col-12">Input image</label>
                        <input  class="filepond col-12 col-md-6" type="file" name="image" id="image">


                        {{-- <input type="file" 
                            class="form-control @error('image')is-invalid @enderror" id="input-image" name='image'
                            placeholder="image"> --}}

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    {{-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file Image</label>
                        </div>
                      </div> --}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('style')
    @vite('resources/js/filepond.js')
@endsection
