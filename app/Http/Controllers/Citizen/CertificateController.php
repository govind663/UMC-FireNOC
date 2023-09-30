<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function fireNocBuisnessCertificate(){
        return view('citizen.certificate.new_buisness_noc_certificate');
    }

    public function renewFireNocBuisnessCertificate(){
        return view('citizen.certificate.renew_buisness_noc_certificate');
    }

    public function fireNocBuildingCertificate(){
        return view('citizen.certificate.new_building_noc_certificate');
    }

    public function renewFireNocBuildingCertificate(){
        return view('citizen.certificate.renew_building_noc_certificate');
    }

    public function fireNocHospitalCertificate(){
        return view('citizen.certificate.new_hospital_noc_certificate');
    }

    public function renewFireNocHospitalCertificate(){
        return view('citizen.certificate.renew_hospital_noc_certificate');
    }
}
