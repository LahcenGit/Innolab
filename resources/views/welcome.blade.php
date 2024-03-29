<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Innolabo</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('Dashboard/images/il-logo.png')}}">
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
        <span>InnoLabo</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section  class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
       <div class="col-lg-8 d-flex flex-column justify-content-center mb-4">
          <h1 data-aos="fade-up">InnoLabo, solution complète pour la gestion de laboratoire d'analyses médicales</h1>
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

        <div class="col-md-4" >
            <div class="container h-100">
              <div class="row justify-content-sm-center h-100">
                  <div class="card shadow-lg" style="box-shadow: 0px 5px 30px rgb(65 84 241 / 40%) !important;">

                    <div class="text-center ">
                      <img src="{{asset('Front/assets/img/user-icon.jpg')}}" class="mt-4" alt="logo" width="100">
                    </div>

                    <div class="card-body p-4">

                      @auth

                        @if(Auth::user()->type == 'doctor')
                          <div class="text-center">
                            <h1 class="fs-4 card-title fw-bold ">Dr. {{Auth::user()->doctor->first_name}} </h1>
                            <p class="form-text text-muted mb-3">
                              Vous êtes connecté(e) ! 
                            </p>
                          </div>

                          <div class="d-flex justify-content-center">
                            <a href="{{asset('dashboard-doctor')}}" class="btn btn-primary btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                              Dashboard  <i class="bi bi-arrow-right"></i> 
                            </a>
                          </div>

                        @elseif(Auth::user()->type == 'labo')
                          <div class="text-center">
                            <h1 class="fs-4 card-title fw-bold ">Labo.  {{Auth::user()->laboratory->designation}} </h1>
                            <p class="form-text text-muted mb-3">
                              Vous êtes connecté(e) ! 
                            </p>
                          </div>

                          <div class="d-flex justify-content-center">
                            <a href="{{asset('dashboard-labo')}}" class="btn btn-primary btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                              Dashboard  <i class="bi bi-arrow-right"></i> 
                            </a>
                          </div>

                        @elseif(Auth::user()->type == 'patient')
                          <div class="text-center">
                            <h1 class="fs-4 card-title fw-bold ">{{Auth::user()->patient->first_name}} </h1>
                            <p class="form-text text-muted mb-3">
                              Vous êtes connecté(e) ! 
                            </p>
                          </div>

                          <div class="d-flex justify-content-center">
                            <a href="{{asset('dashboard-patient')}}" class="btn btn-primary btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                              Dashboard  <i class="bi bi-arrow-right"></i> 
                            </a>
                          </div>

                        @endif

                        <div class="d-flex justify-content-center mt-3 mb-4">
                              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" >Déconnexion
                             </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                            </form>
                        </div>
                    
                      @endauth

                      @guest
                          <div class="text-center">
                            <h1 class="fs-4 card-title fw-bold ">Espace de connexion</h1>
                            <p class="form-text text-muted mb-3">
                              Pour les laboratoires, médecins & patients.
                            </p>
                          </div>

                          <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                              <label class="mb-2 text-muted" for="name"><b>Nom d'utilisateur</b> </label>
                              <input id="name" type="text" class="form-control" name="username" value="" placeholder="User-1234" required autofocus>
                              <div class="invalid-feedback">
                                Name is required	
                              </div>
                            </div>
            
                            <div class="mb-3">
                              <label class="mb-2 text-muted" for="password"><b>Mot de passe</b> </label>
                                <div class="input-group mb-3" id="show_hide_password">
                                  <input id="password" type="password" class="form-control" placeholder="********" name="password" required>
                                  <span class="input-group-text" id="basic-addon2"><a href="#"><i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i></a> </span>
                                </div>
                                <div class="invalid-feedback">
                                  Password is required
                                </div>
                            </div>

                            @if ($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                              </div><br />
                            @endif

                            @if($error) 
                              <div class="alert alert-danger" role="alert">
                                <span style="font-size: 15px;">  {{$error}}  </span>
                              </div>
                            @endif

                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1">
                                                <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="basic_checkbox_1">
                                                <label class="custom-control-label" for="basic_checkbox_1">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                                
                                    </div>
            
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Connectez-vous</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                            </div>
                          </form>
                      @endauth
                    </div>

                    <div class="card-footer py-3 border-0" style="background-color:#F2F5FC; ">
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

  </section><!-- End Hero -->

  <main id="main">
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Pour plus d'informations</h2>
          <p>Contactez-nous</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Adresse</h3>
                  <p>Cité 270 log bat G N°109 ,<br>Chetouane Tlemcen</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Téléphone</h3>
                  <p>+213 (0) 658 718 286<br>
                  
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
                  <h3>À votre écoute </h3>
                  <p> 7j/7, 24h/24<br></p>
                </div>
              </div>
            </div>


          </div>

          <div class="col-lg-6">
            <div id="show_contact_msg"></div>
            <form id='contact-form' class="mt25" method="post" action="{{asset('/contact')}}">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" id="user" class="form-control" placeholder="Nom"  required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" id="email" placeholder="Email"  required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" id="subject" placeholder="Sujet"  required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" id="message" rows="6" placeholder="Message"  required></textarea>
                </div>

                <div class="col-md-12 text-center">
                   <div class="alert alert-success message-success" role="alert" style="display:none ;">
                    Votre message a été envoyé, merci!
                    </div>
                    <div class="alert alert-warning message-progress" role="alert" style="display:none ;">
                    Envoi en cours...
                    </div>
                    <button type="submit" class="btn btn-primary  d-inline-flex align-items-center justify-content-center align-self-center add-message"style="background-color: #4153F1; border-color: #4153F1;">Send Message</button>
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
              <span>InnoLabo</span>
            </a>
            <p>Solution complète pour la gestion de laboratoire d'analyses médicales</p>
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
        &copy; Copyright 2022 <strong><span>InnoDev</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"  ></script>
  <script src="{{asset('Front/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('Front/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('Front/assets/js/main.js')}}"></script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $("#contact-form").on('submit',function(e){
    e.preventDefault();
          let user = $('#user').val();
          let email = $('#email').val();
          let subject = $('#subject').val();
          let message = $('#message').val();
          let formURL = $(this).attr("action");
          var data = {
              user: user,
              email: email,
              subject: subject,
              message: message
          };
          $(".message-progress").css("display", "block");
          $.ajax({
            type:"POST",  
            url: formURL,
            data: data,
            success:function(response){
              if(response == 1){
                $(".message-progress").css("display", "none");
                $(".message-success").css("display", "block");
                
              }
              },
            
              });
           
     });
  </script>  

  <script>
  $("#show_hide_password a").on('click', function(event) {
          event.preventDefault();
          if($('#show_hide_password input').attr("type") == "text"){
              $('#show_hide_password input').attr('type', 'password');
              $('#eye').addClass( "fa-eye-slash" );
              $('#eye').removeClass( "fa-eye" );
          }else if($('#show_hide_password input').attr("type") == "password"){
              $('#show_hide_password input').attr('type', 'text');
              $('#eye').removeClass( "fa-eye-slash" );
              $('#eye').addClass( "fa-eye" );
          }
      });
</script>

</body>

</html>