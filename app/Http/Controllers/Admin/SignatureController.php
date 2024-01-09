<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignatureRequest;
use Illuminate\Http\Request;
use App\Models\Signature;
use Illuminate\Support\Facades\Auth;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Signature::whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($data);

        return view('admin.signature.grid')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.signature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignatureRequest $request)
    {
        $data = new Signature();

        // ==== Upload Signature
        if (!empty($request->hasFile('upload_signature_doc'))) {
            $image = $request->file('upload_signature_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/signature_doc'), $new_name);

            $image_path = "/UMC_FireNOC/signature_doc" . $image_name;
            $data->upload_signature_doc = $new_name;
        }

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('signature.index')->with('message', 'The application form which you had created has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Signature::whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        return view('admin.signature.view')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Signature::whereNUll('deleted_at')->where('id', $id)->orderBy('id', 'desc')->first();
        // dd($data);

        return view('admin.signature.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SignatureRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SignatureRequest $request, $id)
    {
        $data = Signature::findOrFail($id);

        // ==== Upload Signature
        if (!empty($request->hasFile('upload_signature_doc'))) {
            $image = $request->file('upload_signature_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/signature_doc'), $new_name);

            $image_path = "/UMC_FireNOC/signature_doc" . $image_name;
            $data->upload_signature_doc = $new_name;
        }

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect()->route('signature.index')->with('message', 'The application form which you had updated has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Signature::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('signature.index')->with('message', 'The application form which you had deleted has been done Successfully.');
    }
}
