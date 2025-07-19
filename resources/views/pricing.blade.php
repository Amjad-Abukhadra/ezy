@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%); border-radius: 1rem;">
        <h1 class="text-center mb-5 fw-bold display-5">Choose Your Plan</h1>
        <div class="row justify-content-center">
            @foreach ($plans as $index => $plan)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 pricing-card position-relative" style="transition: transform 0.2s, box-shadow 0.2s;">
        
                        <div class="card-body d-flex flex-column align-items-center">
                            <h2 class="card-title text-center fw-bold" style="font-size: 2rem;">{{ $plan->name }}</h2>
                            <h3 class="card-price text-center my-4" style="font-size: 2.5rem; color: #2563eb; font-weight: 700;">
                                ${{ $plan->price }}
                            </h3>
                            <p class="text-center mb-4" style="font-size: 1.1rem;">
                                <span class="text-success me-2"><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z'/><path d='M10.97 5.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L5.324 10.384a.75.75 0 1 1 1.06-1.06l1.094 1.093 3.492-4.438z'/></svg></span>
                                Enroll up to {{ $plan->course_limit }} courses
                            </p>
                            <form method="POST" action="{{ route('select.plan', $plan->id) }}" class="w-100">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg mt-auto w-100 fw-bold shadow-sm" style="letter-spacing: 1px;">Choose Plan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .pricing-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px rgba(37,99,235,0.12), 0 1.5px 6px rgba(0,0,0,0.04);
        }
    </style>
@endsection
