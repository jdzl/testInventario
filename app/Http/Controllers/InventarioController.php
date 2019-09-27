<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use App\HistoriaInventario;

class InventarioController extends Controller
{
    public function history(){
        // $history = HistoriaInventario::all();
        $history = HistoriaInventario::with('inventario')->get();
        return view('Inventario.history',compact('history'));
    }
    public function sell(Request $request)
    {
        if ($request->method()=='POST') {
            $data = [
                'codigo'=>$request->input('codigo'),
                'precio'=>$request->input('precio'),
                'empresa_cliente'=>$request->input('empresa_cliente'),
                'cantidad'=>$request->input('cantidad'),                                
            ];
            
            $libro = Inventario::find($request->input('codigo'));

            
            $cantidadVendida = $request->input('cantidad');

            if($libro->cantidad < $cantidadVendida){
                $error = "existe ".$libro->cantidad." libros con referencia ".$libro->codigo;
                $libros =Inventario::where('cantidad','>',0)->get();
                 return view("Inventario.sell", compact('libros','error','data')); 
            }                               
          

            HistoriaInventario::create([
                'codigo'=>$request->input('codigo'),
                'precio'=>$request->input('precio'),
                'empresa_cliente'=>$request->input('empresa_cliente'),
                'cantidad'=>$request->input('cantidad')  ,    
                'tipo'=> 1                          
                ]);
                //afectar el stock
                $libro->cantidad -=  $cantidadVendida;
                $libro->save();
                $history = HistoriaInventario::with('inventario')->get();
                return view('Inventario.history',compact('history'));
        }
        $libros =Inventario::where('cantidad','>',0)->get();
      
        return view("Inventario.sell", compact('libros'));
    }
    public function index()
    {
        $items =Inventario::all();
      
        return view("Inventario.index", compact('items'));
    }
    public function isNew($id){
        $item = Inventario::findOrFail($id);        
        return  $item;
    }
    public function create(Request $request)
    {
     if ($request->method()=='POST') {
      
            Inventario::create([
                'codigo'=>$request->input('codigo'),
                'nombre'=>$request->input('nombre'),
                'precio_unidad'=>$request->input('precio_unidad'),
                'cantidad'=>$request->input('cantidad'),
                ]);
                
            HistoriaInventario::create([
                'codigo'=>$request->input('codigo'),
                'precio'=>$request->input('precio_unidad'),
                'empresa_cliente'=> $request->input('nombre'),
                'cantidad'=>$request->input('cantidad')  ,    
                'tipo'=> 0                          
                ]);
            $items =Inventario::all();
      
            return view("Inventario.index", compact('items'));
        }
      
        return view("Inventario.create");
    }
    public function edit(Request $request,$codigo=null)
    {
     if ($request->method()=='POST') {
      
         $data =Inventario::find($request->input('codigo'))->first();

            Inventario::updateOrCreate(['codigo'=>$request->input('codigo')],[               
                'nombre'=>$request->input('nombre'),
                'precio_unidad'=>$request->input('precio_unidad'),
                'cantidad'=>$request->input('cantidad')+ $data->cantidad,
                ]);
            HistoriaInventario::create([
                'codigo'=>$request->input('codigo'),
                'precio'=>$request->input('precio_unidad'),
                'empresa_cliente'=>'',
                'cantidad'=>$request->input('cantidad')  ,    
                'tipo'=> 0                          
                ]);
            $items =Inventario::all();
            return view("Inventario.index",compact('items'));
        }
        $data =Inventario::find($codigo)->first();
      
        return view("Inventario.edit",compact('data'));
    }
    public function search(Request $request)
    {
        

        $history = HistoriaInventario::with('inventario');
        $codigo = $request->input('codigo');
        $created_at = $request->input('fecha');
        if(!isset($codigo) && !isset($created_at)){
            return view('Inventario.search');
        }

        if(isset($codigo)){
            $history = $history->where('codigo',$codigo);
        }
        if(isset($created_at)){
            $history = $history->where('created_at','>=',$created_at);
        }
        $history = $history->get();

        return view('Inventario.search',compact('history'));
    }
}
