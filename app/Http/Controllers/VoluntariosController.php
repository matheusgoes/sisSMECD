<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voluntarios;
use App\Quotation;
use Datatables;
use View;
use PDF;
use DB;


class VoluntariosController extends Controller
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
        $voluntarios = DB::table('voluntarios')->get();

        // return view('voluntarios.voluntarios', [
        //         "voluntarios" => $voluntarios
        // ]);
        //
        return view('voluntarios.voluntarios');
    }

    public function load(){
        return datatables()->of(DB::table('voluntarios'))->toJson();
    }

    public function cadastrar()
    {
        return view('voluntarios.registrar_voluntarios');
    }

    public function save_submit(Request $request)
    {
      $filename = "";

      if ($request->hasFile('photo')) {
          $file = $request->photo;
          $filename = $request->input('documento').".".$file->getClientOriginalExtension();
          $file->move(public_path('img/fotos/voluntarios/'), $filename);
      }else{
          $filename = $request->input('documento').".jpg";
      }

        $voluntario = new Voluntarios;

        $voluntario::create([
            'nome'          =>  $request->input('nome'),
            'doc'           =>  $request->input('documento'),
            'rota'          =>  ($request->input('rota') == "" ? "-----" : $request->input('rota')),
            'foto'          =>  $filename,
            'residencia'    =>  $request->input('residencia'),
            'turno'         =>  ($request->input('turno') == "" ? "-----" : $request->input('turno')),
        ]);

        return redirect('/voluntarios/cadastrar')->with('message','Cadastrado com sucesso!');
    }

    public function editar($id)
    {
        $voluntarios = DB::table('voluntarios')->where('id', $id)->get();
        return view('voluntarios.editar_voluntario', [
                "voluntario" => $voluntarios[0]
        ]);
    }

    public function delete($id){
      DB::table('voluntarios')->where('id',$id)->delete();
      return redirect('/voluntarios');
    }

    public function edit_submit(Request $request, $id)
    {
        $filename = "";
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $filename = $request->input('documento').".".$file->getClientOriginalExtension();
            $file->move(public_path('img/fotos/voluntarios/'), $filename);
        }else{
            $filename = $request->input('documento').".jpg";
        }

        DB::table('voluntarios')
              ->where('id', $id)
              ->update([
                  'nome'          =>  $request->input('nome'),
                  'doc'           =>  $request->input('documento'),
                  'rota'          =>  ($request->input('rota') == "" ? "-----" : $request->input('rota')),
                  'foto'          =>  $filename,
                  'residencia'    =>  $request->input('residencia'),
                  'turno'         =>  ($request->input('turno') == "" ? "-----" : $request->input('turno')),
              ]);
        return redirect('/voluntarios');
    }

    public function generatePDF(){
        $voluntarios = DB::table('voluntarios')->get();

        $pdf = PDF::loadView('pdf.pdfVoluntarios',  [
               "voluntarios" => $voluntarios
        ]);

        return $pdf->download('voluntarios.pdf');
    }

    public function generatePDF2(Request $request, $ids){
         $id_array = explode("-", $ids);
         $voluntarios = DB::table('voluntarios')->whereIn('id', $id_array)->get();
         $pdf = PDF::loadView('pdf.pdfVoluntarios',  [
                "voluntarios" => $voluntarios
         ]);

         return $pdf->download('voluntarios.pdf');
    }
}
