<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detaildocument;
use App\Models\Document;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;

class DocumentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $document = new Document();
        $patient = Patient::where('id_logiciel',$request->id_logiciel)->first();
        $document->patient_id = $patient->id;
        $document->laboratory_id = $request->laboratory_id;
        $document->laboratory_destination_id = $request->laboratory_destination_id;
        $document->id_logiciel= $request->id_logiciel;
        $document->document_name = $request->document_name;
        $document->analyse = $request->analyse;
        $document->flag_etat = $request->flag_etat;
        $document->date = $request->date;
        $document->save();

        $detaildocument = new Detaildocument();
        $detaildocument->document_id = $document->id;
        $detaildocument->rubrique = $request->rubrique;
        $detaildocument->value = $request->value;
        $detaildocument->unite = $request->unite;
        $detaildocument->norme = $request->norme;
        $detaildocument->flag = $request->flag;
        $detaildocument->save();
       
        return $this->sendResponse($document, 'Document was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id_logiciel)
    {       
        $document = Document::find($id_logiciel);
        $patient = Patient::where('id_logiciel',$id_logiciel)->first();
        $document->patient_id = $patient->id;
        $document->laboratory_id = $request->laboratory_id;
        $document->laboratory_destination_id = $request->laboratory_destination_id;
        $document->document_name = $request->document_name;
        $document->analyse = $request->analyse;
        $document->flag_etat = $request->flag_etat;
        $document->date = $request->date;
        $document->save();
        return $this->sendResponse($document, 'Document was successfully updated.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_logiciel)
    {
        $document = Document::find($id_logiciel);
        $document->delete();
        return $this->sendResponse($document, 'Document was successfully deleted.');
    }
}
