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

                                                <b><p style="text-align: center;">विषय:- इमारत/सीएनजी/पेट्रोल/डिझेल पंपाचा अंतिम अग्निशमन ना हरकत दाखला </p></b>
                                                <b><p style="text-align: center;">संदर्भ:- टोकन क्रं {{ $data->mst_token }} दिनांक {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} च्या अर्जान्वये.</p></b><br>
                                                <p>मेसर्स................................श्री. {{ $data->f_name }} {{ $data->father_name }} {{ $data->l_name }} उल्हासनगर {{ $data->society_name }} या इमारत/सी. एन. जी./पेट्रोल डिझेल पंपाला तात्पुरता अग्निशमन ना हरकत दाखला जा.क्र/उमपा/अग्नि/---/--- दिनांक {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} अन्वये अग्निशमन विभागाकडील सुरवातीचा तात्पुरता अग्निशमन ना हरकत दाखला देण्यात आलेला आहे.</p>
                                                <p>उपरोक्त ना हरकत दाखला अन्वये सुचविणेत आलेली आग प्रतिबंधक उपाययोजना सदर सी इमारत/सी.एन.जी./पेट्रोल/डिझेल पंप मध्ये बसविणेत आलेली असल्याचे मे. ........... .......... ........... ............ यांनी या कार्यालयात कळविले आहे.</p>
                                                <p>मेसर्स ......... ........... ........... ..................., उल्हासनगर {{ $data->society_name }} या इमारत/सी.एन.जी. पंप/पेट्रोल/डिझेल पंप मध्ये बसविणेत आलेली आग प्रतिबंधक उपाययोजनेची तपासणी दिनांक:{{ \Carbon\Carbon::parse($data->f_inspector_dt)->format('j/m/Y') }} रोजी घेतली असता सदर इमारत/सी.एन.जी./पेट्रोल/डिझेल पंप मध्ये अग्निशमन ना हरकत दाखला अन्वये सुचविणेत आलेली आग प्रतिबंधक उपाययोजना बसविणेत आलेली असून सदर उपाययोजना तपासणीच्या दिवशी सुस्थितीत व कार्यान्वित असल्याचे निदर्शनास आले आहे.</p>
                                                <p>सबब उपरोक्त इमारत/सी.एन.जी. पंप/पेट्रोल/डिझेल पंप करीता खालील अटी व शर्तीचे अधिन राहून अग्निशमन दलाचा अंतिम ना हरकत दाखला देण्यात येत आहे.</p>
                                                <p>१) अग्निशमन विभाग यांनी तपासणी केली असता इमारत/सी. एन. जी/पेट्रोल/डिझेल पंप मध्ये बसविणेत आलेली यंत्रणा पुरेशी व समाधानकारक आढळली. <br>
                                                    २) सदर यंत्रणेची माहिती तिचा आपद प्रसंगी वापर करणेबाबत व देखभाल याबाबत इमारत/सी.एन.जी. पंप/पेट्रोल/डिझेल पंप मधील कर्मचारी/रहिवासी यांना आवश्यक ते प्रशिक्षण यंत्रणा बसविणा-या संस्थेमार्फत देण्यात यावे.  <br>
                                                    ३) इमारत/सी.एन.जी. पंप/पेट्रोल/डिझेल पंप मधील बसविणेत आलेली यंत्रणा ताब्यात घेतल्यावर ती पुढे योग्य् व चालू स्थितीत ठेवण्याची जबाबदारी इमारत/सी. एन. जी. पंप/पेट्रोल/डिझेल पंप मालक व्यवस्थापनेची राहील. <br>
                                                    ४) जानेवारी व जुलै महिन्यामध्ये अग्निशमन यंत्रणा सुस्थितीत असल्याबाबतचे प्रमाणपत्र यंत्रणा बसविणेत आलेल्या संस्थेमार्फत अर्थात लायसन्स् अभिकरणमार्फत अग्निशमन विभागास सादर करावे लागेल. तसेच प्रत्येक वर्षी अग्निशमन ना हरकत दाखल्याचे नुतनीकरण करून घेणे बंधनकारक राहील.<br>
                                                    ५) सदर दाखला इमारत/सी.एन.जी. पंप/पेट्रोल/डिझेल पंप मधील अग्निशमन यंत्रणा तपासून देण्यात आला आहे. <br>
                                                    ६)  महाराष्ट्र आग प्रतिबंधक व जीव सरंक्षक उपाययोजना अधिनियम २००६ व एन.बी.सी. २०१६ यांस अधिन राहून ना हरकत दाखला देणेत येत आहे. <br>
                                                    ७) अग्निशमन दलाचा ना हरकत दाखला अर्जदाराने मागणी केल्यानुसार यंत्रणेची पाहणी व खात्री पटलेवरून देणेत येत आहे. <br>
                                                    <strong>८) सदरचा ना हरकत दाखला दिनांक {{date('d-m-Y', strtotime('+1 year', strtotime($data->inserted_dt)))}} पर्यंत वैध राहील.</strong><br><br> <strong>(सदर ना हरकत दाखला फक्त अग्निशमन उपाययोजनांशी संबधीत असून आवश्यकेतनुसार महानगरपालिकेच्या इतर विभागाचा ना हरकत दाखला प्राप्त करून घ्यावा तसेच शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नूतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong> </p>
                                                    <p>मा. उप-आयुक्त (अग्निशमन) यांचे आदेशान्वये</p>
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
                                                <p class="lineheight">मुख्य अग्निशमन अधिकारी</p>
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


