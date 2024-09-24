@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    Students
                </div>
                <div class="card-body">
                    <h5 class="card-title">Manage Student</h5>
                    <hr>
                    <div class="mt-1 mx-auto col-md-10">
                        <table class="table table-responsive table-hover" id="studentTable">
                            <input type="text" id="search" class="form-control mb-3"
                                placeholder="Search by nisn or name">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="students-table">
                                @php
                                    $no = ($students->currentPage() - 1) * $students->perPage() + 1;
                                @endphp
                                @foreach ($students as $s)
                                    <tr>
                                        <th scope="row" class="col-md-1">{{ $no++ }}</th>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ $s->nisn }}</td>
                                        <td>{{ $s->role }}</td>
                                        <td class="col-md-1">
                                            <a href="" class="btn btn-warning m-1" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $s->id }}"><i class="ti ti-edit"></i></a>
                                            <a href="" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $s->id }}"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
        {{-- Modal Update --}}
        @foreach ($students as $s)
            <div class="modal fade" id="edit{{ $s->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Student Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('student.update', $s->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror()"
                                        name="nisn" placeholder="Enter NISN" value="{{ old('nisn', $s->nisn) }}">

                                    @error('nama_barang')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror()"
                                        name="name" placeholder="Enter Name" value="{{ old('name', $s->name) }}">

                                    @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror()"
                                        name="password" placeholder="Update New Password">

                                    @error('password')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Modal Delete --}}
        @foreach ($students as $s)
            <div class="modal fade" id="delete{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Barang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin akan menghapus data {{ $s->name }}</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('student.destroy', $s->id) }}" method="POST">
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('student.index') }}",
                type: "GET",
                data: {
                    'search': query
                },
                success: function(data) {
                    var tableContent = '';
                    var no = 1;
                    $.each(data.students, function(key, student) {
                        tableContent += '<tr>';
                        tableContent += '<td>' + no++ + '</td>';
                        tableContent += '<td>' + student.name + '</td>';
                        tableContent += '<td>' + student.nisn + '</td>';
                        tableContent += '<td>' + student.role + '</td>';

                        tableContent += '<td>';
                        tableContent +=
                            '<a href="#" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#edit' +
                            student.id + '"><i class="ti ti-edit"></i></a>';
                        tableContent +=
                            '<a href="#" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#delete' +
                            student.id + '"><i class="ti ti-trash"></i></a>';
                        tableContent += '</td>';
                        tableContent += '</tr>';
                    });
                    $('#students-table').html(tableContent);
                }
            });
        });
    });
</script>
