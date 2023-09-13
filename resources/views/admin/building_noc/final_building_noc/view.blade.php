df<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>UMC-Fire NOC | Final Building NOC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

    <link href="{{ url('/') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <!-- Layout Js -->
    <script src="{{ url('/') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ url('/') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('/') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<style>
    .select2 {
        border: 1px solid rgb(7, 147, 165);
        border-radius: 5px;
    }

</style>

<body data-topbar="colored" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('common.admin.header.header')

        <div class="main-content">

            <div class="page-content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="border: 1px solid #000000;">
                                <div class="card-body p-0">
                                    <h4 class="card-header text-light bg-primary ">Final Building NOC</h4>

                                    <form class="auth-input p-4" >

                                        <div class="form-group row mb-3">
                                            <label class="col-sm-2"><strong>Appication Date : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="nocs_a_date" id="nocs_a_date" class="form-control" value="{{  date('d-m-Y')  }}">

                                            </div>
                                        </div>

                                        <div class="form-group row mb-3 d-none">
                                            @if(auth()->guard('citizen'))
                                            <label class="col-sm-2"><strong>Citizen ID : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="citizens_id" id="citizens_id" class="form-control" value="{{ Auth::user()->id }}">

                                            </div>
                                            @endif

                                            <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <select disabled class="form-control select2 " name="noc_mode" id="noc_mode" type="hidden">
                                                    <option>Select Mode of NOC</option>
                                                    <optgroup label=" ">
                                                        <option value="5" {{ old('noc_mode') == "5" ? 'selected' : '' }} >Provisional Building NOC</option>
                                                        <option value="6" {{ old('noc_mode') == "6" ? 'selected' : '' }} selected>Final Building NOC</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Appication Details :</h4>
                                        <div class="form-group row  mb-3">
                                            <label class="col-sm-2"><strong>Last Name / Surname : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="l_name" id="l_name" class="form-control @error('l_name') is-invalid @enderror" value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">
                                                @error('l_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>First Name : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="f_name" id="f_name" class="form-control @error('f_name') is-invalid @enderror" value="{{ $data->f_name }}" placeholder="Enter First Name.">
                                                @error('f_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>Father / Husband's Name : <span style="color:red;">*</span></strong></label>
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
                                            <label class="col-sm-2"><strong>Name of Society : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="society_name" id="society_name" class="form-control @error('society_name') is-invalid @enderror" value="{{ $data->society_name }}" placeholder="Enter Name of Society.">
                                                @error('society_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>Designation : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ $data->designation }}" placeholder="Enter Designation.">
                                                @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Address Details :</h4>
                                        <div class="form-group row  mb-3">
                                            <label class="col-sm-2"><strong>House / Building / Society Name : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="house_name" id="house_name" class="form-control @error('house_name') is-invalid @enderror" value="{{ $data->house_name }}" placeholder="Enter House / Building / Society Name.">
                                                @error('house_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>Flat / Block / Barrack No. : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="flat_no" id="flat_no" class="form-control @error('flat_no') is-invalid @enderror" value="{{ $data->flat_no }}" placeholder="Enter Flat / Block / Barrack No.">
                                                @error('flat_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>Wing / Floor : <span style="color:red;">*</span></strong></label>
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
                                            <label class="col-sm-2"><strong>Road / Street / Lane : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="road_name" id="road_name" class="form-control @error('road_name') is-invalid @enderror" value="{{ $data->road_name }}" placeholder="Enter Road / Street / Lane.">
                                                @error('road_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>Area / Locality / Town / City : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="area_name" id="area_name" class="form-control @error('area_name') is-invalid @enderror" value="{{ $data->area_name }}" placeholder="Enter Area / Locality / Town / City.">
                                                @error('area_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2"><strong>Taluka : <span style="color:red;">*</span></strong></label>
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
                                            <label class="col-sm-2"><strong>Pin code : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="pincode" id="pincode" maxlength="6" class="form-control @error('pincode') is-invalid @enderror" value="{{ $data->pincode }}" placeholder="Enter Pin code.">
                                                @error('pincode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <label class="col-sm-2"><strong>Ward Committee No : <span style="color:red;">*</span></strong></label>
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


                                            <label class="col-sm-2"><strong>Electrol Panel No : <span style="color:red;">*</span></strong></label>
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
                                            <label class="col-sm-2"><strong>Contact Person : <span style="color:red;">*</span></strong></label>
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
                                                <input disabled type="email" name="email" id="email" class="form-control" value="{{ $data->email }}" placeholder="Enter Email Id (if any).">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <h4 class="card-title text-primary mb-2" style="font-size: 18px;">Information of Property :</h4>
                                        <div class="form-group row  mb-3">
                                            <label class="col-sm-2"><strong>Type of Property : <span style="color:red;">*</span></strong></label>
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
                                            <label class="col-sm-2"><strong>Property Number : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="property_no" id="property_no" class="form-control @error('property_no') is-invalid @enderror" value="{{ $data->property_no }}" placeholder="Enter Property Number.">
                                                @error('property_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Necessary Particulars about above service</h4>
                                        <div class="form-group row  mb-3">
                                            <label class="col-sm-2"><strong>Construction Permission Number : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="text" disabled name="peermission_no" id="peermission_no" maxlength="06" class="form-control @error('peermission_no') is-invalid @enderror" value="{{ $data->peermission_no }}" placeholder="Enter Construction Permission Number.">
                                                @error('peermission_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <label class="col-sm-2"><strong>Date of Permission : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-2 col-md-2">
                                                <input type="date" disabled name="permission_date" id="permission_date" max="<?php echo date("Y-m-d"); ?>" class="form-control @error('permission_date') is-invalid @enderror" value="{{ $data->permission_date }}" placeholder="Enter Date of Permission.">
                                                @error('permission_date')
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
                                                    <label class="col-sm-2"><strong>Upload Map / Plan showing Cease Fire Equipments installed and Water Supply arrangements in the building : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Building_NOC/Final_BuildingNOC/fire_equipments_install_doc/{{ $data->fire_equipments_install_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->fire_equipments_install_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Building_NOC/Final_BuildingNOC/fire_equipments_install_doc/{{ $data->fire_equipments_install_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Building_NOC/Final_BuildingNOC/fire_equipments_install_doc/{{ $data->fire_equipments_install_doc }}" target="_blank" download>
                                                                        <p class="mt-3 mb-0" id="image_div">
                                                                        <button type="button"class="btn btn-primary text-bold">
                                                                            Download File
                                                                        </button>
                                                                        </p>
                                                                    </a>
                                                                <?php }?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- Start Declaration --}}
                                            <div class="card" style="border: 1px solid #1d1f1f;">

                                                <div class="card-body p-4">
                                                    <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Declaration</h4>

                                                    <div class="col-md-12 col-xs-12">
                                                        <p class="text-justify ">
                                                            <b> I / We..... <br><br>
                                                                <input type="text" disabled style="width:300px" class="form-control @error('declare_by') is-invalid @enderror" id="declare_by" name="declare_by" value="{{ $data->declare_by }}" placeholder="Enter Applicant Name">
                                                                <br>
                                                                @error('declare_by')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                ......
                                                                State on solemn affirmation that the above information is true and correct to the best of my/our knowledge. If the information given is found wrong then 1/We shali be held iegally liable for its consequences. </b>
                                                        </p>
                                                        <b>Date : </b> <input type="text" disabled style="width:150px" class="form-control input-style" id="declare_date" placeholder="Permit Date" name="declare_date" value="{{ $data->declare_date }}" disabled>
                                                    </div>

                                                    <div class="col-md-12 col-xs-12">
                                                        <h6 class="mt-3"><b>The document may please be delivered to : </b></h6>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2"><strong>Self / Nominated Person : <span style="color:red;">*</span></strong></label>
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

                                                            <label class="col-sm-2"><strong>Name of Nominated Person : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="nominated_persion_name" id="nominated_persion_name" class="form-control @error('nominated_persion_name') is-invalid @enderror" value="{{ $data->nominated_persion_name }}" placeholder="Enter Name of Nominated Person.">
                                                                @error('nominated_persion_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>Deliver by : <span style="color:red;">*</span></strong></label>
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

                                                        <h6 class="mt-3 mb-3"><b>Correspondence Address (Not to be filled if address is same as above) : </b></h6>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2"><strong>Last Name / Surname : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="d_last_name" id="d_last_name" class="form-control @error('d_last_name') is-invalid @enderror" value="{{ $data->d_last_name }}" placeholder="Enter Last Name / Surname.">
                                                                @error('d_last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>First Name : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="d_first_name" id="d_first_name" class="form-control @error('d_first_name') is-invalid @enderror" value="{{ $data->d_first_name }}" placeholder="Enter First Name.">
                                                                @error('d_first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>Father / Husband's Name : <span style="color:red;">*</span></strong></label>
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
                                                            <label class="col-sm-2"><strong>House / Building / Society Name : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="d_house_name" id="d_house_name" class="form-control @error('d_house_name') is-invalid @enderror" value="{{ $data->d_house_name }}" placeholder="Enter House / Building / Society Name.">
                                                                @error('d_house_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>Flat / Block / Barrack No. : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="d_flat_no" id="d_flat_no" class="form-control @error('d_flat_no') is-invalid @enderror" value="{{ $data->d_flat_no }}" placeholder="Enter Flat / Block / Barrack No..">
                                                                @error('d_flat_no')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>Wing / Floor : <span style="color:red;">*</span></strong></label>
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
                                                            <label class="col-sm-2"><strong>Road / Street / Lane : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="d_road_name" id="d_road_name" class="form-control @error('d_road_name') is-invalid @enderror" value="{{ $data->d_road_name }}" placeholder="Enter Road / Street / Lane.">
                                                                @error('d_road_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>Area / Locality / Town / City : <span style="color:red;">*</span></strong></label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <input type="text" disabled name="d_area_name" id="d_area_name" class="form-control @error('d_area_name') is-invalid @enderror" value="{{ $data->d_area_name }}" placeholder="Enter Area / Locality / Town / City">
                                                                @error('d_area_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <label class="col-sm-2"><strong>Taluka : <span style="color:red;">*</span></strong></label>
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
                                                            <label class="col-sm-2"><strong>Pincode : <span style="color:red;">*</span></strong></label>
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

                                        <div class="form-group row mt-4" >
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ url('/admin_final_building_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <!-- end select2 -->

                        </div>


                    </div>


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('common.admin.footer.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/node-waves/waves.min.js"></script>

    <!-- Icon -->
    <script src="{{ url('/') }}/assets/release/v2.0.1/script/monochrome/bundle.js"></script>

    <script src="{{ url('/') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <script src="{{ url('/') }}/assets/js/pages/form-advanced.init.js"></script>

    <script src="{{ url('/') }}/assets/js/app.js"></script>

</body>
</html>
