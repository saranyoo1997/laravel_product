@extends('layout.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('category.update',['category' => $category->id]) }}" method="post">
                    @csrf
                    @method('put')
                    
                    <div class="mb-3">
                        <label for="input-name" id="name" class="form-label">Input Name</label>
                        <input type="text" class="form-control" value="{{$category->name}}" id="input-name"name='name' placeholder="name">
                    </div>


                    <div class="mb-3">
                        <label for="input-slug" id="slug" class="form-label">Input slug</label>
                        <input type="text" class="form-control" value="{{$category->slug}}" name="slug" id="input-slug" placeholder="slug">

                      

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
