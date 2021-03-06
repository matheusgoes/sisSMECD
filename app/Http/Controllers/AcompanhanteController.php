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

    public function save_submit(Request $request)
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
            'foto'          =>  $filename,
            'residencia'    =>  $request->input('residencia'),
            'turno'         =>  ($request->input('turno') == "" ? "-----" : $request->input('turno')),
        ]);

        return redirect('/acompanhantes/cadastrar')->with('message','Cadastrado com sucesso!');
    }

    public function delete($id){
      DB::table('acompanhantes')->where('id',$id)->delete();
      return redirect('/acompanhantes');
    }

    public function editar($id)
    {
        $acompanhantes = DB::table('acompanhantes')->where('id', $id)->get();
        return view('acompanhantes.editar_acompanhante', [
                "acompanhante" => $acompanhantes[0]
        ]);
    }

    public function edit_submit(Request $request, $id)
    {
        $filename = "";
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $filename = $request->input('documento').".".$file->getClientOriginalExtension();
            $file->move(public_path('img/fotos/acompanhantes/'), $filename);
        }else{
            $filename = $request->input('documento').".jpg";
        }

        DB::table('acompanhantes')
              ->where('id', $id)
              ->update([
                  'nome'          =>  $request->input('nome'),
                  'doc'           =>  $request->input('documento'),
                  'aluno'         =>  $request->input('aluno'),
                  'rota'          =>  ($request->input('rota') == "" ? "-----" : $request->input('rota')),
                  'foto'          =>  $filename,
                  'residencia'    =>  $request->input('residencia'),
                  'turno'         =>  ($request->input('turno') == "" ? "-----" : $request->input('turno')),
              ]);
        return redirect('/acompanhantes');
    }

    public function generatePDF(){
        $acompanhantes = DB::table('acompanhantes')->get();

        $pdf = PDF::loadView('pdf.pdfAcompanhantes',  [
               "acompanhantes" => $acompanhantes
        ]);

        return $pdf->download('acompanhantes.pdf');
    }

    public function generatePDF2(Request $request, $ids){
           $id_array = explode("-", $ids);
           $acompanhantes = DB::table('acompanhantes')->whereIn('id', $id_array)->get();

           $pdf = PDF::loadView('pdf.pdfAcompanhantes',  [
                  "acompanhantes" => $acompanhantes
           ]);
          return $pdf->download('acompanhantes.pdf');
      }
}
