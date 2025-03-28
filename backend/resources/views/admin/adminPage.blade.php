@extends('layouts.master')

@section('content')
    <h1>Admin Page</h1>
    <h2>List of Users</h2>

    @if (session('success'))
        <div class="admin-alert admin-alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="admin-alert admin-alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr class="admin-tr">
                    <th class="admin-th">Username</th>
                    <th class="admin-th">First Name</th>
                    <th class="admin-th">Last Name</th>
                    <th class="admin-th">Registration Date</th>
                    <th class="admin-th">Is Approved</th>
                    <th class="admin-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="admin-tr">
                        <td class="admin-td">{{ $user->Username }}</td>
                        <td class="admin-td">{{ $user->FirstName }}</td>
                        <td class="admin-td">{{ $user->LastName }}</td>
                        <td class="admin-td">{{ $user->RegistrationDate }}</td>
                        <td class="admin-td">{{ $user->IsApproved ? 'Approved' : 'Disapproved' }}</td>
                        <td class="admin-td">
                            <!-- Approve Form -->
                            <form action="{{ route('updateUserStatus') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="Username" value="{{ $user->Username }}">
                                <input type="hidden" name="IsApproved" value="1">
                                <button type="submit" class="admin-approve-btn">Approve</button>
                            </form>

                            <!-- Disapprove Form -->
                            <form action="{{ route('updateUserStatus') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="Username" value="{{ $user->Username }}">
                                <input type="hidden" name="IsApproved" value="0">
                                <button type="submit" class="admin-disapprove-btn">Disapprove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
