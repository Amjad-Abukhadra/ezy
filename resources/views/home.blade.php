@extends('layouts.app')

@section('title', 'Home | Ezy')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Text Content -->
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold mb-3" style="color: #0148A9;">
                        Skill your way<br>up to success with us
                    </h1>
                    <p class="lead mb-4">Get the skills you need for<br>the future of work.</p>

                    <div class="input-group mb-3" style="max-width: 500px;">
                        <input type="text" class="form-control" placeholder="Search the course you want"
                            aria-label="Course search" />
                        <button class="btn text-white fw-semibold" type="button" style="background-color: #0148A9;">
                            Search
                        </button>
                    </div>
                    <!-- Course Topics as Buttons -->
                    <div class="mt-4 d-flex flex-wrap gap-2">
                        <button class="btn btn-orange-outline fw-semibold px-4 py-2 rounded-0">Cloud Computing</button>
                        <button class="btn btn-orange-outline fw-semibold px-4 py-2 rounded-0">Cyber Security</button>
                        <button class="btn btn-orange-outline fw-semibold px-4 py-2 rounded-0">DevOps</button>
                        <button class="btn btn-orange-outline fw-semibold px-4 py-2 rounded-0">Data Science</button>
                        <button class="btn btn-orange-outline fw-semibold px-4 py-2 rounded-0">Software Testing</button>
                    </div>

                </div>

                <!-- Right Image Composition -->
                <div class="col-md-6">
                    <div class="position-relative" style="width: 100%; height: 600px;">

                        <!-- Ellipse 1 -->
                        <img src="{{ asset('photos/Ellipse 1.png') }}" alt="Ellipse 1"
                            style="position: absolute; width: 300px; height: 300px; left: 100px; top: 100px; z-index: 1;">

                        <!-- Ellipse 3 -->
                        <img src="{{ asset('photos/Ellipse 3.png') }}" alt="Ellipse 3"
                            style="position: absolute; width: 200px; height: 200px; left: 180px; top: 20px; transform: rotate(177.92deg); z-index: 2;">

                        <!-- Woman Image -->
                        <img src="{{ asset('photos/women.png') }}" alt="Woman"
                            style="position: absolute; width: 320px; height: auto; left: 100px; top: 80px; z-index: 3;">

                        <!-- Extra Group Image -->
                        <img src="{{ asset('photos/group 2005.png') }}" alt="Group 2005"
                            style="position: absolute; width: 180px; height: auto; left: 20px; top: 250px; z-index: 4;">

                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Side Text + Image -->
                <div class="col-md-6">
                    <h2 class="fw-bold">
                        <span class="text-blue">World’s <br> First AI Based</span><br>
                        <span class="text-orange">Online Learning <br> Platform</span>
                    </h2>


                </div>
                <!-- Right Side Image + Dots -->
                <div class="col-md-6 text-center">
                    <div id="image-slider" class="position-relative mb-3">
                        <img id="slider-image" src="{{ asset('photos/group 2225.png') }}" alt="Slider" class="img-fluid"
                            style="height: 350px;" />
                    </div>

                    <!-- Dots -->
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <div class="slider-dot active" data-index="0"></div>
                        <div class="slider-dot" data-index="1"></div>
                        <div class="slider-dot" data-index="2"></div>
                        <div class="slider-dot" data-index="3"></div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Side -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <!-- Subheading -->
                    <h3 class="fw-semibold mb-2 text-orange mt-n2 ms-2">Who Can Join</h3>
                    <br>
                    <h2 class="fw-bold mb-4 text-blue">Skill Development Schemes For All</h2>


                    <!-- Numbered Icons in 2x2 grid -->
                    <div class="row g-4">
                        <div class="col-6 d-flex align-items-start gap-3">
                            <img src="photos/Groupicons.png" alt="01" style="width: 50px;">
                            <div>
                                <span class="fw-bold text-primary">01</span><br>
                                <small>Corporates</small>
                            </div>
                        </div>

                        <div class="col-6 d-flex align-items-start gap-3">
                            <img src="photos/Groupicons1.png" alt="02" style="width: 50px;">
                            <div>
                                <span class="fw-bold text-primary">02</span><br>
                                <small>Startups</small>
                            </div>
                        </div>

                        <div class="col-6 d-flex align-items-start gap-3">
                            <img src="photos/Groupicons2.png" alt="03" style="width: 50px;">
                            <div>
                                <span class="fw-bold text-primary">03</span><br>
                                <small>Individuals/Working Professionals</small>
                            </div>
                        </div>

                        <div class="col-6 d-flex align-items-start gap-3">
                            <img src="photos/Groupicons3.png" alt="04" style="width: 50px;">
                            <div>
                                <span class="fw-bold text-primary">04</span><br>
                                <small>Colleges/Universities</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Image -->
                <div class="col-md-6 text-center">
                    <img src="photos/table.png" alt="Right Image" class="img-fluid" style="max-height: 400px;">
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 position-relative">
        <div class="container-fluid position-relative px-5" style="max-width: 1400px;">

            <!-- Ellipse 3 image -->
            <img src="{{ asset('photos/ellipse 3.png') }}" alt="Ellipse 3" class="how-it-works-ellipse">

            <!-- Background Rectangle -->
            <img src="{{ asset('photos/rectangle 829.png') }}" alt="Background Rectangle"
                class="img-fluid rounded-4 mx-auto d-block how-it-works-bg">

            <!-- Rectangle 827 with text link -->
            <a href="#how-it-works-details" class="how-it-works-header-link rounded-3 overflow-hidden">
                <img src="{{ asset('photos/rectangle 827.png') }}" alt="How It Works">
                <span class="how-it-works-header-text">How It Works</span>
            </a>

            <!-- Group image -->
            <div class="how-it-works-group">
                <img src="{{ asset('photos/group 2224.png') }}" alt="Group 2224" class="img-fluid">
            </div>

        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">
                <span class="text-blue fw-bold">Popular</span>
                <span class="text-orange fw-bold ms-2">Courses</span>
            </h2>
            <div id="courses-container" class="row">
                <p>Loading courses...</p>
            </div>
        </div>
    </section>
    <section class="achievements-section position-relative py-5" style="background-color: #F7F7F7;">
        <div class="container position-relative" style="max-width: 1400px; z-index: 1;">

            <!-- Title -->
            <h2 class="text-center mb-5">
                <span class="text-blue fw-bold">Our</span>
                <span class="text-orange fw-bold ms-2">Achievements</span>
            </h2>

            <div class="d-flex flex-column flex-lg-row align-items-start justify-content-between">
                <!-- Left image -->
                <div class="achievements-image me-lg-4 mb-4 mb-lg-0 text-center text-lg-start">
                    <img src="{{ asset('photos/Group 2194.png') }}" alt="Team climbing achievement" class="img-fluid"
                        style="max-width: 450px;">
                </div>

                <!-- Right content -->
                <div class="achievements-cards">
                    <div class="row g-4 mb-4">
                        <!-- Cards -->
                        <div class="col-12 col-md-6">
                            <div class="achievement-card text-center">
                                <h3>100</h3>
                                <div class="icon">🎓</div>
                                <p>Students Trained</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="achievement-card text-center">
                                <h3>50</h3>
                                <div class="icon">📚</div>
                                <p>Courses Available</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom card -->
                    <div class="achievement-highlight text-center">
                        <h3>70%</h3>
                        <p>Students Secured Jobs in Level 1 Companies</p>
                    </div>
                </div>
            </div>

            <!-- Ornament -->
            <img src="{{ asset('photos/Ornament 11elements.png') }}" alt="" class="ornament-img"
                aria-hidden="true">
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <!-- Title -->
            <h1 class="text-center mb-5">
                <span class="text-blue">Meet Our Professional</span><br>
                <span class="text-orange">Mentors & Trainers</span>
            </h1>

            <div class="row">
                <!-- Trainer 1 -->
                <div class="col-md-6 mb-4 position-relative">
                    <!-- Ellipse Image -->
                    <img src="{{ asset('photos/Ellipse 3.png') }}" class="ellipse-left" alt="Ellipse">

                    <div class="card h-100 p-3 position-relative" style="z-index: 1;">
                        <div class="d-flex gap-3">
                            <!-- Image -->
                            <img src="{{ asset('photos/image.png') }}" alt="Sandeep" class="trainer-img">

                            <!-- Info -->
                            <div>
                                <h1 class="best-trainer-crown badge text-dark">
                                    🏆 BEST TRAINER
                                </h1>

                                <h3 class="card-title mb-1">Sandeep</h3>
                                <p class="card-subtitle mb-2 text-muted">.NET & Azure</p>

                                <div class="mb-2">
                                    <span class="text-warning">★★★★★</span>
                                    <span class="text-muted">72 Reviews</span>
                                </div>

                                <div>
                                    <span class="text-muted">39 Modules</span>
                                    <span class="text-muted mx-2">|</span>
                                    <span class="text-muted">375 Students</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description under image/info -->
                        <p class="card-text mt-3">
                            Sandeep is a Software Developer who exported in .NET & Azure for more than 24 years and
                            trained 100's of students to accomplish their goals & dreams.
                        </p>
                    </div>
                </div>

                <!-- Trainer 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 p-3">
                        <div class="d-flex gap-3">
                            <!-- Image -->
                            <img src="{{ asset('photos/image.png') }}" alt="Sudhansu" class="trainer-img">

                            <!-- Info -->
                            <div>
                                <h3 class="card-title mb-1">Sudhansu</h3>
                                <p class="card-subtitle mb-2 text-muted">Cloud & Cyber Security, Forensic</p>

                                <div class="mb-2">
                                    <span class="text-warning">★★★★★</span>
                                    <span class="text-muted">38 Reviews</span>
                                </div>

                                <div>
                                    <span class="text-muted">27 Modules</span>
                                    <span class="text-muted mx-2">|</span>
                                    <span class="text-muted">169 Students</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description under image/info -->
                        <p class="card-text mt-3">
                            Sudhansu is a Software Developer who exported in Cloud Security, Cyber Security, Data Center &
                            Forensic
                            for more than 22 years and trained 100's of students to accomplish their goals & dreams.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="certifications-section text-center py-5">
        <h2 class="section-title mb-4">
            <span class="text-blue">Our</span> <span class="text-orange">Certifications</span>
        </h2>
        <div class="certifications-images d-flex justify-content-center gap-4 flex-wrap">
            <img src="{{ asset('photos/cert1.png') }}" alt="Certification 1" class="cert-img" />
            <img src="{{ asset('photos/cert2.png') }}" alt="Certification 2" class="cert-img" />
            <img src="{{ asset('photos/cert3.png') }}" alt="Certification 3" class="cert-img" />
            <img src="{{ asset('photos/cert4.png') }}" alt="Certification 4" class="cert-img" />
        </div>
    </section>
    <section class="collaborations-section text-center py-5">
        <h2 class="section-title mb-4">
            <span class="text-blue">Our</span> <span class="text-orange">Collaborations</span>
        </h2>
        <img src="{{ asset('photos/Group 2195.png') }}" alt="Our Collaborations" class="collaboration-img mx-auto" />
    </section>


@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
