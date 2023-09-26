<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeBldgHtRequest;
use App\Models\FeeBldgHt;
use App\Models\FeeModeOperate;
use App\Models\FeeConstruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeBldgHtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeeBldgHt::with('fee_construction','fee_mode_operate')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($data);

        return view('admin.noc_fees_chart.fees_bldg_ht.grid')->with('data', $data);
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

        return view('admin.noc_fees_chart.fees_bldg_ht.create')
        ->with(['mst_fee_construction' => $mst_fee_construction, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeBldgHtRequest $request)
    {
        $data = new FeeBldgHt();
        $data->fee_construction_id = $request->get('fee_construction_id');
        $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');
        $data->building_ht = $request->get('building_ht');
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_bldg_ht.index')->with('message', 'The application form which you had created has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FeeBldgHt::with('fee_construction','fee_mode_operate')->whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        $mst_fee_mode_operator = FeeModeOperate::select('id', 'operation_mode')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_mode_operator);

        return view('admin.noc_fees_chart.fees_bldg_ht.view')
        ->with('data', $data)
        ->with('mst_fee_construction', $mst_fee_construction)
        ->with('mst_fee_mode_operator', $mst_fee_mode_operator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FeeBldgHt::with('fee_construction','fee_mode_operate')->whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        $mst_fee_mode_operator = FeeModeOperate::select('id', 'operation_mode')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_mode_operator);

        return view('admin.noc_fees_chart.fees_bldg_ht.edit')
        ->with('data', $data)
        ->with('mst_fee_construction', $mst_fee_construction)
        ->with('mst_fee_mode_operator', $mst_fee_mode_operator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeBldgHtRequest $request, $id)
    {
        $data = FeeBldgHt::findOrFail($id);
        $data->fee_construction_id = $request->get('fee_construction_id');
        $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');
        $data->building_ht = $request->get('building_ht');
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_bldg_ht.index')->with('message', 'The application form which you had updated has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FeeBldgHt::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('fees_bldg_ht.index')->with('message', 'The application form which you had deleted has been done Successfully.');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function FetchOperationMode(Request $request)
    {
        $data['mode_of_operation'] = FeeModeOperate::select('id', 'operation_mode')
                                        ->where("fee_construction_id", $request->fee_construction_id)
                                        ->whereNUll('deleted_at')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return response()->json($data);
    }
}
