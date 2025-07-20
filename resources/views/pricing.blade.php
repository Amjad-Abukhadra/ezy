@extends('layouts.app')

@section('content')
    <!-- Pricing Section -->
    <div class="pricing-section">
        @if (session('success'))
            <div class="alert alert-success text-center my-3">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center my-3">{{ session('error') }}</div>
        @endif
        <!-- Decorative elements -->
        <div class="decorative-dots dots-left"></div>
        <div class="decorative-dots dots-right"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center py-5">
                    <h1 class="display-4 font-weight-bold mb-2 text-white">
                        Our <span style="color: peru">Pricing</span>
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center align-items-stretch pb-5">

                @foreach ($plans as $plan)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="pricing-card h-100">
                            <div class="pricing-header">
                                <h3 class="plan-name">{{ $plan->name }}</h3>
                                <div class="plan-price">₹{{ number_format($plan->price) }}</div>
                                <p class="plan-period">per month</p>
                            </div>
                            <div class="pricing-body">
                                <ul class="feature-list">
                                    <li class="feature-item">
                                        @if ($plan->course_limit == 0)
                                            Unlimited Users
                                        @else
                                            Up to {{ $plan->course_limit }} Users
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <form action="{{ route('user_plans.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <button type="submit" class="btn btn-pricing">Get Started</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('assets/css/pricing.css') }}" rel="stylesheet">
@endpush
