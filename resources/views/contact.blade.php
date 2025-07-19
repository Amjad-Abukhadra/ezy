@extends('layouts.app')

@section('title', 'Contact Us | Ezy')

@section('content')
    <div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg border-0 rounded-4" style="background: rgba(255,255,255,0.98);">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center fw-bold" style="color: #ff9800; letter-spacing: 1px;">
                        <i class="fa fa-envelope-open-text me-2"></i>Contact Us
                    </h2>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your message has been sent successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div id="responseMessage"></div>
                    <form id="contactForm">
                        @csrf
                        <div class="row g-4">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold text-primary">
                                    <i class="fa fa-user me-1"></i>Your name<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg bg-light border-2 rounded-pill"
                                    id="name" name="name" placeholder="Julia Williams" required>
                            </div>
                            <!-- Email Field -->
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold text-primary">
                                    <i class="fa fa-envelope me-1"></i>Contact email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control form-control-lg bg-light border-2 rounded-pill"
                                    id="email" name="email" placeholder="you@example.com" required>
                            </div>
                            <!-- Phone Field -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold text-primary">
                                    <i class="fa fa-phone me-1"></i>Phone Number<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg bg-light border-2 rounded-pill"
                                    id="phone" name="phone" placeholder="Your phone number" required>
                            </div>
                            <!-- Issue Type Field -->
                            <div class="col-md-6">
                                <label for="issue_type" class="form-label fw-semibold text-primary">
                                    <i class="fa fa-question-circle me-1"></i>Issue Related to <span
                                        class="text-danger">*</span>
                                </label>
                                <select class="form-select ... " id="issue" name="issue" required>
                                    <option value="Course Structure" selected>Course Structure</option>
                                    <option value="Payment Failure">Payment Failure</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <!-- Message Field -->
                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold text-primary">
                                    <i class="fa fa-comment-dots me-1"></i>Your message<span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-lg bg-light border-2 rounded-4" id="message" name="message" rows="5"
                                    placeholder="Type your message..." required></textarea>
                            </div>
                            <!-- Terms and Privacy -->
                            <div class="col-12">
                                <p class="text-muted small mb-4">
                                    By submitting this form you agree to our terms and conditions and our Privacy
                                    Policy which explains how we may collect, use and disclose your personal
                                    information including to third parties.
                                </p>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-lg px-5 rounded-pill fw-bold text-white"
                                    style="background: linear-gradient(90deg, #ff9800 0%, #ffb74d 100%); box-shadow: 0 2px 8px #ffe0b2;">
                                    <i class="fa fa-paper-plane me-2"></i>Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const responseMessage = document.getElementById('responseMessage');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(form);
                responseMessage.innerHTML = ''; // Clear previous messages

                fetch("{{ route('contact.submit') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.json();
                    })
                    .then(data => {
                        // Show success message inside the div
                        responseMessage.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Message sent successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                        form.reset(); // Reset form after successful submission
                    })
                    .catch(async (error) => {
                        let errMsg = "Something went wrong.";
                        if (error.json) {
                            const json = await error.json();
                            errMsg = Object.values(json.errors || {}).flat().join("<br>");
                        }
                        // Show error message inside the div
                        responseMessage.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${errMsg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                    });
            });
        });
    </script>


@endsection
