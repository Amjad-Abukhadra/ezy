@extends('admin.app')

@section('title', 'Admin Dashboard')
@section('page_title', 'Contact Messages')

@section('content')
    <div class="mb-5">
        <h1 class="mb-4 fw-bold">
            <i class="fa fa-envelope-open-text me-2 text-primary"></i>Contact Messages
        </h1>
        <div class="table-responsive">
            <table id="messagesTable" class="table table-bordered table-hover table-striped align-middle mb-0">
                <thead class="table-light text-uppercase small">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Issue</th>
                        <th>Message</th>
                        <th>Sent At</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $msg)
                        <tr>
                            <td class="fw-bold text-primary">{{ $msg->id }}</td>
                            <td>
                                <i class="fa fa-user-circle me-1 text-secondary"></i>
                                {{ $msg->name }}
                            </td>
                            <td>
                                <a href="mailto:{{ $msg->email }}" class="text-decoration-none">
                                    <i class="fa fa-envelope me-1"></i>{{ $msg->email }}
                                </a>
                            </td>
                            <td>
                                <a href="tel:{{ $msg->phone }}" class="text-decoration-none">
                                    <i class="fa fa-phone me-1"></i>{{ $msg->phone }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $msg->issue }}</span>
                            </td>
                            <td style="max-width: 250px;">
                                <span title="{{ $msg->message }}">
                                    {{ \Illuminate\Support\Str::limit($msg->message, 60) }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="fa fa-clock me-1"></i>{{ $msg->created_at->format('Y-m-d H:i') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

