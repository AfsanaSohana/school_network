@extends("layouts.auth")
@section('content')
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SN</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <form method="POST" action="{{ route('student.register.save') }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text"  name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            <label for="floatingText">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}" required>
                            <label for="dob">Data of Birth</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
                            <label for="phone">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="radio-group">
                                    <label><input type="radio" id="male" name="gender" value="M"> Male</label>
                                    <label><input type="radio" id="female" name="gender" value="F"> Female</label>
                                    <label for="gender">Gender:</label>
                            </div>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}" required>
                            <label for="country">Country</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                            <label for="password">Confirm Password</label>
                        </div>
                       
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                    </form>
                        <p class="text-center mb-0">Already have an Account? <a href="{{route('student.login')}}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
@endsection