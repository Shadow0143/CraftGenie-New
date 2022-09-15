@section('title', 'Add/Edit Quick Links')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quick Link </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Quick Link </li>
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
                                    <h5 class="card-title mb-0">Add Quick Link </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('quickLinksList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitQuicklinks')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($faq->id))
                                        <input type="hidden" name="id" id="id" value="{{$faq->id}}" readable>
                                        @endif
                                        <label for="type">Type <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="faqs"> FAQs</option>
                                        </select>

                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="title">Link Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="@if(!empty($faq)) {{$faq->title}} @endif">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="package_description">Link Description <span
                                                class="text-danger">*</span> </label>
                                        <textarea name="package_description" id="package_description" cols="30"
                                            rows="10" class="form-control snow-editor ckeditor-classic"
                                            required> @if(!empty($faq)) {!! $faq->description!!} @endif</textarea>
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