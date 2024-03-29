<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UMC-Fire NOC | Final Building NOC</title>

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
                <h2>Final Building NOC</h2>

                <form class="auth-input p-4"  style="padding-top: 20px; padding-left:30px; padding-right:50px; adding-bottom:40px;">

                    <div class="form-group row mb-3">
                        <label class="col-sm-2"><strong>Appication Date : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="nocs_a_date" id="nocs_a_date" class="form-control" value="{{  date('d-m-Y')  }}">
                        </div>
                    </div>

                    <h4>Appication Details :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="l_name" id="l_name" class="form-control @error('l_name') is-invalid @enderror" value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">
                            @error('l_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>First Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="f_name" id="f_name" class="form-control @error('f_name') is-invalid @enderror" value="{{ $data->f_name }}" placeholder="Enter First Name.">
                            @error('f_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="father_name" id="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">
                            @error('father_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Name of Building : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="society_name" id="society_name" class="form-control @error('society_name') is-invalid @enderror" value="{{ $data->society_name }}" placeholder="Enter Name of Building.">
                            @error('society_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Designation : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ $data->designation }}" placeholder="Enter Designation.">
                            @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <h4>Address Details :</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>House / Building / Society Name : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="house_name" id="house_name" class="form-control @error('house_name') is-invalid @enderror" value="{{ $data->house_name }}" placeholder="Enter House / Building / Society Name.">
                            @error('house_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Flat / Block / Barrack No. : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="flat_no" id="flat_no" class="form-control @error('flat_no') is-invalid @enderror" value="{{ $data->flat_no }}" placeholder="Enter Flat / Block / Barrack No.">
                            @error('flat_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Wing / Floor : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="wing_name" id="wing_name" class="form-control @error('wing_name') is-invalid @enderror" value="{{ $data->wing_name }}" placeholder="Enter Wing / Floor.">
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
                            <input type="text" disabled name="road_name" id="road_name" class="form-control @error('road_name') is-invalid @enderror" value="{{ $data->road_name }}" placeholder="Enter Road / Street / Lane.">
                            @error('road_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Area / Locality / Town / City : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="area_name" id="area_name" class="form-control @error('area_name') is-invalid @enderror" value="{{ $data->area_name }}" placeholder="Enter Area / Locality / Town / City.">
                            @error('area_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Taluka : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="taluka_name" id="taluka_name" class="form-control @error('taluka_name') is-invalid @enderror" value="{{ $data->taluka_name }}" placeholder="Enter Taluka.">
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
                            <input type="text" disabled name="pincode" id="pincode" maxlength="6" class="form-control @error('pincode') is-invalid @enderror" value="{{ $data->pincode }}" placeholder="Enter Pin code.">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Ward Committee No : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <select disabled class="form-control select2 @error('ward_no') is-invalid @enderror" name="ward_no" id="ward_no">
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
                            <input type="text" disabled name="electrol_panel_no" id="electrol_panel_no" class="form-control @error('electrol_panel_no') is-invalid @enderror" value="{{ $data->electrol_panel_no }}" placeholder="Enter Electrol Panel No.">
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
                            <input type="text" disabled name="contact_persion" id="contact_persion" class="form-control @error('contact_persion') is-invalid @enderror" value="{{ $data->contact_persion }}" placeholder="Enter Contact Person.">
                            @error('contact_persion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="col-sm-2"><strong>Telephone No. (if any) : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="tel_no" id="tel_no" class="form-control" value="{{ $data->tel_no }}" placeholder="Enter Telephone No. (if any).">
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
                            <select disabled class="form-control select2 @error('types_of_property') is-invalid @enderror" name="types_of_property" id="types_of_property">
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
                            <input type="text" disabled name="property_no" id="property_no" class="form-control @error('property_no') is-invalid @enderror" value="{{ $data->property_no }}" placeholder="Enter Property Number.">
                            @error('property_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <h4>Necessary Particulars about above service</h4>
                    <div class="form-group row  mb-3">
                        <label class="col-sm-2"><strong>Construction Permission Number : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" disabled name="peermission_no" id="peermission_no" maxlength="06" class="form-control @error('peermission_no') is-invalid @enderror" value="{{ $data->peermission_no }}" placeholder="Enter Construction Permission Number.">
                            @error('peermission_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-2"><strong>Date of Permission : </strong></label>
                        <div class="col-sm-2 col-md-2">
                            <input disabled type="date" name="permission_date" id="permission_date" max="<?php echo date("Y-m-d"); ?>" class="form-control @error('permission_date') is-invalid @enderror" value="{{ $data->permission_date }}" placeholder="Enter Date of Permission.">
                            @error('permission_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <h4>Necessary Enclosures related to above application (Documents to attach)</h4>
                    <div class="row ">

                        <div class="row ">

                            <div class="form-group row  mb-3">
                                <label class="col-sm-2"><strong>Map / Plan showing Cease Fire Equipments installed and Water Supply arrangements in the building : </strong></label>
                                <div class="col-sm-4 col-md-4">
                                    @if(!empty($data->fire_equipments_install_doc))
                                        <a href="{{url('/')}}/UMC_FireNOC/Building_NOC/Final_BuildingNOC/fire_equipments_install_doc/{{ $data->fire_equipments_install_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                            <b><i class="mdi mdi-eye-circle-outline"> View Document </i></b>
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>

                        {{-- Start Declaration --}}
                        <div class="card" style="padding-top: 20px; padding-left:30px; padding-right:50px; adding-bottom:40px;">

                            <div class="card-body p-4">
                                <h4>Declaration</h4>

                                <div class="col-md-12 col-xs-12">
                                    <p class="text-justify ">
                                        <b> I / We..... <br><br>
                                            <input disabled type="text" style="width:300px" class="form-control @error('declare_by') is-invalid @enderror" id="declare_by" name="declare_by" value="{{ $data->declare_by }}" placeholder="Enter Applicant Name">
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
                                            <select disabled class="form-control select2 @error('nominated_persion') is-invalid @enderror" name="nominated_persion" id="nominated_persion">
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
                                            <input disabled type="text" name="nominated_persion_name" id="nominated_persion_name" class="form-control @error('nominated_persion_name') is-invalid @enderror" value="{{ $data->nominated_persion_name }}" placeholder="Enter Name of Nominated Person.">
                                            @error('nominated_persion_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Deliver by : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <select disabled class="form-control select2 @error('deliver_by') is-invalid @enderror" name="deliver_by" id="deliver_by">
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
                                            <input disabled type="text" name="d_last_name" id="d_last_name" class="form-control @error('d_last_name') is-invalid @enderror" value="{{ $data->d_last_name }}" placeholder="Enter Last Name / Surname.">
                                            @error('d_last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>First Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_first_name" id="d_first_name" class="form-control @error('d_first_name') is-invalid @enderror" value="{{ $data->d_first_name }}" placeholder="Enter First Name.">
                                            @error('d_first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_father_name" id="d_father_name" class="form-control @error('d_father_name') is-invalid @enderror" value="{{ $data->d_father_name }}" placeholder="Enter Father / Husband's Name.">
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
                                            <input type="text" disabled name="d_house_name" id="d_house_name" class="form-control @error('d_house_name') is-invalid @enderror" value="{{ $data->d_house_name }}" placeholder="Enter House / Building / Society Name.">
                                            @error('d_house_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Flat / Block / Barrack No. : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_flat_no" id="d_flat_no" class="form-control @error('d_flat_no') is-invalid @enderror" value="{{ $data->d_flat_no }}" placeholder="Enter Flat / Block / Barrack No..">
                                            @error('d_flat_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Wing / Floor : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_wing_no" id="d_wing_no" class="form-control @error('d_wing_no') is-invalid @enderror" value="{{ $data->d_wing_no }}" placeholder="Enter Wing / Floor.">
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
                                            <input type="text" disabled name="d_road_name" id="d_road_name" class="form-control @error('d_road_name') is-invalid @enderror" value="{{ $data->d_road_name }}" placeholder="Enter Road / Street / Lane.">
                                            @error('d_road_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Area / Locality / Town / City : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_area_name" id="d_area_name" class="form-control @error('d_area_name') is-invalid @enderror" value="{{ $data->d_area_name }}" placeholder="Enter Area / Locality / Town / City">
                                            @error('d_area_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Taluka : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_taluka_name" id="d_taluka_name" class="form-control @error('d_taluka_name') is-invalid @enderror" value="{{ $data->d_taluka_name }}" placeholder="Enter Taluka.">
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
                                            <input type="text" disabled name="d_pincode" id="d_pincode" maxlength="06" class="form-control @error('d_pincode') is-invalid @enderror" value="{{ $data->d_pincode }}" placeholder="Enter Pincode.">
                                            @error('d_pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                                        <div class="col-sm-2 col-md-2">
                                            <input type="text" disabled name="d_email" id="d_email" class="form-control r" value="{{ $data->d_email }}" placeholder="Enter Email Id">

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
