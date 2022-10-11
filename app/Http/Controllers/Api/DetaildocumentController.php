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
        $laboratory_id = $request->laboratory_id;
        $document_id = $request->document_id;
        $document = Document::where('id',$document_id)
                              ->where('laboratory_id',$laboratory_id)
                              ->first();
        $detaildocument =  Detaildocument::where('document_id',$document->id)
                                           ->where('id_logiciel')
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

    public function destroy($id_logiciel){
        $detaildocument = Detaildocument::where('id_logiciel',$id_logiciel)->first();
        $detaildocument->delete();
        return $this->sendResponse($detaildocument, 'Detail document was successfully deleted.');
    }
    
}
