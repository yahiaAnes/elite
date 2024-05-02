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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Users </h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control text-white" placeholder="search fo user ">
                      </form>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> name </th>
                            <th> email </th>
                            <th> type </th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($users as $user)
                              
                                @if(Auth::user()->usertype === '3')
                                    <tr>
                                        <td class="text-white">{{$user->id}}</td>
                                        <td class="text-white">{{$user->name}}</td>
                                        <td class="text-white">{{$user->email}}</td>
                                        <td class="text-white">
                                            @if($user->usertype === '0')
                                                Normal User
                                            @elseif($user->usertype === '3')
                                                Library Member
                                            @endif
                                        </td>
                                    </tr>
                                @elseif(Auth::user()->usertype === '2')
                                    <tr>
                                        <td class="text-white">{{$user->id}}</td>
                                        <td class="text-white">{{$user->name}}</td>
                                        <td class="text-white">{{$user->email}}</td>
                                        <td class="text-white">
                                            @if($user->usertype === '0')
                                                Normal User
                                            @elseif($user->usertype === '3')
                                                Library Member
                                            @elseif($user->usertype === '2')
                                                Desk Member
                                            @endif
                                        </td>
                                    </tr>
                                  @elseif(Auth::user()->usertype === '1')
                                    <tr>
                                        <td class="text-white">{{$user->id}}</td>
                                        <td class="text-white">{{$user->name}}</td>
                                        <td class="text-white">{{$user->email}}</td>
                                        <td class="text-white">
                                            @if($user->usertype === '0')
                                                Normal User
                                            @elseif($user->usertype === '3')
                                                Library Member
                                            @elseif($user->usertype === '2')
                                                Desk Member
                                            @elseif($user->usertype === '1')
                                                auth Member
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            
                        
                            
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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