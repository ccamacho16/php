<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Category;
use App\Models\FormData;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Buscar como query builder laravel
        //$clients = Client::orderByDesc('id')->select('dni','name','last_name','phones')->get();
        /* $clients = Client::orderByDesc('id')->get();
        return view('sgcc.client.index',compact('clients')); */
        return view('sgcc.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sgcc.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {

        $datos = $request->validated();
        $client = Client::create($datos);
        /* falta validar dni unico */

        /* return redirect()->route('sgcc.client.index')->with('success', 'The client has been created'); */
        return redirect()->route('client.index')->with('success', 'The client has been created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

        return view('sgcc.client.show',compact('client')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('sgcc.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {

        $datos = $request->validated();

        $d = [
            /* 'dni' => $datos['dni'], */
            //'city' => $datos['city'],
            'name' => $datos['name'],
            'last_name' => $datos['last_name'],
            'sex' => $datos['sex'],
            'birth_date' => $datos['birth_date'],            
            'home_address' => $datos['home_address'],
            'business_address' => $datos['business_address'],
            'phones' => $datos['phones'],
            'email' => $datos['email'],
            //'type' => $datos['type'],
            'job' => $datos['job'],
            'status' => $datos['status']
        ];

        $client->update($d);

        return redirect()->route('client.index')->with('success','successfully upgraded client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index')->with('success','The client has been deleted');
    }

    public function destroyindex(Request $request)
    {
        $client = Client::find($request->delete_id);
        if ($client){
            $client->delete();
            return redirect()->route('client.index')->with('success','The client has been deleted');
        } 
    }

    public function mostrar()
    {
        //return "hola";
        return view('sgcc.client.prueba'); 
    }

    public function getData(){
        $category = Category::all();
        return response()->json($category);
    }

    public function getDataPro($id){
        $products = Product::where('category_id',$id)->get();
        return response()->json($products);
    }

    public function senddat(Request $request){

        $categoria = new Category();
        $categoria->name = $request->input('name');
        $categoria->description = $request->input('description');
        $categoria->status = $request->input('status');
        
        $categoria->save(); 

        //se visualiza en "logs/laravel.log"
        //Log::info('Nombre recibido del formulario: ' . $nombre);

        return response()->json(['message' => 'Formulario enviado correctamente xyz']);

    }
}

/* 
        1. revisar update, "The dni has already been taken." para el update
        2. habilitar el campo status para la opcion de edit
        3. revisar old de items que son combo ** FALTA JOB
        4. revisar mensajes de confirmacion de cambio
        5. unificar los componentes (table, botons)
        6. trabajar en la table: filtros, buscar, etc
        7. adicionar la opcion de atras, en las opcions de create y update.
        8. mejorar la busqueda 
        10. mejorar el view
        11. orden columna        

        13. utilizar iconos locales para la columna options
14. Convertir la primera letra a mayuscula o que todo se registre en mayuscula
15. Cargar todos los trabajos
15. Cargar todas las ciudades



*/
