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
                  <form action="{{url('/admin/edit_loanBook',$loanBook->id)}}" method="POST">
                      @csrf
                      <div class="col-12 grid-margin stretch-card">
                          <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">New Book</h4>
                              
                              
                                <div class="form-group">
                                    <label for="number">number</label>
                                    <input type="text" class="form-control text-white"  name="number" value="{{$loanBook->number}}"  placeholder="number">
                                    @error('number')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" class="form-control text-white"  name="title" value="{{$loanBook->title}}"  placeholder="title">
                                    @error('title')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="author">author</label>
                                    <input type="text" class="form-control text-white"  name="author" value="{{$loanBook->author}}"  placeholder="author">
                                    @error('author')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pages">pages</label>
                                    <input type="number" class="form-control text-white"  name="pages" value="{{$loanBook->pages}}"  placeholder="pages">
                                    @error('pages')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category">category</label>
                                    <input type="text" class="form-control text-white"  name="category" value="{{$loanBook->category}}"  placeholder="category">
                                    @error('category')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lend_date">lend_date</label>
                                    <input type="text" class="form-control text-white"  name="lend_date" value="{{$loanBook->lend_date}}"  placeholder="lend_date">
                                    @error('lend_date')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="redemption_date">redemption_date</label>
                                    <input type="text" class="form-control text-white"  name="redemption_date" value="{{$loanBook->redemption_date}}"  placeholder="redemption_date">
                                    @error('redemption_date')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <select name="price" value="{{$loanBook->price}}" class="form-control text-white">
                                        <option value="50 da">50 da</option>
                                        <option value="100 da">100 da</option>
                                        <option value="gratuit">gratuit</option>
                                    </select>
                                    @error('price')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="book_status">book_status</label>
                                    <select name="book_status" value="{{$loanBook->book_status}}" class="form-control text-white">
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
                                    <label for="student_name">student_name</label>
                                    <input type="text" class="form-control text-white"  name="student_name" value="{{$loanBook->student_name}}"  placeholder="student_name">
                                    @error('student_name')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">phone_number</label>
                                    <input type="text" class="form-control text-white"  name="phone_number" value="{{$loanBook->phone_number}}"  placeholder="phone_number">
                                    @error('phone_number')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="card_number">card_number</label>
                                    <input type="text" class="form-control text-white"  name="card_number" value="{{$loanBook->card_number}}"  placeholder="card_number">
                                    @error('card_number')
                                        <div class="text-danger fw-bold">
                                            cette forme est obligatoire
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="observation">observation</label>
                                    <input type="text" class="form-control text-white"  name="observation" value="{{$loanBook->observation}}"  placeholder="observation">
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