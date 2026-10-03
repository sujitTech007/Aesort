@php($pageTitle = 'Notifications - AESORT')
@include('client.include.header')

<div class="page-content">
    <div class="container">
        <div class="row g-3">
            <aside class="col-lg-3">@include('client.include.sidebar-nav')</aside>
            <main class="col-lg-9"><div class="page-content-col">
                <div class="mb-3"><h1 class="fs-3 fw-bold mb-1">Notifications</h1><p class="text-muted mb-0">Alerts recorded for your customer account.</p></div>
                <section class="card"><div class="card-header bg-transparent d-flex justify-content-between align-items-center"><h2 class="h6 mb-0">Account notifications</h2><span class="badge bg-light text-secondary border">{{ $notifications->total() }} total</span></div>
                    @if($notifications->isNotEmpty())
                        <div class="list-group list-group-flush">
                            @foreach($notifications as $notification)
                                <article class="list-group-item p-3 {{ $notification->is_read ? '' : 'bg-light' }}">
                                    <div class="d-flex flex-wrap justify-content-between gap-3">
                                        <div><div class="d-flex flex-wrap align-items-center gap-2"><strong>{{ $notification->title }}</strong><span class="badge bg-secondary-subtle text-secondary">{{ ucfirst($notification->type ?: 'notice') }}</span>@if(!$notification->is_read)<span class="badge bg-primary">Unread</span>@endif</div><p class="mb-1 mt-2">{{ $notification->message }}</p><small class="text-muted">{{ $notification->created_at?->format('M d, Y H:i') ?? 'Date unavailable' }}</small></div>
                                        @if(!$notification->is_read)<form method="POST" action="{{ route('client.notifications.read', $notification->id) }}">@csrf<button class="btn btn-sm btn-outline-primary" type="submit">Mark as read</button></form>@endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="card-body border-top">{{ $notifications->links('pagination::bootstrap-5') }}</div>
                    @else
                        <div class="card-body text-center py-5"><i class="ri-notification-off-line fs-2 text-muted"></i><h2 class="h6 mt-2">No account notifications yet</h2><p class="text-muted mb-0">Customer alerts will appear here when they are recorded for your account.</p></div>
                    @endif
                </section>
            </div></main>
        </div>
    </div>
</div>
@include('client.include.footer')
