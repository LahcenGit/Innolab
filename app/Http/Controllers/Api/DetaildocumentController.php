<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detaildocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Document;


class DetaildocumentController extends BaseController
{
    //
    public function store(Request $request){
        $detaildocument = new Detaildocument();
        $detaildocument->document_id = $request->document_id;
        $detaildocument->id_logiciel = $request->id_logiciel;
        $detaildocument->rubrique = $request->rubrique;
        $detaildocument->value = $request->value;
        $detaildocument->unite = $request->unite;
        $detaildocument->norme = $request->norme;
        $detaildocument->flag = $request->flag;
        $detaildocument->flag_norme = $request->flag_norme;
        $detaildocument->save();
        return $this->sendResponse($detaildocument, 'Detail document was successfully created.');
    }

    public function update(Request $request , $id_logiciel){
        $document_id = $request->document_id;
        $detaildocument =  Detaildocument::where('document_id',$document_id)
                                           ->where('id_logiciel',$id_logiciel)
                                           ->first();
        $detaildocument->document_id = $request->document_id;
        $detaildocument->rubrique = $request->rubrique;
        $detaildocument->value = $request->value;
        $detaildocument->unite = $request->unite;
        $detaildocument->norme = $request->norme;
        $detaildocument->flag = $request->flag;
        $detaildocument->flag_norme = $request->flag_norme;
        $detaildocument->save();
        return $this->sendResponse($detaildocument, 'Detail document was successfully updated.');
    }

    public function destroy($document_id){
      
        $detaildocuments = Detaildocument::where('document_id',$document_id)->delete(); 
        return $this->sendResponse($detaildocuments, 'Details document was successfully deleted.');
        
    }
    

}
