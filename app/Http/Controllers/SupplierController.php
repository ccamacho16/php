<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sgcc.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sgcc.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $datos = $request->validated();
        $supplier = Supplier::create($datos);
        return redirect()->route('supplier.index')->with('success', 'The supplier has been created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('sgcc.supplier.show',compact('supplier')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('sgcc.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $datos = $request->validated();

        $d = [
            /* 'tin' => $datos['tin'], */
            'name' => $datos['name'],
            'address' => $datos['address'],
            'city' => $datos['city'],
            'phones' => $datos['phones'],
            'email' => $datos['email'],
            'account' => $datos['account'],
            'contact' => $datos['contact'],
            'status' => $datos['status']
        ];

        $supplier->update($d);

        return redirect()->route('supplier.index')->with('success','successfully upgraded supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success','The supplier has been deleted');
    }

    public function destroyindex(Request $request)
    {
        $supplier = Supplier::find($request->delete_id);
        if ($supplier){
            $supplier->delete();
            return redirect()->route('supplier.index')->with('success','The supplier has been deleted');
        } 
    }    
}
