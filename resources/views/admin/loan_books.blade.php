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
                            <th> lend_date </th>
                            <th> redemption_date </th>
                            <th> price </th>
                            <th> book_status </th>
                            <th> student_name </th>
                            <th> phone bumber </th>
                            <th> card number </th>
                            <th> status </th>
                            <th> observation </th>
                            <th> the admin </th>
                            <th> retrieved </th>
                            <th> loaned </th>
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
                                    <td class="text-white">{{$book->lend_date}}</td>
                                    <td class="text-white">{{$book->redemption_date}}</td>
                                    <td class="text-white">{{$book->price}}</td>
                                    <td class="text-white">{{$book->book_status}}</td>
                                    <td class="text-white">{{$book->student_name}}</td>
                                    <td class="text-white">{{$book->phone_number}}</td>
                                    <td class="text-white">{{$book->card_number}}</td>
                                    @if ($book->status === 'loaned')
                                      <td class="text-danger">{{$book->status}}</td>
                                    @else
                                      <td class="text-success">{{$book->status}}</td>
                                    @endif
                                    <td class="text-white">{{$book->observation}}</td>
                                    <td class="text-white">{{$book->userId}}</td>
                                    <td class="text-white">
                                      <form action="{{url('/admin/retrieved',$book->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-success">retrieved</button>
                                      </form>
                                    </td>
                                    <td class="text-white">
                                      <form action="{{url('/admin/loaned',$book->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">loaned</button>
                                      </form>
                                    </td>
                                    <td class="text-white"><a class="btn btn-primary" href="{{url('/admin/update_loanBook',$book->id)}}">update</a></td>
                                    <td class="text-white"><a class="btn btn-danger"  href="{{url('/admin/delete_loanBook',$book->id)}}">delete</a></td>
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