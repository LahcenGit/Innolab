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
        $document_exist = Document::where('id_logiciel',$request->id_logiciel)->where('laboratory_id',$request->laboratory_id)->first();
        if($document_exist){
            return $this->sendResponse($document_exist, 'The document already existes');
        }
        else{
            $document = new Document();
            $document->token = $request->token;
            $document->patient_id = $request->patient_id;
            $document->doctor_id = $request->doctor_id;
            $document->laboratory_id = $request->laboratory_id;
            $document->laboratory_destination_id = $request->laboratory_destination_id;
            $document->id_logiciel= $request->id_logiciel;
            $document->document_name = $request->document_name;
            $document->analyse = $request->analyse;
            $document->flag_etat = $request->flag_etat;
            $document->date = $request->date;
            $document->save();

            return $this->sendResponse($document, 'Document was successfully created');
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
    public function update(Request $request , $id_logiciel)
    {
        $laboratory_id = $request->laboratory_id;
        $document = Document::where('id_logiciel',$id_logiciel)
                              ->where('laboratory_id',$laboratory_id)
                              ->first();
        $document->patient_id = $request->patient_id;
        $document->laboratory_id = $request->laboratory_id;
        $document->doctor_id = $request->doctor_id;
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
    public function deleteDocument($id_logiciel , $laboratory_id)
    {
        $document = Document::where('id_logiciel',$id_logiciel)->where('laboratory_id',$laboratory_id)->first();
        if($document){
            $document->delete();
            return $this->sendResponse($document, 'Document was successfully deleted.');
        }
        else{
            $document = null;
            return $this->sendResponse($document, 'Document does not exist.');
        }

    }


    public function isExist($id_logiciel , $laboratory_id){
        $document = Document::where('id_logiciel',$id_logiciel)
                            ->where('laboratory_id',$laboratory_id)
                            ->first();

        if($document){
            return $this->sendResponse($document, 'The document exists.');
        }

        else{
            $document = "hind";
            return $this->sendResponse($document,'Document does not exist');
        }
    }
}
