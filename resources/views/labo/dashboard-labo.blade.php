@extends('layouts.dashboard-labo')

@section('content')


<div class="content-body mt-4" style="margin-left: 0!important;">

	<div class="container">
		<div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
       <div class="welcome-text">
         <p> Documents En Attentes : &nbsp;  &nbsp; <b>{{$document_en_attente}}</b><br>Documents Prêts :&nbsp;  &nbsp;<b>{{$document_pret}}</b><br>Total :&nbsp;  &nbsp;<b>{{$total}}</b></p>
       </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('dashboard-labo')}}">Dashboard</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Les documents</a></li>
				</ol>
			</div>
		</div>
     
		<div class="row mt-2 mx-0">
			<div class="col-md-3 p-md-1 ">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Les Laboratoires</h4>
					</div>
					<div class="card-body">
							@foreach ($labos as $labo)
							<a href="{{asset('/dashboard-labo/'.$labo->laboratory_id)}}" class="btn btn-outline-primary m-1" style="width: 100%">@if($documents != null){{$labo->getLabo()->designation}}@endif</a>
							@endforeach
			
					</div>
				</div>
			</div>

			<div class="col-md-9 p-md-1">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Les documents</h4>
					</div>

					<div class="card-body">
              @if($documents == null)
					     <p>Aucun document disponible</p>
               @else
                  <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                  <tr>
                                  <th>#</th>
                                  <th>Patient</th>
                                  <th>Analyse</th>
                                  <th>Etat</th>
                                  <th>Action</th>
                                  </tr>
                             </thead>
                              <tbody>
                                @foreach($documents as $document)
                                    <tr >
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$document->getPatient()->first_name}} {{$document->getPatient()->last_name}}</td>
                                        <td>{{$document->analyse}}</td>
                                       @if($document->flag_etat == 0)
                                        <td>
                                        <span class="badge badge-warning">En attente</span>
                                        </td>
                                        <td>--------</td>
                                        @else
                                        <td>
                                        <span class="badge badge-primary">Prêt</span>
                                        </td>
                                        <td> <a href="{{asset('files/'.$document->document_name.'.pdf')}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class=" fa-solid fa-file-lines fa-xl"></i></a></td>
                                        @endif
                                     </tr>
                                @endforeach
                                </tbody>
                          </table>
                    </div>
                 @endif
            </div>
					</div>
				</div>
			</div>
		</div>
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