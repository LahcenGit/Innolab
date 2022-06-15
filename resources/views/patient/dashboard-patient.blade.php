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

		@foreach($yearsDocuments as $yearsDocument)
		<div class="card">
			<div class="card-header">
			<h4 class="card-title">{{$yearsDocument->year}}</h4>
			</div>
			<div class="card-body">
			<div class="default-tab">
			<ul class="nav nav-tabs">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				@foreach($monthDocuments as $monthDocument)
				@if($monthDocument->year == $yearsDocument->year)
					<li class="nav-item" role="presentation">
						<button class="nav-link checkmonth" month="{{$monthDocument->month}}" year="{{$yearsDocument->year}}" id="{{'home-tab-'.$loop->iteration}}" data-bs-toggle="tab" data-bs-target="#home" type="button" 
							role="tab" aria-controls="home" aria-selected="false">{{$monthDocument->created_at->format('F')}}</button>
					</li>
				@endif
			   @endforeach
				</ul>
			</ul>
			<div class="tab-content myTabContent">
				<div class="tab-pane fade show active mt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<span> <strong>Date :</strong> 12.06.2021</span> <br>
					<span> <strong>Analyse :</strong> Fns</span> <br>
					<label class="mb-1"><strong>Etat : </strong> En cours...</label>  <i style="color:#0089c8" class="ml-2 fa-solid fa-circle"></i> <br>
					<a href="{{asset('filespdf')}}" class="btn btn-primary btn-block mt-4 col-md-4" style="background-color: #0083CC; border-color: #0083CC; padding-top:12px;" >
						Affichier le Resultat <i class="fa-solid fa-circle"></i>  </a>
				</div>
			</div>
		</div>
		</div>
		</div>
		@endforeach
	</div>
</div>

@endsection

@push('consultation-detail')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(".checkmonth").on('click',function() {
   
	var month = $(this).attr("month");
    var year = $(this).attr("year");
	var data ="";
  $.ajax({
    url: '/consultation-detail/'+month+'/'+year,
    type: "GET",
    success: function (res) {
		$.each(res, function(i, res) {
			if(res.etat == 0){
				line = '<label class="mb-1"><strong>Etat : </strong> En cours...</label>  <i style="color:#0089c8" class="ml-2 fa fa-circle"></i> <br>'
			}
			if(res.etat == 1){
				line = '<label class="mb-1"><strong>Etat : </strong> Attendre le paiement</label>  <i style="color:#e78c03" class="ml-2 fa fa-circle"></i> <br>'
			}
			else{
				line = '<label class="mb-1"><strong>Etat : </strong> Payé</label>  <i style="color:#00c855" class="ml-2 fa fa-circle"></i> <br>'+
						'<a  class="btn btn-primary btn-block mt-4 col-md-4" style="background-color: #0083CC; border-color: #0083CC; padding-top:12px;" >Affichier le Resultat <i class="fa-solid fa-circle"></i>  </a>'
						
			}
            data = data + '<div class="tab-pane fade show active mt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">'+
					'<span> <strong>Date :</strong>' +res.date+ '</span> <br>'+
					'<span> <strong>Analyse :</strong>' +res.analyse+ '</span> <br>'+
					  line+
				    '</div>'
			
		});
		$('.myTabContent').html(data);
    }
  });
  
});
</script>
@endpush