@extends('layouts.app')

@section('main')
    <div class="row">
        <!-- Category Table -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title fs-6 fw-bolder">Manage Categories</h5>
                        <hr>
                        <div class="d-flex justify-content-end my-4">
                            <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal"
                                data-bs-target="#addCategoryModal">
                                Add Category
                            </button>


                            <!-- Add Category Modal -->
                            <div class="modal fade" id="addCategoryModal" tabindex="-1"
                                aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title fs-5" id="addCategoryModalLabel">Add New Category</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('category.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="category-name" class="col-form-label">Category Name:</label>
                                                    <input type="text" class="form-control" id="category-name"
                                                        name="name" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-dark btn-md"
                                                data-bs-toggle="modal"
                                                data-bs-target="#EditModalCategories{{ $category->id }}">
                                                View All Item
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Item Category Table -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-header">
                    Item Category
                </div>
                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title fs-6 fw-bolder">Manage Items Category</h5>
                        <hr>
                        <div class="d-flex justify-content-end my-4">
                            <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal"
                                data-bs-target="#addItemModal">
                                Add Item Category
                            </button>
                        </div>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Item Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemCat as $key => $c)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $c->categories->name }}</td>
                                        <td>{{ $c->items->name }}</td>
                                        {{-- <td>{{ $c->item->name }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $itemCat->links() }}
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Edit Categoried -->
    @foreach ($categories as $category)
        <div class="modal fade" id="EditModalCategories{{ $category->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">
                            All Items in The {{ $category->name }} Category</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="item-name" class="col-form-label">Category Name:</label>
                                <input type="text" class="form-control" id="item-name" name="name" required
                                    value="{{ old('name', $category->name) }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="addItemModalLabel">Add Item Category</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('itemCat.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-evenly">
                            <div class="mb-3 me-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category_id"
                                    class="form-select form-select-md @error('category_id') is-invalid @enderror()"
                                    required>
                                    <option selected value="">Choose Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @empty
                                        category not found
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3 me-3">
                                <label for="item-name" class="form-label">Item Name</label>
                                <select name="item_id"
                                    class="form-select form-select-md @error('item_id') is-invalid @enderror()" required>
                                    <option selected value="">Choose Item</option>
                                    @forelse ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @error('item_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @empty
                                        items not found
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Item Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
