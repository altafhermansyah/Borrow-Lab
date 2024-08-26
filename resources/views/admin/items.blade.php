@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header">
                    <i class="ti ti-plus"></i>Items
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
                </div>
            </div>
        </div>
    </div>
@endsection
