@extends('layouts.app')

@section('title', 'FAQs | Ezy')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #fff7e6 0%, #f8f9fa 100%); border-radius: 2rem;">
        <div class="card shadow-lg border-0 rounded-4" style="background: rgba(255,255,255,0.97);">
            <div class="card-body p-5">
                <h1 class="mb-4 text-center fw-bold"
                    style="color: orange; letter-spacing: 1px; text-shadow: 0 2px 8px #ffe0b2;">
                    <i class="fa fa-question-circle me-2"></i>Frequently Asked Questions
                </h1>
                <div class="accordion accordion-flush" id="faqAccordion">
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-user-graduate text-primary me-2"></i>Who is eligible for this program?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Any Diploma/Degree/Masters/Post grad, Posted posts, individuals,
                                Employees. Ezy is eligible for this program across all educational backgrounds and
                                professional levels.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa fa-clock text-success me-2"></i>What is the duration of the program?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The program duration varies depending on the specific course and internship type. Most
                                programs range from 3-6 months,
                                with flexible scheduling options available to accommodate different learning paces and
                                professional commitments.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fa fa-briefcase text-warning me-2"></i>Do I get the assured placement?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                While we cannot guarantee 100% placement, Ezy has strong partnerships with industry leaders
                                and maintains
                                a high placement rate. We provide comprehensive career support, interview preparation, and
                                connect you
                                with relevant opportunities based on your skills and interests.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="fa fa-percent text-info me-2"></i>What is the basic academic percentage required
                                to enroll for the course?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                There is no strict minimum academic percentage requirement for most of our courses.
                                We believe in inclusive education and focus more on your passion, commitment, and
                                willingness to learn.
                                However, some specialized programs may have specific academic prerequisites.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <i class="fa fa-tasks text-danger me-2"></i>What is the execution plan of the program?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our program follows a structured approach: Initial assessment → Course modules with hands-on
                                projects →
                                Real-world internship placement → Mentorship and guidance → Career support and placement
                                assistance.
                                Each phase is designed to build practical skills and industry readiness.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <i class="fa fa-laptop text-primary me-2"></i>Can we take this course online?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, absolutely! Ezy offers flexible learning options including fully online courses, hybrid
                                models,
                                and in-person sessions. Our online platform provides interactive learning experiences with
                                live sessions,
                                recorded lectures, and virtual collaboration tools to ensure effective remote learning.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                aria-controls="collapseSeven">
                                <i class="fa fa-user-tie text-success me-2"></i>I am already employed, will I be eligible
                                for the program?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, employed professionals are welcome to join our programs! We offer flexible scheduling
                                options,
                                evening and weekend classes, and part-time learning tracks specifically designed for working
                                professionals.
                                Many of our courses can help you upskill and advance in your current career.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false"
                                aria-controls="collapseEight">
                                <i class="fa fa-calendar-times text-danger me-2"></i>What if I miss the session due to an
                                emergency?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Don't worry! All our sessions are recorded and available for later viewing. You can access
                                missed sessions
                                through your student portal, and our support team can help you catch up with any missed
                                assignments or projects.
                                We also offer make-up sessions when possible.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false"
                                aria-controls="collapseNine">
                                <i class="fa fa-chalkboard-teacher text-info me-2"></i>Can we take this course offline?
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we offer offline classroom sessions at our training centers in major cities.
                                Our offline programs include hands-on workshops, face-to-face mentoring, and collaborative
                                group projects.
                                You can choose between fully offline, fully online, or hybrid learning modes based on your
                                preference.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false"
                                aria-controls="collapseTen">
                                <i class="fa fa-certificate text-success me-2"></i>Do you provide any certificate after the
                                program?
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, upon successful completion of the program, you will receive an industry-recognized
                                certificate from Ezy.
                                Additionally, you'll get completion certificates for individual modules and projects.
                                These certificates are valued by employers and can significantly boost your career
                                prospects.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                        <h2 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false"
                                aria-controls="collapseEleven">
                                <i class="fa fa-lightbulb text-warning me-2"></i>Have suggestions for us?
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We'd love to hear from you! Your feedback helps us improve our programs and services.
                                You can share your suggestions through our feedback form on the website, email us directly,
                                or reach out through our social media channels. We regularly review and implement valuable
                                suggestions from our community.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <div class="card border-0 shadow-sm d-inline-block px-4 py-3 rounded-3" style="background: #fffbe6;">
                        <p class="text-muted mb-0 fw-semibold fs-5">Still have questions? <a href="/contact"
                                style="color: orange; text-decoration: underline;">Contact our support team</a> for more
                            help!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
