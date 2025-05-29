@extends('layouts.app')
<style>
  .container {
    max-width: 800px;         
    margin: 30px auto;       
    padding: 20px;              
    background-color: #f9f9f9;  
    border-radius: 10px;        
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
}
.title{
    margin-left: 300px;
    color: blue;

 }  
form{
    padding: 20px;
}
.form-group{
    padding: 6px;
}
    .form-label {
        font-weight: 500;
    }
    button{
        background-color: red;
    }
    .btn-primary {
        font-size: 1rem;
        font-weight: bold;
        background-color: green;
        margin: 5px;
        width: 100px;
        height: 30px;
    }
</style>
@section('content')
<div class="container">
    <h1 class="title">Create User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('role')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection 