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

  public function load_tonners(){
      return datatables()->of(DB::table('tonners'))->toJson();
  }

  public function cadastrar_load(){
      return datatables()->of(DB::table('ordem_servicos'))->toJson();
  }

  public function cadastrar()
  {
      $tonners = DB::table('tonners')->orderBy('id')->get();
      return view('tonners.adicionar_ordem' ,  [
              "tonners" => $tonners]);
  }

  public function save_submit(Request $request)
  {
      $enviados = "";
      $qtds = "";
      $ids = $request->post('ids');
      $qtd = $request->post('qtd');
      $j = 0;
      for ($i=0; $i < sizeOf($ids); $i++) {
          if ($qtd[$i] != null) {
              if ($j == 0)
              {
                $enviados = $ids[$i];
                $qtds     = $qtd[$i];
                $j++;
              }else{
                $enviados .= "," . $ids[$i];
                $qtds     .= "," . $qtd[$i];
                $j++;
              };
          }
      }

      $ordem = new ordem_servico;
      $ordem::create([
          'status'             =>   "Enviado",
          'tonners_enviados'   =>   $enviados,
          'qtd_enviado'        =>   $qtds,
          'qtd_entregue'       =>   0,
          'qtd_recebido'       =>   0,
          'tonners_recebidos'  =>   0,
          'tonners_entregues'  =>   0,
          'data_envio'         =>   $request->input('data_envio'),
          'data_entrega'       =>   "",
          'obs'       =>  $request->input('obs'),
        ]);
      return redirect('/ordens/cadastrar');
  }

  public function delete($id){
    DB::table('ordem_servicos')->where('id',$id)->delete();
    return redirect('/tonners');
  }

  public function editar($id)
  {
    $tonners = DB::table('tonners')->orderBy('id')->get();
    $ordem = (DB::table('ordem_servicos')->where('id', $id)->get())[0];

    $ordem->tonners_enviados = explode(",", $ordem->tonners_enviados);
    $qtd_enviado = explode(",", $ordem->qtd_enviado);
    $tonners_enviados =  DB::table('tonners')->whereIn('id', $ordem->tonners_enviados)->get();
    $ids_env = DB::table('tonners')->select('id')->whereIn('id', $ordem->tonners_enviados)->get();
    $ids_enviados = [];
    foreach ($ids_env as $item){
      $ids_enviados[] = $item->id;
    }

    $ordem->tonners_recebidos = explode(",", $ordem->tonners_recebidos);
    $qtd_recebido = explode(",", $ordem->qtd_recebido);
    $tonners_recebidos =  DB::table('tonners')->whereIn('id', $ordem->tonners_recebidos)->get();
    $ids_rec = DB::table('tonners')->select('id')->whereIn('id', $ordem->tonners_recebidos)->get();
    $ids_recebidos = [];
    foreach ($ids_rec as $item){
      $ids_recebidos[] = $item->id;
    }

    $ordem->tonners_entregues = explode(",", $ordem->tonners_entregues);
    $qtd_entregue = explode(",", $ordem->qtd_entregue);
    $tonners_entregues =  DB::table('tonners')->whereIn('id', $ordem->tonners_entregues)->get();
    $ids_ent = DB::table('tonners')->select('id')->whereIn('id', $ordem->tonners_entregues)->get();
    $ids_entregues = [];
    foreach ($ids_ent as $item){
      $ids_entregues[] = $item->id;
    }

    return view('tonners.editar_ordem', [
                  "tonners"         =>  $tonners,
                  "ordem"           =>  $ordem,
                  "enviados"        =>  $tonners_enviados,
                  "recebidos"       =>  $tonners_recebidos,
                  "entregues"       =>  $tonners_entregues,
                  "ids_enviados"    =>  $ids_enviados,
                  "ids_recebidos"   =>  $ids_recebidos,
                  "ids_entregues"   =>  $ids_entregues,
                  "qtd_enviado"    =>  $qtd_enviado,
                  "qtd_recebido"   =>  $qtd_recebido,
                  "qtd_entregue"   =>  $qtd_entregue
               ]);
  }

  public function edit_submit(Request $request, $id)
  {

      $ids_enviados = "";       $qtd_enviados = "";
      $ids_recebidos = "";      $qtd_recebidos = "";
      $ids_entregues = "";      $qtd_entregues = "";

      $ids_env = $request->post('ids_enviados');
      $qtd_env = $request->post('qtd_enviados');

      $ids_rec = $request->post('ids_recebidos');
      $qtd_rec = $request->post('qtd_recebidos');

      $ids_ent = $request->post('ids_entregues');
      $qtd_ent = $request->post('qtd_entregues');

        $j = 0;
        for ($i=0; $i < sizeOf($ids_env); $i++) {
            if ($qtd_env[$i] != null) {
                if ($j == 0)
                {
                  $ids_enviados = $ids_env[$i];
                  $qtd_enviados = $qtd_env[$i];
                  $j++;
                }else{
                  $ids_enviados .= "," . $ids_env[$i];
                  $qtd_enviados .= "," . $qtd_env[$i];
                  $j++;
                };
            }
        }

        $j = 0;
        for ($i=0; $i < sizeOf($ids_rec); $i++) {
            if ($qtd_rec[$i] != null) {
                if ($j == 0)
                {
                  $ids_recebidos = $ids_rec[$i];
                  $qtd_recebidos = $qtd_rec[$i];
                  $j++;
                }else{
                  $ids_recebidos .= "," . $ids_rec[$i];
                  $qtd_recebidos .= "," . $qtd_rec[$i];
                  $j++;
                };
            }
        }

        $j = 0;
        for ($i=0; $i < sizeOf($ids_ent); $i++) {
            if ($qtd_ent[$i] != null) {
                if ($j == 0)
                {
                  $ids_entregues = $ids_ent[$i];
                  $qtd_entregues = $qtd_ent[$i];
                  $j++;
                }else{
                  $ids_entregues .= "," . $ids_ent[$i];
                  $qtd_entregues .= "," . $qtd_ent[$i];
                  $j++;
                };
            }
        }

      DB::table('ordem_servicos')
            ->where('id', $id)
            ->update([
              'status'            =>  $request->input('status'),
              'tonners_enviados'   =>  $ids_enviados,
              'tonners_recebidos'  =>  $ids_recebidos,
              'tonners_entregues'  =>  $ids_entregues,
              'data_envio'        =>  $request->input('data_envio'),
              'data_entrega'      =>  $request->input('data_entrega'),
              'obs'               =>  $request->input('obs'),
              'qtd_enviado'       =>  $qtd_enviados,
              'qtd_recebido'      =>  $qtd_recebidos,
              'qtd_entregue'      =>  $qtd_entregues,
            ]);
      return redirect('/tonners');
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
