<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Repository\CitizenBuildingRepository;
use App\Repository\CitizenBusinessRepository;
use App\Repository\CitizenHospitalRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CitizenHomeController extends Controller
{
    protected $citizenbusinessRepository, $citizenhospitalRepository, $citizenbuildingRepository;

    public function __construct(CitizenBusinessRepository $citizenbusinessRepository, CitizenHospitalRepository $citizenhospitalRepository, CitizenBuildingRepository $citizenbuildingRepository)
    {
        $this->citizenbusinessRepository = $citizenbusinessRepository;
        $this->citizenhospitalRepository = $citizenhospitalRepository;
        $this->citizenbuildingRepository = $citizenbuildingRepository;
    }

    public function Citizen_Home()
    {
        // ==== new_business_noc(Pending)
        $business_total_pending = $this->citizenbusinessRepository->getPendingCitizenBusinessNOC();
        // dd($business_total_pending);

        // ==== new_business_noc(Underprocess)
        $business_total_underprocess = $this->citizenbusinessRepository->getUnderprocessCitizenBusinessNOC();
        // dd($business_total_underprocess);

        // ==== new_business_noc(Unpaid)
        $business_total_unpaid = $this->citizenbusinessRepository->getUnpaidCitizenBusinessNOC();
        // dd($business_total_unpaid);

        // ==== new_business_noc(Paid)
        $business_total_paid = $this->citizenbusinessRepository->getPaidCitizenBusinessNOC();
        // dd($business_total_paid);

        // ==== new_business_noc(Reviewed)
        $business_total_reviewed = $this->citizenbusinessRepository->getReviewedCitizenBusinessNOC();
        // dd($business_total_reviewed);

        // ==== new_business_noc(Approved)
        $business_total_approved = $this->citizenbusinessRepository->getApprovedCitizenBusinessNOC();
        // dd($business_total_approved);

        // ==== new_business_noc(Rejected)
        $business_total_rejected = $this->citizenbusinessRepository->getRejectedCitizenBusinessNOC();
        // dd($business_total_rejected);


        // ==== new_hospital_noc(Pending)
        $hospital_total_pending = $this->citizenhospitalRepository->getPendingCitizenHospitalNOC();
        // dd($hospital_total_pending);

        // ==== new_hospital_noc(Underprocess)
        $hospital_total_underprocess = $this->citizenhospitalRepository->getUnderprocessCitizenHospitalNOC();
        // dd($hospital_total_underprocess);

        // ==== new_hospital_noc(Unpaid)
        $hospital_total_unpaid = $this->citizenhospitalRepository->getUnpaidCitizenHospitalNOC();
        // dd($hospital_total_unpaid);

        // ==== new_hospital_noc(Paid)
        $hospital_total_paid = $this->citizenhospitalRepository->getPaidCitizenHospitalNOC();
        // dd($hospital_total_paid);

        // ==== new_hospital_noc(Reviewed)
        $hospital_total_reviewed = $this->citizenhospitalRepository->getReviewedCitizenHospitalNOC();
        // dd($hospital_total_reviewed);

        // ==== new_hospital_noc(Approved)
        $hospital_total_approved = $this->citizenhospitalRepository->getApprovedCitizenHospitalNOC();
        // dd($hospital_total_approved);

        // ==== new_hospital_noc(Rejected)
        $hospital_total_rejected = $this->citizenhospitalRepository->getRejectedCitizenHospitalNOC();
        // dd($hospital_total_rejected);


        // ==== new_building_noc(Pending)
        $building_total_pending = $this->citizenbuildingRepository->getPendingCitizenBuildingNOC();
        // dd($building_total_pending);


        // ==== new_building_noc(Underprocess)
        $building_total_underprocess = $this->citizenbuildingRepository->getUnderprocessCitizenBuildingNOC();
        // dd($building_total_underprocess);

        // ==== new_building_noc(Unpaid)
        $building_total_unpaid = $this->citizenbuildingRepository->getUnpaidCitizenBuildingNOC();
        // dd($building_total_unpaid);

        // ==== new_building_noc(Paid)
        $building_total_paid = $this->citizenbuildingRepository->getPaidCitizenBuildingNOC();
        // dd($building_total_paid);

        // ==== new_building_noc(Reviewed)
        $building_total_reviewed = $this->citizenbuildingRepository->getReviewedCitizenBuildingNOC();
        // dd($building_total_reviewed);

        // ==== new_building_noc(Approved)
        $building_total_approved = $this->citizenbuildingRepository->getApprovedCitizenBuildingNOC();
        // dd($building_total_approved);

        // ==== new_building_noc(Rejected)
        $building_total_rejected = $this->citizenbuildingRepository->getRejectedCitizenBuildingNOC();
        // dd($building_total_rejected);

        return view('citizen.citizen_dashboard')
        ->with(['business_total_pending' => $business_total_pending, 'business_total_underprocess' => $business_total_underprocess, 'business_total_unpaid' => $business_total_unpaid,'business_total_paid' => $business_total_paid, 'business_total_reviewed' => $business_total_reviewed, 'business_total_rejected' => $business_total_rejected, 'business_total_approved' => $business_total_approved])
        ->with(['hospital_total_pending' => $hospital_total_pending, 'hospital_total_underprocess' => $hospital_total_underprocess, 'hospital_total_unpaid' => $hospital_total_unpaid,'hospital_total_paid' => $hospital_total_paid, 'hospital_total_reviewed' => $hospital_total_reviewed, 'hospital_total_rejected' => $hospital_total_rejected, 'hospital_total_approved' => $hospital_total_approved])
        ->with(['building_total_pending' => $building_total_pending, 'building_total_underprocess' => $building_total_underprocess, 'building_total_unpaid' => $building_total_unpaid,'building_total_paid' => $building_total_paid, 'building_total_reviewed' => $building_total_reviewed, 'building_total_rejected' => $building_total_rejected, 'building_total_approved' => $building_total_approved]);
    }
}
