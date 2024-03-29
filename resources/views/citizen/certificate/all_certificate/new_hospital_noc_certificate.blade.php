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

                                                <b><p style="text-align: center;">विषय:- हॉस्पिटल करिता अग्निशमक ना हरकत दाखला</p></b>
                                                <b><p style="text-align: center;">संदर्भ:- टोकन क्रं {{ $data->mst_token }} दिनांक {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} च्या अर्जान्वये.</p></b><br>
                                                <p>श्री. {{ $data->f_name }} {{ $data->father_name }} {{ $data->l_name }} उल्हासनगर - येथे {{ $data->hospital_name }} हॉस्पिटल सुरू आहे.त्या अनुषंगाने अर्जदार यांनी दिनांक {{ \Carbon\Carbon::parse($data->inserted_dt)->format('j/m/Y') }} रोजीच्या अर्जान्वये हॉस्पिटल करीता अग्निशमन ना हरकत दाखल्याची मागणी केली आहे.</p>
                                                <p>त्यानुसार हॉस्पिटल इमारतीमध्ये आग प्रतिबंधक उपाययोजना बसविणेत आलेली असल्याचे मेर्सस ..................... उल्हासनगर- यांनी या कार्यालयात नमुना "अ" मध्ये प्रमाणपत्र दिले आहे. या इमारतीत बसविणेत आलेली आग प्रतिबंधक उपाययोजनेची तपासणी/चाचणी दिनांक {{ \Carbon\Carbon::parse($data->f_inspector_dt)->format('j/m/Y') }} रोजी घेतली असता सदर हॉस्पिटलमध्ये महाराष्ट्र आग प्रतिबंधक व जीव सरंक्षक उपाययोजना अधिनियम २००६ मधील अनुसुची एक व N.B.C. २०१६ टेबल ०७ नुसार करणेत आली असून सदर उपाययोजना तपासणीच्या दिवशी सुस्थितीत व कार्यान्वयीत असल्याचे पहाणीच्या दिवशी निदर्शनास आले आहे.सबब उपरोक्त हॉस्पिटलला खालील अटी व शर्तीचे अधिन राहून अग्निशमन दलाचा ना हरकत दाखला देण्यात येत आहे.</p>
                                                <p>१) अग्निशमन विभाग यांनी तपासणी केली असता हॉस्पिटलमध्ये बसविणेत आलेली यंत्रणा पुरेशी व समाधानकारक आढळली. <br>
                                                    २) सदर यंत्रणेची माहिती तिचा आपद प्रसंगी वापर करणेबाबत व देखभाल याबाबत हॉस्पिटलमधील कर्मचारी यांना आवश्यक ते प्रशिक्षण यंत्रणा बसविणा-या संस्थेमार्फत देण्यात यावे. <br>
                                                    ३) हॉस्पिटलमधील बसविणेत आलेली यंत्रणा ताब्यात घेतल्यावर ती पुढे योग्य् व चालू स्थितीत ठेवण्याची जबाबदारी इमारत व्यवस्थापनेची राहील. <br>
                                                    ४) जानेवारी व जुलै महिन्यामध्ये अग्निशमन यंत्रणा सुस्थितीत असल्याबाबतचे प्रमाणपत्र चयंत्रणा बसविणेत आलेल्या संस्थेमार्फत अर्थात लायसन्स् अभिकरणमार्फत अग्निशमन विभागास सादर करावे लागेल. तसेच प्रत्येक वर्षी अग्निशमन ना हरकत दाखल्याचे नुतनीकरण करून घेणे बंधनकारक राहील. <br>
                                                    ५) सदर दाखला हॉस्पिटलमधील अग्निशमन यंत्रणा तपासून देण्यात आला आहे. <br>
                                                    ६) महाराष्ट्र आग प्रतिबंधक व जीव सरंक्षक उपाययोजना अधिनियम २००६ व एन.बी.सी. २०१६ यांस अधिन राहून ना हरकत दाखला देणेत येत आहे. <br>
                                                    ७) अग्निशमन दलाचा ना हरकत दाखला अर्जदाराने मागणी केल्यानुसार यंत्रणेची पाहणी व खात्री पटलेवरून देणेत येत आहे. <br>
                                                    <strong>८) सदरचा ना हरकत दाखला दिनांक {{date('d-m-Y', strtotime('+1 year', strtotime($data->inserted_dt)))}} पर्यंत वैध राहील.</strong><br><br> <strong>(सदर ना हरकत दाखला फक्त अग्निशमन उपाययोजनांशी संबधीत असून आवश्यकेतनुसार महानगरपालिकेच्या इतर विभागाचा ना हरकत दाखला प्राप्त करून घ्यावा तसेच शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नुतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong> </p>
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


