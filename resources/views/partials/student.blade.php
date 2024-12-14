@extends('layouts.app')

@section('title', 'student')

@section('content')
    <h2>Personal Info</h2>
    <form method="POST" action="{{ route('student.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </div>
        <div class="form-group">
            <label for="dob">DOB:</label>
            <input type="date" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <div class="radio-group">
                <label><input type="radio" id="male" name="gender" value="M"> Male</label>
                <label><input type="radio" id="female" name="gender" value="F"> Female</label>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <select id="country" name="country">
                <option value="us">United States</option>
                <option value="uk">United Kingdom</option>
                <option value="bd">Bangladesh</option>
                <option value="in">India</option>
                <option value="ca">Canada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="submit-btn">
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
