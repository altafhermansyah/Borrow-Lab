@extends('layouts.landingPage')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid bg-light about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <h4 class="text-primary">About Our Borrow Lab</h4>
                        <h1 class="display-4 mb-4">Best Lab Equipment Lending Service Provider</h1>
                        <p>comprehensive equipment lending service offered by our school’s computer lab. This service
                            allows students and faculty members to borrow a variety of computer-related equipment such
                            as laptops, tablets, projectors, and other essential devices. Borrow Lab is designed to
                            support academic and extracurricular activities by providing easy access to high-quality
                            technology
                        </p>
                        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Tool Borrowing</p>
                        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Tool Return</p>
                        <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Tool List</p>
                        <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Borrowing History</p>
                        <!-- <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Information</a> -->
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-white rounded p-5 h-100">
                        <div class="row g-4 justify-content-center">
                            <div class="col-12">
                                <div class="rounded bg-light">
                                    <img src="img/about img.png" class="img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">50</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Many tools can be availables</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">30</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Ready To Use Computers</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid feature bg-light pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Features</h4>
                <h1 class="display-4 mb-4">Providing The Best Lending Service</h1>
                <p class="mb-0">We are committed to providing the best loan services designed to meet the diverse
                    needs of students.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="far fa-handshake fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Tool Borrowing</h4>
                        <p class="mb-4">On our website you can borrow the lab equipment you want to use...
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-hand-holding-heart fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Tool Return</h4>
                        <p class="mb-4">After borrowing tools on our website, you can return the items you have
                            borrowed...
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-th-list fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Tool List</h4>
                        <p class="mb-4">You can see a list of items that can be borrowed...
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-history fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Borrowing History</h4>
                        <p class="mb-4">We provide a borrowing history feature, to view the history of tools that
                            have been borrowed...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- FAQs Start -->
    <div class="container-fluid faq-section bg-light pb-5">
        <div class="container pb-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="h-100">
                        <div class="mb-5">
                            <h4 class="text-primary">Some Important FAQ's</h4>
                            <h1 class="display-4 mb-0">Common Frequently Asked Questions</h1>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Q: What is a BorrowLab?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show active"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body rounded">
                                        A: The website for borrowing tools in school laboratories is designed to make it
                                        easier for students and staff to manage the process of borrowing and returning
                                        lab equipment. The platform allows users to view a list of available tools,
                                        check availability, and make reservations online.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Q: What is the purpose of creating this BorrowLab website?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        A: Students can submit a loan request online, which will make it easier for
                                        teachers or lab staff to manage and track the status of the loan of the tool. In
                                        addition, the system helps in maintaining an inventory of laboratory equipment,
                                        ensuring that each tool is properly recorded, and minimizing equipment loss or
                                        damage.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Q: Does the web make it easier for students to borrow tools in the lab?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        A: Yes, the tool lending web in the school lab makes the process of borrowing
                                        tools easier for students. With the online system, students can submit loan
                                        requests anytime and from anywhere without having to come directly to the lab.
                                        In addition, they can see the availability of the tool in real-time, which helps
                                        them better plan the use of the tool
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <img src="img/carousel-2.png" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->
@endsection
