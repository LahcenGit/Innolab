@extends('layouts.dashboard-doctor')

@section('content')

<div class="content-body mt-4" style="margin-left: 0!important;">
	<div class="container">
	      <div class="row page-titles mx-0 ">
                  <div class="col-sm-12 p-md-0 mt-3 d-flex justify-content-center">
                  <p> En attentes <span class="badge badge-warning mr-3">{{$document_en_attente}}</span> En cours <span class="badge badge-info mr-3">{{$document_en_cour}}</span> Prêts <span class="badge badge-success mr-3">{{$document_pret}}</span>  Total <span class="badge badge-primary">{{$total}}</span></p>
                  </div>
		</div>
     
		<div class="row mt-2 mx-0">
			<div class="col-md-3 p-md-1 ">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Patients</h4>
					</div>
					<div class="card-body">

                                    @foreach ($patients as $patient)
                                    <a  href="{{asset('/dashboard-doctor/'.$patient->patient_id)}}"id="{{$patient->patient_id}}"  @if($id == $patient->patient_id )  class="btn btn-primary m-1" @else class="btn btn-outline-primary m-1" @endif style="width: 100% ">
                                    @if($patients != null){{$patient->getPatient()->first_name}} {{$patient->getPatient()->last_name}}@endif</a>

                                   
                                    @endforeach

					</div>
				</div>
			</div>

			<div class="col-md-9 p-md-1">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Documents <a href="#" class="badge badge-primary">{{$doctor->first_name}} {{$doctor->last_name}}</a></h4>
					</div>
					<div class="card-body">
                                    @if($documents == null)
                                          <p>Aucun document disponible</p>
                                    @else
                                    <div class="table-responsive">
                                          <table id="example3" class="display" >
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
                                                      @if($document->flag_etat == 1 )
                                                      <td>
                                                      <span class="badge badge-warning">En attente</span>
                                                      </td>
                                                      <td><strong><i class="fa fa-minus"></i></strong></td>
                                                      @elseif($document->flag_etat == 0)
                                                      <td>
                                                      <span class="badge badge-light">En cour</span>
                                                      </td>
                                                      <td><strong><i class="fa fa-minus"></i></strong></td>
                                                      @else
                                                      <td>
                                                      <span class="badge badge-primary">Prêt</span>
                                                      </td>
                                                      <td> <a href="{{asset('files/'.$document->document_name.'.pdf')}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class=" fa-solid fa-file-lines fa-xl"></i></a>
                                                      <button data-id="{{$document->id}}" class="btn btn-success shadow btn-xs sharp mr-1 detail-document" ><i class="fa fa-eye"></i></button></td>
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
<div id="modal-detaildocument">

</div>
@endsection

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