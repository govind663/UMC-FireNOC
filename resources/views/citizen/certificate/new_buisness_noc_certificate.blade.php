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
            .lineheight{
                line-height: 3px;
            }
            @page {
                margin: 0;
            }
        </style>
    </head>


    <body data-topbar="colored" data-layout="horizontal">

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
                                                <p class="lineheight">प्रति,</p>
                                                <p class="lineheight">श्री. .........................,</p>
                                                <p class="lineheight">.............................</p>
                                                <p class="lineheight">.............................</p>
                                                <p>उल्हासनगर -</p>

                                                <b><p style="text-align: center;"> <u>"विविध व्यवसायाकरीता अग्निशमन ना हरकत दाखला"</u></p></b><br>
                                                <p>उल्हासनगर महानगरपालिकेचे क्षेत्रातील उल्हासनगर विभागातील दिनांक --/--/२०-- च्या अर्जावरून श्री..............................................................................., उल्हासनगर- -- यांना ................ व्यवसायाकरीता अग्निशमन विषयक "ना हरकत दाखला" खालील अटीस अधीन राहून देण्यात येत आहे.</p>
                                                <p>१) सदर जागा पक्की विटा सिमेंटची असावी व त्यात खेळती हवा असणे आवश्यक आहे. <br>
                                                    २) आपदप्रसंगी चटकन सुलभतेने हाताळता येतील अशाप्रकारे आवश्यकतेनुसार ए. बी. सी. टाईप अग्निशमन नळकांडे (सिलेंडर) त्या ठिकाणी ठेवणे बंधनकारक आहे (आय. एस. २१९० प्रमाणे फायर एक्स्टीग्युशर लावण्यात यावे.) <br>
                                                    ३) आपादप्रसंगी पाण्याचा चटकन वापर करता यावा म्हणून जवळपास पाण्याचा पुरेसा साठा करणारी टाकी ठेवावी. <br>
                                                    ४) जर परवाना जागा पध्दत यामध्ये बदल झाल्यास हा दाखला रद्द करणेत येईल. <br>
                                                    ५) ............ चालविणेकरीता उल्हासनगर महानगरपालिकेचा आवश्यक तो योग्य वेगळा परवाना घ्यावयास हवा व इतर काही कारणासाठी कायदयाच्या नियमाप्रमाणे आपल्याकडे परवाना पत्र किंवा परवाना असणे आवश्यक आहे. <br>
                                                    ६) ............ मुळे आजुबाजुच्या लोकांना त्रास होणार नाही याची काळजी घेणे बंधनकारक आहे काही तक्रार आल्यास आपला दाखला रद्द करणेत येईल. <br>
                                                    ७)मुख्य् अग्निशमन अधिकारी किंवा त्यांनी नामनिर्देशित केलेला कोणताही अग्निशमन अधिकारी उल्हासनगर महानगरपालिका यांचेकडून वार्षिक तपासणी करून त्याबद्दल प्रमाणपत्र घेणे बंधनकारक राहील. <br>
                                                    ८) वरील अग्निशमन ना हरकत दाखला फक्त आगीच्‍या सुरक्षिततेच्या दृष्टीने करावयाच्या उपाययोजना करीता देण्यात येत आहे. <br>
                                                    <strong>९) हा "ना हरकत दाखला" दिनांक --/--/२०-- पर्यंत वैध आहे.</strong> <br>
                                                    १०) वरील अटीची पुर्तता न केल्यास कोणत्याही प्रकारची सुचना न देता जागेवर दाखला रद्द करणेत येईल.
                                                </p>
                                                    <p><strong>(सदर ना हरकत दाखला फक्त अग्निशमन उपाययोजनांशी संबधीत असून आवश्यकेतनुसार महानगरपालिकेच्या इतर विभागाच ना हरकत दाखला प्राप्त करून घ्यावा तसेच शासकीय ठराव क्र. ५० दिनांक २८/०२/२०२३ अन्वये एक महिन्यानंतर मुळ नुतनीकरण शुल्कावर विलंब आकार १०% प्रति महीना आकारण्यात येईल.)</strong></p>
                                                    <p>मा. उप-आयुक्त (अग्निशमन) यांचे मान्यतेने.</p>
                                            </div>
                                            <!-- <div class="date">
                                                <p>दिनांक: <strong>तारीख</strong></p>
                                            </div> -->
                                            <div class="signature">
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
