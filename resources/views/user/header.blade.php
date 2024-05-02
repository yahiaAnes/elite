
<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary  rounded">
    <div class="container-fluid mx-3">
      <a class="navbar-brand " href="/"><img src="/images/NEMS_logo.png" alt="" style="width:60px;height:80px"></a>

      <button class="navbar-toggler border border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">

        <ul class="navbar-nav d-flex justify-content-left ">

          <li class="nav-ite  m-3">
            <a class="header_li nav-link active fw-semibold fs-5"  aria-current="page" href="/">Home</a>
          </li>

          <li class="nav-ite  m-3">
            <a class="header_li nav-link active fw-semibold fs-5"  aria-current="page" href="/librery">Librery</a>
          </li>

          <li class="nav-ite  m-3">
            <a class="header_li nav-link active fw-semibold fs-5"  aria-current="page" href="/">Our Activities</a>
          </li>
         
          <li class="nav-ite  m-3">
            <a class="header_li nav-link active fw-semibold fs-5"  aria-current="page" href="/">About us</a>
          </li>

          

         
          
          <div class="dropdown">
            @if(Auth::check())
            <button class="connexion btn btn-transparent border border-0 fw-semibold fs-5 m-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </button>
            @else
            <button class="connexion btn btn-transparent border border-0 fw-semibold fs-5 m-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Connexion
            </button>
            @endif
            <ul class="dropdown-menu">
              @if(Auth::check())
              <li class="dropdown-item text-center">
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
  
                  <button class="dropdown-item">logout</button>
              </form>
              </li>
              
            @else
              <li class="nav-item text-center ">
                <a class="dropdown-item" aria-current="page" href="{{route('login')}}">Se connecter</a>
              </li>
              <li class="nav-item text-center ">
                <a class="dropdown-item" aria-current="page" href="{{route('register')}}">S'inscrire</a>
              </li>
            @endif
            </ul>
          </div>
        </ul>
        
      </div>
    </div>
</nav>