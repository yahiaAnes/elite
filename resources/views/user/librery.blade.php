<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite librery</title>
    <link rel="stylesheet" href="/librery.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tajawal:wght@700;800;900&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="shortcut icon" href="/images/NEMS_logo.png" />
</head>
<body>


  @include('user.header')
  
  <main class=" d-flex justify-content-center flex-wrap align-items-center">
    <div class="main_text text-white" data-aos="fade-down" data-aos-duration="1000">
      <h1 class="text-center  fw-bolder my-5">Elite Library... We move between medicine and books</h1>
      
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <section class=" d-flex justify-content-center flex-wrap align-items-center">
    <div class="main_text">
        <h1 class="text-center  fw-bolder my-5">Our Books</h1>
        
      
      </div>
  </section>
  <form class="d-flex justify-content-center">
    <input type="text" id="search" class="p-2 mx-5 my-3 rounded  input-group"  placeholder="search for a book by name, category, author, ...">
  </form>
  <form class="d-flex justify-content-center ">
    <select id="category-filter" class="p-2 mx-5 my-3 rounded input-group">
        <option value="all">choose your favorite category</option>
        @php
          $uniqueModules= [];
        @endphp
        @foreach ($books as $book)
          
          @if (!in_array($book->category, $uniqueModules))
            <option value="{{ $book->category }}">{{ $book->category }}</option>

            
            @php
                $uniqueModules[] = $book->category;
                
            @endphp
          
          @endif
            
        @endforeach
    </select>
  </form>
  <section class="table-responsive books px-2 my-5">
    
    <table class="table  " id="myTable">
        <thead>
          <tr>
            <th class="px-5"> Id </th>
            <th class="px-5"> title </th>
            <th class="px-5"> author </th>
            <th class="px-5"> pages </th>
            <th class="px-5"> category </th>
            <th class="px-5"> book_status </th>
            <th class="px-5"> observation </th>
            <th class="px-5"> status </th>
            <th class="px-5"> rating </th>
            <th class="px-5"> rate </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($books as $book)
            <tr>
              <td class="text-center">{{$book->id}}</td>
              <td class="text-center">{{$book->title}}</td>
              <td class="text-center">{{$book->author}}</td>
              <td class="text-center">{{$book->pages}}</td>
              <td class="text-center">{{$book->category}}</td>
              <td class="text-center">{{$book->book_status}}</td>
              <td class="text-center">{{$book->observation}}</td>
              @if($book->status ==='available')
                <td class="text-center text-success">{{$book->status}}</td>
              @else
                <td class="text-center text-danger">{{$book->status}}</td>
              @endif
              <td class="text-center">
                @if ($book->review->count() > 0)
                  <div class="avgStars">
                    {{number_format( $book->review->avg('rating') ,1)}}

                      @for ($i = 1; $i <= ceil($book->review->count()); $i++)
                          <i class="fa fa-star i_star"></i>
                      @endfor
                  </div>
                @else
                  no reviews yet
                @endif
                
              </td>
              
              <td class="text-center">
                @if (Auth::check())
                  @php
                      $userReview = $book->review->where('userId', Auth::user()->id)->first();
                  @endphp

                  @if ($userReview)
                      <p></p>
                  @else
                      <button class="btn btn-primary edit-button" data-title="{{ $book->id }}">Rate</button>
                  @endif
                @else
                  <a href="{{route('login')}}" class="btn btn-primary">rate</a>
                @endif
              </td>
            </tr>
          @endforeach
          
          
        </tbody>
    </table>
  </section>

  







  
                                

      <!-- star rating -->
    
          

      <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to open SweetAlert2 form
            function openForm(bookTitle) {
                Swal.fire({
                    title: `make your review`,
                    html:
                        `<form method="POST" action="{{ url('rating') }}/${encodeURIComponent(bookTitle)}" id="ratingForm"">
                          @csrf
                          <div class="rating-wrapper ">
          
                              <!-- star 5 -->
                              <input type="radio" id="5-star-rating" name="rating" value="5">
                              <label for="5-star-rating" class="star-rating">
                                <i class="fas fa-star d-inline-block"></i>
                              </label>
                              
                              <!-- star 4 -->
                              <input type="radio" id="4-star-rating" name="rating" value="4">
                              <label for="4-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block"></i>
                              </label>
                              
                              <!-- star 3 -->
                              <input type="radio" id="3-star-rating" name="rating" value="3">
                              <label for="3-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block"></i>
                              </label>
                              
                              <!-- star 2 -->
                              <input type="radio" id="2-star-rating" name="rating" value="2">
                              <label for="2-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block"></i>
                              </label>
                              
                              <!-- star 1 -->
                              <input type="radio" id="1-star-rating" name="rating" value="1">
                              <label for="1-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block"></i>
                              </label>
                              
                            </div>
                            
                          <button class="btn btn-success my-3" type="submit">submit</button>
                        </form>`,
                        showConfirmButton: false,
                        
        
                  
                });
        
            }
    
            // Attach click event to each button in the table
            const buttons = document.querySelectorAll('.edit-button');
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const bookTitle = this.dataset.title;
                    openForm(bookTitle);
                });
            });
        });
      </script>

            
  <footer class=" px-3 py-5">
    <div class="footer-content d-flex justify-content-between flex-wrap">
      <div class="footer-logo mx-5 d-flex justify-content-start flex-column">
        <img src="/images/NEMS_logo.png" alt="" class="img-fluid mb-4">
        <p>Les sciences médicales sont en constante évolution, et nous ne cessons de découvrir de nouvelles choses.</p>
      </div>
      <div class="footer-menu mx-5 d-flex justify-content-start flex-column">
        <h3 class="fs-2">Liens</h3>
        <ul class="p-0">
          <li class="list-group-item my-2 "><a class="text-decoration-none text-dark" href="#">Home</a></li>
          <li class="list-group-item my-2 "><a class="text-decoration-none text-dark" href="{{url('medecine')}}">Medecine</a></li>
          <li class="list-group-item my-2 "><a class="text-decoration-none text-dark" href="{{url('pharmaci')}}">Pharmacie</a></li>
          <li class="list-group-item my-2 "><a class="text-decoration-none text-dark" href="{{url('chirugie_dentaire')}}">Chirugie Dentaire</a></li>
        </ul>
      </div>
     
      <div class="footer-social mx-5 d-flex justify-content-start flex-column">
        <h3 class="fs-2">Visiter-nous</h3>

        <ul class="p-0">
          <li class="list-group-item my-2"><a class="text-decoration-none fw-semibold text-dark" href="{{route('login')}}">Se connecter</a></li>
          <li class="list-group-item my-2"><a class="text-decoration-none fw-semibold text-dark" href="{{route('register')}}">S'inscrire</a></li>
        </ul>
        <div>
          <a class="mx-3" href="#"><img src="images/fb.png" alt="Facebook"></a>
          <a class="mx-3" href="#"><img src="images/insta.png" alt="Twitter"></a>
          <a class="mx-3" href="#"><img src="images/email.png" alt="Instagram"></a>
        </div>
        
      </div>
    </div>
      <hr>
    <div class="copy-right">
      <h3 class="text-center opacity-50 my-3">Tous les droits sont réservés © 2024 ELITE SETIF</h3>
    </div>
  </footer>
  
  <script src="{{ asset('script/search&filter.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  
</body>
</html>
