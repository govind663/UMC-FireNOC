<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UMC-Fire NOC | New Business NOC</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    h2 {
        text-align: center;
        background: #09627e;
        color: #e7eef0;
        font-weight: 300px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
        padding: 10px;
    }
    h4 {
        color: #09627e;
    }

    .page-break {
        page-break-after: always;
    }
</style>

<body>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <h2>New Business NOC</h2>

                <form class="auth-input"
                    style="padding-top: 20px; padding-left:30px; padding-right:50px; padding-bottom:40px;">

                    <div class="form-group row mb-3">
                        <label class="col-sm-2"><strong>Appication Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ date('d-m-Y') }}">
                        </div>
                    </div>

                    <h4 class="mb-3">Appication Details :
                    </h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->l_name }}" >
                        </div>

                        <label class="col-sm-2"><strong>First Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->f_name }}">
                        </div>

                        <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->father_name }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Name of Business : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->society_name }}" >
                        </div>

                        <label class="col-sm-2"><strong>Designation : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->designation }}">
                        </div>
                    </div>

                    <h4 class="mb-3">Address Details :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>House / Building / Society Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->house_name }}">
                        </div>

                        <label class="col-sm-2"><strong>Flat / Block / Barrack No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control " value="{{ $data->flat_no }}">
                        </div>

                        <label class="col-sm-2"><strong>Wing / Floor : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->wing_name }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Road / Street / Lane : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->road_name }}">
                        </div>

                        <label class="col-sm-2"><strong>Area / Locality / Town / City : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->area_name }}">
                        </div>

                        <label class="col-sm-2"><strong>Taluka : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->taluka_name }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Pin code : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->pincode }}">
                        </div>

                        @php
                            $wards = ('');

                            if($data->ward_no == 1){
                                $wards = 'Ward 1';
                            }elseif ($data->ward_no == 2) {
                                $wards = 'Ward 2';
                            }elseif ($data->ward_no == 3) {
                                $wards = 'Ward 3';
                            }elseif ($data->ward_no == 4) {
                                $wards = 'Ward 4';
                            }

                        @endphp
                        <label class="col-sm-2"><strong>Ward Committee No : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $wards }}">
                        </div>


                        <label class="col-sm-2"><strong>Electrol Panel No : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $data->electrol_panel_no }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Contact Person : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" readonly class="form-control" value="{{ $data->contact_persion }}">
                        </div>

                        <label class="col-sm-2"><strong>Telephone No. (if any) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" readonly class="form-control" value="{{ $data->tel_no }}" >
                        </div>

                        <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="email" readonly class="form-control" value="{{ $data->email }}">
                        </div>
                    </div>

                    @php
                        $property_types = ('');

                        if($data->types_of_property == 1){
                            $property_types = 'Land';
                        }elseif ($data->types_of_property == 2) {
                            $property_types = 'Building';
                        }

                    @endphp
                    <h4 class="mb-2">Information of Property :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Type of Property : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $property_types }}">
                        </div>

                        <label class="col-sm-2"><strong>Property Number : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $data->property_no }}">
                        </div>
                    </div>

                    <h4 class="mb-3">Information of Land :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Town / City : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $data->city_name }}">
                        </div>

                        <label class="col-sm-2"><strong>Survey / Block / Barrak No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $data->survey_no }}">
                        </div>

                        <label class="col-sm-2"><strong>C.T.S. No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $data->cts_no }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Part No. / Sheet No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->part_no }}">
                        </div>

                        <label class="col-sm-2"><strong>Plot No. / Unit No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->plot_no }}">
                        </div>

                        <label class="col-sm-2"><strong>Property Number : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->land_property_no }}">
                        </div>
                    </div>

                    <h4 class="mb-3">Necessary Particulars about above service</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Pincode : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->area_pincode }}">
                        </div>

                        <label class="col-sm-2"><strong>Shop No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->shop_no }}">
                        </div>

                        <label class="col-sm-2"><strong>Height of Building : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->building_height }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Rooms in Building : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->rooms_in_buld }}">
                        </div>

                        <label class="col-sm-2"><strong>Property on Floor Building : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->property_on_floor_buld }}">
                        </div>

                        <label class="col-sm-2"><strong>Accomodation for how many People : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->no_of_accomodation_people }}">
                        </div>
                    </div>

                    @php
                        $business_types = ('');

                        if($data->types_of_business == 1){
                            $business_types = 'Temporary';
                        }elseif ($data->types_of_business == 2) {
                            $business_types = 'Fixed';
                        }
                    @endphp
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Area of Place (Sq. Mt.) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->area }}">
                        </div>

                        <label class="col-sm-2"><strong>Numbers of Workers / Servants : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled class="form-control" value="{{ $data->no_of_workers }}">
                        </div>

                        <label class="col-sm-2"><strong>Type of Business : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="text" class="form-control" value="{{ $business_types }}">
                        </div>
                    </div>

                    <div class="form-group row  mb-3 box 1">
                        <label class="col-sm-2"><strong>From Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="date" readonly class="form-control" value="{{ $data->from_date }}" >
                        </div>

                        <label class="col-sm-2"><strong>To Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="date" readonly class="form-control" value="{{ $data->to_date }}">
                        </div>
                    </div>

                    @php
                        $fire_equips = ('');

                        if($data->fire_equips == 1){
                            $fire_equips = 'Yes';
                        }elseif ($data->fire_equips == 2) {
                            $fire_equips = 'No';
                        }
                    @endphp
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Number of Workers / Servants sleep at night at working place : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled  class="form-control" value="{{ $data->no_of_workers_sleep_night }}">
                        </div>

                        <label class="col-sm-2"><strong>Fire extinguishers/ preventive equipments are installed at working place : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled  class="form-control" value="{{ $fire_equips }}">
                        </div>

                        <label class="col-sm-2"><strong>Address Of Business Place : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <textarea disabled type="text" class="form-control" value="{{ $data->business_address }}">{{ $data->business_address }}</textarea>
                        </div>
                    </div>

                    <br>
                    <div class="page-break"></div>
                    <h4 class="mb-3">Necessary Enclosures related to above application (Documents to attach)</h4>
                    <div class="row ">
                        <div class="form-group row  mb-3">
                            <label class="col-sm-2"><strong>Location of Place (Google Map Link) : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                <input type="text" readonly class="form-control" value="{{ $data->location_map_link }}">
                            </div>

                            <label class="col-sm-2"><strong>Letter from License Holder regarding proper electric connection : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->electric_license_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/electric_license_doc/{{ $data->electric_license_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  mb-3">
                            <label class="col-sm-2"><strong>Letter from connection holder and license regarding proper cooking gas connection : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->gas_license_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc/{{ $data->gas_license_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>

                            <label class="col-sm-2"><strong>Shop License : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->shop_license_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/shop_license_doc/{{ $data->shop_license_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  mb-3">
                            <label class="col-sm-2"><strong>Food License : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->food_license))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/food_license/{{ $data->food_license }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>

                            <label class="col-sm-2"><strong>Up-to-date receipt of Tax bill paid : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->tax_bill_paid_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/tax_bill_paid_doc/{{ $data->tax_bill_paid_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  mb-3">
                            <label class="col-sm-2"><strong>Trade License (Kerosene/Other Petroleum Stock/Explosive goods) : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->trade_license))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/trade_license/{{ $data->trade_license }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>

                            <label class="col-sm-2"><strong>Commissioning Certificate of Gas Fitting : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->gas_certificate_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_certificate_doc/{{ $data->gas_certificate_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  mb-3">
                            <label class="col-sm-2"><strong>Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->commissioning_certificate))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/commissioning_certificate/{{ $data->commissioning_certificate }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>

                            <label class="col-sm-2"><strong>Copy of Affidavit : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->affidavit_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/affidavit_doc/{{ $data->affidavit_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  mb-3">
                            <label class="col-sm-2"><strong>Construction Maps of Proposed Construction : </strong></label>
                            <div class="col-sm-4 col-md-4">
                                @if (!empty($data->construction_plan_doc))
                                    <a href="{{ url('/') }}/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc/{{ $data->construction_plan_doc }}"
                                        target="_blank" class="btn btn-primary btn-sm">
                                        <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="page-break"></div>
                        <div class="card" style="padding-top: 20px; padding-left:30px; padding-right:50px; padding-bottom:40px;">

                            <div class="card-body p-4">
                                <h4>Declaration</h4>

                                <div class="col-md-12 col-xs-12">
                                    <p class="text-justify ">
                                        <b> I / We..... <br><br>
                                            <input type="text" disabled class="form-control" value="{{ $data->declare_by }}">
                                            <br>
                                            ......
                                            State on solemn affirmation that the above information is true
                                            and correct to the best of my/our knowledge. If the information
                                            given is found wrong then 1/We shali be held iegally liable for
                                            its consequences. </b>
                                    </p>
                                    <b>Date : </b> <input type="text" style="width:150px" class="form-control input-style" value="{{ $data->declare_date }}" disabled>
                                </div>

                                @php
                                    $persion_name = ('');

                                    if($data->nominated_persion == 1){
                                        $persion_name = 'Self';
                                    }elseif ($data->nominated_persion == 2) {
                                        $persion_name = 'Nominee';
                                    }elseif ($data->nominated_persion == 3) {
                                        $persion_name = 'C.F.C.';
                                    }elseif ($data->nominated_persion == 4) {
                                        $persion_name = 'Camp No.';
                                    }

                                    $post_by = ('');

                                    if($data->deliver_by == 1){
                                        $post_by = 'By Post U.P.C';
                                    }elseif ($data->deliver_by == 2) {
                                        $post_by = 'By Post Register A.D.';
                                    }elseif ($data->deliver_by == 3) {
                                        $post_by = 'Courier';
                                    }
                                @endphp
                                <div class="col-md-12 col-xs-12">
                                    <h6 class="mt-3"><b>The document may please be delivered to : </b>
                                    </h6>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Self / Nominated Person : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $persion_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Name of Nominated Person : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->nominated_persion_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Deliver : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $post_by }}">
                                        </div>
                                    </div>

                                    <h6 class="mt-3 mb-3"><b>Correspondence Address : </b></h6>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_last_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>First Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_first_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_father_name }}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>House / Building / Society Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_house_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Flat / Block / Barrack No. : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_flat_no }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Wing / Floor : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_wing_no }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Road / Street / Lane : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_road_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Area / Locality / Town / City : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_area_name }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Taluka : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_taluka_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Pincode : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_pincode }}">
                                        </div>

                                        <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled class="form-control" value="{{ $data->d_email }}">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
        <!-- end select2 -->

    </div>


</body>

</html>
