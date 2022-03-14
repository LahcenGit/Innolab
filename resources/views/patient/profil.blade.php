@extends('layouts.dashboard-patient')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Modifier Profil</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil</a></li>
                </ol>
            </div>
        </div>

        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="white-box">
                <div class="user-bg"> 
                    <form class="form-horizontal form-material" action="{{url('/dashboard-patient/profil/'.$user->id)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                    </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body ">
                     <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Username</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="{{$user->username}}"
                                class="form-control" disabled >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Un nouveau mot de passe ? <p style="font-size: 15px; font-weight:450; margin-bottom : -2px;">(Laissez le champ vide si vous souhaitez conserver l'ancien)</p></label>
                            <div>
                                <input id="password" placeholder="Enter new password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary mt-3 text-center" style="background-color:#16B4B7;border-color:#16B4B7;">Enregistrer</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection