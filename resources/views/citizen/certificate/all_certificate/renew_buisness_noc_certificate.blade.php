
        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('common.citizen.header.header')

            <div class="main-content">

                <div class="page-content">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="letter">
                                            <div style="float: left;">
                                                <img src="{{ url('/') }}/assets/logo/favicon.ico" alt="logo" width="60" height="60">
                                            </div>
                                            <div style="float: right;">
                                                <img src="{{ url('/') }}/assets/logo/favicon.ico" alt="Logo" width="60" height="60">
                                            </div>
                                            <div class="header">
                                                उल्हासनगर महानगरपालिका <br>
                                                अग्निशमन विभाग <br>
                                                दूरध्वनी क्र. २७२०१३१/२७२०१३२/२७२०१३३.
                                                <hr>
                                            </div>
                                            <div>
                                                <div style="float: left;"><b>टोकन क्र :- </b> {{ $data->mst_token }}</div>
                                                <div style="float: right;">जा.क्र उपमा/अग्नि/......./२०--</div><br>
                                                <div style="float: right;padding-right: 58px;">दिनांक :- {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} </div><br>
                                                <p class="lineheight">प्रति,</p>
                                                <p class="lineheight">श्री {{ $data->f_name }}</p>
                                                <p class="lineheight">{{ $data->father_name }}</p>
                                                <p class="lineheight">{{ $data->l_name }}</p>
                                                <p class="lineheight">उल्हासनगर -</p>

                                                @php
                                                   $total_payment = "";

                                                   if($data->wing_option == 1){
                                                      $total_payment = $data->wing_rate;
                                                   }elseif($data->wing_option == 2){
                                                     $total_payment = $data->total_charges_cost;
                                                   }
                                                @endphp

                                                <b><p style="text-align: center;"> <u>"विविध व्यवसाय नुतनीकरण ना हरकत दाखला”</u></p></b><br>
                                                <p>आपला दिनांक :- {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} चे अर्जानुसार आपल्या {{ $data->society_name }} व्यवसायाकरीता या पूर्वीचे जावक क्रं. उमपा /अग्नि / ---/२०-- दिनांक :- {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} चे अन्वये देण्यात आलेला "ना हरकत दाखला" त्यांचे नियम अटीसह दिनांक :- {{ \Carbon\Carbon::parse($data->f_inspector_dt)->format('j/m/Y') }} पर्यंत नुतनीकरण करण्यात येत असून त्यानंतर त्याचे पुन्हा नुतनीकरण करून घ्यावे.उपरोक्त दाखल्याचे नियम व अटीचा भंग केल्यास सदर दाखला रदद करण्यात येईल.</p>
                                                <p><strong>मागील नुतनीकरण ना हरकत दाखला भरलेली फी :- रक्कम  {{ $total_payment }} रू </strong></p>
                                                <p><strong>(टिप:- शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नुतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong></p>
                                            </div>

                                            @php
                                                $cf_signature = DB::table('signatures as t1')
                                                                ->select('t1.id', 't1.upload_signature_doc')
                                                                ->whereNUll('t1.deleted_at')
                                                                ->latest('inserted_dt')
                                                                ->first();
                                            @endphp
                                            <div class="signature">
                                                <img class="rounded-circle header-profile-user avatar-image" src="{{ url('/') }}/UMC_FireNOC/signature_doc/{{ $cf_signature->upload_signature_doc }}" alt="Chief Fire Officer">
                                                <p class="lineheight">(बाळासाहेब नेटके)</p>
                                                <p class="lineheight">मुख्य अग्निशमन अधिकारी (प्र.)</p>
                                                <p class="lineheight">अग्निशमन विभाग</p>
                                                <p class="lineheight">उल्हासनगर महानगरपालिका</p>
                                            </div>
                                        </div>

                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-primary me-1"><i class="fa fa-print"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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



