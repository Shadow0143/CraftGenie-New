@section('title', '| Order Detail')
@include('layouts.frontend.header')



<div class="main-content  mt-5 pt-5 pl-5 mb-5">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Order Details </h4>
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
                                <div class="col-6">
                                    <div class="col-12 card mt-5  mb-3">
                                        <h3>User Details</h3>
                                        <p><strong> User Name : </strong> {{$payments->user_name}}</p>
                                        <p><strong> User Email : </strong> {{$payments->user_email}} </p>
                                        <p><strong> Phone No : </strong> {{$payments->contact_no}}</p>
                                        <p><strong> Address : </strong> {{$payments->address}}</p>
                                        <p></p>
                                    </div>

                                    <div class="col-12 card mt-5 mb-3">
                                        <h3>Order / Payment Details</h3>
                                        <p><strong>Package Name : </strong> {{$payments->title}}</p>
                                        <p><strong>Transaction/Order Id : </strong> {{$payments->transaction_no}}</p>
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
                                    <div class="col-12 card mt-5 mb-3">
                                        <h3>Questions &Answers</h3>
                                        @forelse($answer as $key2 => $val2)
                                        <label for="">Q {{$key2+1}}) . {{$val2->question}}</label>
                                        <p>Ans .{{$val2->answers}}</p>
                                        @empty
                                        <p class="text-danger">No question & answers </p>
                                        @endforelse

                                    </div>

                                    @endif

                                    {{-- Solution section --}}
                                    @if(empty($solution))

                                    <div class="col-12 card mt-5 mb-3">
                                        <h3>Please wait !</h3>
                                        <p>You will get your solution very soon.</p>
                                    </div>
                                    @else

                                    <div class="col-12 card mt-5 mb-3">
                                        <h3>Solution</h3>
                                        <p>{{$solution->remarks}}</p>
                                        <a href="{{asset('extra_files')}}/{{$solution->file }}" target="_blank">
                                            @if($solution->extension == 'docx')
                                            <img src="{{asset('img/download.jpeg')}}" alt="word-img" height="100px"
                                                width="100px">
                                            @elseif($solution->extension == 'ppt')
                                            <img src="{{asset('img/ppt.png')}}" alt="ppt-img" height="100px"
                                                width="100px">
                                            @elseif($solution->extension == 'xlxs' || $solution->extension == 'xl')
                                            <img src="{{asset('img/excel.png')}}" alt="xl-img" height="100px"
                                                width="100px">
                                            @endif
                                        </a>

                                    </div>
                                    @endif


                                </div>

                                <div class="col-6 mt-5 pl-5 card">
                                    <div class="allMessages mt-3 mb-3">
                                        @forelse($chats as $chatkey => $chatval)
                                        <div class="col">
                                            <p class="pt-2">{{$chatval->message}}</p>
                                            <span style="font-size:10px"> By : {{$chatval->name}} &nbsp;
                                                {{$chatval->created_at->diffForHumans()}} </span>
                                        </div>
                                        @empty
                                        <div class="col-12 text-center pt-5">
                                            <p class="text-danger">No chat begin yet.</p>
                                        </div>
                                        @endforelse
                                        <div class="result pl-3"></div>
                                        <form action="" id="chatForm">
                                            <div class="row mt-5">
                                                <div class="col-10">
                                                    <input type="hidden" name="order_id" id="order_id"
                                                        value="{{$payments->paymentid}}">
                                                    <input type="hidden" name="package_id" id="package_id"
                                                        value="{{$payments->package_id}}">
                                                    <input type="text" name="sendMessage" id="sendMessage"
                                                        class="form-control">
                                                </div>
                                                <div class="col-2">
                                                    <a href="javaScript:void(0);" class="btn btn-outline-primary"
                                                        onClick="submitChat()"> Send
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <div>

                                    </div>
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
</div>






@include('layouts.frontend.footer')

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


<script>
    conf = jQuery.noConflict( true );

    function submitChat(){
       $("#chatForm").click(function (event) {
            var formData = {
            "_token": "{{ csrf_token() }}",
            message: $("#sendMessage").val(),
            order_id: $("#order_id").val(),
            package_id: $("#package_id").val(),
            };

            conf.ajax({
                type: "POST",
                url: "{{route('submitChats')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success:function(res){
                    if(res.success==true){ 
                        $("#sendMessage").val('');
                        $(".result").append(res.data);
                    }
                }
            });

            event.preventDefault();
        });
    }

</script>