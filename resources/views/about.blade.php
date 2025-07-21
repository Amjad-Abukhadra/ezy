<!-- About Us Page Content for Laravel layouts.app -->
@extends('layouts.app')
@section('content')
    <style>
        .navbar.bg-white {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white !important;
        }
    </style>

    <!-- Hero Section -->
    <section class="bg-primary text-white py-5 position-relative"
        style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%) !important; border-bottom-left-radius: 100px; border-bottom-right-radius: 100px;">

        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">The Platform For The Next Billion Learners</h1>
                    <p class="lead mb-0">Empowering learners worldwide with innovative educational solutions</p>
                </div>
                <div class="col-lg-6 position-relative">

                    <!-- Orange Circle Decoration -->
                    <img src="{{ asset('photos/Ellipse 3.png') }}" alt="Decorative Circle" class="position-absolute"
                        style="top: 150px; right: 0; width: 150px; height: 150px; z-index: 0;">

                    <!-- Top two small images side-by-side -->
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80"
                                alt="Online Learning" class="img-fluid rounded-3 shadow position-relative"
                                style="height: 200px; width: 300px; top: 50px; object-fit: cover; z-index: 2;">
                        </div>
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                                alt="Classroom" class="img-fluid rounded-3 shadow position-relative"
                                style="height: 200px; width: 450px; object-fit: cover; z-index: 2;">
                        </div>
                    </div>

                    <!-- Big photo below, overlapping the blue background -->
                    <div class="position-relative" style="height: 200px; overflow: visible;">
                        <img src="{{ asset('photos/overflow.png') }}" alt="Big Classroom"
                            style="position: absolute; top: 70px; width: 400px; height: 300px; left:250px; object-fit: cover; z-index: 3; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Innovation Section with 4 Layers -->
    <section class="py-5 bg-light position-relative ">
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Image Side with 4 Layers -->
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="position-relative">
                        <!-- Layer 4: Orange Circle (behind everything) -->
                        <img src="{{ asset('photos/Ellipse 3.png') }}" alt="Orange Circle" class="position-absolute"
                            style="z-index: 0; left: 180px; top: 150px; width: 220px; height: 220px; opacity: 0.9; pointer-events: none;">
                        <!-- Layer 1: Main circular image -->
                        <div class="position-relative d-inline-block" style="z-index: 2;">
                            <div style="width: 300px; height: 300px; overflow: hidden;">
                                <img src="{{ asset('photos/ppl.png') }}" alt="People" class="rounded-circle w-100 h-100"
                                    style="object-fit: cover;">
                            </div>

                            <!-- Layer 2: Small floating image top right (">" shaped image) -->
                            <div class="position-absolute"
                                style="top: -50px; right: -200px; width: 120px; height: 90px; z-index: 3;">
                                <img src="{{ asset('photos/arrow.png') }}" alt="Arrow Decoration" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </div>

                            <!-- Layer 3: Small floating image bottom left ("++" shaped image) -->
                            <div class="position-absolute"
                                style="bottom: -100px; left: -30px; width: 100px; height: 80px; z-index: 3;">
                                <img src="{{ asset('photos/plus.png') }}" alt="Plus Decoration" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Content Side -->
                <div class="col-lg-6 order-1 order-lg-2 ps-lg-5">
                    <div class="mb-4">
                        <span class="fw-bold text-primary fs-3 px-2 py-1" style="background: none; border-radius: 0;">
                            OUR STORY
                        </span>
                    </div>

                    <h1 class="fw-bold mb-4 lh-sm" style="color: orange; font-size: 5rem; line-height: 1;">
                        Innovating new<br>
                        ways to train <br>
                        students
                    </h1>

                    <p class="text-dark mb-4" style="font-size: 1rem; line-height: 1.6;">
                        We see no limits to what we can achieve by harnessing our individual and collective strengths. We
                        are changing the world with our ideas, insights, and unique perspectives.<br><br>
                        Our innovation is led by data, curiosity and the occasional happy accident. We create an uplifting
                        environment where we learn from our failures and celebrate our success.
                    </p>
                </div>

    </section>



    <!-- Mission & Vision Section -->
    <section class="text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="text-center p-4">
                        <div class="mb-4">

                            <img src="{{ asset('photos/mission.png') }}" alt="Mission Icon"
                                style="width: 200px; height: 200px; object-fit: contain;">
                        </div>
                        <h1 class="h1 fw-bold mb-3">Our <span style="color: orange">Mission</span></h1>
                        <p class="mb-0">
                            To democratize quality education by providing accessible, engaging, and effective learning
                            solutions that empower individuals to achieve their full potential and transform their careers.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-center p-4">
                        <div class="mb-4">
                            <img src="{{ asset('photos/vision.png') }}" alt="Vision Icon"
                                style="width: 200px; height: 200px; object-fit: contain;">
                        </div>
                        <h3 class="h1 fw-bold mb-3">Our <span style="color: orange">Vision</span></h3>
                        <p class="mb-0">
                            To be the leading global platform that bridges the skills gap by connecting learners with
                            world-class training programs, creating a future where everyone has the opportunity to succeed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-4">Our <span class="text-warning">Team</span></h2>
            </div>

            <div class="row justify-content-center g-4 mb-5">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                    alt="Team Member" class="rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">John Smith</h5>
                            <p class="text-muted small mb-0">CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                    alt="Team Member" class="rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">Michael Chen</h5>
                            <p class="text-muted small mb-0">CTO</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                    alt="Team Member" class="rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">Emma Davis</h5>
                            <p class="text-muted small mb-0">Head of Marketing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Advisors Section -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-4">Our <span class="text-warning">Advisors</span></h2>
            </div>

            <div class="row justify-content-center g-4">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                    alt="Advisor" class="rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">Dr. Robert Wilson</h5>
                            <p class="text-muted small mb-0">Education Expert</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                    alt="Advisor" class="rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">Prof. Lisa Martinez</h5>
                            <p class="text-muted small mb-0">Technology Advisor</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                    alt="Advisor" class="rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">David Thompson</h5>
                            <p class="text-muted small mb-0">Business Strategy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
