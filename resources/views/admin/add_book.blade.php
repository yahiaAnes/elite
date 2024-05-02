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
                  <form action="{{url('/admin/upload_book')}}" method="POST">
                      @csrf
                      <div class="col-12 grid-margin stretch-card">
                          <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">New Book</h4>
                              
                              
                                <div class="form-group">
                                    <label for="number">number</label>
                                    <input type="text" class="form-control text-white"  name="number"  placeholder="number">
                                    @error('number')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" class="form-control text-white"  name="title"  placeholder="title">
                                    @error('title')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="author">author</label>
                                    <input type="text" class="form-control text-white"  name="author"  placeholder="author">
                                    @error('author')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pages">pages</label>
                                    <input type="number" class="form-control text-white"  name="pages"  placeholder="pages">
                                    @error('pages')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category">category</label>
                                    <input type="text" class="form-control text-white"  name="category"  placeholder="category">
                                    @error('category')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                               

                                <div class="form-group">
                                    <label for="book_status">book_status</label>
                                    <select name="book_status" class="form-control text-white">
                                        <option value="Exellent">Exellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Meduim">Meduimt</option>
                                        <option value="Restored">Restored</option>
                                    </select>
                                    @error('book_status')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="observation">observation</label>
                                    <input type="text" class="form-control text-white"  name="observation"  placeholder="observation">
                                    @error('observation')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>
                              
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            
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