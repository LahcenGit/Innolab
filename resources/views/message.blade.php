<!DOCTYPE html>
<html lang="en" class="h-100">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Innolabo</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('Dashboard/images/il-logo.png')}}">
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
                                        <div class="row d-flex justify-content-center mb-4" >
                                            <h1 style="color: #4153F1">InnoLabo</h1>
                                        </div>
                                        <h4 class="text-center mb-4 " style="color:#4153F1 ">{{Str::ucfirst($document->getPatient()->first_name)}} {{Str::ucfirst($document->getPatient()->last_name)}}<br>
                                        {{$document->getPatient()->date_birth}}, @if($document->getPatient()->sexe == 0) Masculin @else Féminin @endif</h4>
                                    </div>
                                    
                                    @if(!$exist_file || $document->flag_etat == 0 || $document->flag_etat == 1)
                                        <div class="alert alert-danger" role="alert">
                                        <span style="font-size: 15px;">  Vos analyses sont en cours de traitement par nos équipes. Celles-ci seront disponible prochainement sur votre espace.</span>
                                        </div>
                                    @else
                                        <div class="alert alert-success text-center" role="alert">
                                            <span style="font-size: 15px;">  Vos analyses sont prêtes, merci de cliquer sur le boutton pour les télécharger.</span> <br>
                                             <a href="{{asset('show-file/'.$document->token)}}"><button type="button" class="btn btn-success mt-3">Télécharger</button></a> 
                                        </div>
                                    @endif
                    
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

</body>

</html>