<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laboratoire ABI-AYAD</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="Dashboard/images/favicon.png">
    <link href="{{asset('Dashboard/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  />


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    
                                    <div class="text-center">
                                        <img src="{{asset('Dashboard/images/ab-logo.png')}}" height="100%" width="100%" class="mb-4" alt=""><br/>
                                        <h4 class="text-center mb-1" style="color:#0083CC ">Bonjour, {{Str::ucfirst($user->nom)}} {{Str::ucfirst($user->prenom);}}</h4>
                                    </div>
                                    <div class="text-center">
                                        <label class="mb-4"><strong>D.N : </strong>{{$user->date_de_naissance}} <strong>sexe :</strong>  </label> {{$user->sexe}} <br>
                                    </div>

                                    <label class="mb-1"><strong>Détails de votre consultation : </strong></label> <br>
                                    <label class="mb-1"><strong>Date : </strong> {{$document->date}}</label> <br>
                                    <label class="mb-1"><strong>Analyse : </strong> {{$document->analyse}}</label> <br>

                                    @if($document->etat== 0)
                                     <label class="mb-1"><strong>Etat : </strong> En cours...</label>  <i style="color:#0089c8" class="ml-2 fa-solid fa-circle"></i> <br>
                                    @endif
                                    @if($document->etat == 1)
                                     <label class="mb-1"><strong>Etat : </strong> Attendre le paiement</label>  <i style="color:#e78c03" class="ml-2 fa-solid fa-circle"></i> <br>
                                    @endif
                                    @if($document->etat == 2)
                                     <label class="mb-1"><strong>Etat : </strong> Payé</label>  <i style="color:#00c855" class="ml-2 fa-solid fa-circle"></i> <br>
                                     <div class="center" style="text-align: center;">
                                        <a href="{{asset('files/'.$document->document_name.'.pdf')}}" class="btn btn-primary btn-block mt-4" style="background-color: #0083CC; border-color: #0083CC; padding-top:12px;" >
                                            Affichier le Resultat <i class="ml-2 fa-solid fa-file-lines fa-xl"></i>   </a>
                                    </div>
                                    @endif
                                    
                                    <div class="new-account mt-3">
                                        <p>Avez-vous une remarque ? <a  style="color:#0083CC " href="#">Contactez-nous</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('Dashboard/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('Dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('Dashboard/js/custom.min.js')}}"></script>
    <script src="{{asset('Dashboard/js/deznav-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script>

</body>

</html>