

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

                                                <b><p style="text-align: center;"> <u>" नुतनीकरण ना हरकत दाखला "</u></p></b><br>
                                                <p>आपला दिनांक :-{{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} चे अर्जानुसार आपल्या हॉस्पिटल व्यवसायाकरीता या पूर्वीचे जावक क्रं. उमपा /अग्नि / ---/२०-- दिनांक :- {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} चे अन्वये देण्यात आलेला "ना हरकत दाखला" त्यांचे नियम अटीसह दिनांक :- {{ \Carbon\Carbon::parse($data->f_inspector_dt)->format('j/m/Y') }} पर्यंत नुतनीकरण करण्यात येत असून त्यानंतर त्याचे पुन्हा नुतनीकरण करून घ्यावे. सदरचे नुतनीकरण महाराष्ट्र आग प्रतिबंधक व जीव सरंक्षक उपाययोजना अधिनियम २००६ मधील कलम १३ चे (१) अन्वये नुतनीकरण करणेत येत आहे. उपरोक्त दाखल्याचे नियम व अटीचा भंग केल्यास सदर दाखला रदद करण्यात येईल.</p>
                                                <p><strong>मागील नुतनीकरण ना हरकत दाखला भरलेली फी :- रक्कम रू --------/-</strong></p>
                                                <p><strong>(टिप:- शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नुतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong></p>
                                            </div>
                                            <div class="signature">
                                                <p class="lineheight">(बाळासाहेब नेटके)</p>
                                                <p class="lineheight">मुख्य अग्निशमन अधिकारी (प्र.)</p>
                                                <p class="lineheight">अग्निशमन विभाग</p>
                                                <p class="lineheight">उल्हासनगर महानगरपालिका</p>
                                            </div>
                                        </div>

                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-primary me-1">
                                                    <i class="fa fa-print"></i>
                                                </a>

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


