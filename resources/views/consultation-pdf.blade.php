<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Partix</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="Dashboard/images/favicon.png">
    <link href="{{asset('Dashboard/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  />

    


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">

                  <embed src=
                "{{asset('files/patient.pdf')}}" 
               width="800"
               height="500">
        </object>
                               
                                    
                                    <div class="text-center">
                                        <img src="{{asset('Dashboard/images/ab-logo.png')}}" height="100%" width="100%" class="mb-4" alt=""><br/>
                                       
                                    </div>
                              

                                   
                                      
                                    <div class="new-account mt-3">
                                        <p>Avez-vous une remarque ? <a  style="color:#0083CC " href="{{asset('/register')}}">Contactez-nous</a></p>
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

    <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
   
    
                                   
    

</body>

</html>