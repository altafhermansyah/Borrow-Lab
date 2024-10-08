@extends('layouts.app')

@section('main')
    <div class="row col-lg-12 align-items-strech">
        <div class="card w-100">
            <div class="card-header">
                Dashboard
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Welcome, {{ Auth::user()->name }}</h5>
                <p class="card-text text-center">You are logged in as a {{ Auth::user()->role }}.
                </p>
                <p class="card-text text-center mx-auto col-md-10">Welcome to BorrowLab the
                    Computer
                    Lab
                    Equipment
                    Lending System!
                    We're glad to have you here. Feel free to explore our collection of equipment
                    and
                    make your reservations easily. If you need any assistance, don't hesitate to
                    reach
                    out to us. Happy browsing!</p>
                <div class="say mt-1">
                    @if (Auth::user()->role == 'staff')
                        <p class="card-text text-center">You have access to manage the
                            students and the items listed below. Make sure to handle the data
                            responsibly.
                        </p>
                    @else
                        <p class="card-text text-center">You can enjoy a variety of features
                            available
                            below. Take your time to explore and utilize them for your academic
                            needs.
                        </p>
                    @endif
                </div>
                <div class="menu mt-5">
                    @if (Auth::user()->role == 'staff')
                        <div class="d-flex flex-wrap align-items-center justify-content-center">
                            <div class="row text-center w-100">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <a href="/items"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-success d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-devices-2 mb-1" style="font-size: 1.8rem"></i>
                                        <span>ITEMS</span>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <a href="student"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-secondary d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-user mb-1" style="font-size: 1.8rem"></i>
                                        <span>STUDENTS</span>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <a href="category"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-danger d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-category-2 mb-1" style="font-size: 1.8rem"></i>
                                        <span>CATEGORY</span>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <a href="loans"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-warning d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-file-description mb-1" style="font-size: 1.8rem"></i>
                                        <span>LOANS</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex flex-wrap align-items-center justify-content-center">
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <a href="borrow"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-danger d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-arrow-bar-down mb-1" style="font-size: 1.8rem"></i>
                                        <span>BORROW</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <a href="return"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-warning d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-arrow-bar-up mb-1" style="font-size: 1.8rem"></i>
                                        <span>RETURN</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <a href="studentHistory"
                                        class="btn btn-lg square-btn m-1 fw-bolder btn-secondary d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-history mb-1" style="font-size: 1.8rem"></i>
                                        <span>HISTORY</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
