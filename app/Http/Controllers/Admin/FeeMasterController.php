<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeMasterRequest;
use App\Models\FeeMaster;
use App\Models\FeeCategory;
use App\Models\FeeBldgHt;
use App\Models\FeeModeOperate;
use App\Models\FeeConstruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeeMaster::with('fee_construction','fee_mode_operate', 'fee_bldg_ht', 'fee_category')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($data);

        return view('admin.noc_fees_chart.fees_master.grid')->with('data', $data);
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

        return view('admin.noc_fees_chart.fees_master.create')->with(['mst_fee_construction' => $mst_fee_construction, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeMasterRequest $request)
    {
        $data = new FeeMaster();
        $data->fee_construction_id = $request->get('fee_construction_id');
        $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');
        $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
        $data->fee_category_id = $request->get('fee_category_id');
        $data->rate = $request->get('rate');
        $data->charges = $request->get('charges');
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_master.index')->with('message', 'The application form which you had created has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FeeMaster::whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        $fee_construction_id = $data->fee_construction_id ;
        // dd($fee_construction_id );

        $mst_fee_mode_operate = FeeModeOperate::select('id', 'operation_mode')->where('fee_construction_id', $fee_construction_id)->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_mode_operate);

        $fee_mode_operate_id = $data->fee_mode_operate_id;
        // dd($fee_mode_operate_id);

        $mst_fee_bldg_hts = FeeBldgHt::select('id', 'building_ht')->where('fee_mode_operate_id', $fee_mode_operate_id)->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_bldg_hts);

        $fee_category_id = $data->fee_category_id;

        $mst_fee_category = FeeCategory::select('id', 'category_name')->where('fee_category_id', $fee_category_id)->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_category);

        return view('admin.noc_fees_chart.fees_master.view')->with(['data'=> $data, 'mst_fee_construction' => $mst_fee_construction, 'mst_fee_mode_operate' => $mst_fee_mode_operate, 'mst_fee_bldg_hts' => $mst_fee_bldg_hts, 'mst_fee_category' => $mst_fee_category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FeeMaster::whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        $fee_construction_id = $data->fee_construction_id ;
        // dd($fee_construction_id );

        $mst_fee_mode_operate = FeeModeOperate::select('id', 'operation_mode')->where('fee_construction_id', $fee_construction_id)->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_mode_operate);

        $fee_mode_operate_id = $data->fee_mode_operate_id;
        // dd($fee_mode_operate_id);

        $mst_fee_bldg_hts = FeeBldgHt::select('id', 'building_ht')->where('fee_mode_operate_id', $fee_mode_operate_id)->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_bldg_hts);

        $fee_category_id = $data->fee_category_id;

        $mst_fee_category = FeeCategory::select('id', 'category_name')->where('fee_bldg_ht_id', $fee_category_id)->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_category);

        return view('admin.noc_fees_chart.fees_master.edit')->with(['data'=> $data, 'mst_fee_construction' => $mst_fee_construction, 'mst_fee_mode_operate' => $mst_fee_mode_operate, 'mst_fee_bldg_hts' => $mst_fee_bldg_hts, 'mst_fee_category' => $mst_fee_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeMasterRequest $request, $id)
    {
        $data = FeeMaster::findOrFail($id);
        $data->fee_construction_id = $request->get('fee_construction_id');
        $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');
        $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
        $data->fee_category_id = $request->get('fee_category_id');
        $data->rate = $request->get('rate');
        $data->charges = $request->get('charges');
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect()->route('fees_master.index')->with('message', 'The application form which you had updated has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FeeMaster::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('fees_master.index')->with('message', 'The application form which you had deleted has been done Successfully.');
    }
}
