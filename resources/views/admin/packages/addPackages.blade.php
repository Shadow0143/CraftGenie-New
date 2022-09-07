@section('title', 'Add/Edit Packages')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Packages </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Packages </li>
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
                                    <h5 class="card-title mb-0">Add Packages </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('packagesList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitPackages')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($cms->id))
                                        <input type="hidden" name="id" id="id" value="{{$cms->id}}" readable>
                                        @endif
                                        <label for="ttile">Tilte <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror" @if(!empty($cms))  value="{{$cms->title}}" @endif>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                    
                                    <div col-12 mt-3">
                                        <label for="price">Package Price <span class="text-danger">*</span></label>
                                        <input type="number" name="price" id="price"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                  
                                    <div class="col-12 mt-3">
                                        <label for="package_description">Package Description</label>
                                        <textarea name="package_description" id="package_description" cols="30" rows="10" class="form-control snow-editor ckeditor-classic" > @if(!empty($cms)) {!! $cms->description!!} @endif</textarea>
                                    </div>

                                  


                                    <div class="row">
                                        <div class=" @if(empty($cms))col-12 @else col-6 @endif mt-3">
                                            <label for="package_image">Package Image <span class="text-danger">*</span></label>
                                            <input type="file" name="package_image" id="package_image"
                                                class="form-control @error('package_image') is-invalid @enderror">
                                            @error('package_image')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        @if(!empty($cms))
                                        <div class="col-6 mt-3 ml-5">
                                            <label for="status">Status</label>
                                            <select name="changestatus" id="changestatus" class="form-control">
                                                <option value="YES" {{$cms->status == 'YES'  ? 'selected' : ''}}>Active</option>
                                                <option value="NO" {{$cms->status == 'NO'  ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    @endif
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="package_description">File Upload</label>
                                        <input type="file" name="extra_file" id="extra_file" class="form-control">
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