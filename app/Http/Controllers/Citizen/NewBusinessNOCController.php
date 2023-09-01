<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewBusinessNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citizen.business_noc.new_business_noc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'stage_id' => 'required',
            'research_type' => 'required',
            'period_from' => 'required',
            'period_to' => 'required',
            'subject' => 'required',
            'guide' => 'required',
            'hod' => 'required',
            'research' => 'required',
            'document1' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'document2' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

        ], [
            'stage_id.required' => 'Stage Name is required',
            'research_type.required' => 'Research Type  is required',
            'period_from.required' => 'From Date is required',
            'period_to.required' => 'To Date is required',
            'subject.required' => 'Subject of Research is required',
            'guide.required' => 'Guide Name is required',
            'hod.required' => 'HOD Name is required',
            'research.required' => 'Research Details is required',
            'document1.required' => 'File is required',
            'document1.max' => 'The file size should be less than 2MB.',
            'document1.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'document2.required' => 'File is required',
            'document2.max' => 'The file size should be less than 2MB.',
            'document2.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

        ]);

        $data = new Progress_Work_Details();

        // ==== Upload Progress Work Document Stores
        if (!empty($request->hasFile('document1'))) {
            $image = $request->file('document1');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/BARTI_Fellowship/Progress_Work_Document/document1'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/" . $image_name;
            $data->document1 = $new_name;
        }

        $data->stud_id = Auth::user()->id;
        $data->stage_id = $request->get('stage_id');
        $data->research_type = $request->get('research_type');
        $data->period_from = $request->get('period_from');
        $data->period_to = $request->get('period_to');
        $data->subject = $request->get('subject');
        $data->hod = $request->get('hod');
        $data->guide = $request->get('guide');
        $data->research = $request->get('research');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('progress_work_details.index')->with('message', 'Your Record Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
