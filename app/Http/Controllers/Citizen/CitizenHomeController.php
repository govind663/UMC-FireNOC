<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitizenHomeController extends Controller
{
    public function Citizen_Home()
    {
        return view('citizen.citizen_dashboard');
    }
}
