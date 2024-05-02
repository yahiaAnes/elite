<!DOCTYPE html>
<html>
<head>
  @include('user.head')
</head>
<body>


  @include('user.header')
  
  <main class=" d-flex justify-content-around flex-wrap align-items-center">
    
      
      
      <div class="main_text" >
        <h1 class="text-center  fw-bolder my-5">National <span class="color-bleu">Elite</span> For Medical Science</h1>
        <p class="mx-5 fw-bold fs-3 text-center my-3">Elite Setif</p><br>
        <div class="main_button d-flex justify-content-center">
          <button class="btn btn-tranparent text-white mb-5">on commence</button>
        </div>
        
      </div>
      <div class="main-image d-flex justify-content-center" >
        <img src="/images/main_person_2.png" alt="" class="img-fluid ">
      </div>
    
      
  </main>

  <section class="about py-3 px-3 d-flex justify-content-around flex-wrap">
    <div class="content mx-3" >
      <h1 class="text-left fw-bolder align-items-cener  my-3">National Elite For Medical SCience</h1>
      <p class="text-left fs-4 fw-semibolder align-items-cener ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, modi iste. Atque error soluta quod? </p>
      <button class="btn btn fs-6">vérifier maintenant</button>
    </div>
    
    <div class="image my-5 mx-5" >
      <img src="images/about_images.png" class="img-fluid" alt="">
    
    </div>
  </section>


  

  <section class="contact d-flex justify-content-around flex-wrap">
    <div class="informations text-start mx-5 my-5">
      <h3 class="fw-bold mb-5">contact us</h3>
      <p class="fs-5 fw-semibold">Si you want to suggest something or complain about something do not hesitate to contact us, the support team is available all the time, and do not forget to visit us on social networks.</p>
      <div class="social_media my-5 ">
        <a href=""><div class="d-flex my-4 align-items-center">
          <img src="images/fb.png" alt="">
          <h6 class="mx-3 my-0 ">Elite setif</h6>
        </div></a>
        <a href=""></a><div class="d-flex my-4 align-items-center">
          <img src="images/insta.png" alt="">
          <h6 class="mx-3 my-0">Elite setif</h6>
        </div></a>
        <a href=""></a><div class="d-flex my-4 align-items-center">
          <img src="images/email.png" alt="">
          <h6 class="mx-3 my-0">NEMSsetif@gmail.com</h6>
        </div></a>
      </div>
    
    </div>
    <form action="{{url('/sendMessage')}}" method="POST" class="inputs mx-5 my-5 d-flex justify-content-center" >
    @csrf 
    
    @if(session()->has('message'))
        <div class="bg-success text-center text-white p-1 m-1">
            {{session()->get('message')}} 
        </div>
    @endif
      <input type="text" class="mx-4 my-3 px-2 py-2" name="name" placeholder="name">
      <input type="email" class="mx-4 my-3 px-2 py-2" name="email" placeholder="email">
      <textarea name="content" class="mx-4 my-3 px-4 py-4"  placeholder="content"></textarea>
      <button class="btn btn mx-4 my-3" type="submit">envoyer</button>
    </form>
  </section>
  

                          

      

  <footer class=" px-3 py-5">
    <div class="footer-content d-flex justify-content-between flex-wrap">
      <div class="footer-logo mx-5 d-flex justify-content-start flex-column">
        <img src="/images/NEMS_logo.png" alt="" class="footer_img img-fluid mb-4">
        <p>Medical science is constantly evolving, and we are constantly discovering new things.</p>
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
  
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 
  
</body>
</html>
