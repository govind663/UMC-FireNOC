<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | New Business NOC</title>
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

        <!-- Toaster Message -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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

            @include('common.citizen.header.header')

            <div class="main-content">

                <div class="page-content">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border: 1px solid #000000;">
                                    <div class="card-body p-0">
                                        <h4 class="card-header text-light bg-primary ">New Business NOC</h4>

                                        <form class="auth-input p-4" >

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Appication Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="nocs_a_date" id="nocs_a_date" class="form-control" value="{{  date('d-m-Y')  }}" >

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                @if(auth()->guard('citizen'))
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="citizens_id" id="citizens_id" class="form-control" value="{{ Auth::user()->id }}" >

                                                </div>
                                                @endif

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select disabled class="form-control select2 " name="noc_mode" id="noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="1" {{ $data->noc_mode == "1" ? 'selected' : '' }} selected>New Bussiness NOC</option>
                                                            <option value="2" {{ $data->noc_mode == "2" ? 'selected' : '' }}>Renewal Bussiness NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Appication Details :</h4>
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
                                                <label class="col-sm-2"><strong>Name of Business : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="society_name" id="society_name" class="form-control @error('society_name') is-invalid @enderror" value="{{ $data->society_name }}" placeholder="Enter Name of Society.">
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


                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Address Details :</h4>
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
                                                            <option value="1" {{ $data->ward_no == "1" ? 'selected' : '' }} >Ward 1</option>
                                                            <option value="2" {{ $data->ward_no == "2" ? 'selected' : '' }} >Ward 2</option>
                                                            <option value="3" {{ $data->ward_no == "3" ? 'selected' : '' }} >Ward 3</option>
                                                            <option value="4" {{ $data->ward_no == "4" ? 'selected' : '' }} >Ward 4</option>
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
                                                    <input disabled type="text" name="electrol_panel_no" id="electrol_panel_no" class="form-control @error('electrol_panel_no') is-invalid @enderror" value="{{ $data->electrol_panel_no }}" placeholder="Enter Electrol Panel No.">
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
                                                    <input type="text" readonly name="contact_persion" id="contact_persion" class="form-control @error('contact_persion') is-invalid @enderror" value="{{ $data->contact_persion }}" placeholder="Enter Contact Person.">
                                                    @error('contact_persion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Telephone No. (if any) : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="tel_no" id="tel_no" class="form-control" value="{{ $data->tel_no }}" placeholder="Enter Telephone No. (if any).">

                                                </div>
                                                <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="email" readonly name="email" id="email" class="form-control" value="{{ $data->email }}" placeholder="Enter Email Id (if any).">

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
                                                    <input disabled type="text" name="property_no" id="property_no" class="form-control @error('property_no') is-invalid @enderror" value="{{ $data->property_no }}" placeholder="Enter Property Number.">
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
                                                    <input disabled type="text" name="city_name" id="city_name" class="form-control @error('city_name') is-invalid @enderror" value="{{ $data->city_name }}" placeholder="Enter Town / City.">
                                                    @error('city_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Survey / Block / Barrak No. : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input disabled type="text" name="survey_no" id="survey_no" class="form-control @error('survey_no') is-invalid @enderror" value="{{ $data->survey_no }}" placeholder="Enter Survey / Block / Barrak No.">
                                                    @error('survey_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>C.T.S. No. : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input disabled type="text" name="cts_no" id="cts_no" class="form-control @error('cts_no') is-invalid @enderror" value="{{ $data->cts_no }}" placeholder="Enter C.T.S. No.">
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
                                                    <input type="text" disabled name="part_no" id="part_no" class="form-control @error('part_no') is-invalid @enderror" value="{{ $data->part_no }}" placeholder="Enter Part No. / Sheet No.">
                                                    @error('part_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Plot No. / Unit No. : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="plot_no" id="plot_no" class="form-control @error('plot_no') is-invalid @enderror" value="{{ $data->plot_no }}" placeholder="Enter Plot No. / Unit No.">
                                                    @error('plot_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Property Number : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="land_property_no" id="land_property_no" class="form-control @error('land_property_no') is-invalid @enderror" value="{{ $data->land_property_no }}" placeholder="Enter Property Number.">
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
                                                    <input type="text" disabled name="area_pincode" id="area_pincode" maxlength="06" class="form-control @error('area_pincode') is-invalid @enderror" value="{{ $data->area_pincode }}" placeholder="Enter Pincode.">
                                                    @error('area_pincode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Shop No. : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="shop_no" id="shop_no" class="form-control @error('shop_no') is-invalid @enderror" value="{{ $data->shop_no }}" placeholder="Enter Shop No.">
                                                    @error('shop_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Height of Building : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="building_height" id="building_height" class="form-control @error('building_height') is-invalid @enderror" value="{{ $data->building_height }}" placeholder="Enter Height of Building">
                                                    @error('building_height')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Rooms in Building : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="rooms_in_buld" id="rooms_in_buld"  class="form-control @error('rooms_in_buld') is-invalid @enderror" value="{{ $data->rooms_in_buld }}" placeholder="Enter Rooms in Building.">
                                                    @error('rooms_in_buld')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Property on Floor Building : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="property_on_floor_buld" id="property_on_floor_buld" class="form-control @error('property_on_floor_buld') is-invalid @enderror" value="{{ $data->property_on_floor_buld }}" placeholder="Enter Property on Floor Building">
                                                    @error('property_on_floor_buld')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Accomodation for how many People : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="no_of_accomodation_people" id="no_of_accomodation_people" class="form-control @error('no_of_accomodation_people') is-invalid @enderror" value="{{ $data->no_of_accomodation_people }}" placeholder="Enter Accomodation for how many People">
                                                    @error('no_of_accomodation_people')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Area of Place (Sq. Mt.) : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="area" id="area"  class="form-control @error('area') is-invalid @enderror" value="{{ $data->area }}" placeholder="Enter Area of Place (Sq. Mt.)">
                                                    @error('area')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Numbers of Workers / Servants : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="no_of_workers" id="no_of_workers" class="form-control @error('no_of_workers') is-invalid @enderror" value="{{ $data->no_of_workers }}" placeholder="Enter Numbers of Workers / Servants">
                                                    @error('no_of_workers')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Type of Business : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select disabled class="form-control select2 @error('types_of_business') is-invalid @enderror" name="types_of_business" id="types_of_business">
                                                        <option value="">Select Type of Business</option>
                                                        <optgroup label=" ">
                                                            <option value="1" {{ $data->types_of_business == "1"? 'selected' : '' }}>Temporary</option>
                                                            <option value="2" {{ $data->types_of_business == "2"? 'selected' : '' }}>Fixed</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('types_of_business')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3 box 1">
                                                <label class="col-sm-2"><strong>From Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="date" readonly name="from_date" id="from_date" class="form-control " value="{{ $data->from_date }}" placeholder="DD-MM-YYYY">
                                                </div>

                                                <label class="col-sm-2"><strong>To Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="date" readonly name="to_date" id="to_date" class="form-control " value="{{ $data->to_date }}" placeholder="DD-MM-YYYY">
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Number of Workers / Servants sleep at night at working place : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="no_of_workers_sleep_night" id="no_of_workers_sleep_night"  class="form-control @error('no_of_workers_sleep_night') is-invalid @enderror" value="{{ $data->no_of_workers_sleep_night }}" placeholder="Enter Number of Workers / Servants sleep at night at working place">
                                                    @error('no_of_workers_sleep_night')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Fire extinguishers/ preventive equipments are installed at working place : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select disabled class="form-control select2 @error('fire_equips') is-invalid @enderror" name="fire_equips" id="fire_equips"  >
                                                        <option value="">Select Fire extinguishers/ preventive equipments are installed at working place</option>
                                                        <optgroup label=" ">
                                                            <option value="1" {{ $data->fire_equips == "1" ? 'selected' : '' }}>Yes</option>
                                                            <option value="2" {{ $data->fire_equips == "2" ? 'selected' : '' }}>No</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('fire_equips')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Address Of Business Place : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <textarea disabled type="text" name="business_address" id="business_address" class="form-control @error('business_address') is-invalid @enderror" value="{{ $data->business_address }}" placeholder="Enter Address Of Business Place">{{ $data->business_address }}</textarea>
                                                    @error('business_address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Necessary Enclosures related to above application (Documents to attach)</h4>
                                            <div class="row " >

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Location of Place (Google Map Link) : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="text" readonly name="location_map_link" id="location_map_link" class="form-control  @error('location_map_link') is-invalid @enderror "   value="{{ $data->location_map_link }}" placeholder="Enter Location of Place (Google Map Link)">
                                                        @error('location_map_link')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <label class="col-sm-2"><strong>Letter from License Holder regarding proper electric connection : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/electric_license_doc/{{ $data->electric_license_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->electric_license_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/electric_license_doc/{{ $data->electric_license_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/electric_license_doc/{{ $data->electric_license_doc }}" target="_blank" download>
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

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Letter from connection holder and license regarding proper cooking gas connection : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc/{{ $data->gas_license_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->gas_license_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc/{{ $data->gas_license_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc/{{ $data->gas_license_doc }}" target="_blank" download>
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

                                                    <label class="col-sm-2"><strong>Shop License : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/shop_license_doc/{{ $data->shop_license_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->shop_license_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/shop_license_doc/{{ $data->shop_license_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/shop_license_doc/{{ $data->shop_license_doc }}" target="_blank" download>
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

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Food License : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/food_license/{{ $data->food_license }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->food_license;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/food_license/{{ $data->food_license }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/food_license/{{ $data->food_license }}" target="_blank" download>
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

                                                    <label class="col-sm-2"><strong>Up-to-date receipt of Tax bill paid : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/tax_bill_paid_doc/{{ $data->tax_bill_paid_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->tax_bill_paid_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/tax_bill_paid_doc/{{ $data->tax_bill_paid_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/tax_bill_paid_doc/{{ $data->tax_bill_paid_doc }}" target="_blank" download>
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

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Trade License (Kerosene/Other Petroleum Stock/ Explosive goods) : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/trade_license/{{ $data->trade_license }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->trade_license;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/trade_license/{{ $data->trade_license }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/trade_license/{{ $data->trade_license }}" target="_blank" download>
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

                                                    <label class="col-sm-2"><strong>Commissioning Certificate of Gas Fitting : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_certificate_doc/{{ $data->gas_certificate_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->gas_certificate_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_certificate_doc/{{ $data->gas_certificate_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_certificate_doc/{{ $data->gas_certificate_doc }}" target="_blank" download>
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

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/commissioning_certificate/{{ $data->commissioning_certificate }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->commissioning_certificate;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/commissioning_certificate/{{ $data->commissioning_certificate }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/commissioning_certificate/{{ $data->commissioning_certificate }}" target="_blank" download>
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

                                                    <label class="col-sm-2"><strong>Copy of Affidavit : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/affidavit_doc/ {{ $data->affidavit_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->affidavit_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/affidavit_doc/{{ $data->affidavit_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/affidavit_doc/{{ $data->affidavit_doc }}" target="_blank" download>
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

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Construction Maps of Proposed Construction : </strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc/ {{ $data->construction_plan_doc }}" target="_blank">
                                                            <div class="form-group">
                                                                <?php
                                                                        $document_path = $data->construction_plan_doc;
                                                                        $filter_path =  explode(".",$document_path);
                                                                        $size_of_array = count($filter_path);
                                                                        $filter_ext = $filter_path[$size_of_array - 1];

                                                                        if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                                                        $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                                                        {
                                                                ?>

                                                                <p class="mt-3 mb-0" id="image_div">
                                                                    <img src="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc/{{ $data->construction_plan_doc }} " alt="image"  width="200" height="100" style="max-height:150px;">
                                                                </p>
                                                                <?php }
                                                                else{
                                                                    ?>
                                                                    <a href="{{url('/')}}/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc/{{ $data->construction_plan_doc }}" target="_blank" download>
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

                                                <div class="card" style="border: 1px solid #1d1f1f;">

                                                    <div class="card-body p-4">
                                                        <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Declaration</h4>

                                                        <div class="col-md-12 col-xs-12">
                                                            <p class="text-justify ">
                                                                <b> I / We..... <br><br>
                                                                <input type="text" disabled  class="form-control @error('declare_by') is-invalid @enderror" id="declare_by" name="declare_by" value="{{ $data->declare_by }}" placeholder="Enter Applicant Name" >
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
                                                                    <input type="text" disabled name="nominated_persion_name" id="nominated_persion_name" class="form-control @error('nominated_persion_name') is-invalid @enderror" value="{{ $data->nominated_persion_name }}" placeholder="Enter Name of Nominated Person.">
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
                                                                    <input type="text" disabled name="d_last_name" id="d_last_name" class="form-control @error('d_last_name') is-invalid @enderror" value="{{ $data->d_last_name }}" placeholder="Enter Last Name / Surname.">
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



                                            <div class="form-group row mt-4" >
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/new_business_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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

                @include('common.citizen.footer.footer')

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


        <script>
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
        </script>

    </body>
</html>
