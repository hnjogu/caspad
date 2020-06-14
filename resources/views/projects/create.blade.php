@extends('layouts.caspad')

@section('content')

<!--bootstarp file input css --->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

<div class="mt-4">
    <div class="card">
        <div class="card-header text-center bg-success"> <h3>Post Project</h3> </div>
        <div class="card-body">
        <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <input type="hidden"  name="email" value="{{ Auth::user()->email}}">
        <input type="hidden"  name="user_id" value="{{ Auth::user()->id}}">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Your Name / Company</span>
                    <input id="name" type="text" value="{{ Auth::user()->name}} {{ Auth::user()->lastname}}" class="form-control" readonly name="customer_name"  placeholder="Your Name" >
                </div>
            </div>
{{--             <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Choose Audio / Video to upload</span>
                    <input type="file" id="file" class="form-control" name="file_name">
                    <audio id="audio"></audio>
                </div>
            </div> --}}
            <div class="col-md-4 mb-3">
                <label for="validationServer024">Upload Tax Compliance Certificate</label>
                <div class="form-group">
                    <div class="input-group input-file" name="Fichier1">
                        <span class="input-group-btn">
                           
                        </span>
                        <input type="file" class="form-control" id="file" name="file_name" placeholder='Upload a file...' required data-parsley-error-message="Upload file"/>
                        <audio id="audio"></audio>
                    </div>
                </div>
            </div>
{{--             <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Choose Audio / Video to upload</span>
                    <input type="file" id="file" class="form-control" name="file_name">
                    <audio id="audio"></audio>
                </div>
            </div> --}}
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Project Subject</span>
                    <select class="form-control" id="exampleFormControlSelect1" name="subject" value="{{old('subject')}}">
                        <option value="Select Job Type" selected disabled>Select Project Subject</option>
                        <option value="Religion">Religion</option>
                        <option value="Education">Education</option>
                        <option value="Business">Business</option>
                        <option value="Politics">Politics</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Technology">Technology</option>
                        <option value="Sports">Sports</option>
                        <option value="Law">Law</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Second Row --}}
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Project Title</span>
                    <input id="name" type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Project Title" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Project Type</span>
                    <select class="form-control" id="exampleFormControlSelect1" name="project_type" value="{{old('project_type')}}">
                        <option value="Select Job Type" selected disabled>Select Project Type</option>
                        <option value="Verbatim">Verbatim</option>
                        <option value="Non-Verbatim">Non-Verbatim</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Project Accent</span>
                    <select class="form-control" id="exampleFormControlSelect1" name="accent" value="{{old('accent')}}">
                        <option value="Select Accent" selected disabled>Select Project Accent</option>
                        <option value="American Accent">American Accent</option>
                        <option value="British Accent">British Accent</option>
                        <option value="Australian Accent">Australian Accent</option>
                        <option value="Indian Accent">Indian Accent</option>
                        <option value="Asian Accent">Asian Accent</option>
                        <option value="African Accent">African Accent</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Third Row --}}
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Project ID</span>
                    <input id="name" type="text" class="form-control" name="project_id" value="{{$newProjectID}}" placeholder="" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <span class="input-group-addon">Project Length</span>
                    <input id="duration" type="text" class="form-control num2" name="length" readonly />
                      {{-- <span id="duration" name="length" class="num2 form-control"></span>
                    <input type="hidden" name="length" value=""> --}}
                </div>
                <?php
                    $length = !empty($_POST['length']) ? $_POST['length'] : '';
                 ?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Amount per Minute (USD)</span>
                    <input type="text" class="form-control num1" name="amount_per_minute" value="0.90" readonly>
                 </div>
            </div>
        </div>

        {{-- Forth Row  --}}
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group">
                    <span class="form-group-addon">Total Amount (USD)</span>
                    <input id="mult" type="text" class="form-control" name="total_amount" placeholder="" readonly>
                </div>
            </div>
        </div>

        {{-- fifth row --}}
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="form-group">
                    <span class="form-group-addon">Any Special instructions</span>
                    <textarea class="form-control" name="instructions" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
       
        
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Save & Continue &raquo;</button>
            <a class="btn btn-sm btn-primary" href="{{ route('getprojectsindex') }}"> <i class="fa fa-reply"></i> Back</a>
        </div>
    </form>

    </div>
</div>

     <!-- bootstrap file input script file -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- bootstrap file input script file ends here--> 

<!-- file start here script--->
    <script type="text/javascript">
        $("#file").fileinput({
            required: true,
            showCancel:false,
            showUpload: false,
            showRemove: true,
            showCaption: true,
            showPreview: true,
            showClose: false,
            autoOrientImage: true,
            showUploadedThumbs: false,
            uploadAsync: false,
            uploadUrlThumb: false,
            indicatorLoading: true,
            processData : true,
        
            deleteUrl: "/public/file",
            //uploadUrl: "/company2/{applications_id}",
            //uploadUrl: '/public/KFS_Tax_Compliance_Certificates', // you must set a valid URL here else you will get an error
            theme: 'fa',
            
            allowedFileExtensions: ['vlc', 'wave', 'avi', 'mp3', 'mp4'],
            overwriteInitial: false,
            maxFileSize: 5000000,
            maxFilesNum: 10,
            //allowedFileTypes: ['image', 'video', 'flash'],
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });

        $('#file').on('fileuploaded', function(event, data, previewId, index) {
            var form = data.form,
              files = data.files,
              extra = data.extra,
              response = data.response,
              reader = data.reader;
            DisplayResults(response);
        });
    </script>
<!-- file end here script--->

@endsection




