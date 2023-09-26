<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeConstruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FeeConstructionRequest;

class FeeConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeeConstruction::whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($data);

        return view('admin.noc_fees_chart.fees_construction.grid')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noc_fees_chart.fees_construction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeConstructionRequest $request)
    {
        $data = new FeeConstruction();
        $data->construction_type = $request->get('construction_type');
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_construction.index')->with('message', 'The application form which you had created has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FeeConstruction::whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        return view('admin.noc_fees_chart.fees_construction.view')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FeeConstruction::whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        return view('admin.noc_fees_chart.fees_construction.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeConstructionRequest $request, $id)
    {
        $data = FeeConstruction::findOrFail($id);
        $data->construction_type = $request->get('construction_type');
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_construction.index')->with('message', 'The application form which you had updated has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FeeConstruction::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('fees_construction.index')->with('message', 'The application form which you had deleted has been done Successfully.');
    }
}
