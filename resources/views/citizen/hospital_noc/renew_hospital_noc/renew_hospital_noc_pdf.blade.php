<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UMC-Fire NOC | Renew Hospital NOC</title>

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
                <h2>Renew Hospital NOC</h2>

                <form class="auth-input" style="padding-top: 20px; padding-left:30px; padding-right:50px; adding-bottom:40px;">

                    <div class="form-group row mb-3">
                        <label class="col-sm-2"><strong>Appication Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="nocs_a_date" id="nocs_a_date" class="form-control" value="{{  date('d-m-Y')  }}">

                        </div>
                    </div>

                    <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Appication Details :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="l_name" id="l_name" class="form-control @error('l_name') is-invalid @enderror" value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">
                            @error('l_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>First Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="f_name" id="f_name" class="form-control @error('f_name') is-invalid @enderror" value="{{ $data->f_name }}" placeholder="Enter First Name.">
                            @error('f_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="father_name" id="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">
                            @error('father_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Name of Hospital : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="hospital_name" id="hospital_name" class="form-control @error('hospital_name') is-invalid @enderror" value="{{ $data->hospital_name }}" placeholder="Enter Name of Hospital.">
                            @error('hospital_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Designation : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ $data->designation }}" placeholder="Enter Designation.">
                            @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Address Details :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>House / Building / Society Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="house_name" id="house_name" class="form-control @error('house_name') is-invalid @enderror" value="{{ $data->house_name }}" placeholder="Enter House / Building / Society Name.">
                            @error('house_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Flat / Block / Barrack No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="flat_no" id="flat_no" class="form-control @error('flat_no') is-invalid @enderror" value="{{ $data->flat_no }}" placeholder="Enter Flat / Block / Barrack No.">
                            @error('flat_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Wing / Floor : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="wing_name" id="wing_name" class="form-control @error('wing_name') is-invalid @enderror" value="{{ $data->wing_name }}" placeholder="Enter Wing / Floor.">
                            @error('wing_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Road / Street / Lane : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="road_name" id="road_name" class="form-control @error('road_name') is-invalid @enderror" value="{{ $data->road_name }}" placeholder="Enter Road / Street / Lane.">
                            @error('road_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Area / Locality / Town / City : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="area_name" id="area_name" class="form-control @error('area_name') is-invalid @enderror" value="{{ $data->area_name }}" placeholder="Enter Area / Locality / Town / City.">
                            @error('area_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Taluka : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="taluka_name" id="taluka_name" class="form-control @error('taluka_name') is-invalid @enderror" value="{{ $data->taluka_name }}" placeholder="Enter Taluka.">
                            @error('taluka_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Pin code : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="pincode" id="pincode" maxlength="6" class="form-control @error('pincode') is-invalid @enderror" value="{{ $data->pincode }}" placeholder="Enter Pin code.">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Ward Committee No : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <select class="form-control select2 @error('ward_no') is-invalid @enderror" name="ward_no" id="ward_no">
                                <option value="">Select Ward Committee No</option>
                                <optgroup label="">
                                    <option value="1" {{ $data->ward_no == "1" ? 'selected' : '' }}>Ward 1</option>
                                    <option value="2" {{ $data->ward_no == "2" ? 'selected' : '' }}>Ward 2</option>
                                    <option value="3" {{ $data->ward_no == "3" ? 'selected' : '' }}>Ward 3</option>
                                    <option value="4" {{ $data->ward_no == "4" ? 'selected' : '' }}>Ward 4</option>
                                </optgroup>
                            </select>
                            @error('ward_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <label class="col-sm-2"><strong>Electrol Panel No : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="electrol_panel_no" id="electrol_panel_no" class="form-control @error('electrol_panel_no') is-invalid @enderror" value="{{ $data->electrol_panel_no }}" placeholder="Enter Electrol Panel No.">
                            @error('electrol_panel_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Contact Person : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="contact_persion" id="contact_persion" class="form-control @error('contact_persion') is-invalid @enderror" value="{{ $data->contact_persion }}" placeholder="Enter Contact Person.">
                            @error('contact_persion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Telephone No. (if any) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="tel_no" id="tel_no" class="form-control" value="{{ $data->tel_no }}" placeholder="Enter Telephone No. (if any).">
                            @error('tel_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="email" name="email" id="email" class="form-control" value="{{ $data->email }}" placeholder="Enter Email Id (if any).">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <h4 class="card-title text-primary mb-2" style="font-size: 18px;">Information of Property :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Type of Property : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <select class="form-control select2 @error('types_of_property') is-invalid @enderror" name="types_of_property" id="types_of_property">
                                <option value="">Select Type of Property</option>
                                <optgroup label=" ">
                                    <option value="1" {{ $data->types_of_property == "1"? 'selected' : '' }}>Land</option>
                                    <option value="2" {{ $data->types_of_property == "2"? 'selected' : '' }}>Building</option>
                                </optgroup>
                            </select>
                            @error('types_of_property')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Property Number : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="property_no" id="property_no" class="form-control @error('property_no') is-invalid @enderror" value="{{ $data->property_no }}" placeholder="Enter Property Number.">
                            @error('property_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Information of Land :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Town / City : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="city_name" id="city_name" class="form-control @error('city_name') is-invalid @enderror" value="{{ $data->city_name }}" placeholder="Enter Town / City.">
                            @error('city_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Survey / Block / Barrak No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="survey_no" id="survey_no" class="form-control @error('survey_no') is-invalid @enderror" value="{{ $data->survey_no }}" placeholder="Enter Survey / Block / Barrak No.">
                            @error('survey_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>C.T.S. No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="cts_no" id="cts_no" class="form-control @error('cts_no') is-invalid @enderror" value="{{ $data->cts_no }}" placeholder="Enter C.T.S. No.">
                            @error('cts_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Part No. / Sheet No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="part_no" id="part_no" class="form-control @error('part_no') is-invalid @enderror" value="{{ $data->part_no }}" placeholder="Enter Part No. / Sheet No.">
                            @error('part_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Plot No. / Unit No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="plot_no" id="plot_no" class="form-control @error('plot_no') is-invalid @enderror" value="{{ $data->plot_no }}" placeholder="Enter Plot No. / Unit No.">
                            @error('plot_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Property Number : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="land_property_no" id="land_property_no" class="form-control @error('land_property_no') is-invalid @enderror" value="{{ $data->land_property_no }}" placeholder="Enter Property Number.">
                            @error('land_property_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Necessary Particulars about above service</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Pincode : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="area_pincode" id="area_pincode" maxlength="06" class="form-control @error('area_pincode') is-invalid @enderror" value="{{ $data->area_pincode }}" placeholder="Enter Pincode.">
                            @error('area_pincode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Type of Hospital : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <select class="form-control select2 @error('types_of_hospital') is-invalid @enderror" name="types_of_hospital" id="types_of_hospital">
                                <option value="">Select Type of Hospital</option>
                                <optgroup label=" ">
                                    <option value="1" {{ $data->types_of_hospital == "1"? 'selected' : '' }}>Temporary</option>
                                    <option value="2" {{ $data->types_of_hospital == "2"? 'selected' : '' }}>Fixed</option>
                                </optgroup>
                            </select>
                            @error('types_of_hospital')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>From Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="date" name="from_date" id="from_date" max="<?php echo date("Y-m-d"); ?>" class="form-control @error('from_date') is-invalid @enderror" value="{{ $data->from_date }}" placeholder="Enter From Date.">
                            @error('from_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>To Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="date" name="to_date" id="to_date" max="<?php echo date("Y-m-d"); ?>" class="form-control @error('to_date') is-invalid @enderror" value="{{ $data->to_date }}" placeholder="Enter To Date.">
                            @error('to_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Shop No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="shop_no" id="shop_no" class="form-control @error('shop_no') is-invalid @enderror" value="{{ $data->shop_no }}" placeholder="Enter Shop No.">
                            @error('shop_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Area of Place (Sq. Mt.) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="area_place_measurments" id="area_place_measurments" class="form-control @error('area_place_measurments') is-invalid @enderror" value="{{ $data->area_place_measurments }}" placeholder="Enter Area of Place (Sq. Mt.).">
                            @error('area_place_measurments')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Numbers of Staff : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="total_staff" id="total_staff" class="form-control @error('total_staff') is-invalid @enderror" value="{{ $data->total_staff }}" placeholder="Enter Numbers of Staff.">
                            @error('total_staff')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Number of Staff sleep at night at working place : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" name="total_sleeping_staff" id="total_sleeping_staff" class="form-control @error('total_sleeping_staff') is-invalid @enderror" value="{{ $data->total_sleeping_staff }}" placeholder="Enter Number of Staff sleep at night at working place">
                            @error('total_sleeping_staff')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Fire extinguishers / preventive equipments are installed at working place : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <select class="form-control select2 @error('hospital_fireequip') is-invalid @enderror" name="hospital_fireequip" id="hospital_fireequip">
                                <option value="">Select Fire extinguishers/ preventive equipments are installed at working place</option>
                                <optgroup label=" ">
                                    <option value="1" {{ $data->hospital_fireequip == "1"? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $data->hospital_fireequip == "2"? 'selected' : '' }}>No</option>
                                </optgroup>
                            </select>
                            @error('hospital_fireequip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Address Of Hospital Place : </strong></label>
                        <div class="col-sm-6 col-md-6">
                            <textarea type="text" name="hospital_address" id="hospital_address" class="form-control @error('hospital_address') is-invalid @enderror" value="{{ $data->hospital_address }}" placeholder="Enter Address Of Hospital Place." style="height: 80px; width:100%;" >{{ $data->hospital_address }}</textarea>
                            @error('hospital_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Necessary Enclosures related to above application (Documents to attach)</h4>
                    <div class="row ">
                        <div class="row ">
                            <div class="form-group row  mb-3">
                                <label class="col-sm-2"><strong>Document Of Property : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->property_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/property_doc/{{ $data->property_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>

                                <label class="col-sm-2"><strong>Copy of Previous NOC : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->location_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/location_doc/{{ $data->location_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row  mb-3">
                                <label class="col-sm-2"><strong>Letter from License Holder regarding proper electric connection : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->electric_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/electric_doc/{{ $data->electric_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>

                                <label class="col-sm-2"><strong>Shop License : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->shop_license_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/shop_license_doc/{{ $data->shop_license_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row  mb-3">
                                <label class="col-sm-2"><strong>Up-to-date receipt of Tax bill paid : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->paid_tax_bill_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/paid_tax_bill_doc/{{ $data->paid_tax_bill_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>

                                <label class="col-sm-2"><strong>Commissioning Certificate of Fire extinguishers / preventive equipments of I.S.I. Mark : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->commissioning_certificate))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/commissioning_certificate/{{ $data->commissioning_certificate }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row  mb-3">
                                <label class="col-sm-2"><strong>Copy of Affidavit : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->affidavit_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/affidavit_doc/{{ $data->affidavit_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>

                                <label class="col-sm-2"><strong>Corporation Registration certificate (FOR OLD HOSPITAL) : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->corporation_certificate))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/corporation_certificate/{{ $data->corporation_certificate }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-sm-2"><strong>Maps of Proposed Construction : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->construction_plan_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Hospital_NOC/Renew_HospitalNOC/construction_plan_doc/{{ $data->construction_plan_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Start Declaration --}}
                        <div class="card" style="padding-top: 20px; padding-left:30px; padding-right:50px; adding-bottom:40px;">

                            <div class="card-body p-4">
                                <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Declaration</h4>

                                <div class="col-md-12 col-xs-12">
                                    <p class="text-justify ">
                                        <b> I / We..... <br><br>
                                            <input type="text"  class="form-control @error('declare_by') is-invalid @enderror" id="declare_by" name="declare_by" value="{{ $data->declare_by }}" placeholder="Enter Applicant Name">
                                            <br>
                                            @error('declare_by')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            ......
                                            State on solemn affirmation that the above information is true and correct to the best of my/our knowledge. If the information given is found wrong then 1/We shali be held iegally liable for its consequences. </b>
                                    </p>
                                    <b>Date : </b> <input type="text" style="width:150px" class="form-control input-style" id="declare_date" placeholder="Permit Date" name="declare_date" value="{{ $data->declare_date }}" disabled>
                                </div>

                                <div class="col-md-12 col-xs-12">
                                    <h6 class="mt-3"><b>The document may please be delivered to : </b></h6>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Self / Nominated Person : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <select class="form-control select2 @error('nominated_persion') is-invalid @enderror" name="nominated_persion" id="nominated_persion">
                                                <option value="">Select Self / Nominated Person</option>
                                                <optgroup label=" ">
                                                    <option value="1" {{ $data->nominated_persion == "1"? 'selected' : '' }}>Self</option>
                                                    <option value="2" {{ $data->nominated_persion == "2"? 'selected' : '' }}>Nominee</option>
                                                    <option value="3" {{ $data->nominated_persion == "3"? 'selected' : '' }}>C.F.C.</option>
                                                    <option value="4" {{ $data->nominated_persion == "4"? 'selected' : '' }}>Camp No.</option>
                                                </optgroup>
                                            </select>
                                            @error('nominated_persion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Name of Nominated Person : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="nominated_persion_name" id="nominated_persion_name" class="form-control @error('nominated_persion_name') is-invalid @enderror" value="{{ $data->nominated_persion_name }}" placeholder="Enter Name of Nominated Person.">
                                            @error('nominated_persion_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Deliver by : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <select class="form-control select2 @error('deliver_by') is-invalid @enderror" name="deliver_by" id="deliver_by">
                                                <option value="">Select Deliver by</option>
                                                <optgroup label=" ">
                                                    <option value="1" {{ $data->deliver_by == "1"? 'selected' : '' }}>By Post U.P.C</option>
                                                    <option value="2" {{ $data->deliver_by == "2"? 'selected' : '' }}>By Post Register A.D.</option>
                                                    <option value="3" {{ $data->deliver_by == "3"? 'selected' : '' }}>Courier</option>
                                                </optgroup>
                                            </select>
                                            @error('deliver_by')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h6 class="mt-3 mb-3"><b>Correspondence Address : </b></h6>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_last_name" id="d_last_name" class="form-control @error('d_last_name') is-invalid @enderror" value="{{ $data->d_last_name }}" placeholder="Enter Last Name / Surname.">
                                            @error('d_last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>First Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_first_name" id="d_first_name" class="form-control @error('d_first_name') is-invalid @enderror" value="{{ $data->d_first_name }}" placeholder="Enter First Name.">
                                            @error('d_first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_father_name" id="d_father_name" class="form-control @error('d_father_name') is-invalid @enderror" value="{{ $data->d_father_name }}" placeholder="Enter Father / Husband's Name.">
                                            @error('d_father_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>House / Building / Society Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_house_name" id="d_house_name" class="form-control @error('d_house_name') is-invalid @enderror" value="{{ $data->d_house_name }}" placeholder="Enter House / Building / Society Name.">
                                            @error('d_house_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Flat / Block / Barrack No. : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_flat_no" id="d_flat_no" class="form-control @error('d_flat_no') is-invalid @enderror" value="{{ $data->d_flat_no }}" placeholder="Enter Flat / Block / Barrack No..">
                                            @error('d_flat_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Wing / Floor : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_wing_no" id="d_wing_no" class="form-control @error('d_wing_no') is-invalid @enderror" value="{{ $data->d_wing_no }}" placeholder="Enter Wing / Floor.">
                                            @error('d_wing_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Road / Street / Lane : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_road_name" id="d_road_name" class="form-control @error('d_road_name') is-invalid @enderror" value="{{ $data->d_road_name }}" placeholder="Enter Road / Street / Lane.">
                                            @error('d_road_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Area / Locality / Town / City : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_area_name" id="d_area_name" class="form-control @error('d_area_name') is-invalid @enderror" value="{{ $data->d_area_name }}" placeholder="Enter Area / Locality / Town / City">
                                            @error('d_area_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Taluka : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_taluka_name" id="d_taluka_name" class="form-control @error('d_taluka_name') is-invalid @enderror" value="{{ $data->d_taluka_name }}" placeholder="Enter Taluka.">
                                            @error('d_taluka_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"><strong>Pincode : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_pincode" id="d_pincode" maxlength="06" class="form-control @error('d_pincode') is-invalid @enderror" value="{{ $data->d_pincode }}" placeholder="Enter Pincode.">
                                            @error('d_pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" name="d_email" id="d_email" class="form-control r" value="{{ $data->d_email }}" placeholder="Enter Email Id">

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
