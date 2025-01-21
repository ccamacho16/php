<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sgcc.branch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sgcc.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        $datos = $request->validated();
        $branch = Branch::create($datos);
        return redirect()->route('branch.index')->with('success', 'The branch has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('sgcc.branch.show',compact('branch')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('sgcc.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $datos = $request->validated();

        $d = [
            'name' => $datos['name'],
            'country' => $datos['country'],
            'city' => $datos['city'],
            'address' => $datos['address'],
            'code' => $datos['code'],
            'phones' => $datos['phones'],
            'status' => $datos['status']
        ];

        $branch->update($d);

        return redirect()->route('branch.index')->with('success','successfully upgraded branch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branch.index')->with('success','The branch has been deleted');
    }

    public function destroyindex(Request $request)
    {
        $branch = Branch::find($request->delete_id);
        if ($branch){
            $branch->delete();
            return redirect()->route('branch.index')->with('success','The branch has been deleted');
        } 

    }
}
