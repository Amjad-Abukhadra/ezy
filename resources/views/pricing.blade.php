@extends('layouts.app')

@section('content')
    <div class="pricing-section">
        @if (session('success'))
            <div class="alert alert-primary text-center my-3">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-primary text-center my-3">{{ session('error') }}</div>
        @endif

        <!-- Decorative elements -->
        <div class="decoration decoration-left"></div>
        <div class="decoration decoration-right"></div>

        <div class="container">
            <h2 class="pricing-title">Our <span>Pricing</span></h2>

            <div class="pricing-cards">
                @foreach ($plans as $plan)
                    <div class="pricing-card {{ $loop->index === 1 ? 'featured' : '' }}">
                        <div class="card-header">{{ $plan->name }}</div>
                        <div class="price">₹{{ number_format($plan->price) }} <span style="font-size: 16px;">+ Tax</span>
                        </div>
                        <div class="price-subtitle">(Exclusive of GST & Tax)</div>

                        <ul class="features">
                            <li>
                                @if ($plan->course_limit == 0)
                                    Unlimited Users
                                @else
                                    Up to {{ $plan->course_limit }} Users
                                @endif
                            </li>
                        </ul>

                        <form action="{{ route('user_plans.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <button type="submit" class="choose-btn">Choose Plan</button>
                        </form>

                        <div style="margin-top: 15px; font-size: 12px; opacity: 0.7;">Afterpay</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('assets/css/pricing.css') }}" rel="stylesheet">
@endpush
