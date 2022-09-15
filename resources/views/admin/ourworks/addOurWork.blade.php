@section('title', 'Add/Edit Works')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Our Work </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Our Work </li>
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
                                    <h5 class="card-title mb-0">Add Our Work </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('ourWorkList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitOurWork')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($work->id))
                                        <input type="hidden" name="id" id="id" value="{{$work->id}}" readable>
                                        @endif
                                        <label for="ttile">Tilte <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror" @if(!empty($work))
                                            value="{{$work->title}}" @endif required>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="description"> Description <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            class="form-control snow-editor ckeditor-classic"
                                            required> @if(!empty($work)) {!! $work->description!!} @endif</textarea>
                                    </div>




                                    <div class="row">
                                        <div class=" col-6 mt-3">
                                            <label for="package_image">Package Image <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="package_image" id="package_image"
                                                class="form-control @error('package_image') is-invalid @enderror"
                                                accept=".jpg,.png,.jpeg,.JPG,.PNG,.JPEG" @if(empty($work)) required
                                                @endif>
                                            @error('package_image')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-6 mt-3 ml-5">
                                            <label for="status">Status</label>
                                            <select name="changestatus" id="changestatus" class="form-control">
                                                <option value="1" @if(!empty($work)) {{$work->status == '1' ? 'selected'
                                                    : ''}} @endif >Active
                                                </option>
                                                <option value="0" @if(!empty($work)) {{$work->status == '0' ? 'selected'
                                                    : ''}} @endif >Inactive
                                                </option>
                                            </select>
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