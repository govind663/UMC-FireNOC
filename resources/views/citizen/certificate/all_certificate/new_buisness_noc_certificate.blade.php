
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

                                                <b><p style="text-align: center;"> <u>"विविध व्यवसायाकरीता अग्निशमन ना हरकत दाखला"</u></p></b><br>
                                                <p>उल्हासनगर महानगरपालिकेचे क्षेत्रातील उल्हासनगर विभागातील दिनांक {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} च्या अर्जावरून श्री. {{ $data->f_name }} {{ $data->father_name }} {{ $data->l_name }} उल्हासनगर- -- यांना {{ $data->society_name }} व्यवसायाकरीता अग्निशमन विषयक "ना हरकत दाखला" खालील अटीस अधीन राहून देण्यात येत आहे.</p>
                                                <p>१) सदर जागा पक्की विटा सिमेंटची असावी व त्यात खेळती हवा असणे आवश्यक आहे. <br>
                                                    २) आपदप्रसंगी चटकन सुलभतेने हाताळता येतील अशाप्रकारे आवश्यकतेनुसार ए. बी. सी. टाईप अग्निशमन नळकांडे (सिलेंडर) त्या ठिकाणी ठेवणे बंधनकारक आहे (आय. एस. २१९० प्रमाणे फायर एक्स्टीग्युशर लावण्यात यावे.) <br>
                                                    ३) आपादप्रसंगी पाण्याचा चटकन वापर करता यावा म्हणून जवळपास पाण्याचा पुरेसा साठा करणारी टाकी ठेवावी. <br>
                                                    ४) जर परवाना जागा पध्दत यामध्ये बदल झाल्यास हा दाखला रद्द करणेत येईल. <br>
                                                    ५) ............ चालविणेकरीता उल्हासनगर महानगरपालिकेचा आवश्यक तो योग्य वेगळा परवाना घ्यावयास हवा व इतर काही कारणासाठी कायदयाच्या नियमाप्रमाणे आपल्याकडे परवाना पत्र किंवा परवाना असणे आवश्यक आहे. <br>
                                                    ६) ............ मुळे आजुबाजुच्या लोकांना त्रास होणार नाही याची काळजी घेणे बंधनकारक आहे काही तक्रार आल्यास आपला दाखला रद्द करणेत येईल. <br>
                                                    ७)मुख्य् अग्निशमन अधिकारी किंवा त्यांनी नामनिर्देशित केलेला कोणताही अग्निशमन अधिकारी उल्हासनगर महानगरपालिका यांचेकडून वार्षिक तपासणी करून त्याबद्दल प्रमाणपत्र घेणे बंधनकारक राहील. <br>
                                                    ८) वरील अग्निशमन ना हरकत दाखला फक्त आगीच्‍या सुरक्षिततेच्या दृष्टीने करावयाच्या उपाययोजना करीता देण्यात येत आहे. <br>
                                                    <strong>९) हा "ना हरकत दाखला" दिनांक {{date('d-m-Y', strtotime('+1 year', strtotime($data->inserted_dt)))}} पर्यंत वैध आहे.</strong> <br>
                                                    १०) वरील अटीची पुर्तता न केल्यास कोणत्याही प्रकारची सुचना न देता जागेवर दाखला रद्द करणेत येईल.
                                                </p>
                                                    <p><strong>(सदर ना हरकत दाखला फक्त अग्निशमन उपाययोजनांशी संबधीत असून आवश्यकेतनुसार महानगरपालिकेच्या इतर विभागाच ना हरकत दाखला प्राप्त करून घ्यावा तसेच शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नुतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong></p>
                                                    <p>मा. उप-आयुक्त (अग्निशमन) यांचे मान्यतेने.</p>
                                            </div>
                                            <!-- <div class="date">
                                                <p>दिनांक: <strong>तारीख</strong></p>
                                            </div> -->

                                            @php
                                                $cf_signature = DB::table('signatures as t1')
                                                                ->select('t1.id', 't1.upload_signature_doc')
                                                                ->whereNUll('t1.deleted_at')
                                                                ->latest('inserted_dt')
                                                                ->first();
                                            @endphp

                                            <div class="signature">
                                                <img class="rounded-circle header-profile-user avatar-image" src="{{ url('/') }}/UMC_FireNOC/signature_doc/{{ $cf_signature->upload_signature_doc ?? null }}" alt="Chief Fire Officer">
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



