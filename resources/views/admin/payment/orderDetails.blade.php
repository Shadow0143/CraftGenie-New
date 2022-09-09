@section('title', 'Order Details')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Order Details </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Order Details </li>
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
                                    <h5 class="card-title mb-0"><strong> Order Id : </strong>
                                        {{$payments->transaction_no}}</h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('PaymentList')}}" class="btn btn-outline-danger">Back</a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-6 card mt-5  mb-3">
                                        <h3>User Details</h3>
                                        <p><strong> User Name : </strong> {{$payments->user_name}}</p>
                                        <p><strong> User Email : </strong> {{$payments->user_email}} </p>
                                        <p><strong> Phone No : </strong> {{$payments->contact_no}}</p>
                                        <p><strong> Address : </strong> {{$payments->address}}</p>
                                        <p></p>
                                    </div>

                                    <div class="col-6 card mt-5 mb-3">
                                        <h3>Order / Payment Details</h3>
                                        <p><strong>Package Name : </strong> {{$payments->title}}</p>
                                        <p><strong>Transaction/Order Id : </strong>                                    {{$payments->transaction_no}}</p>
                                        <p><strong>Amount : </strong> {{$payments->PaymentAmount}} /-</p>
                                        <p><strong>Payment Status : </strong> 
                                            @if($payments->is_pay =='YES')
                                                <span class="text-success"> payment Done</span>
                                            @else
                                                <span class="text-danger"> payment Fail</span>
                                            @endif
                                        </p>
                                        <p><strong>Payment Date: </strong>
                                            {{date('m-d-Y',strtotime($payments->payment_date))}}</p>
                                    </div>
                                    {{-- Question & Answer section --}}
                                    @if(!empty($answer))
                                        <div class="col-6 card mt-5 mb-3">
                                                <h3>Questions &Answers</h3>
                                                @forelse($answer as $key2 => $val2)
                                                    <label for="">Q {{$key2+1}}) . {{$val2->question}}</label>
                                                    <p>Ans  .{{$val2->answers}}</p>
                                                @empty
                                                    <p class="text-danger">No question & answers </p>
                                                @endforelse
                                                
                                        </div>
                                    
                                    @endif

                                    {{-- Solution section --}}
                                    @if(empty($solution))

                                        <div class="col-6 card mt-5 mb-3">
                                            <h3>Send Solution</h3>
                                            <form action="{{route('submitSolution')}}" method="POST" enctype="multipart/form-data">

                                                @csrf
                                                <input type="hidden" name="payment_id" id="payment_id" class="form-control" value="{{$payments->paymentid}}" readonly>
                                                <label for="remark">Remark</label>
                                                <textarea name="remarks" id="remarks" cols="30" rows="10" class="form-control" required></textarea><br> 
                                                <label for="solutionFile">Document File</label>
                                                <input type="file" name="document" id="document" class="form-control" required>
                                                <br>
                                                <button type="submit" class="btn btn-outline-primary mb-5">Send</button>
                                            </form>
                                        </div>
                                    @else
   
                                        <div class="col-6 card mt-5 mb-3">
                                            <h3>Solution</h3>
                                            <p>{{$solution->remarks}}</p>
                                            <a href="{{asset('extra_files')}}/{{$solution->file }}" target="_blank">
                                                @if($solution->extension == 'docx')
                                                <img src="{{asset('img/download.jpeg')}}" alt="word-img" height="100px" width="100px">
                                                @elseif($solution->extension == 'ppt')
                                                <img src="{{asset('img/ppt.png')}}" alt="ppt-img" height="100px" width="100px">
                                                @elseif($solution->extension == 'xlxs' ||  $solution->extension == 'xl')
                                                <img src="{{asset('img/excel.png')}}" alt="xl-img" height="100px" width="100px">
                                                @endif
                                            </a>
                                            {{-- <iframe seamless src="https://view.officeapps.live.com/op/embed.aspx?src={{asset('extra_files')}}/{{$solution->file }}" style="width:200px; height:200px;" type="application/pdf" frameborder="1"></iframe> --}}
    
                                        </div>
                                    @endif


                                </div>
                            </div>
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