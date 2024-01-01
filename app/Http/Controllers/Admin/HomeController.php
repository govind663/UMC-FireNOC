<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\BuildingRepository;
use App\Repository\BusinessRepository;
use App\Repository\HomeRepository;
use App\Repository\HospitalRepository;

class HomeController extends Controller
{
    protected $homeRepository, $businessRepository, $hospitalRepository, $buildingRepository;

    public function __construct(HomeRepository $homeRepository, BusinessRepository $businessRepository, HospitalRepository $hospitalRepository, BuildingRepository $buildingRepository)
    {
        $this->homeRepository = $homeRepository;
        $this->businessRepository = $businessRepository;
        $this->hospitalRepository = $hospitalRepository;
        $this->buildingRepository = $buildingRepository;
    }

    public function Admin_Home()
    {
        // ==== Total Citizen
        $total_citizen = $this->homeRepository->getTotalCitizen();
        // dd($total_citizen);

        // ==== new_business_noc(Pending)
        $business_total_pending = $this->businessRepository->getPendingBusinessNOC();
        // dd($business_total_pending);

        // ==== new_business_noc(Underprocess)
        $business_total_underprocess = $this->businessRepository->getUnderprocessBusinessNOC();
        // dd($business_total_underprocess);

        // ==== new_business_noc(Unpaid)
        $business_total_unpaid = $this->businessRepository->getUnpaidBusinessNOC();
        // dd($business_total_unpaid);

        // ==== new_business_noc(Generated Invoice)
        $business_total_generated_invoice = $this->businessRepository->getGeneratedInvoiceBusinessNOC();
        // dd($business_total_generated_invoice);

        // ==== new_business_noc(Paid)
        $business_total_paid = $this->businessRepository->getPaidBusinessNOC();
        // dd($business_total_paid);

        // ==== new_business_noc(Reviewed)
        $business_total_reviewed = $this->businessRepository->getReviewedBusinessNOC();
        // dd($business_total_reviewed);

        // ==== new_business_noc(Approved)
        $business_total_approved = $this->businessRepository->getApprovedBusinessNOC();
        // dd($business_total_approved);

        // ==== new_business_noc(Rejected)
        $business_total_rejected = $this->businessRepository->getRejectedBusinessNOC();
        // dd($business_total_rejected);




        // ==== new_hospital_noc(Pending)
        $hospital_total_pending = $this->hospitalRepository->getPendingHospitalNOC();
        // dd($hospital_total_pending);

        // ==== new_hospital_noc(Underprocess)
        $hospital_total_underprocess = $this->hospitalRepository->getUnderprocessHospitalNOC();
        // dd($hospital_total_underprocess);

        // ==== new_hospital_noc(Unpaid)
        $hospital_total_unpaid = $this->hospitalRepository->getUnpaidHospitalNOC();
        // dd($hospital_total_unpaid);

        // ==== new_hospital_noc(Generated Invoice)
        $hospital_total_generated_invoice = $this->hospitalRepository->getGeneratedInvoiceHospitalNOC();
        // dd($hospital_total_generated_invoice);

        // ==== new_hospital_noc(Paid)
        $hospital_total_paid = $this->hospitalRepository->getPaidHospitalNOC();
        // dd($hospital_total_paid);

        // ==== new_hospital_noc(Reviewed)
        $hospital_total_reviewed = $this->hospitalRepository->getReviewedHospitalNOC();
        // dd($hospital_total_reviewed);

        // ==== new_hospital_noc(Approved)
        $hospital_total_approved = $this->hospitalRepository->getApprovedHospitalNOC();
        // dd($hospital_total_approved);

        // ==== new_hospital_noc(Rejected)
        $hospital_total_rejected = $this->hospitalRepository->getRejectedHospitalNOC();
        // dd($hospital_total_rejected);




        // ==== new_building_noc(Pending)
        $building_total_pending = $this->buildingRepository->getPendingBuildingNOC();
        // dd($building_total_pending);


        // ==== new_building_noc(Underprocess)
        $building_total_underprocess = $this->buildingRepository->getUnderprocessBuildingNOC();
        // dd($building_total_underprocess);

        // ==== new_building_noc(Unpaid)
        $building_total_unpaid = $this->buildingRepository->getUnpaidBuildingNOC();
        // dd($building_total_unpaid);

        // ==== new_building_noc(Generated Invoice)
        $building_total_generated_invoice = $this->buildingRepository->getGeneratedInvoiceBuildingNOC();
        // dd($building_total_generated_invoice);

        // ==== new_building_noc(Paid)
        $building_total_paid = $this->buildingRepository->getPaidBuildingNOC();
        // dd($building_total_paid);

        // ==== new_building_noc(Reviewed)
        $building_total_reviewed = $this->buildingRepository->getReviewedBuildingNOC();
        // dd($building_total_reviewed);

        // ==== new_building_noc(Approved)
        $building_total_approved = $this->buildingRepository->getApprovedBuildingNOC();
        // dd($building_total_approved);

        // ==== new_building_noc(Rejected)
        $building_total_rejected = $this->buildingRepository->getRejectedBuildingNOC();
        // dd($building_total_rejected);

        return view('admin.admin_dashboard')
        ->with(['total_citizen' => $total_citizen])
        ->with(['business_total_pending' => $business_total_pending, 'business_total_underprocess' => $business_total_underprocess, 'business_total_unpaid' => $business_total_unpaid, 'business_total_generated_invoice' => $business_total_generated_invoice , 'business_total_paid' => $business_total_paid, 'business_total_reviewed' => $business_total_reviewed, 'business_total_rejected' => $business_total_rejected, 'business_total_approved' => $business_total_approved])
        ->with(['hospital_total_pending' => $hospital_total_pending, 'hospital_total_underprocess' => $hospital_total_underprocess, 'hospital_total_unpaid' => $hospital_total_unpaid, 'hospital_total_generated_invoice' => $hospital_total_generated_invoice , 'hospital_total_paid' => $hospital_total_paid, 'hospital_total_reviewed' => $hospital_total_reviewed, 'hospital_total_rejected' => $hospital_total_rejected, 'hospital_total_approved' => $hospital_total_approved])
        ->with(['building_total_pending' => $building_total_pending, 'building_total_underprocess' => $building_total_underprocess, 'building_total_unpaid' => $building_total_unpaid, 'building_total_generated_invoice' => $building_total_generated_invoice , 'building_total_paid' => $building_total_paid, 'building_total_reviewed' => $building_total_reviewed, 'building_total_rejected' => $building_total_rejected, 'building_total_approved' => $building_total_approved]);
    }
}
