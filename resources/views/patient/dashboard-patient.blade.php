@extends('layouts.dashboard-patient')

@section('content')
 

<div class="content-body mt-4" style="margin-left: 0!important;">

	<div class="container">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-md-0">
				<div class="welcome-text">
					<h4>{{Str::ucfirst($user->nom)}} {{Str::ucfirst($user->prenom)}} , 28 ans</h4>
					<span>Masculin</span>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">comptes rendus</a></li>
				</ol>
			</div>
		</div>
		
		<h6 class="card-title ml-2">Compte(s) rendu(s) consulté(s)</h6>

		<div class="card">
			<div class="card-header">
			<h4 class="card-title">2022</h4>
			</div>
			<div class="card-body">
			
			<div class="custom-tab-1">
			<ul class="nav nav-tabs">
			<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#home1"> Juin</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#profile1">Profile</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#contact1"> Contact</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#message1">Message</a>
			</li>
			</ul>
			<div class="tab-content">
			<div class="tab-pane fade" id="home1" role="tabpanel">
			<div class="pt-4">
				<h4>MArdi 02 Juin 2022, 11:30</h4>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
				</p>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
				<h4>This is home title</h4>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
				</p>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
			</p>
			</div>
			</div>
			<div class="tab-pane fade" id="profile1">
			<div class="pt-4">
			<h4>This is profile title</h4>
			<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
			</p>
			<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
			</p>
			</div>
			</div>
			<div class="tab-pane fade active show" id="contact1">
			<div class="pt-4">
			<h4>This is contact title</h4>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
			</p>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
			</p>
			 </div>
			</div>
			<div class="tab-pane fade" id="message1">
			<div class="pt-4">
			<h4>This is message title</h4>
			<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
			</p>
			<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
			</p>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
		
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