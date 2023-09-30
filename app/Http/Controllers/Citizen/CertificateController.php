<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function fireNocBuisnessCertificate($id, $status){
        return view('citizen.certificate.new_buisness_noc_certificate');
    }

    public function renewFireNocBuisnessCertificate($id, $status){
        return view('citizen.certificate.renew_buisness_noc_certificate');
    }

    public function fireNocBuildingCertificate($id, $status){
        return view('citizen.certificate.new_building_noc_certificate');
    }

    public function renewFireNocBuildingCertificate($id, $status){
        return view('citizen.certificate.renew_building_noc_certificate');
    }

    public function fireNocHospitalCertificate($id, $status){
        return view('citizen.certificate.new_hospital_noc_certificate');
    }

    public function renewFireNocHospitalCertificate($id, $status){
        return view('citizen.certificate.renew_hospital_noc_certificate');
    }
}
