<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.head')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success d-flex justify-content-between  " role="alert">
                    {{session()->get('message')}} 
                </div>
            @endif

            <div class="row">
                <form action="{{url('Admin/upload_Admin')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add admin</h4>
                            
                            <form class="forms-sample">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control text-white"  name="name"  placeholder="Username">
                                @error('name')
                                    <div class="text-danger fw-bold">
                                       error here
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control text-white"  name="email"  placeholder="Email">
                                @error('email')
                                    <div class="text-danger fw-bold">
                                       error here
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">user type</label>
                                <select name="usertype" class="form-control text-white">
                                    <option value="2">desk member</option>
                                    <option value="3">library  member</option>
                                </select>
                                @error('usertype')
                                    <div class="text-danger fw-bold">
                                       error here
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-white"  name="password"  placeholder="Password">
                                @error('password')
                                    <div class="text-danger fw-bold">
                                       error here
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control text-white" name="password_confirmation"   placeholder="Password">
                                @error('password_confirmation')
                                    <div class="text-danger fw-bold">
                                        error here
                                    </div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </form> 
            </div>
          
            
            
          </div>
          <!-- content-wrapper ends -->
          
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
  </body>
</html>