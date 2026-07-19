{{-- TABLE USER --}}
<section class="panel mt-3">
    <div class="panel-header">
        <div>
            <h2 class="h5 mb-1 section-title"><i class="bi bi-people" aria-hidden="true"></i><span>Recent
                    Users</span></h2>
            <p class="text-muted mb-0">Latest account activity across the workspace.</p>
        </div>
        <a class="btn btn-outline-secondary btn-sm" href="users.html">Manage Users</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Team</th>
                    <th scope="col">Status</th>
                    <th scope="col">Joined</th>
                    <th scope="col" class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img class="avatar-img avatar-sm" src="../assets/images/avatar/avatar-1.jpg"
                                alt="Sarah Ahmed">
                            <div>
                                <p class="fw-semibold mb-0">Sarah Ahmed</p>
                                <p class="text-muted small mb-0">sarah@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td>Admin</td>
                    <td>Operations</td>
                    <td><span class="badge text-bg-success">Active</span></td>
                    <td>Jan 12, 2026</td>
                    <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img class="avatar-img avatar-sm" src="../assets/images/avatar/avatar-2.jpg"
                                alt="Rafi Khan">
                            <div>
                                <p class="fw-semibold mb-0">Rafi Khan</p>
                                <p class="text-muted small mb-0">rafi@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td>Manager</td>
                    <td>Sales</td>
                    <td><span class="badge text-bg-success">Active</span></td>
                    <td>Feb 03, 2026</td>
                    <td class="text-end"><a class="btn btn-light btn-sm" href="{{ route('user.user-detail') }}">View</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</section>
