@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    <i class="ti ti-plus"></i>Items
                </div>
                <div class="card-body">
                    <div class="container">
                        <h1>Manage Categories</h1>
                        <div class="d-flex justify-content-between mb-3">
                            <form action="{{ route('category.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Search category..." class="form-control">
                            </form>
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $category->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
