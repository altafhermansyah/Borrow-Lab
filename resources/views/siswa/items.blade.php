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
                                <img src="{{ asset('/storage/images/' . $item->image) }}" class="card-img-top w-100 h-100"
                                    alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <p class="card-text">Condition: {{ $item->condition }}</p>
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
                    <!-- Modal Borrow -->
                    @foreach ($items as $item)
                        <div class="modal fade" id="borrow{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Borrowing Item</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                                        <div class="border text-center rounded shadow w-50">
                                            <img src="{{ asset('/storage/images/' . $item->image) }}" class="rounded"
                                                style="width: 150px">
                                            <h5 class="text-center">{{ $item->name }}</h5>
                                            <p class="text-center">Condition: {{ $item->condition }}</p>
                                            <p class="text-center">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-center">Are you sure you want to borrow this item?</p>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('borrow.store') }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name="item_id"
                                                value="{{ old('id', $item->id) }}" hidden>
                                            <input type="text" class="form-control" name="user_id"
                                                value="{{ Auth::user()->id }}" hidden>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
