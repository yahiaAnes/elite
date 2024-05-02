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
                    <h4 class="card-title">books </h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control text-white" placeholder="search fo book ">
                      </form>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> number </th>
                            <th> title </th>
                            <th> author </th>
                            <th> pages </th>
                            <th> category </th>
                            <th> book_status </th>                           
                            <th> observation </th>
                            <th> status </th>
                            <th> the admin </th>
                            <th> update </th>
                            <th> delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($books as $book)
                                <tr>
                                    <td class="text-white">{{$book->id}}</td>
                                    <td class="text-white">{{$book->number}}</td>
                                    <td class="text-white">{{$book->title}}</td>
                                    <td class="text-white">{{$book->author}}</td>
                                    <td class="text-white">{{$book->pages}}</td>
                                    <td class="text-white">{{$book->category}}</td>
                                    <td class="text-white">{{$book->book_status}}</td>
                                    <td class="text-white">{{$book->observation}}</td>
                                    @if($book->status ==='available')
                                      <td class="text-success">{{$book->status}}</td>
                                    @else
                                      <td class="text-danger">{{$book->status}}</td>
                                    @endif
                                    <td class="text-white">{{$book->userId}}</td>
                                    <td class="text-white"><a class="btn btn-primary" href="{{url('/admin/update_Book',$book->id)}}">update</a></td>
                                    <td class="text-white"><a class="btn btn-danger"  href="{{url('/admin/delete_Book',$book->id)}}">delete</a></td>
                               
                                </tr>
                            
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