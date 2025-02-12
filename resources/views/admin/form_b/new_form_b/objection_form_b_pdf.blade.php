<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PMC-Fire NOC | New Form B NOC</title>

    <!-- App favicon -->

</head>

<style  type="text/css">
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

            </div>

            <div style="float: right;">
                <p class="mb-1">
                    Panvel Municipal Corporation<br>
                    Near Chopda Court, Panvel - 3<br>
                    Pincode - 421 003, Maharashtra
                </p>
                <p class="mb-1"><i class="mdi mdi-email-outline me-1"></i>panvelcorporation@gmail.com</p>
                <p><i class="mdi mdi-phone-outline me-1"></i> ०२२-७४५२२३३</p>
            </div>
        </div>
        <div class="card-body p-0">
            <form class="auth-input" style="padding-top: 150px;">

                <h2 class="mb-3">New Form B NOC</h2>
                <table class="table table-bordered table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Appication Date :</b> {{ date("d-M-Y") }}</td>
                            <td class="col-sm-5"><b>Token Number :</b> {{ $data->mst_token }}</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="mb-3"><b>Application Details :</b></h4>
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
                            <th scope="row">Name of Business : </th>
                            <td colspan="3">{{ ucwords($data->society_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Designation </th>
                            <td colspan="3">{{ ucwords($data->designation) }}</td>
                        </tr>
                    </tbody>
                </table>
                hiii
                <h4 class="mb-3"><b>Demandraft Details :</b></h4>

  <table class="table table-bordered table-responsive" style="width: 100%;">

                </table>

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
