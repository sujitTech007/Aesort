@include('admin.include.header')

<div class="page-content">
    <div class="page-title-head d-flex flex-wrap align-items-center gap-3">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-1">User Management</h4>
            <p class="text-muted mb-0">Live account directory; counts use the same users table as the dashboard.</p>
        </div>
        <a href="{{ route('admin.rollout.index') }}#roles" class="btn btn-outline-secondary"><i class="ri-admin-line me-1"></i>AESORT Roles</a>
    </div>

    <div class="page-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            @foreach(['All user accounts' => $totalUsers, 'Customer accounts (role 1)' => $customerCount, 'Service technician accounts (role 2)' => $technicianCount, 'Unmapped roles' => $unmappedRoleCount] as $label => $count)
                <div class="col-md-3"><div class="card"><div class="card-body p-2"><div class="text-muted small">{{ $label }}</div><div class="fs-2 fw-bold mt-2">{{ number_format($count) }}</div></div></div></div>
            @endforeach
        </div>

        <div class="alert alert-warning">Application user roles are still fixed numeric types. Granular client-user permissions and role editing are not enabled. Admin accounts are managed separately under the AESORT Roles section.</div>

        <div class="card"><div class="card-body">
            <div class="table-responsive"><table class="table table-hover align-middle mb-0">
                <thead><tr><th>User</th><th>Email</th><th>Company</th><th>Account type</th><th>Sites</th><th>Status</th><th>Created</th></tr></thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->company_name ?: 'Not set' }}</td>
                            <td>
                                @if($user->role == 1)Customer account (role 1)
                                @elseif($user->role == 2)Service technician account (role 2)
                                @else Unmapped role ({{ $user->role }})
                                @endif
                            </td>
                            <td>{{ number_format($user->sites_count) }}</td>
                            <td><span class="badge {{ $user->status == 1 ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}">{{ $user->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                            <td>{{ $user->created_at?->format('M d, Y') ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">No user accounts found.</td></tr>
                    @endforelse
                </tbody>
            </table></div>
            {{ $users->links('pagination::bootstrap-5') }}
        </div></div>
    </div>
</div>

@include('admin.include.footer')
