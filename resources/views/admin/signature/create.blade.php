<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>UMC-Fire NOC | Add Signature </title>
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

</head>

<style>
    .select2 {
        border: 1px solid rgb(7, 147, 165);
        border-radius: 5px;
    }

    #preview-container {
      max-width: 400px;
      /* margin: 20px auto; */
    }

    #file-preview {
      width: 100%;
      height: auto;
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
                            <div class="card" style="border: 1px solid #000000;">
                                <div class="card-body p-0">
                                    <h4 class="card-header text-light bg-primary ">Add Signature</h4>

                                    <form class="auth-input p-4" method="POST" action="{{ route('signature.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row  mb-3">
                                            <label class="col-sm-3"><strong>Upload Signature : <span style="color:red;">*</span></strong></label>
                                            <div class="col-sm-3 col-md-3">
                                                <input type="file" id="file-input" accept=".pdf, .png, .jpg, .jpeg" onchange="previewFile()" name="upload_signature_doc" class="form-control @error('upload_signature_doc') is-invalid @enderror" value="{{ old('upload_signature_doc') }}" placeholder="Upload Signature">
                                                <small class="text-secondary"> Note : The file size should be less than
                                                    2MB .</small>
                                                <br>
                                                <small class="text-secondary"> Note : Only files in .jpg, .jpeg, .png,
                                                    .pdf format can be uploaded .</small>
                                                <br>
                                                @error('upload_signature_doc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div id="preview-container">
                                                <div id="file-preview"></div>
                                            </div>
                                        </div>


                                        <div class="form-group row mt-4">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ route('signature.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <!-- end select2 -->

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

    {{-- preview both image and PDF --}}
    <script>
        function previewFile() {
            const fileInput = document.getElementById('file-input');
            const previewContainer = document.getElementById('preview-container');
            const filePreview = document.getElementById('file-preview');
            const file = fileInput.files[0];

            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                const validPdfTypes = ['application/pdf'];

                if (validImageTypes.includes(fileType)) {
                    // Image preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="100%" height="100px">`;
                    };
                    reader.readAsDataURL(file);
                } else if (validPdfTypes.includes(fileType)) {
                    // PDF preview using an embed element
                    filePreview.innerHTML =
                        `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="100px" />`;
                } else {
                    // Unsupported file type
                    filePreview.innerHTML = '<p>Unsupported file type</p>';
                }

                previewContainer.style.display = 'block';
            } else {
                // No file selected
                previewContainer.style.display = 'none';
            }
        }

    </script>
</body>

</html>

