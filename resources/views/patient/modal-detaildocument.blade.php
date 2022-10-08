
<style>
  .modal-body{
    height: 350px;
    overflow: hidden;
  }
  .modal-body:hover{overflow-y: auto;}
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
            <div class="col">
              <h5 class="modal-title">{{Str::ucfirst($patient->first_name)}} {{Str::ucfirst($patient->last_name)}}</h5>
              <span>{{$document->date}}</span>
             
            </div>
            </div>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
         </div>
        <div class="modal-body " data-spy="scroll" data-target="#myScrollspy" data-offset="1">
        
        <table class="table ">
          <thead>
            <tr>
              <td>Rubrique</td>
              <td>Résultat</td>
              <td>Unité</td>
              <td>Normes</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
              @foreach($detaildocuments as $detaildocument)
              <tr>
              <td>@if($detaildocument->flag == 0){{$detaildocument->rubrique}} @else <b>{{$detaildocument->rubrique}}@endif</b></td>
              <td>{{$detaildocument->value}}</td>
              <td>{{$detaildocument->unite}}</td>
              <td>{{$detaildocument->norme}}</td>
              <td>@if($detaildocument->flag_norme == 0) Dans les normes @else Hors normes @endif</td>
              </tr>
           
              @endforeach
          </tbody>
          </table>
       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" style="background-color: #4153F1; border-color: #4153F1;" data-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div>
  </div>