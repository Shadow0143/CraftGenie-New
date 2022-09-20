@section('title', 'Add/Edit Policies')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">policies </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">policies </li>
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
                                    <h5 class="card-title mb-0">Add policies </h5>
                                </div>
                                <div class="col-2">
                                    <a href="javaScript:void(0);" class="btn btn-outline-danger"
                                        onclick="window.history.back()">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitPolicies')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="policie_type" id="policie_type"
                                    value=" @if(!empty($policy->id)) {{$policy->type}} @else {{$type}} @endif">
                                <div class="row">
                                    <div class="col-6">
                                        @if(!empty($policy->id))
                                        <input type="hidden" name="id" id="id" value="{{$policy->id}}" readable>
                                        @endif
                                        <label for="ttile">Tilte <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            @if(!empty($policy)) value="{{$policy->title}}" @endif>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="col-6">
                                        <label for="subtitle">Sub Title <span class="text-danger">*</span></label>
                                        <input type="text" name="subtitle" id="subtitle"
                                            class="form-control @error('subtitle') is-invalid @enderror" required
                                            @if(!empty($policy)) value="{{$policy->subtitle}}" @endif>
                                        @error('subtitle')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            class="form-control snow-editor ckeditor-classic"> @if(!empty($policy)) {!! $policy->description!!} @endif</textarea>
                                    </div>




                                    <div class="row">

                                        <div class="col-12 mt-3 ml-5">
                                            <label for="status">Status</label>
                                            <select name="changestatus" id="changestatus" class="form-control">
                                                <option value="1" @if(!empty($policy)){{$policy->status == '1' ?
                                                    'selected' : ''}} @endif>Active
                                                </option>
                                                <option value="0" @if(!empty($policy)){{$policy->status == '0' ?
                                                    'selected'
                                                    : ''}} @endif>Inactive
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