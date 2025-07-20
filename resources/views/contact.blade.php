@extends('layouts.app')

@section('title', 'Contact Us | Ezy')

@section('content')
    <!-- Hero Section -->
    <div class="position-relative hero-section">
        <div class="container py-5">
            <div class="row justify-content-center text-center text-white">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-3">Contact Our Team</h1>
                    <p class="lead opacity-90">Get in touch with us for any questions or support</p>
                    <form id="contactForm">
                        @csrf

                </div>
            </div>
        </div>
        <!-- Decorative dots -->
        <div class="position-absolute dot-pattern">
            <div class="d-flex flex-column gap-2">
                @for ($i = 0; $i < 4; $i++)
                    <div class="d-flex gap-2">
                        @for ($j = 0; $j < 3; $j++)
                            <div class="bg-white rounded-circle dot"></div>
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10">
                    <div class="card shadow-sm border-0 rounded-4 mb-5 card-shift">
                        <div class="card-body p-4 p-lg-5">

                            <div id="responseMessage"></div>


                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold text-dark mb-2">Your
                                        Name*</label>
                                    <input type="text"
                                        class="form-control form-control-lg border-2 rounded-3 input-style" id="name"
                                        name="name" placeholder="Julia Williams" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold text-dark mb-2">Contact
                                        Email*</label>
                                    <input type="email"
                                        class="form-control form-control-lg border-2 rounded-3 input-style" id="email"
                                        name="email" placeholder="you@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-semibold text-dark mb-2">Phone
                                        Number*</label>
                                    <input type="text"
                                        class="form-control form-control-lg border-2 rounded-3 input-style" id="phone"
                                        name="phone" placeholder="Your phone number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="issue" class="form-label fw-semibold text-dark mb-2">Issue Related
                                        to*</label>
                                    <select class="form-select form-select-lg border-2 rounded-3 input-style" id="issue"
                                        name="issue" required>
                                        <option value="Course Structure" selected>Course Structure</option>
                                        <option value="Payment Failure">Payment Failure</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label fw-semibold text-dark mb-2">Your
                                        Message*</label>
                                    <textarea class="form-control form-control-lg border-2 rounded-3 input-style textarea-style" id="message"
                                        name="message" rows="4" placeholder="Type your message..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <p class="text-muted small mb-4 lh-base">By submitting this form you agree to our
                                        terms and conditions and our Privacy Policy which explains how we may collect,
                                        use and disclose your personal information including to third parties.</p>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-lg px-5 py-3 rounded-3 fw-bold text-white w-100 submit-btn">Send
                                        Message</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Info Section -->
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="p-4">
                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 contact-icon bg-blue">
                            <i class="fa fa-envelope text-white icon-size"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Email us</h5>
                        <p class="text-muted mb-0">contact@ezy.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="p-4">
                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 contact-icon bg-orange">
                            <i class="fa fa-phone text-white icon-size"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Call Us</h5>
                        <p class="text-muted mb-0">+1 (555) 123-4567</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script>
        const contactSubmitUrl = "{{ route('contact.submit') }}";
    </script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
@endpush
