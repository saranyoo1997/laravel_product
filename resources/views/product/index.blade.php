@extends('layout.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h4 class="m-0 font-weight-bold text-primary">Tables Product
                <a href="{{ route('product.create') }}" class="btn btn-success float-right">New Product</a>
            </h4>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter">

                                {{-- <label>Search:
                                    <input type="search"class="form-control form-control-sm" placeholder=""aria-controls="dataTable">
                                </label> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 150px;">id
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 232px;">name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 106px;">slug</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 106px;">category</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 106px;">menu</th>


                                    </tr>
                                </thead>
                                <tbody>


                                    @forelse ($products as $product)
                                        <tr class="odd">
                                            <td class="sorting_1">{{ $product->id }}</td>
                                            <td>{{ $product->name }} {{$product->price}}฿</td>
                                            <td>{{ $product->slug }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td class="text-right">

                                                <form action="{{ route('product.destroy', $product) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="btn-group">
                                                        <a href="{{ route('product.edit', $product) }}"
                                                            class="btn btn-warning">
                                                            <i class="fa fa-pen mr-2"></i>edit
                                                        </a>
                                                        <button class="btn btn-danger " onclick="return confirm('delete')"
                                                            type="submit">
                                                            <i class="fa fa-trash mr-2"></i>delete
                                                        </button>
                                                    </div>
                                                </form>


                                            </td>



                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">no data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a
                                            href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
