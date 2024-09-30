@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    Borrowed Items
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = ($loans->currentPage() - 1) * $loans->perPage() + 1;
                            @endphp
                            @forelse ($loans as $loan)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td><img src="{{ asset('/storage/images/' . $loan->items->image) }}" class="rounded"
                                            style="width: 150px"></td>
                                    <td>{{ $loan->items->name }}</td>
                                    <td>{{ $loan->items->description }}</td>
                                    <td>{{ $loan->items->condition }}</td>
                                    <td>
                                        <form>
                                            @if ($loan->status == 'borrowed')
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#return{{ $loan->id }}">RETURN</button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#return{{ $loan->id }}" disabled>RETURN</button>
                                            @endif
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
                    {{ $loans->links() }}
                    <!-- Modal Borrow -->
                    @foreach ($loans as $loan)
                        <div class="modal fade" id="return{{ $loan->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Returning Item</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                                        <div class="border text-center rounded shadow w-50">
                                            <img src="{{ asset('/storage/images/' . $loan->items->image) }}" class="rounded"
                                                style="width: 150px">
                                            <h5 class="text-center">{{ $loan->items->name }}</h5>
                                            <p class="text-center">Condition: {{ $loan->items->condition }}</p>
                                            <p class="text-center">{{ $loan->items->description }}</p>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-center">Are you sure you want to return this item?</p>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('borrow.update', $loan->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="text" class="form-control" name="status" value="returnPending"
                                                hidden>
                                            <button type="submit" class="btn btn-primary">Return</button>
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
