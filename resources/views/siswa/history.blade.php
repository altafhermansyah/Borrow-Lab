@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    History
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Borrower</th>
                                <th scope="col">Status</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Return Date</th>
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
                                    <td>{{ $loan->users->name }}</td>
                                    <td>{{ ucwords(str_replace('returnPending', 'Return Pending', $loan->status)) }}</td>
                                    <td>{{ $loan->loan_date }}</td>
                                    <td>{{ $loan->return_date }}</td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No items found
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $loans->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
