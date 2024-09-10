@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    Items
                </div>

                <div class="card-body">
                    <h5 class="card-title fw-bolder">Manage Items</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="ti ti-plus"></i> Add Item
                    </button>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = ($items->currentPage() - 1) * $items->perPage() + 1;
                            @endphp
                            @forelse ($items as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td><img src="{{ asset('/storage/images/' . $item->image) }}" class="rounded"
                                            style="width: 150px"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->condition }}</td>
                                    <td>
                                        <form>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $item->id }}">EDIT</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $item->id }}">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No items found
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $items->links() }}
                    <!-- Modal Input-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Item</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input class="form-control" type="file" name="image" id="image">

                                            @error('image')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                class="form-control @error('name')
                                        is-invalid
                                        @enderror()"
                                                name="name" placeholder="">
                                            <label for="floatingInput">Add Item</label>

                                            @error('name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="floatingTextarea"
                                                class="form-control @error('name')
                                        is-invalid
                                        @enderror()"
                                                name="description" placeholder="" style="height: 150px"></textarea>
                                            <label for="floatingTextarea">Description</label>

                                            @error('description')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="conditionRange" class="form-label">Condition</label>
                                            <input type="range" id="condition" name="condition" class="form-range"
                                                min="1" max="3">
                                            <div class="d-flex justify-content-between">
                                                <span>Bad</span>
                                                <span>Normal</span>
                                                <span>Good</span>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    @foreach ($items as $item)
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Item Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('items.update', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group mb-3">
                                                <input class="form-control" type="file" name="image"
                                                    id="image">

                                                @error('image')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text"
                                                    class="form-control @error('name')
                                                is-invalid
                                                @enderror()"
                                                    name="name" placeholder=""
                                                    value="{{ old('name', $item->name) }}">
                                                <label for="floatingInput">Add Item</label>

                                                @error('name')
                                                    <span>{{ $message }}</span>
                                                @enderror

                                                @error('name')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="floatingTextarea"
                                                    class="form-control @error('name')
                                                is-invalid
                                                @enderror()"
                                                    name="description" placeholder="" style="height: 150px">{{ old('description', $item->description) }}</textarea>
                                                <label for="floatingTextarea">Description</label>

                                                @error('description')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="conditionRange" class="form-label">Condition</label>
                                                <input type="range" id="condition" name="condition" class="form-range"
                                                    min="1" max="3"
                                                    {{ old('description', $item->description) }}>
                                                <div class="d-flex justify-content-between">
                                                    <span>Bad</span>
                                                    <span>Normal</span>
                                                    <span>Good</span>
                                                </div>
                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Modal Delete -->
                    @foreach ($items as $item)
                        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Item Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure? you want to delete the {{ $item->name }} data</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
