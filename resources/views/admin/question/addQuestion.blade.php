@section('title', 'Add/Edit Questions`')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Questions </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Questions </li>
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
                                    <h5 class="card-title mb-0">Add Questions </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('questionsList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('submitQuestions')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($cms->id))
                                        <input type="hidden" name="id" id="id" value="{{$cms->id}}" readable>
                                        @endif
                                        <label for="question">Question <span class="text-danger">*</span></label>
                                        <input type="text" name="question" id="question"
                                            class="form-control @error('question') is-invalid @enderror" @if(!empty($cms))  value="{{$cms->title}}" @endif>
                                        @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                  
                                    <div class="col-12 mt-3">
                                        <label for="type">Question Type</label>
                                        <select name="question_type" id="question_type" class="form-control">
                                            <option value="text">Text</option>
                                            <option value="textarea">Long Text</option>
                                            <option value="radio">Radio</option>
                                            <option value="checkbox">Check Box</option>
                                            <option value="select">Select in dropdown</option>
                                        </select>
                                       
                                        
                                    </div>
                                    <div class="row" id="after_select">
                                        <div class="col-6 mt-3">
                                            <label for="number_of_values">Please enter number of values </label>
                                            <input type="number" name="number_of_values" id="number_of_values" class="form-control">
                                        </div>
                                        <div class="col-4 mt-3" id="result_value">
                                            <div id="appendvalue">
                                                <label for="values"> Please fill the values</label>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class=" @if(empty($cms))col-12 @else col-6 @endif mt-3">
                                            <label for="sequence">Sequesnce <span class="text-danger">*</span></label>
                                            <input type="text" name="sequence" id="sequence"
                                                class="form-control @error('sequence') is-invalid @enderror">
                                            @error('sequence')
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

    <script>
        $('#question_type').on('change',function(){
            var check = $('#question_type').val();
            if(check == 'radio' || check =='checkbox' || check =='select' )
            {
                $('#after_select').css('display','block');
            }
        });

        $('#number_of_values').on('keyup',function(){
            var no_value = $('#number_of_values').val();
            if(no_value >0 )
            {
                for(var i = 1 ; i <= no_value ; i++){
                    var textboxes ='<input type="text" name="values[]" class="form-control">';
                    $('#appendvalue').append(textboxes);
                }

            }
            else{
                alert('Please enter minimum 1 value.');
            }
        });
    </script>