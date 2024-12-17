@extends("layouts.auth")
@section('content')
<!-- Sign In Start -->
  <div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
          <div class="d-flex align-items-center justify-content-between mb-3">
              <a href="index.html" class="">
                  <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SN - Admin</h3>
              </a>
              <h3>Sign In</h3>
          </div>
          @if(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
          @endif
          <form action="{{route('login.check')}}" method="POST">
          @CSRF
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            
            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
          </form>
            <p class="text-center mb-0">Don't have an Account? <a href="{{route('student.register')}}">Sign Up</a></p>
        </div>
      </div>
    </div>
  </div>
      
@endsection