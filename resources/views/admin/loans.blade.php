@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    Loans
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('loans.create') }}" method="GET" class="d-flex">
                            <div class="mb-3 me-2">
                                <label for="start_date" class="form-label">Loan Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control me-2"
                                    placeholder="Start Date">
                            </div>
                            <div class="mb-3 me-2">
                                <label for="end_date" class="form-label">Loan End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control me-2"
                                    placeholder="End Date">
                            </div>
                            <button type="submit" class="btn btn-dark mb-3 ms-auto">
                                <i class="ti ti-printer me-2"></i>Print to PDF
                            </button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="text" id="search" class="form-control mb-3 w-25" placeholder="Search">
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Borrower</th>
                                <th scope="col">Status</th>
                                <th scope="col">Loan Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="loans-table">
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
                                    <td>
                                        @if ($loan->status == 'pending')
                                            <button type="button" class="btn btn-md btn-primary m-2" data-bs-toggle="modal"
                                                data-bs-target="#acc{{ $loan->id }}">ACC</button>
                                        @elseif ($loan->status == 'returnPending')
                                            <button type="button" class="btn btn-md btn-primary m-2" data-bs-toggle="modal"
                                                data-bs-target="#acc{{ $loan->id }}">ACC</button>
                                        @else
                                            <button type="button" class="btn btn-md btn-primary m-2" data-bs-toggle="modal"
                                                data-bs-target="#acc{{ $loan->id }}" disabled>ACC</button>
                                        @endif
                                        @if ($loan->status == 'pending')
                                            <button type="button" class="btn btn-md btn-outline-dark m-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#empty{{ $loan->id }}">Empty</button>
                                        @else
                                            <button type="button" class="btn btn-md btn-outline-dark m-2"
                                                data-bs-toggle="modal" data-bs-target="#empty{{ $loan->id }}"
                                                disabled>Empty</button>
                                        @endif
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
                        @if ($loan->status == 'pending')
                            <div class="modal fade" id="acc{{ $loan->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Acc Borrower</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>allow this item to be borrowed by {{ $loan->users->name }}?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="form-control" name="status" value="borrowed"
                                                    hidden>
                                                <input type="text" class="form-control" name="loan_date"
                                                    value="{{ now()->toDateString() }}" hidden>
                                                <button type="submit" class="btn btn-success">ACC</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="modal fade" id="acc{{ $loan->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Acc Return</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>allow this item to be borrowed by {{ $loan->users->name }}?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="form-control" name="status"
                                                    value="returned" hidden>
                                                <input type="text" class="form-control" name="loan_date"
                                                    value="{{ old('loan_date', $loan->loan_date) }}" hidden>
                                                <input type="text" class="form-control" name="return_date"
                                                    value="{{ now()->toDateString() }}" hidden>
                                                <button type="submit" class="btn btn-success">ACC</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="modal fade" id="empty{{ $loan->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Empty Item</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Is this item really empty??</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" name="status" value="empty"
                                                hidden>
                                            <button type="submit" class="btn btn-success">YES</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('loans.index') }}",
                type: "GET",
                data: {
                    'search': query
                },
                success: function(data) {
                    var tableContent = '';
                    var no = 1;
                    $.each(data.loans, function(key, loan) {
                        tableContent += '<tr>';
                        tableContent += '<th scope="row">' + no++ + '</th>';
                        tableContent += '<td><img src="/storage/images/' + loan
                            .items.image +
                            '" class="rounded" style="width: 150px"></td>';
                        tableContent += '<td>' + loan.users.name + '</td>';
                        tableContent += '<td>' + loan.status.replace(
                            'returnPending', 'Return Pending') + '</td>';
                        tableContent += '<td>' + loan.loan_date + '</td>';
                        tableContent += '<td>' + loan.return_date + '</td>';
                        tableContent += '<td>';
                        if (loan.status === 'pending' || loan.status ===
                            'returnPending') {
                            tableContent +=
                                '<button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#acc' +
                                loan.id + '">ACC</button>';
                        } else {
                            tableContent +=
                                '<button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#acc' +
                                loan.id + '" disabled>ACC</button>';
                        }
                        tableContent += '</td>';
                        tableContent += '</tr>';
                    });
                    $('#loans-table').html(tableContent);
                }
            });
        });
    });
</script>
