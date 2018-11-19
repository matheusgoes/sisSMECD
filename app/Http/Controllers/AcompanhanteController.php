<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\acompanhante;
use App\Quotation;
use Datatables;
use View;
use PDF;
use DB;



class AcompanhanteController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $acompanhantes = DB::table('acompanhantes')->get();

        // return view('acompanhantes.acompanhantes', [
        //         "acompanhantes" => $acompanhantes
        // ]);
        //
        return view('acompanhantes.acompanhantes');
    }

    public function load(){
        return datatables()->of(DB::table('acompanhantes'))->toJson();
    }

    public function cadastrar()
    {
        return view('acompanhantes.registrar_acompanhante');
    }

    public function submit(Request $request)
    {
      $filename = "";

      if ($request->hasFile('photo')) {
          $file = $request->photo;
          $filename = $request->input('documento').".".$file->getClientOriginalExtension();
          $file->move(public_path('img/fotos/acompanhantes/'), $filename);
      }else{
          $filename = $request->input('documento').".jpg";
      }

        $acompanhante = new acompanhante;

        $acompanhante::create([
            'nome'          =>  $request->input('nome'),
            'doc'           =>  $request->input('documento'),
            'aluno'         =>  $request->input('aluno'),
            'rota'          =>  ($request->input('rota') == "" ? "-----" : $request->input('rota')),
            'foto'        =>    $filename,
            'residencia'    =>  $request->input('residencia'),
            'turno'         =>  ($request->input('turno') == "" ? "-----" : $request->input('turno')),
        ]);

        return redirect('/acompanhantes/cadastrar')->with('message','Cadastrado com sucesso!');
    }

    public function generatePDF(){
        $acompanhantes = DB::table('acompanhantes')->get();

        $pdf = PDF::loadView('pdf.pdfAcompanhantes',  [
               "acompanhantes" => $acompanhantes
        ]);
        return $pdf->download('acompanhantes.pdf');
    }
}
