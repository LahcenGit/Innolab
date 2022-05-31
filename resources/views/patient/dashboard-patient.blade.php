@extends('layouts.dashboard-patient')

@section('content')
 

<div class="content-body">

	<div class="container-fluid">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-md-0">
				<div class="welcome-text">
					<h4>Bonjour, Bienvenue!</h4>
					<span>Comptes rendus</span>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">comptes rendus</a></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4">
				<div class="card">
					
					<div class="card-body">
						<div class="text">
							<label class="mb-2"><i class="fa fa-user"></i><strong>    Patient : </strong>  {{$user->nom}} {{$user->prenom}} </label><br>
							<label class="mb-2"><i class="fa fa-calendar"></i><strong>   Date de naissance : </strong>{{$user->date_de_naissance}} </label><br>
							<label class="mb-2"><i class="fa fa-calendar"></i><strong>   Sexe : </strong>{{$user->sexe}} </label><br>
			        </div>
					</div>
					
				</div>
			</div>
		</div>
		<h6 class="card-title">Compte(s) rendu(s) consulté(s)</h6>
		
		@foreach($documents as $document)
		<div class="row">
			<div class="col-xl-8">
				<div class="card">
					
					<div class="card-body">
						<div class="text">
							
							        <label class="mb-1"><strong>Détails de votre consultation : </strong></label> <br>
                                    <label class="mb-1"><strong>Date : </strong> {{$document->date}}</label> <br>
                                    <label class="mb-1"><strong>Analyse : </strong> {{$document->analyse}}</label> <br>

                                    @if($document->etat== 0)
                                     <label class="mb-1"><strong>Etat : </strong> En cours...</label>  <i style="color:#0089c8" class="ml-2 fa fa-circle"></i> <br>
                                    @endif
                                    @if($document->etat == 1)
                                     <label class="mb-1"><strong>Etat : </strong> Attendre le paiement</label>  <i style="color:#e78c03" class="ml-2 fa fa-circle"></i> <br>
                                    @endif
                                    @if($document->etat == 2)
                                     <label class="mb-1"><strong>Etat : </strong> Payé</label>  <i style="color:#00c855" class="ml-2 fa fa-circle"></i> <br>
                                     <div class="center" style="text-align: center;">
                                        <a href="{{asset('files/'.$document->document_name.'.pdf')}}" class="btn btn-primary btn-block mt-4" style="background-color: #0083CC; border-color: #0083CC; padding-top:12px;" >
                                            Affichier le Resultat <i class="ml-2 fa-solid fa-file-lines fa-xl"></i>   </a>
                                    </div>
                                    @endif
						</div>
					</div>
					
				</div>
			</div>
		</div>	
		@endforeach
	</div>
</div>

@endsection