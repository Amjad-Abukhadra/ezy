@extends('layouts.app')

@section('content')
    <!-- FAQ Header Section -->
    <div class="faq-header">
        <div class="decorative-circle"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center py-5">
                    <h1 class="display-4 text-white font-weight-bold mb-3">Frequently Asked Questions</h1>
                    <p class="text-white lead">Find answers to common questions about our services</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Content Section -->
    <div class="faq-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Search Box -->
                    <div class="faq-search">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <input type="text" class="search-input" id="faqSearch"
                                    placeholder="Search for questions...">
                            </div>
                            <div class="col-md-4 text-md-right mt-3 mt-md-0">
                                <small class="text-muted">Can't find what you're looking for? <a
                                        href="{{ route('contact') }}" class="text-primary">Contact us</a>
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Items -->
                    <div class="faq-list">
                        <div class="faq-item" data-question="what is the duration of the program">
                            <button class="faq-question">
                                <span>What is the duration of the program?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>Our programs typically run for 12-16 weeks, depending on the specific course and learning
                                    track you choose. This duration allows for comprehensive coverage of all topics while
                                    maintaining a manageable pace for working professionals.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="can i get live access throughout">
                            <button class="faq-question">
                                <span>Can I get live access throughout?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>Yes, you'll have 24/7 access to our learning platform throughout the entire program
                                    duration and for 6 months after completion. This includes access to recorded sessions,
                                    resources, and community forums.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="what is the basis regarding administrative">
                            <button class="faq-question">
                                <span>What is the basis regarding administrative support related to program
                                    day-to-day?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>We provide comprehensive administrative support including dedicated program coordinators,
                                    technical support team, and academic advisors. You'll receive assistance with
                                    scheduling, technical issues, and academic guidance throughout your journey.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="what is the fee structure program">
                            <button class="faq-question">
                                <span>What is the fee structure program?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>Our fee structure varies by program type. We offer flexible payment options including
                                    full payment discounts, installment plans, and corporate billing. Contact our admissions
                                    team for detailed pricing information tailored to your selected program.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="can foreign graduates also eligible">
                            <button class="faq-question">
                                <span>Can foreign graduates also be eligible for the program?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>Absolutely! We welcome international students and graduates from all countries. Our
                                    programs are designed to accommodate different time zones, and we provide additional
                                    support for visa documentation if required for in-person components.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="what if covid the classes be possible">
                            <button class="faq-question">
                                <span>What if COVID-19 affects classes? Will they still be possible?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>All our programs are designed with flexibility in mind. We offer both online and hybrid
                                    learning options, ensuring continuity regardless of external circumstances. Our robust
                                    online platform ensures you won't miss any learning opportunities.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="can you provide details about program">
                            <button class="faq-question">
                                <span>Can you provide details about the program curriculum?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>Our curriculum is designed by industry experts and updated regularly to reflect current
                                    market demands. It includes theoretical foundations, practical projects, case studies,
                                    and hands-on experience with industry-standard tools and technologies.</p>
                            </div>
                        </div>

                        <div class="faq-item" data-question="any suggestions for us">
                            <button class="faq-question">
                                <span>Any suggestions for us to improve?</span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer">
                                <p>We value your feedback! You can share suggestions through our feedback portal, during
                                    regular check-ins with your program coordinator, or by contacting our continuous
                                    improvement team directly. Your input helps us enhance the learning experience for all
                                    students.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="{{ asset('assets/css/faq.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/faq.js') }}"></script>
@endpush
