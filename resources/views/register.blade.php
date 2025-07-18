<!DOCTYPE html>
<html lang="en">


<!-- Register -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Todo</title>
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form action="{{route('userRegister')}}" method="post"  class="needs-validation" novalidate="">
                  @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">First Name</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="surname">Last Name</label>
                      <input id="surname" type="text" class="form-control" name="surname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password_confirmation" class="d-block">Password Confirmation</label>
                      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="form-group col-6">
                      <label for="role" class="d-block">Role</label>
                      <select class="form-control" name="role" id="role" required>
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{ucfirst($role->name)}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="/login">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/auth-register.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>


</html>