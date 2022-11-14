@extends('layouts.dashboard-doctor')

@section('content')

<div class="content-body mt-4" style="margin-left: 0!important;">

	<div class="container">

	      <div class="row page-titles mx-0 ">
                  <div class="col-sm-12 p-md-0 mt-3 d-flex justify-content-center">
                       
                        <select class="selectpicker" data-live-search="true" id="patient-id"  title='sélectionner un patient...' data-width="30%" >
                              @foreach ($patients as $patient)
                              <option value="{{$patient->patient_id}}">{{$patient->getPatient()->first_name}} {{$patient->getPatient()->last_name}} - {{$patient->getPatient()->date_birth}} </option>
                              @endforeach
                        </select>
                  </div>
		</div>
     
		<div class="row mt-2 mx-0">

			<div class="col-md-12 p-md-1">
				<div class="card ">
					<div class="card-header">
                                
						<h4 class="card-title">Liste des analyses : <a href="#" class="badge badge-primary">{{$doctor->first_name}} {{$doctor->last_name}}</a></h4>
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
                                                      <th>Date de naissance</th>
                                                      <th>Analyse</th>
                                                      <th>Date</th>
                                                      <th>Etat</th>
                                                      <th>Action</th>
                                                      </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($documents as $document)
                                                      <tr >
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$document->getPatient()->first_name}} {{$document->getPatient()->last_name}}</td>
                                                      <td>{{$document->getPatient()->date_birth}} </td>
                                                      <td>{{$document->analyse}}</td>
                                                      <td>{{$document->date}}</td>
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

$('#patient-id').on('change', function() {
    window.location.replace("/dashboard-doctor/" + $(this).val());
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