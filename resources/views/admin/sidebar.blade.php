<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="home">Elite librey</a>
      <a class="sidebar-brand brand-logo-mini" href="home">Elite librey</a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="/assets/images/faces/profile-user.png" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
              <span>Gold Member</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <form method="GET" action="{{ route('profile.show') }}" x-data>
                  @csrf

                  <button class="btn btn-transparent">settings</button>
              </form>
                
              </div>
            </a>
            
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="/home">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @if(Auth::check())
        @if(Auth::user()->usertype != 3)
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/Admin/add_admin')}}">
              <span class="menu-icon">
                <i class="mdi mdi-account-plus"></i>
              </span>
              <span class="menu-title">Add admin</span>
            </a>
          </li>
        @else
        @endif
      @endif
      
     
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/admin/add_loanBook')}}">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Add Loan book</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/admin/loan_books')}}">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Loan Books</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/admin/add_book')}}">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Add new book</span>
        </a>
      </li>
      
      
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/admin/books')}}">
          <span class="menu-icon">
            <i class="mdi mdi-apps"></i>
          </span>
          <span class="menu-title"> Books</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/admin/users')}}">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple-outline"></i>
          </span>
          <span class="menu-title"> Users</span>
        </a>
      </li>
     
    
    </ul>
  </nav>