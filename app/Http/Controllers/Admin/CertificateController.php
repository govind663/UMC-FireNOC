<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function fireNocBuisnessCertificate(){
        return view('admin.certificate.new_buisness_noc_certificate');
    }

    public function renewFireNocBuisnessCertificate(){
        return view('admin.certificate.renew_buisness_noc_certificate');
    }

    public function fireNocBuildingCertificate(){
        return view('admin.certificate.new_building_noc_certificate');
    }

    public function renewFireNocBuildingCertificate(){
        return view('admin.certificate.renew_building_noc_certificate');
    }

    public function fireNocHospitalCertificate(){
        return view('admin.certificate.new_hospital_noc_certificate');
    }

    public function renewFireNocHospitalCertificate(){
        return view('admin.certificate.renew_hospital_noc_certificate');
    }
}
