<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Innolab</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('Front/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('Front/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('Front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('Front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('Front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('Front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('Front/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('Front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('Front/assets/css/style.css')}}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- =======================================================
  * Template Name: FlexStart - v1.11.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <img src="{{asset('Front/assets/img/logo.png')}}" alt="">
        <span>InnoLab</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 d-flex flex-column justify-content-center mb-4">
          <h1 data-aos="fade-up">InnoLab, la gestion complète de laboratoire d'analyses médicales</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Découvrez toutes les fonctionnalités</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Voir plus</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-4" >
            <div class="container h-100">
              <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  
                  <div class="card shadow-lg" style="box-shadow: 0px 5px 30px rgb(65 84 241 / 40%) !important;">

                    <div class="text-center ">
                      <img src="{{asset('Front/assets/img/user-icon.jpg')}}" class="mt-4" alt="logo" width="100">
                    </div>

                    <div class="card-body p-4">
                      <h1 class="fs-4 card-title fw-bold ">Espace de connexion</h1>
                      <p class="form-text text-muted mb-3">
                        Pour les Laboratoires, medecins & patients.
                      </p>
                      <h3>@if($error) {{$error}} @endif</h3>
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                          <label class="mb-2 text-muted" for="name"><b>Email Ou Username</b> </label>
                          <input id="name" type="text" class="form-control" name="username" value="" placeholder="User-1234" required autofocus>
                          <div class="invalid-feedback">
                            Name is required	
                          </div>
                        </div>
        
                        <div class="mb-3">
                          <label class="mb-2 text-muted" for="password"><b>Mot de passe</b> </label>
                          <input id="password" type="password" class="form-control" placeholder="********" name="password" required>
                            <div class="invalid-feedback">
                              Password is required
                            </div>
                        </div>
        
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ml-1">
                                            <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="basic_checkbox_1">
                                            <label class="custom-control-label" for="basic_checkbox_1">Se souvenir de moi</label>
                                        </div>
                                    </div>
                                            
                                </div>
        
                        <div class="align-items-center d-flex">
                          <button type="submit" class="btn btn-primary btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Connectez-vous</span>
                            <i class="bi bi-arrow-right"></i>
                         </button>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer py-3 border-0" style="background-color:#F2F5FC;">
                      <div class="text-center">
                        Powered by <b>InnoDev</b> 
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contactez-nous</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Addresse</h3>
                  <p>Cité 270 log bat G N°109 ,<br>Chetouane Tlemcen</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Télephone</h3>
                  <p>0658 718 286<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email </h3>
                  <p>contact@innodev.dz<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Heures d'ouverture</h3>
                  <p>ouvert tout le temps<br></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form id="submitF" >
                
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" id="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" id="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  
                    <div class="alert alert-success message-success" role="alert" style="display:none ;">
                    Your message has been sent. Thank you!
                    </div>
                    <div class="alert alert-danger message-error" role="alert" style="display:none ;">
                    Your message has not sent!
                    </div>
                    <button type="button" class="btn btn-primary btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center add-message"style="background-color: #4153F1; border-color: #4153F1;">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>InnoLab</span>
            </a>
            <p>Solution complète de gestion de laboratoire d'analyses medicales</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>InnoDev</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

  $(".add-message").on('click',function(e){

        alert(1);
        
        e.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let subject = $('#subject').val();
        let message = $('#message').val();
        $.ajax({
          type:"POST",  
          url: "/contact",
          data:{
            "_token": "{{ csrf_token() }}",
            name:name,
            email:email,
            subject:subject,
            message:message,
            
           },
         success:function(response){
           if(response == 1){
            $("#message-success").css("display", "block");
           }
           else{
            $("#message-error").css("display", "block");
           }
            
          },
        
          });
       
   });
</script>  
  <script src="{{asset('Front/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('Front/assets/js/main.js')}}"></script>

 

</body>

</html>