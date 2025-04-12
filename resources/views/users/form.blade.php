@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($user) ? 'Edit User' : 'Add User' }}</h1>
    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if (isset($user))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name ?? old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email ?? old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option value="1" {{ (isset($user) && $user->role_id == 1) ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ (isset($user) && $user->role_id == 2) ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($user) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection