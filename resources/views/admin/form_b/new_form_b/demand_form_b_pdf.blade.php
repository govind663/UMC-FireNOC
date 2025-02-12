<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PMC-Fire NOC | New Form B NOC</title>

</head>

<style type="text/css">
    * {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
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
        height: 120px;
        ;
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

    th,
    td {
        border: 1px solid black;
        padding: 7px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body>
    <table>
        <tr>
            <td>
                @php
                    $logoData = file_get_contents(public_path('assets/logo/pmc-logo.png'));
                    $base64Logo = base64_encode($logoData);
                @endphp
                <img src="data:image/png;base64,{{ $base64Logo }}" alt="Corporation Logo" height="150" width="150">
            </td>
<td>
    <div style="font-size: 50px">
    &nbsp; &nbsp; पनवेल महानगरपालिका
    </div>
    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;ता. पनवेल, जिल्हा - रायगड, पनवेल-४१०२०६.
</td>
<td>
    @php
    $logoData = file_get_contents(public_path('assets/logo/pmc-logo.png'));
    $base64Logo = base64_encode($logoData);
@endphp
<img src="data:image/png;base64,{{ $base64Logo }}" alt="Corporation Logo" height="150" width="150">

</td>
        </tr>
    </table>


    <div class="card-body p-0">
        <form class="auth-input" style="padding-top: 150px;">

            <h2 class="mb-3">Form B Demand Letter</h2>


            <h4 class="mb-3"><b>Application Details :</b></h4>
            <table class="table table-bordered table-responsive" style="width: 100%;">

                <div>
                    <p style="font-size: 20px">
                        प्रति,<br>
                        मेसर्स, आशीर्वाद क्लिनिक वासुदेव सी.एच.एस.<br>पहिला मजला, महाड बैंक च्या वाजूला, टिळक रोड,
                        <br> पनवेल, ता. पनवेल, जि. रायगड ४१०२०६,
                    </p>
                    <p style="margin-left: 20% ;font-size: 20px">
                        विषय :- पनवेल महानगर पालिका अग्निशमन विभागाकडे लायसन्स अभिकरण यांचे मार्फत ब प्रमाणपत्र सादर केले बाबत.
                    </p>

                    <p style="margin-left: 20% ;font-size: 20px">
                        संदर्भ :- १. आपला दिनांक २९/१०/२०२४ रोजीचा सादर केलेला अर्ज.
                    </p>

                    <p style="font-size: 20px">
                        &nbsp;&nbsp;&nbsp; उपरोक्त विषयास अनुसरण, आपण पनवेल महानगरपालिका अग्निशमन विभागाकडे आपल्या मेसर्स. ए. आर. कन्ट्रक्शन, या अस्थापनेची अग्निशमन यंत्राना सुस्थितीत असल्याचे मेसर्स, रॉयल फापर प्रोटेक्शन सर्विस प्रा. लि. या
                        संस्थेचे प्रमाणपत्र (ब) या विभागास सादर केले आहे.
                    </p>

                    <p style="font-size: 20px">
                        &nbsp;&nbsp;&nbsp; याकामी पनवेल महानगरपालिकेच्या दिनांक ०८/०६/२०१७ च्या उरावानुसार या विभागाकडे आपल्या अस्थापनेचे होणारे रितसर १७ शुल्क आकरण्यात आलेले आहे. सदर त्याची पोहोच पावती घेणे आपणास बंधनकारक आहे.
                    </p>
                </div>

                <table style="font-size: 20px">

                    <tr>
                        <th>अ.क्र.</th>
                        <th>आपण विभागास गृहीत धरण्यात आलेले भरण्यात आलेले शुल्क</th>
                        <th>वार्षिक शुल्क आकारणी</th>
                        <th>एकुण शुल्क</th>
                        <th>शेरा</th>
                    </tr>
                    <tr style="font-size: 20px">
                        <td>1</td>
                        <td>५०,०००/-</td>
                        <td>१% = ५००/-</td>
                        <td>५०० x ८ = ४,०००/-</td>
                        <td>वर्ष २०१७ ते २०२४</td>
                    </tr>
                </table>

                <p style="font-size: 20px">

                    &nbsp;&nbsp;&nbsp; या नुसार वार्षिक शुल्क रक्कम रुपये ४,०००/- फक्त इतक्या रकमेचा धनाकर्षनवेल महानगरपालिका याचे नावे ७ दिवसाच्या आत अदा करण्यात यावा, असे न घडल्यास आपण सादर केलेले
                </p>
                <br>
                <p style="margin-left: 80%">
                    (प्रविण बोडखे)
                    <br>
                    मुख्य अग्निशमन अधिकारी <br>पनवेल महानगरपालिका
                </p>
                <p style="font-size: 20px">
                    माहिती करीता प्रत:-
                </p>

        </form>

    </div>
    <!-- end select2 -->

    </div>


</body>

</html>
