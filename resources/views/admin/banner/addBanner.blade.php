@section('title', 'Add Banner')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Banner </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Banner </li>
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
                                    <h5 class="card-title mb-0">Add Banner </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('bannerList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitBanner')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        @if(!empty($cms->id))
                                        <input type="hidden" name="id" id="id" value="{{$cms->id}}" readable>
                                        @endif
                                        <label for="ttile">Tilte</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror" @if(!empty($cms))  value="{{$cms->title}}" @endif>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="col-6">
                                        <label for="subtitle">Sub Title</label>
                                        <input type="text" name="subtitle" id="subtitle"
                                            class="form-control @error('subtitle') is-invalid @enderror" @if(!empty($cms))  value="{{$cms->subtitle}}" @endif>
                                        @error('subtitle')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class=" @if(empty($cms))col-12 @else col-6 @endif mt-3">
                                            <label for="banner">Banner Image</label>
                                            <input type="file" name="banner" id="banner"
                                                class="form-control @error('banner') is-invalid @enderror">
                                            @error('banner')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        @if(!empty($cms))
                                        <div class="col-6 mt-3 ml-5">
                                            <label for="status">Status</label>
                                            <select name="changestatus" id="changestatus" class="form-control">
                                                <option value="1" {{$cms->status == '1'  ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$cms->status == '0'  ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    @endif
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