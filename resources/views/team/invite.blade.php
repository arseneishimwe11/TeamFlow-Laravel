<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Invite Team Member</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('team.send-invite') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Invitation</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>