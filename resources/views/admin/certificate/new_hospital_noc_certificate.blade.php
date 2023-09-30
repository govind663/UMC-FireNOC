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
        <style>

        </style>
    </head>

    <style>
        .select2 {
            border: 1px solid rgb(7, 147, 165);
            border-radius: 5px;
        }

        .letter {
            margin: 0 auto;
            text-align: justify;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
        }
        .date {
            text-align: right;
        }
        .signature {
            text-align: right;
            margin-top: 40px;
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="letter">
                                            <div style="float: left;">
                                                <img src="http://127.0.0.1:8000/assets/logo/favicon.ico" alt="logo" width="60" height="60">
                                            </div>
                                            <div style="float: right;">
                                                <img src="http://127.0.0.1:8000/assets/logo/favicon.ico" alt="Logo" width="60" height="60">
                                            </div>
                                            <div class="header">
                                                उल्हासनगर महानगरपालिका <br>
                                                अग्निशमन विभाग <br>
                                                दूरध्वनी क्र. २७२०१३१/२७२०१३२/२७२०१३३.
                                                <hr>
                                            </div>
                                            <div>
                                                <div style="float: left;">टोकन क्र:- ..................</div>
                                                <div style="float: right;">जा.क्र उपमा/अग्नि/......./२०--</div><br>
                                                <div style="float: right;padding-right: 58px;">दिनांक:  --/--/२०--</div><br>
                                                <p>प्रति,</p>
                                                <p>श्री..........................</p>
                                                <p>.............................</p>
                                                <p>.............................</p>
                                                <p>उल्हासनगर -</p>

                                                <b><p style="text-align: center;">विषय:- हॉस्पिटल करिता अग्निशमक ना हरकत दाखला</p></b>
                                                <b><p style="text-align: center;">संदर्भ:- टोकन क्रं .................... दिनांक --/--/२०-- च्या अर्जान्वये.</p></b><br>
                                                <p>श्री. .................................................................................................. उल्हासनगर - येथे ................... हॉस्पिटल सुरू आहे.त्या अनुषंगाने अर्जदार यांनी दिनांक --/--/२०-- रोजीच्या अर्जान्वये हॉस्पिटल करीता अग्निशमन ना हरकत दाखल्याची मागणी केली आहे.</p>
                                                <p>त्यानुसार हॉस्पिटल इमारतीमध्ये आग प्रतिबंधक उपाययोजना बसविणेत आलेली असल्याचे मेर्सस ..................... उल्हासनगर- यांनी या कार्यालयात नमुना "अ" मध्ये प्रमाणपत्र दिले आहे. या इमारतीत बसविणेत आलेली आग प्रतिबंधक उपाययोजनेची तपासणी/चाचणी दिनांक --/--/२०-- रोजी घेतली असता सदर हॉस्पिटलमध्ये महाराष्ट्र आग प्रतिबंधक व जीव सरंक्षक उपाययोजना अधिनियम २००६ मधील अनुसुची एक व N.B.C. २०१६ टेबल ०७ नुसार करणेत आली असून सदर उपाययोजना तपासणीच्या दिवशी सुस्थितीत व कार्यान्वयीत असल्याचे पहाणीच्या दिवशी निदर्शनास आले आहे.सबब उपरोक्त हॉस्पिटलला खालील अटी व शर्तीचे अधिन राहून अग्निशमन दलाचा ना हरकत दाखला देण्यात येत आहे.</p>
                                                <p>१) अग्निशमन विभाग यांनी तपासणी केली असता हॉस्पिटलमध्ये बसविणेत आलेली यंत्रणा पुरेशी व समाधानकारक आढळली. <br>
                                                    २) सदर यंत्रणेची माहिती तिचा आपद प्रसंगी वापर करणेबाबत व देखभाल याबाबत हॉस्पिटलमधील कर्मचारी यांना आवश्यक ते प्रशिक्षण यंत्रणा बसविणा-या संस्थेमार्फत देण्यात यावे. <br>
                                                    ३) हॉस्पिटलमधील बसविणेत आलेली यंत्रणा ताब्यात घेतल्यावर ती पुढे योग्य् व चालू स्थितीत ठेवण्याची जबाबदारी इमारत व्यवस्थापनेची राहील. <br>
                                                    ४) जानेवारी व जुलै महिन्यामध्ये अग्निशमन यंत्रणा सुस्थितीत असल्याबाबतचे प्रमाणपत्र चयंत्रणा बसविणेत आलेल्या संस्थेमार्फत अर्थात लायसन्स् अभिकरणमार्फत अग्निशमन विभागास सादर करावे लागेल. तसेच प्रत्येक वर्षी अग्निशमन ना हरकत दाखल्याचे नुतनीकरण करून घेणे बंधनकारक राहील. <br>
                                                    ५) सदर दाखला हॉस्पिटलमधील अग्निशमन यंत्रणा तपासून देण्यात आला आहे. <br>
                                                    ६) महाराष्ट्र आग प्रतिबंधक व जीव सरंक्षक उपाययोजना अधिनियम २००६ व एन.बी.सी. २०१६ यांस अधिन राहून ना हरकत दाखला देणेत येत आहे. <br>
                                                    ७) अग्निशमन दलाचा ना हरकत दाखला अर्जदाराने मागणी केल्यानुसार यंत्रणेची पाहणी व खात्री पटलेवरून देणेत येत आहे. <br>
                                                    <strong>८) सदरचा ना हरकत दाखला दिनांक --/--/२०-- पर्यंत वैध राहील.</strong><br><br> <strong>(सदर ना हरकत दाखला फक्त अग्निशमन उपाययोजनांशी संबधीत असून आवश्यकेतनुसार महानगरपालिकेच्या इतर विभागाचा ना हरकत दाखला प्राप्त करून घ्यावा तसेच शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नुतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong> </p>
                                                    <p>मा. उप-आयुक्त (अग्निशमन) यांचे आदेशान्वये</p>
                                            </div>
                                            <!-- <div class="date">
                                                <p>दिनांक: <strong>तारीख</strong></p>
                                            </div> -->
                                            <div class="signature">
                                                <p>(बाळासाहेब नेटके)</p>
                                                <p>मुख्य अग्निशमन अधिकारी</p>
                                                <p>अग्निशमन विभाग</p>
                                                <p>उल्हासनगर महानगरपालिका</p>
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
