@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Project</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" required />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" required />
        </div>
        <div class="mb-3">
            <label for="contact_no" class="form-label">Contact No</label>
            <input type="text" name="contact_no" class="form-control" id="contact_no" required />
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        
        <button type="submit" class="btn btn-success">submit</button>
    </form>
</div>
@endsection
