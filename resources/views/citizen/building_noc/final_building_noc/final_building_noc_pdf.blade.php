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
    * {
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        font-size: 15.5px;
    }
    h2 {
        text-align: center;
        background: #09627e;
        color: #e7eef0;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
        padding: 10px;
        font-size: 18px;
    }
    h4 {
        color: #09627e;
    }
    .page-break {
        page-break-after: always;
    }
    .avatar-image {
        height: 150px;;
        width: 180px;
        /*height: 4.6rem;*/
        /*width: 8.6rem;*/
    }
    .header {
        text-align: left;
        font-size: 16px !important;
        font-style: bold;
    }
</style>

<body>
    <div class="col-lg-12">
        <div class="header">
            <div style="float: right;">
                <img src="{{ public_path('assets/logo/umc_logo.png') }}" alt="logo" class="avatar-image">
            </div>

            <div style="float: left;">
                <p class="mb-1">
                    Ulhasnagar Municipal Corporation<br>
                    Near Chopda Court, Ulhasnagar - 3<br>
                    Pincode - 421 003, Maharashtra
                </p>
                <p class="mb-1"><i class="mdi mdi-email-outline me-1"></i> cfcumc@gmail.com</p>
                <p><i class="mdi mdi-phone-outline me-1"></i> 0251 2720150</p>
            </div>
        </div>
        <div class="card-body p-0">
            <form class="auth-input" style="padding-top: 150px;">

                <h2 class="mb-3">Final Building NOC</h2>
                <div style="float: right;">
                    <label ><b>Token Number :</b>  {{ $data->mst_token }}</label>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-2"><b>Appication Date :</b>  {{ date('d-m-Y') }}</label>
                </div>


                <h4 class="mb-3"><b>Appication Details :</b></h4>
                <div class="form-group row  mb-3">
                    <label class="col-sm-2"><b>First Name :</b>  {{ $data->f_name }}</label>

                    <label class="col-sm-2"><b>Father / Husband's Name :</b> {{ $data->father_name }}</label>

                    <label class="col-sm-2"><b>Last Name / Surname :</b>  {{ $data->l_name }}</label>

                    <label class="col-sm-2"><b>Name of Building :</b> {{ $data->society_name }}</label>

                    <label class="col-sm-2"><b>Designation :</b> {{ $data->designation }}</label>
                </div>

                <h4 class="mb-3"><b>Address Details :</b></h4>
                <div class="form-group row  mb-3">
                    <label class="col-sm-2"><b>House / Building / Society Name :</b> {{ $data->house_name }}</label>

                    <label class="col-sm-2"><b>Flat / Block / Barrack No. :</b> {{ $data->flat_no }}</label>

                    <label class="col-sm-2"><b>Wing / Floor :</b> {{ $data->wing_name }}</label>

                    <label class="col-sm-2"><b>Road / Street / Lane :</b> {{ $data->road_name }}</label>

                    <label class="col-sm-2"><b>Area / Locality / Town / City :</b> {{ $data->area_name }}</label>

                    <label class="col-sm-2"><b>Taluka :</b> {{ $data->taluka_name }}</label>

                    <label class="col-sm-2"><b>Pin code :</b> {{ $data->pincode }}</label>

                    @php
                        $wards = '';

                        if ($data->ward_no == 1) {
                            $wards = 'Ward 1';
                        } elseif ($data->ward_no == 2) {
                            $wards = 'Ward 2';
                        } elseif ($data->ward_no == 3) {
                            $wards = 'Ward 3';
                        } elseif ($data->ward_no == 4) {
                            $wards = 'Ward 4';
                        }

                    @endphp
                    <label class="col-sm-2"><b>Ward Committee No :</b> {{ $wards }}</label>

                    <label class="col-sm-2"><b>Electrol Panel No :</b> {{ $data->electrol_panel_no }}</label>

                    <label class="col-sm-2"><b>Contact Person :</b> {{ $data->contact_persion }}</label>

                    <label class="col-sm-2"><b>Telephone No. (if any) :</b> {{ $data->tel_no }}</label>

                    <label class="col-sm-2"><b>Email Id (if any) :</b> {{ $data->email }}</label>
                </div>

                @php
                    $property_types = '';

                    if ($data->types_of_property == 1) {
                        $property_types = 'Land';
                    } elseif ($data->types_of_property == 2) {
                        $property_types = 'Building';
                    }

                @endphp
                <h4 class="mb-2"><b>Information of Property :</b></h4>
                <div class="form-group row  mb-3">
                    <label class="col-sm-2"><b>Type of Property :</b> {{ $property_types }}</label>

                    <label class="col-sm-2"><b>Property Number :</b> {{ $data->property_no }}</label>
                </div>

                {{-- <div class="page-break"></div> --}}
                <h4 class="mb-3"><b>Necessary Particulars about above service</b></h4>
                <div class="form-group row  mb-3">
                    <label class="col-sm-2"><b>Construction Permission Number :</b> {{ $data->peermission_no }}</label>

                    <label class="col-sm-2"><b>Date of Permission :</b> {{ $data->permission_date }}</label>
                </div>

                <div class="page-break"></div>
                <h4 class="mb-3"><b>Necessary Enclosures related to above application (Documents to attach)</b></h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th width="80%" scope="col">Documents Name</th>
                                <th width="20%" scope="col">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td>
                                    Map / Plan showing Cease Fire Equipments installed and Water
                                </td>
                                <td>
                                    <div class="col-sm-4 col-md-4">
                                        @if(!empty($data->fire_equipments_install_doc))
                                            <a href="{{url('/')}}/UMC_FireNOC/Building_NOC/Final_BuildingNOC/fire_equipments_install_doc/{{ $data->fire_equipments_install_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                                View
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                {{-- <div class="page-break"></div> --}}
                <div class="row card-body border p-4">
                    <h4><b>Declaration</b></h4>

                    <div class="col-md-12 col-xs-12">
                        <p class="text-justify ">
                            I / We..... <b>{{ $data->declare_by }}</b>
                            <br>
                            ......
                            State on solemn affirmation that the above information is true
                            and correct to the best of my/our knowledge. If the information
                            given is found wrong then 1/We shali be held iegally liable for
                            its consequences.
                        </p>
                        Date : <b>{{ $data->declare_date }}</b>
                    </div>

                    @php
                        $persion_name = '';

                        if ($data->nominated_persion == 1) {
                            $persion_name = 'Self';
                        } elseif ($data->nominated_persion == 2) {
                            $persion_name = 'Nominee';
                        } elseif ($data->nominated_persion == 3) {
                            $persion_name = 'C.F.C.';
                        } elseif ($data->nominated_persion == 4) {
                            $persion_name = 'Camp No.';
                        }

                        $post_by = '';

                        if ($data->deliver_by == 1) {
                            $post_by = 'By Post U.P.C';
                        } elseif ($data->deliver_by == 2) {
                            $post_by = 'By Post Register A.D.';
                        } elseif ($data->deliver_by == 3) {
                            $post_by = 'Courier';
                        }
                    @endphp
                    <div class="col-md-12 col-xs-12">
                        <h4 class="mt-3"><b>The document may please be delivered to :</b></h4>
                        <div class="form-group row">
                            <label class="col-sm-2"><b>Self / Nominated Person :</b> {{ $persion_name }}</label>

                            <label class="col-sm-2"><b>Name of Nominated Person :</b> {{ $data->nominated_persion_name }}</label>

                            <label class="col-sm-2"><b>Deliver :</b> {{ $post_by }}</label>
                        </div>

                        <h4 class="mt-3 mb-3"><b>Correspondence Address : </b></h4>
                        <div class="form-group row">
                            <label class="col-sm-2"><b>First Name :</b> {{ $data->d_first_name }}</label>

                            <label class="col-sm-2"><b>Father / Husband's Name :</b> {{ $data->d_father_name }}</label>

                            <label class="col-sm-2"><b>Last Name / Surname :</b> {{ $data->d_last_name }}</label>

                            <label class="col-sm-2"><b>House / Building / Society Name :</b> {{ $data->d_house_name }}</label>

                            <label class="col-sm-2"><b>Flat / Block / Barrack No. :</b> {{ $data->d_flat_no }}</label>

                            <label class="col-sm-2"><b>Wing / Floor :</b> {{ $data->d_wing_no }}</label>

                            <label class="col-sm-2"><b>Road / Street / Lane :</b> {{ $data->d_road_name }}</label>

                            <label class="col-sm-2"><b>Area / Locality / Town / City :</b> {{ $data->d_area_name }}</label>

                            <label class="col-sm-2"><b>Taluka :</b> {{ $data->d_taluka_name }}</label>

                            <label class="col-sm-2"><b>Pincode :</b> {{ $data->d_pincode }}</label>

                            <label class="col-sm-2"><b>Email Id (if any) :</b> {{ $data->d_email }}</label>
                        </div>
                    </div>

                </div>

            </form>

        </div>
        <!-- end select2 -->

    </div>


</body>

</html>
