<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.head')
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
              <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                  <h3 class="card-title text-left mb-3">Register</h3>
                  <form method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="text-white form-control p_input" :value="old('name')" required autocomplete="name">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="text-white form-control p_input" :value="old('email')" required autocomplete="email">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="text-white form-control p_input" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_confirmation" class="text-white form-control p_input" required autocomplete="new-password">
                      </div>
                   
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                    </div>
                    
                    <p class="sign-up text-center">Already have an Account?<a href="{{route('register')}}"> Sign Up</a></p>
                    
                  </form>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    @include('admin.script')
  </body>
</html>