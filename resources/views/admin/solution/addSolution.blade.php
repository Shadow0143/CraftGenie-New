@section('title', 'Add/Edit Solution')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Solution </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Solution </li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title mb-0">Add Solution </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('solutionList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitSolution')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($cms->id))
                                        <input type="hidden" name="id" id="id" value="{{$cms->id}}" readable>
                                        @endif
                                        <label for="ttile">Select Packages</label>
                                        <select name="packages" id="packages" class="form-control @error('title') is-invalid @enderror" @if(!empty($cms))  value="{{$cms->title}}" @endif>
                                            <option value="">Select</option>
                                            @foreach($packages as $key => $val)
                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('packages')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                    
                                    <div class="col-12 mt-3">
                                        <label for="remark">Solution Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="10" class="form-control snow-editor ckeditor-classic" > @if(!empty($cms)) {!! $cms->description!!} @endif</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <label for="blog">Solution Document <span class="text-danger">*</span></label>
                                            <input type="file" name="document[]" id="document"
                                                class="form-control @error('document') is-invalid @enderror" multiple="multiple">
                                            @error('document')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="col-12 text-center mt-5">
                                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @include('layouts.backend.footer')