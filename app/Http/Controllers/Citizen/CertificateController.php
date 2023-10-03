<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function fire_noc_certificate($id, $status, $noc_mode){

        return view('citizen.certificate.master_certificate')->with(['noc_mode'=>$noc_mode]);
    }
}
