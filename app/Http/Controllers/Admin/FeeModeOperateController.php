<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeModeOperateRequest;
use App\Models\FeeModeOperate;
use App\Models\FeeConstruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeModeOperateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeeModeOperate::with('fee_construction')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($data);

        return view('admin.noc_fees_chart.fees_mode_operate.grid')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        return view('admin.noc_fees_chart.fees_mode_operate.create')->with('mst_fee_construction', $mst_fee_construction);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeModeOperateRequest $request)
    {
        $data = new FeeModeOperate();
        $data->fee_construction_id = $request->get('fee_construction_id');
        $data->operation_mode = $request->get('operation_mode');
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_mode_operate.index')->with('message', 'The application form which you had created has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FeeModeOperate::with('fee_construction')->whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        return view('admin.noc_fees_chart.fees_mode_operate.view')->with('data', $data)->with('mst_fee_construction', $mst_fee_construction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FeeModeOperate::with('fee_construction')->whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        return view('admin.noc_fees_chart.fees_mode_operate.edit')->with('data', $data)->with('mst_fee_construction', $mst_fee_construction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeModeOperateRequest $request, $id)
    {
        $data = FeeModeOperate::findOrFail($id);
        $data->fee_construction_id = $request->get('fee_construction_id');
        $data->operation_mode = $request->get('operation_mode');
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_mode_operate.index')->with('message', 'The application form which you had updated has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FeeModeOperate::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('fees_mode_operate.index')->with('message', 'The application form which you had deleted has been done Successfully.');
    }
}
