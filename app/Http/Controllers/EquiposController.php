<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Collection;

use Carbon\Carbon;
use App\Categoria;
use App\Referencia;
use App\Equipo;
use App\Observacion;


class EquiposController extends Controller
{
    public function index(Request $request)
    {   
        
        $categorias = \DB::table('categorias')
        ->select('Categoria', 'id')->get();
        return view('equipos.index',['categorias'=>$categorias]);
    }

    public function insertarCategoria(Request $request)
    {
        $categorias = new Categoria(); 
        $categorias->Categoria=$request->Categoria;
        $categorias->save();
        
        if($categorias->save())
        {
            return back()->with('mensaje','Datos agregados correctamente');
        }
        else{
            return back()->with('mensaje','Datos  no agregados'); 
        }
    }

    public function agregarObservacion($id){
        return view('equipos.crearObservacion',['id'=>$id]);
    }

    public function nuevo()
    {
        $categorias = Categoria::all(); 
        return view('equipos.crear',['categorias'=>$categorias]);
    }

    public function editar($id){
        $json;
        $equipos = Equipo::with('referencias')-> findOrFail($id);
        $json = json_decode($equipos->Cantidad);
        return view('equipos.editar',['equipos'=>$equipos, 'json'=>$json]);
    }

    public function update(Request $request, $id){
        $url; 
        unset($request['_token']);
        $datos = json_encode( $request->input('cantidades', []));

        $equipos = Equipo::with('referencias', 'categorias')->where('id','=', $id)->first();

        $referencias = $equipos->referencias()->first();

        $url = $equipos->categorias->Categoria;
        $referencias->Referencia = $request->referencia;
        $referencias->Marca = $request->marca;
        $referencias->Estado = $request->estado;
        $equipos->Cantidad = $datos;
        $equipos->Ubicacion = $request->ubicacion;
        $referencias->save();
        $equipos->save();
        if($referencias->save() && $equipos->save()){

            return redirect('/equipos/ver_equipo/'.$url.'/'.$id)->with('mensaje', 'Datos Modificados');
        }
        else{

            return redirect('/equipos/ver_equipo/'.$url.'/'.$id)->with('mensaje', 'Datos no Modificados');
        }
    }

    public function busqueda(Request $request, $id){
        $equipos = Equipo::with("referencias")->where('equipos.referencias_id','=', $id)->whereHas('referencias', function(Builder $query) use ($request) {
            $query->where('Referencia','like', '%' . $request->get('equipo') . '%')
            ->orwhere('Marca','like', '%' . $request->get('equipo') . '%');
        })->paginate(5);
        
        if($equipos->count() > 0)
        {
            return view('equipos.equipo',['equipos'=>$equipos]);
        }   
        else{
            
            $equipos->count()=="";
            return back()->with('mensaje', 'No se encontraron los datos esperados');
        }   
    }
    
    public function store(Request $request){

        $ctg = $request->categoria;
        $datos = json_encode( $request->input('cantidades', []));
        $date = Carbon::now('America/Bogota');
        $qr_name = 'QR_'.$date->format('YmdHis');
        $url_imagen= 'assets/qrcodes/'.$qr_name.'.svg';
        $objetos = \DB::table('categorias')->select('Categoria')->where('id','=', $ctg)->get();
        foreach ($objetos as $objeto){

        }
        $objeto->Categoria;

        $referencia = new Referencia();
        $referencia->Referencia=$request->referencia;
        $referencia->Marca=$request->marca;
        $referencia->Estado=$request->estado;
        $referencia->save();
        $rfn =Db::table("referencias")->select('id')->orderby('id','DESC')->first();

        $equipo = new Equipo(); 
        $equipo->Tipo=$request->tipo;
        $equipo->Fecha=$date;
        $equipo->Ubicacion=$request->ubicacion;
        $equipo->Cantidad = $datos;
        $equipo->CodigoQR = $url_imagen;
        $equipo['users_id'] = auth()->user()->id;
        $equipo->referencias_id = $rfn->id;
        $equipo->categorias_id = $ctg;
        $equipo->save();

        $id_equipo=$equipo->id;
        
        //QrCode::size(3000)->format('svg')->generate(url('equipos/ver_equipoqr/'.$objeto->Categoria.'/'.$id_equipo), $url_imagen);

        if($equipo->save() && $referencia->save())
        {
            return back()->with('mensaje','Datos agregados correctamente');
        }
        else
        {
            return back()->with('mensaje','Ha ocudrrido un error al insertar los datos');
        }

    }

    public function equipos(Request $request, $categoria, $id){

        $equipos = Equipo::with('referencias', 'categorias')->where('equipos.categorias_id','=', $id)->paginate(5);
        return view('equipos.equipo', ['equipos' => $equipos]);
    }

    public function verEquipo($categoria, $id){ 

        $json;
        $equipos = Equipo::with('observaciones')->where('id', $id)->orderby('id','DESC')->first();
        //$equipos = Equipo::with('observaciones')->where('id', $id)->get();
        $observaciones = $equipos->observaciones()->paginate(4);
        
        $json = json_decode($equipos->Cantidad);
        return view('equipos.informacionequipo',['equipos'=>$equipos,'observaciones'=>$observaciones, 'json'=>$json]); 

    }


    public function insertarObservacion(Request $request) {

        $url;
        $id=$request->id;
        $date = Carbon::now('America/Bogota');
        $equipos = Equipo::with('observaciones', 'categorias')->where('id','=', $id)->first();
        $url = $equipos->categorias->Categoria;
        
        $observacion = new Observacion();
        $observacion->Observaciones = $request->observacion;
        $observacion->FechaObservacion = $date;
        $observacion->equipos_id = $id;
        $observacion['users_id'] = auth()->user()->id;
        $equipos->save();

        if($observacion->save()){
            return redirect('/equipos/ver_equipo/'.$url.'/'.$id)->with('mensaje', 'Observación guardada');
        }
        else{
            return redirect('/equipos/ver_equipo/'.$url.'/'.$id)->with('mensaje', 'Observacion no guardada');
        }
    }

    public function eliminar($id){

        $eliminarEquipo = Equipo::find($id);
        $eliminarReferencia = Referencia::find($eliminarEquipo->referencias_id);
        $eliminarReferencia->delete();

        if ($eliminarReferencia->Delete()){
            return back()->with('mensaje', 'Datos eliminados');
        }
        else
        {
            return back()->with('mensaje', 'Datos nos eliminados');
        }
    }

    public function ver_qr(Request $request, $categoria,$id){

        $json;
        $equipos = Equipo::with('observaciones')->orderby('id','DESC')->where('id', $id)->first();
        $observaciones = $equipos->observaciones()->paginate(3);

        $json = json_decode($equipos->Cantidad);
        return view('equipos.view-qr', ['equipos' => $equipos,'observaciones'=>$observaciones, 'json'=>$json]);

    }
}
