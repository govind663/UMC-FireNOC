<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function fireNocBuisnessInvoice(){
        return view('citizen.invoice.new_buisness_noc_invoice');
    }

    public function renewFireNocBuisnessInvoice(){
        return view('citizen.invoice.renew_buisness_noc_invoice');
    }

    public function fireNocBuildingInvoice(){
        return view('citizen.invoice.new_building_noc_invoice');
    }

    public function renewFireNocBuildingInvoice(){
        return view('citizen.invoice.renew_building_noc_invoice');
    }

    public function fireNocHospitalInvoice(){
        return view('citizen.invoice.new_hospital_noc_invoice');
    }

    public function renewFireNocHospitalInvoice(){
        return view('citizen.invoice.renew_hospital_noc_invoice');
    }
}
