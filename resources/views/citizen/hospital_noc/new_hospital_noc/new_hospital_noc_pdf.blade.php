<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>UMC-Fire NOC | New Hospital NOC</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ public_path('/assets/logo/favicon.ico') }}">

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
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        padding: 10px;
        font-size: 20px;
    }
    h4 {
        color: #09627e;
    }
    .page-break {
        page-break-after: always;
    }
    .avatar-image {
        height: 120px;;
        width: 250px;
        /*height: 4.6rem;*/
        /*width: 8.6rem;*/
    }
    .header {
        text-align: left;
        font-size: 16px !important;
        font-style: bold;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid black;
    }
    th, td {
        border: 1px solid black;
        padding: 7px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>

<body>
    <div class="col-lg-12">
        <div class="header">
            <div style="float: left;">
                <img src="{{ public_path('assets/logo/logo_dark.png') }}" alt="logo" class="avatar-image">
            </div>

            <div style="float: right;">
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

                <h2 class="mb-3">New Hospital NOC</h2>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Appication Date :</b> {{ date("d-M-Y") }}</td>
                            <td class="col-sm-5"><b>Token Number :</b> {{ $data->mst_token }}</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="mb-3"><b>Appication Details :</b></h4>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row">First Name : </th>
                            <td colspan="3">{{ ucwords($data->f_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Father / Husband's Name : </th>
                            <td colspan="3">{{ ucwords($data->father_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Name : </th>
                            <td colspan="3">{{ ucwords($data->l_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name of Hospital : </th>
                            <td colspan="3">{{ ucwords($data->hospital_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Designation </th>
                            <td colspan="3">{{ ucwords($data->designation) }}</td>
                        </tr>
                    </tbody>
                </table>

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
                <h4 class="mb-3"><b>Address Details :</b></h4>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row">House / Building / Society Name : </th>
                            <td colspan="3">{{ ($data->house_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Flat / Block / Barrack No. : </th>
                            <td colspan="3">{{ ($data->flat_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Wing / Floor : </th>
                            <td colspan="3">{{ ($data->wing_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Road / Street / Lane : </th>
                            <td colspan="3">{{ ($data->road_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Area / Locality / Town / City : </th>
                            <td colspan="3">{{ ($data->area_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Taluka : </th>
                            <td colspan="3">{{ ($data->taluka_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pin code : </th>
                            <td colspan="3">{{ ($data->pincode) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ward Committee No : </th>
                            <td colspan="3">{{ ($wards) }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Electrol Panel No : </th>
                            <td colspan="3">{{ ($data->electrol_panel_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Contact Person : </th>
                            <td colspan="3">{{ ($data->contact_persion) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Telephone No. (if any) : </th>
                            <td colspan="3">{{ ($data->tel_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email Id (if any) : </th>
                            <td colspan="3">{{ ($data->email) }}</td>
                        </tr>
                    </tbody>
                </table>

                @php
                    $property_types = '';

                    if ($data->types_of_property == 1) {
                        $property_types = 'Land';
                    } elseif ($data->types_of_property == 2) {
                        $property_types = 'Building';
                    }

                @endphp
                <h4 class="mb-2"><b>Information of Property :</b></h4>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row">Type of Property : </th>
                            <td colspan="3">{{ ucwords($property_types) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Property Number : </th>
                            <td colspan="3">{{ ucwords($data->property_no) }}</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="mb-3"><b>Information of Land :</b></h4>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row">Town / City : </th>
                            <td colspan="3">{{ ucwords($data->city_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Survey / Block / Barrak No. : </th>
                            <td colspan="3">{{ ucwords($data->survey_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">C.T.S. No. : </th>
                            <td colspan="3">{{ ucwords($data->cts_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Part No. / Sheet No. : </th>
                            <td colspan="3">{{ ucwords($data->part_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Plot No. / Unit No. : </th>
                            <td colspan="3">{{ ucwords($data->plot_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Property Number : </th>
                            <td colspan="3">{{ ucwords($data->survey_no) }}</td>
                        </tr>
                    </tbody>
                </table>

                @php
                    $types_of_hospital = '';

                    if ($data->types_of_hospital == 1) {
                        $types_of_hospital = 'Temporary';
                    } elseif ($data->types_of_hospital == 2) {
                        $types_of_hospital = 'Fixed';
                    }
                @endphp
                @php
                    $hospital_fireequip = '';

                    if ($data->hospital_fireequip == 1) {
                        $hospital_fireequip = 'Yes';
                    } elseif ($data->hospital_fireequip == 2) {
                        $hospital_fireequip = 'No';
                    }
                @endphp
                {{-- <div class="page-break"></div> --}}
                <h4 class="mb-3"><b>Necessary Particulars about above service</b></h4>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row">Pincode : </th>
                            <td colspan="3">{{ ($data->area_pincode) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Shop No. : </th>
                            <td colspan="3">{{ ($data->shop_no) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Type of Hospital : </th>
                            <td colspan="3">{{ ($types_of_hospital) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">From Date : </th>
                            <td colspan="3">{{ ($data->from_date) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">To Date : </th>
                            <td colspan="3">{{ ($data->to_date) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Area of Place (Sq. Mt.) : </th>
                            <td colspan="3">{{ ($data->area_place_measurments) }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Numbers of Staff : </th>
                            <td colspan="3">{{ ($data->total_staff) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Number of Workers / Servants sleep at night at working place : </th>
                            <td colspan="3">{{ ($data->total_sleeping_staff) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fire extinguishers / preventive equipments are installed at working place : </th>
                            <td colspan="3">{{ ($hospital_fireequip) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address Of Hospital Place : </th>
                            <td colspan="3">{{ ($data->hospital_address) }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="page-break"></div>
                <h4 class="mb-3"><b>Necessary Enclosures related to above application (Documents to attach)</b></h4>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Location of Place (Google Map Link) : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            {{ $data->location_of_place }}
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Document Of Property : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->property_doc;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/property_doc') }}/{{ $data->property_doc }}" alt="image" width="100%" height="21%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/property_doc') }}/{{ $data->property_doc }} " height='100%' width='21%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Letter from License Holder regarding proper electric connection : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->electric_doc;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/electric_doc') }}/{{ $data->electric_doc }}" alt="image" width="100%" height="21%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/electric_doc') }}/{{ $data->electric_doc }} " height='100%' width='21%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Shop License : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->shop_license_doc;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/shop_license_doc') }}/{{ $data->shop_license_doc }}" alt="image" width="100%" height="25%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/shop_license_doc') }}/{{ $data->shop_license_doc }} " height='100%' width='25%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Up-to-date receipt of Tax bill paid : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->paid_tax_bill_doc;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/paid_tax_bill_doc') }}/{{ $data->paid_tax_bill_doc }}" alt="image" width="100%" height="25%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/paid_tax_bill_doc') }}/{{ $data->paid_tax_bill_doc }} " height='100%' width='25%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Commissioning Certificate of Fire extinguishers / preventive equipments of I.S.I. Mark : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->commissioning_certificate;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/commissioning_certificate') }}/{{ $data->commissioning_certificate }}" alt="image" width="100%" height="25%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/commissioning_certificate') }}/{{ $data->commissioning_certificate }} " height='100%' width='25%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Copy of Affidavit : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->affidavit_doc;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/affidavit_doc') }}/{{ $data->affidavit_doc }}" alt="image" width="100%" height="25%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/affidavit_doc') }}/{{ $data->affidavit_doc }} " height='100%' width='25%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Corporation Registration certificate (FOR OLD HOSPITAL) : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->corporation_certificate;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/corporation_certificate') }}/{{ $data->corporation_certificate }}" alt="image" width="100%" height="25%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/corporation_certificate') }}/{{ $data->corporation_certificate }} " height='100%' width='25%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <thead>
                        <th class="col-12">Maps of Proposed Construction : </th>
                    </thead>
                    <tbody>
                        <td class="col-8">
                            <div class="form-group">
                                @php
                                     $document_path = $data->construction_plan_doc;
                                     $filter_path =  explode(".",$document_path);
                                     $size_of_array = count($filter_path);
                                     $filter_ext = $filter_path[$size_of_array - 1];
                                @endphp

                                @if($filter_ext == 'jpg' || $filter_ext=='jpeg' || $filter_ext == 'png' || $filter_ext == 'gif' ||
                                    $filter_ext == 'JPG' || $filter_ext=='JPEG' || $filter_ext == 'PNG' || $filter_ext == 'GIF' )
                                <img src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/construction_plan_doc') }}/{{ $data->construction_plan_doc }}" alt="image" width="100%" height="25%">
                                @elseif ($filter_ext == 'pdf' || $filter_ext == 'PDF')
                                <iframe src="{{ public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/construction_plan_doc') }}/{{ $data->construction_plan_doc }} " height='100%' width='25%'></iframe>
                                @else
                                {{"No Map Found"}}
                                @endif
                            </div>
                        </td>
                    </tbody>
                </table>

                <div class="page-break"></div>
                <div class="row  p-4" style="border:1px  solid #0c0c0c !important;">
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
                        Date :
                        <b>
                            {{ date('d-m-Y', strtotime($data->declare_date)) }}
                        </b>
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
                        <table class="table table-bordered table-responsive" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <th scope="row">Self / Nominated Person : </th>
                                    <td colspan="3">{{ ($persion_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name of Nominated Person : </th>
                                    <td colspan="3">{{ ucwords($data->nominated_persion_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Deliver : </th>
                                    <td colspan="3">{{ ucwords($post_by) }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="mt-3 mb-3"><b>Correspondence Address : </b></h4>
                        <table class="table table-bordered table-responsive" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <th scope="row">First Name : </th>
                                    <td colspan="3">{{ ucwords($data->d_first_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Father / Husband's Name : </th>
                                    <td colspan="3">{{ ucwords($data->d_father_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name / Surname : </th>
                                    <td colspan="3">{{ ucwords($data->d_last_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">House / Building / Society Name : </th>
                                    <td colspan="3">{{ ucwords($data->d_house_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Flat / Block / Barrack No. : </th>
                                    <td colspan="3">{{ ucwords($data->d_flat_no) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Wing / Floor : </th>
                                    <td colspan="3">{{ ucwords($data->d_wing_no) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Road / Street / Lane : </th>
                                    <td colspan="3">{{ ucwords($data->d_road_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Area / Locality / Town / City : </th>
                                    <td colspan="3">{{ ucwords($data->d_area_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Taluka : </th>
                                    <td colspan="3">{{ ucwords($data->d_taluka_name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pincode : </th>
                                    <td colspan="3">{{ ucwords($data->d_pincode) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email Id (if any) : </th>
                                    <td colspan="3">{{ ucwords($data->d_email) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </form>

        </div>
        <!-- end select2 -->

    </div>


</body>

</html>
