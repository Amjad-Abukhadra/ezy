<style>
    .nav-link:hover {
        color: #fd7e14 !important;
    }

    .nav-link.active {
        color: #fd7e14 !important;
        font-weight: 600;
        /* optional to highlight */
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm w-100">
    <div class="container d-flex justify-content-center">
        <div class="d-flex align-items-center flex-wrap gap-5">
            <!-- Always show big logo -->
            <a class="navbar-brand d-flex align-items-center gap-2 mb-0" href="#">
                <img src="{{ asset('photos/logo.png') }}" alt="Logo" height="60">
            </a>

            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/course-selector') }}" class="nav-link {{ request()->is('course-selector') ? 'active' : '' }}">Course
                Selector</a>
            <a href="{{ url('/courses') }}" class="nav-link {{ request()->is('courses') ? 'active' : '' }}">Courses</a>
            <a href="#" class="nav-link {{ request()->is('faq') ? 'active' : '' }}">Pricing</a>
            <a href="#" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">FAQ</a>
            <a href="#" class="nav-link {{ request()->is('about') ? 'active' : '' }}">Contact Us</a>


            @auth
                <!-- User icon -->
                <a href="#" class="d-flex align-items-center text-dark me-3" title="User">
                    <i class="bi bi-person-circle fs-4"></i>
                </a>

                <!-- Gear icon that logs out on click -->
                <form method="POST" action="{{ route('logout') }}" id="logoutForm" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary p-0" title="Logout"
                        style="border: none; background: transparent;">
                        <i class="bi bi-gear-fill fs-4 text-dark"></i>
                    </button>
                </form>
            @else
                <!-- Show Login and Create Account when not authenticated -->
                <a class="btn fw-semibold" style="background-color: white; color: #fd7e14; border: 1px solid #fd7e14;"
                    href="{{ route('login') }}">Login</a>

                <a class="btn text-white fw-semibold" style="background-color: #fd7e14;"
                    href="{{ route('register') }}">Create Account</a>
            @endauth
        </div>
    </div>
</nav>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#logoutForm').submit(function(e) {
            e.preventDefault(); // prevent normal submit

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ url('/login') }}";
                    }
                },
                error: function() {
                    alert('Logout failed!');
                }
            });
        });
    });
</script>
