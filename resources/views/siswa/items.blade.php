@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    List of Items
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center align-items-stretch">
                        @forelse ($items as $item)
                            <div class="card m-1" style="width: 15rem;">
                                <img src="images/products/s5.jpg" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <button type="button" class="btn btn-primary mt-auto me-auto" data-bs-toggle="modal"
                                        data-bs-target="#borrow{{ $item->id }}">Borrow</button>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger">
                                No items found
                            </div>
                        @endforelse
                    </div>
                    <div class="p-3">
                        {{ $items->links() }}
                    </div>
                    <!-- Modal Edit -->
                    @foreach ($items as $item)
                        <div class="modal fade" id="borrow{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Borrow Item</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-floating mb-3">
                                                <input type="text"
                                                    class="form-control @error('name')
                                                is-invalid
                                                @enderror()"
                                                    name="name" placeholder="" value="{{ old('name', $item->name) }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
