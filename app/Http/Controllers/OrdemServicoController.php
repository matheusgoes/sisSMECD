<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Quotation;
use App\ordem_servico;
use Datatables;
use View;
use PDF;
use DB;
use Validator;
class OrdemServicoController extends Controller
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
  public function index()
  {
    $ordens = DB::table('ordem_servicos')->get();

    return view('tonners.ordens', [
            "ordens" => $ordens
    ]);
  }

  public function load(){
      return datatables()->of(DB::table('ordem_servicos'))->toJson();
  }

  public function cadastrar()
  {
      $tonners = DB::table('tonners')->get();
      return view('tonners.adicionar_ordem' ,  [
              "tonners" => $tonners]);
  }

  public function save_submit(Request $request)
  {
      $enviados = "";
      $multipleValues = $request->post('enviados');
      $i = 0;
      foreach($multipleValues as $value)
      {
          ($i == 0 ? $enviados = $value: $enviados .= "," . $value);
          $i++;
      }
      $ordem = new ordem_servico;
      $ordem::create([
          'status'             =>  "Enviado",
          'quantidade'         =>  $request->input('quantidade'),
          'tonners_enviados'   =>  $enviados,
          'tonners_recebidos'  =>  0,
          'tonners_entregues'  =>  0,
          'data_envio'         =>  $request->input('data_envio'),
          'data_entrega'       =>  "",
        ]);
      return redirect('/ordens/cadastrar');
  }

  public function delete($id){
    DB::table('ordem_servicos')->where('id',$id)->delete();
    return redirect('/tonners');
  }

  public function editar($id)
  {
    $tonners = DB::table('tonners')->get();
    $ordem = (DB::table('ordem_servicos')->where('id', $id)->get())[0];
    $ordem->tonners_enviados = explode(",", $ordem->tonners_enviados);
    $tonners_enviados =  DB::table('tonners')->whereIn('id', $ordem->tonners_enviados)->get();
    return view('tonners.editar_ordem', [
                  "tonners" => $tonners,
                  "ordem" => $ordem,
                  "enviados" => $tonners_enviados
   ]);
  }

  public function edit_submit(Request $request, $id)
  {
      DB::table('ordem_servicos')
            ->where('id', $id)
            ->update([
              'status'         =>  $request->input('status'),
              'quantidade'      => $request->input('quantidade'),
              'ordens_enviados'   =>  $request->input('ordens_enviados'),
              'ordens_recebidos'      =>  $request->input('ordens_recebidos'),
              'ordens_entregues'       =>  $request->input('ordens_entregues'),
              'data_envio'       =>  $request->input('data_envio'),
              'data_entrega'       =>  $request->input('data_entrega'),
            ]);
      return redirect('/ordens');
  }

  public function generatePDF(){
       $ordens = DB::table('ordem_servicos')->get();

      $pdf = PDF::loadView('pdf.pdf',  [
              "ordens" => $ordens
      ]);
      return $pdf->download('ordens.pdf');
  }

  public function generatePDF2(Request $request, $ids){
       $id_array = explode("-", $ids);
       $ordens = DB::table('ordem_servicos')->whereIn('id', $id_array)->get();

       $pdf = PDF::loadView('pdf.pdf',  [
               "ordens" => $ordens
       ]);
       return $pdf->download('ordens.pdf');
  }
}
