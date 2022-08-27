@extends('layouts.dashboard-patient')

@section('content')
 

@php

function translate($month) {
	if($month == 'January'){
            return 'Janvier';
        }
        if($month == 'February'){
            return 'Février';
        }
        if($month == 'March'){
            return 'Mars';
        }
        if($month == 'April'){
            return 'Avril';
        }
        if($month == 'May'){
            return 'Mai';
        }
        if($month == 'June'){
            return 'Juin';
        }
        if($month == 'July'){
            return 'Juillet';
        }
        if($month == 'August'){
            return 'Aôut';
        }
        if($month == 'September'){
            return 'Septembre';
        }
        if($month == 'October'){
            return 'Octobre';
        }
        if($month == 'November'){
            return 'Novembre';
        }
        if($month == 'December'){
            return 'Décembre';
        }
}
@endphp

<div class="content-body mt-4" style="margin-left: 0!important;">

	<div class="container">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-md-0">
				<div class="welcome-text">
					<h4>{{Str::ucfirst($patient->first_name)}} {{Str::ucfirst($patient->last_name)}} </h4>
					<span> {{$patient->date_birth}}, @if($patient->sexe == 'm') Masculin @else Féminin @endif</span>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('dashboard-patient')}}">Dashboard</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">comptes rendus</a></li>
				</ol>
			</div>
		</div>

		<div class="row mt-2 mx-0">
			<div class="col-md-3 p-md-1 ">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Années</h4>
					</div>
					<div class="card-body">
							@foreach ($years as $year)
							<a href="{{asset('/dashboard-patient/'.$year->year)}}" class="btn btn-outline-primary m-1" style="width: 100%">{{$year->year}}</a>
							@endforeach
			
					</div>
				</div>
			</div>

			<div class="col-md-9 p-md-1">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Compte rendu  <a href="#" class="badge badge-primary">@if($recent_year !="0") {{$recent_year }} @endif </a></h4>
					</div>

					<div class="card-body">
						@if ($recent_year =="0")
					     <p>Aucune consultation disponible</p>	
						@endif
						@foreach ($documents as $document)
							<div style="background: #ebeef6; padding: 1rem;" class="mb-2">
								<h4><a href="#" class="badge badge-danger">{{translate($document[0]->month)}}</a></h4> 
									@foreach ($document as $document)

										<h4 class="mt-3"><strong>{{$document->created_at->format('d-m-Y  H:i')}}</strong></h4>
										<span> <strong>Analyse :</strong> {{$document->analyse}}</span> <br>
										
										@if($document->flag_etat== 0)
										<label class="mb-1"><strong>Etat : </strong> En cours...</label>  <i style="color:#0089c8" class="ml-2 fa-solid fa-circle"></i> <br>
										@endif
										@if($document->flag_etat == 1)
											<label class="mb-1"><strong>Etat : </strong> En attente de paiement</label>  <i style="color:#e78c03" class="ml-2 fa-solid fa-circle"></i> <br>
										@endif
										@if($document->flag_etat == 2)
											<label class="mb-1"><strong>Etat : </strong> Payé</label>  <i style="color:#00c855" class="ml-2 fa-solid fa-circle"></i> <br>
											<div class="center mt-2" >
											<a href="{{asset('files/'.$document->document_name.'.pdf')}}" class="btn btn-primary " style="background-color: #0083CC; border-color: #0083CC; padding-top:12px;" >
												Afficher le Resultat <i class="ml-2 fa-solid fa-file-lines fa-xl"></i>   </a>
												<button data-id="{{$document->id}}" class="btn btn-success detail-document" ><i class="fa fa-eye"></i></button>
											</div>
										@endif
									@endforeach
							</div>
						@endforeach
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div id="modal-detaildocument">

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
			if(res.flag_etat == 0){
				line = '<label class="mb-1"><strong>Etat : </strong> En cours...</label>  <i style="color:#0089c8" class="ml-2 fa fa-circle"></i> <br>'
			}
			if(res.flag_etat == 1){
				line = '<label class="mb-1"><strong>Etat : </strong> Attendre le paiement</label>  <i style="color:#e78c03" class="ml-2 fa fa-circle"></i> <br>'
			}
			else{
				line = '<label class="mb-1"><strong>Etat : </strong> Payé</label>  <i style="color:#00c855" class="ml-2 fa fa-circle"></i> <br>'+
						'<div class="center" style="text-align: center;">'+
						'<a href="" class="btn btn-primary btn-block mt-4" style="background-color: #0083CC; border-color: #0083CC; padding-top:12px;" >Affichier le Resultat <i class="ml-2 fa-solid fa-file-lines fa-xl"></i> </a>'+
					   '</div>'
			}
            data = 
			''
		});
		$('#myTabContent').html(data);
    }
  });
  
});
</script>
@endpush

@push('modal-detaildocument-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".detail-document").click(function() {
  
  var id = $(this).data('id');
 
  $.ajax({
    url: '/detail-document/'+id ,
    type: "GET",
    success: function (res) {
      $('#modal-detaildocument').html(res);
      $("#exampleModal").modal('show');
    }
  });
  
});
</script>
@endpush