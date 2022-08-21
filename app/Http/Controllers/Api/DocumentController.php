<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detaildocument;
use App\Models\Document;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;


class DocumentController extends Controller
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
        $document->document_name = $request->document_name;
        $document->analyse = $request->analyse;
        $document->flag_etat = $request->flag_etat;
        $document->date = $request->date;
        $document->save();
        for($i = 0 ; $i<count($request->rubrique) ; $i++){
        $detaildocument = new Detaildocument();
        $detaildocument->document_id = $document->id;
        $detaildocument->rubrique = $request->rubrique[$i];
        $detaildocument->value = $request->value[$i];
        $detaildocument->unite = $request->unite[$i];
        $detaildocument->norme = $request->norme[$i];
        $detaildocument->flag = $request->flag[$i];
        $detaildocument->save();
        return $document;
        }
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
    public function updateDocument(Request $request)
    {       
            $document = Document::where('document_name',$request->document_name)->first();
            $document->flag_etat = $request->flag_etat;
            $document->save();
            return $document;
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
