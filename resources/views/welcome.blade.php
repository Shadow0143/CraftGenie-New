@section('title', '')
@include('layouts.frontend.header')

<div class="banner">
    <div id="home"> </div>

    <div id="banner" class="owl-carousel owl-theme">
        @foreach ($cms as $key=>$val)
        @if($val->type =='banner')
        <div class="item" style="background: url({{asset('banners')}}/{{$val->image}}) no-repeat;">
            <div class="container">
                <div class="text-box">
                    <h2>{{$val->title}}</h2>
                    <p>{{$val->subtitle}}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div id="about"></div>
</div>
<!-- banner end -->
<!-- about -->
<div class="about-sec my-5 py-5">
    <h2 class="titleall">about US</h2>
    <div class="col-md-6 m-auto py-4 text-center">
        <p>
            Craftgenie is a one-of-its-kind web platform, where brands get a chance to tell their story through
            easy-to-access communication solutions, made available for every need. With 30+ years of cumulative team
            experience, our trusted specialists create impact-driven narratives & perception journeys for players across
            industries. We have curated communication functions which can be selected and activated through simple steps
            instead of complicated processes. Craftgenie works with companies at various stages, right from the
            fastest-growing startups to some of India’s biggest unicorn founders.
        </p>
    </div>
    <div class="about-bnr mt-5">
        <div class="container">
            <div class="about-text col-md-7">
                <h3>Powerful Narratives Powerful Perception
                </h3>
                <p> 30+ years of cumulative team experience, our trusted specialists create impact-driven narratives &
                    perception journeys for players across industries. We have curated communication functions which can
                    be selected and activated through simple steps instead of complicated processes. </p>
            </div>
        </div>
    </div>
</div>
<!-- about end -->
<!-- why-choose-->
<section class="why-choose mt-5">
    <div class="container">
        <h2 class="titleall mb-5">why choose US</h2>
        <div class="row my-4 pt-5">
            <div class="col-md-4 mb-sm-0 mb-3 d-flex">
                <div class="bg-inner text-center">
                    <span class=" d-flex align-items-center justify-content-center radius-box1">
                        <img src="{{asset('img/b1.png')}}" alt="b1.png">
                    </span>
                    <h4>EXPERIENCED PROFESSIONAL</h4>
                </div>
            </div>
            <div class="col-md-4 mb-sm-0 mb-3 d-flex">
                <div class="bg-inner text-center">
                    <span class=" d-flex align-items-center justify-content-center radius-box1">
                        <img src="{{asset('img/b2.png')}}" alt="b2.png">
                    </span>
                    <h4>SAME- DAY TURN AROUND </h4>
                </div>
            </div>
            <div class="col-md-4 mb-sm-0 mb-3 d-flex">
                <div class="bg-inner text-center">
                    <span class=" d-flex align-items-center justify-content-center radius-box1">
                        <img src="{{asset('img/b3.png')}}" alt="b3.png">
                    </span>
                    <h4>SIMPLE TRANSPARENT PRICING</h4>
                </div>
            </div>
        </div>
    </div>
    <div id="quick"></div>
</section>
<!-- end why-choose box-->
<!-- quick-packages-->
<section class="quick-packages mb-5">
    <div class="container">
        <h2 class="titleall titleall-text mb-5">Packages</h2>
        <div class="row mt-4">
            <div id="owl-demo1" class="tips-area owl-carousel owl-theme px-3">

                @foreach($package as $key => $val)
                <div class="item">
                    <div class="inr-slider-box ">

                        <div class="img-area">
                            <img src="{{asset('packages')}}/{{$val->image}}" alt="quic3.png">
                        </div>
                        <div class="w-100 d-block qtext">
                            <a href="javaScript:void(0);" data-id="{{$val->id}}" class="packageDetails">

                                <h5>{{$val->title}} </h5>
                                {{-- <p> Price : <strong>{{$val->price}} /-</strong></p> --}}
                                <span>{!! $val->description !!}</span>
                                <div class="bar-list">
                                    <ul>
                                        @if(!empty($val->file))
                                        @foreach($val->file as $key => $value)
                                        <li>
                                            <a href="{{asset('extra_files')}}/{{$value->file_name}}" target="_blank">
                                                @if($value->extension == 'docx')
                                                <img src="{{asset('img/download.jpeg')}}" alt="word-img">
                                                @elseif($value->extension == 'ppt')
                                                <img src="{{asset('img/ppt.png')}}" alt="ppt-img">
                                                @elseif($value->extension == 'xlxs' || $value->extension == 'xl')
                                                <img src="{{asset('img/excel.png')}}" alt="xl-img">
                                                @endif

                                            </a>
                                            @endforeach
                                            @endif

                                        </li>



                                    </ul>

                            </a>

                            @if(!Auth::user())
                            <a class="order2" href="javaScript:void(0);" data-toggle="modal"
                                data-target="#login55">Order</a>
                            @else
                            {{-- <a href="{{route('login')}}" class="order"> order</a> --}}
                            <a href="javaScript:void(0);" class="order" data-id="{{$val->id}}"> Order</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="howdo"></div>

    </div>





</section>

<div class="Whatdo my-5 pt-5">
    <h2 class="titleall mb-3">How do we do it?</h2>
    <div class="col-md-6 m-auto py-4 text-center">
        <p>Depending on the stage of your company ~ we work across Indiaâ€™s fastest growing startups to some of
            Indiaâ€™s biggest unicorn founders..</p>
    </div>
    <div class="container">
        <div class="row">
            <ul class="stape-area">
                <li class="Questionnaires">
                    <div class="rw-box">
                        <img src="{{asset('img/icon.png')}}" alt="">
                    </div>
                    <span> Questionnaire </span>
                </li>
                <li>
                    <div class="rw-box">
                        <img src="{{asset('img/icon2.png')}}" alt="">
                    </div>
                    <span>What is your story? </span>
                </li>
                <li>
                    <div class="rw-box">
                        <img src="{{asset('img/icon4.png')}}" alt="">
                    </div>
                    <span>Solutions</span>
                </li>
            </ul>
        </div>


    </div>
</div>


<style>
    .tab {
        display: none;
    }

    .tab2 {
        display: none;
    }

    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step2 {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    .step2.active {
        opacity: 1;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="QuestionAnswerModeal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content questions-model question_short_modal">
            <div class="modal-header header-gap">
                <h5 class="modal-title title-text" id="exampleModalLongTitle">Questions</h5>
                <button type="button" class="close close-icon" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($question as $key => $val)
                <form action="{{route('submitAnswer')}}" id="question_form{{$key+1}}">
                    @csrf

                    <div class="tab">
                        <div class="name-text">
                            <p>{{$key+1}} ). &nbsp; {{$val->question}}</p>
                            <input type="hidden" name="question_id" id="question_id{{$val->id}}" value="{{$val->id}}"
                                class="question_id{{$val->id}}">
                            <input type="hidden" name="question_type" id="question_type{{$val->id}}"
                                value="{{$val->question_type}}" class="question_type{{$val->id}}">

                            <input type="hidden" name="package_id" id="package_id" class="package_id" value="" readonly>
                        </div>
                        <p class="mb-5">
                            @if($val->question_type == 'text')
                            <input type="{{$val->question_type}}" name="answer"
                                class="form-control answer{{$val->id}} name-text2" id="answer{{$val->id}}">
                            @elseif($val->question_type == 'textarea')
                            <textarea name="answer" id="answer{{$val->id}}" cols="30" rows="10"
                                class="form-control answer{{$val->id}}"></textarea>
                            @elseif($val->question_type == 'radio')
                        <ul>
                            @foreach($val->values as $key => $value)
                            <li>
                                <label for="{{$value}}">{{$value}}</label>
                                <input type="{{$val->question_type}}" name="answer"
                                    class="form-control answer{{$val->id}}" value="{{$value}}" id="answer{{$val->id}}">
                            </li>

                            @endforeach
                        </ul>

                        @elseif($val->question_type == 'checkbox')
                        <div class="name-gap">
                            <ul>
                                @foreach($val->values as $key2 => $value)
                                <li>
                                    <label for="{{$value}}">{{$value}}</label>
                                    <input type="{{$val->question_type}}" name="checkbox[]"
                                        class="form-control checkbox{{$val->id}}" value="{{$value}}"
                                        id="checkbox{{$val->id}}">
                                </li>

                                @endforeach
                            </ul>
                        </div>
                        @elseif($val->question_type == 'select')
                        <select name="answer" id=" answer{{$val->id}}" class="form-control answer{{$val->id}}">
                            <option value="">--Select please--</option>
                            @foreach($val->values as $key => $value)
                            <option value="{{$value}}">{{ucfirst($value)}}</option>
                            @endforeach
                        </select>
                        @endif
                        <span>
                            <strong class="que"> Don’t know the answer to any of these questions? </strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="faq-text"><a href="{{route('faq')}}">Find
                                    FAQ's</a> or <a href="{{route('welcome')}}#contact"
                                    onclick="$('#QuestionAnswerModeal').modal('hide')">
                                    Contact Us</a>

                            </div>
                        </span>
                        </p>
                        <div style="overflow:auto;">
                            <div class="next-gap">

                                <a href="javaScript:void(0);" id="prevBtn" onclick="nextPrev(-1)"
                                    class="btn btn-outline-dark btn-sm">
                                    << </a>
                                        <a class="btn btn-outline-warning btn-sm skip" onclick="skip(1)"
                                            href="javaScript:void(0);"> Skip</a>
                                        <a class="btn btn-outline-danger btn-sm paynowbtn " href="#">Skip & Checkout</a>
                                        <a href="javaScript:void(0);"
                                            class="btn btn-outline-success btn-sm submitAnswer{{$val->id}}"
                                            type="submit" id="nextBtn" onclick="nextPrev(1,'{{$val->id}}')">
                                            >> </a>

                            </div>
                        </div>

                    </div>
                    @endforeach
                </form>

                <!-- Circles which indicates the steps of the form: -->
                <!-- <div style="text-align:center;margin-top:40px;">
                    @for( $i =0; $i< (count($question) -1 );$i++) <span class="step"></span>
                        @endfor
                </div> -->
            </div>

        </div>
    </div>
</div>


{{-- <div class="modal fade" id="StoryAnswerModeal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content questions-model">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle2">What is your story?</h5>
                <button type="button" class="close close-icon" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($story as $key => $val)
                <form action="{{route('submitAnswer')}}" id="question_form{{$key+1}}">
                    @csrf

                    <div class="tab2">
                        <p>
                            {{$key+1}} ). &nbsp; {{$val->question}}
                            <input type="hidden" name="question_id" id="question_id{{$val->id}}" value="{{$val->id}}"
                                class="question_id{{$val->id}}">
                            <input type="hidden" name="question_type" id="question_type{{$val->id}}"
                                value="{{$val->question_type}}" class="question_type{{$val->id}}">
                        </p>
                        <p class="mb-5">
                            @if($val->question_type == 'text')
                            <input type="{{$val->question_type}}" name="answer" class="form-control answer{{$val->id}}"
                                id="answer{{$val->id}}">
                            @elseif($val->question_type == 'textarea')
                            <textarea name="answer" id="answer{{$val->id}}" cols="30" rows="10"
                                class="form-control answer{{$val->id}}"></textarea>
                            @elseif($val->question_type == 'radio')
                        <ul>
                            @foreach($val->values as $key => $value)
                            <li>
                                <label for="{{$value}}">{{$value}}</label>
                                <input type="{{$val->question_type}}" name="answer"
                                    class="form-control answer{{$val->id}}" value="{{$value}}" id="answer{{$val->id}}">
                            </li>

                            @endforeach
                        </ul>

                        @elseif($val->question_type == 'checkbox')
                        <ul>
                            @foreach($val->values as $key2 => $value)
                            <li>
                                <label for="{{$value}}">{{$value}}</label>
                                <input type="{{$val->question_type}}" name="checkbox[]"
                                    class="form-control checkbox{{$val->id}}" value="{{$value}}"
                                    id="checkbox{{$val->id}}">
                            </li>

                            @endforeach
                        </ul>

                        @elseif($val->question_type == 'select')
                        <select name="answer" id=" answer{{$val->id}}" class="form-control answer{{$val->id}}">
                            <option value="">--Select please--</option>
                            @foreach($val->values as $key => $value)
                            <option value="{{$value}}">{{ucfirst($value)}}</option>
                            @endforeach
                        </select>
                        @endif
                        </p>
                        <div style="overflow:auto;">
                            <div style="float:right">

                                <a href="javaScript:void(0);" id="prevBtn2" onclick="nextPrev2(-1)"
                                    class="btn btn-outline-dark btn-sm">
                                    << </a>
                                        <a href="javaScript:void(0);"
                                            class="btn btn-outline-success btn-sm submitAnswer{{$val->id}}"
                                            type="submit" id="nextBtn2" onclick="nextPrev2(1,'{{$val->id}}')">Save &
                                            Next</a>
                                        <a class="btn btn-outline-danger btn-sm paynowbtn2 " href="#">Skip &
                                            Checkout</a>
                                        <a class="btn btn-outline-warning btn-sm" onclick="skip2(1)"
                                            href="javaScript:void(0);"> >> </a>

                            </div>
                        </div>

                    </div>
                    @endforeach
                </form>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    @for( $i =0; $i< (count($story) -1 );$i++) <span class="step2"></span>
                        @endfor
                </div>
            </div>

        </div>
    </div>
</div> --}}

<!------ Wait  for solution MODAL -------->

<div class="modal fade" id="waitForSolution" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content questions-model">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Congrates </h5>
                <button type="button" class="close close-icon" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>All answers are submitted successfully.</p>
                <p>Please wait, you will get your solution within 12hr.</p>
            </div>

        </div>
    </div>
</div>

<!-- CLIENTS SPEAK -->

<div class="client-sp my-5 py-5">

    <h2 class="titleall titleall-text2 mb-5">CLIENTS SPEAK</h2>

    <div class="container">

        <div id="clientsp" class="owl-carousel owl-theme">
            @foreach($testimonial as $key => $val)
            <div class="item text-left">
                <div class="boxinn">
                    <div class="col-md-3">
                        <div class="profile">
                            <img src="{{asset('testimonial')}}/{{$val->image}}" alt="user.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>{!! $val->user_say !!}</p>
                        <h2 class="mt-5">
                            {{$val->user_name}}
                            <span class="d-block">{{$val->user_designation}}</span>
                        </h2>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <div id="Blogs"></div>

    </div>

</div>

<!-- end CLIENTS SPEAK -->
<!-- our blogs -->

<div class="blog-sec mb-5 ">
    <h2 class="titleall titleall-text3 mb-5">OUR BLOGS</h2>
    <div class="container">
        <div class="row">
            <div id="blogslide" class="owl-carousel owl-theme">
                @foreach($blog as $key=>$val)
                <div class="item">
                    <div class="col-md-12">
                        <a href="{{route('blogDetails',['id'=>$val->id])}}">
                            <div class="blog-item">
                                <div class="date">
                                    {{date('d',strtotime($val->created_at))}}
                                    <small> {{date('M',strtotime($val->created_at))}}</small>
                                    <span> {{date('Y',strtotime($val->created_at))}}</span>
                                </div>
                                <div class="blog-img"><img src="{{asset('blogs')}}/{{$val->image}}"
                                        alt="{{$val->image}}"></div>
                                <div class="blog-p">
                                    <h3>{{$val->title}}</h3>
                                    <p>{{$val->subtitle}}</p>
                                    <div class="time">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>{{date('H A',strtotime($val->created_at))}}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- our blogs end -->



    <!-- our work -->

    <div class="work-sec my-5 py-5">

        <h2 class="titleall mb-5">OUR WORK</h2>

        <div class="container">

            <div class="row">

                @foreach ($work as $key=>$val)

                <div class="col-md-4">

                    <div class="work-item">

                        <div class="work-img"><img src="{{asset('extra_files')}}/{{$val->image}}" alt=""></div>

                        <div class="work-p">

                            <h3>{{$val->title}}</h3>

                            <p>{!! $val->description !!}</p>

                        </div>

                    </div>

                </div>
                @endforeach


                {{-- <div class="col-md-4">

                    <div class="work-item">

                        <div class="work-img"><img src="{{asset('img/work-2.jpg')}}" alt=""></div>

                        <div class="work-p">

                            <h3>Lorem Ipsum is simply</h3>

                            <p>Ipsum passages, and more

                                recently withIpsum passages, and more</p>

                        </div>

                    </div>

                </div> --}}

                {{-- <div class="col-md-4">

                    <div class="work-item">

                        <div class="work-img"><img src="{{asset('img/work-3.jpg')}}" alt=""></div>

                        <div class="work-p">

                            <h3>Lorem Ipsum is simply</h3>

                            <p>Ipsum passages, and more

                                recently withIpsum passages, and more</p>

                        </div>

                    </div>

                </div> --}}

            </div>

        </div>

        <div id="contact"></div>

    </div>

    <!-- our work end -->

    <div class="incontact py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5">
                    <h2 class="titleall mb-3">Contact Us</h2>
                    <p>Your time matters, so we work across our network to turn around your story within 24 hours.</p>
                    <div class="col-md-12 support-box">
                        <label class="d-flex ">
                            <span><i class="fa fa-envelope-o" aria-hidden="true"></i> </span> support @gmail.com
                        </label>
                        <label class="d-flex ">
                            <span><i class="fa fa-phone" aria-hidden="true"></i> </span> 8548785485 </label>
                    </div>
                </div>
                <div class="col-md-4 allform">
                    <form class="Contact_form" method="POST" action="{{route('submitContact')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Full Name" id="name" required>
                        <input type="email" name="email" placeholder="Email Id" id="email" required>
                        <input type="text" name="contact" placeholder="Contact Number" id="contact" required
                            class="numericOnly"><input type="file" class="file-gap" name="sharefile"
                            placeholder="Share File" id="sharefile" class="form-control">
                        <button type="submit"> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <!-- Modal -->
    <div class="modal fade" id="packagedetailsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Package Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="package_detail_img">
                    <h3 class="package_detail_title"></h3>
                    <p class="package_detail_desc"></p>
                </div>

            </div>
        </div>
    </div>



    <!-- end incontact -->
    @include('layouts.frontend.footer')

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>



    <script>
        jq162 = jQuery.noConflict(true);
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";

        }
        if (n == x.length) {
            document.getElementById("nextBtn").innerHTML = "Submit";
            $('#QuestionAnswerModeal').modal('hide');

        } else {
            document.getElementById("nextBtn").innerHTML = " Next";

        }
        fixStepIndicator(n)
    }

    function nextPrev(n, id) {
        jq162(".submitAnswer" + id).click(function(event) {
            var checkBoxValue = [];
            jq162(".checkbox" + id).each(function() {
                if (jq162(this).is(':checked')) {
                    var checked = ($(this).val());
                    checkBoxValue.push(checked);
                }
            });

            var formData = {
                "_token": "{{ csrf_token() }}",
                question_id: jq162(".question_id" + id).val(),
                question_type: jq162(".question_type" + id).val(),
                answer: jq162(".answer" + id).val(),
                packageId: jq162(".package_id").val(),
                checkBoxValue: checkBoxValue,

            };
            jq162.ajax({
                type: "POST",
                url: "{{route('submitAnswer')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(res) {
                    if (res == 1) {
                        // alert('done');
                        var x = document.getElementsByClassName("tab");
                        if (n == 1 && !validateForm()) return false;
                        x[currentTab].style.display = "none";

                        currentTab = currentTab + n;
                        // if(currentTab == x.length ){
                        //     $('.skip').addClass('storymodal').removeClass('skip');
                        // }
                        if (currentTab >= 12) {

                            $('#exampleModalLongTitle').html('What is Your story ? ');
                        } else {
                            $('#exampleModalLongTitle').html('Questions  ');

                        }
                        if (currentTab == x.length) {
                            $('#QuestionAnswerModeal').modal('hide');
                            $('#waitForSolution').modal('show');
                        }

                        showTab(currentTab);
                    }

                },
            });
            event.preventDefault();
            event.stopImmediatePropagation();

        });

        if (n == -1) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;

            if (currentTab >= 12) {
                $('#exampleModalLongTitle').html('What is Your story ? ');
            } else {
                $('#exampleModalLongTitle').html('Questions  ');

            }


            showTab(currentTab);

        }

    }


    function skip(n) {

        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;

        if (currentTab >= 12) {
            $('#exampleModalLongTitle').html('What is Your story ? ');
        } else {
            $('#exampleModalLongTitle').html('Questions  ');

        }


        if (currentTab == x.length) {
            $('#QuestionAnswerModeal').modal('hide');
        }
        showTab(currentTab);

    }

    function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        return valid;
    }


    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < (x.length) - 1; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }

    }


    jq162('.packageDetails').on('click',function(){
            var id = jq162(this).data('id');
            // alert(id);
            jq162.ajax({
                type:'GET',
                url:"{{route('packageDetails')}}",
                data:{id:id},
                success:function(res){
                    $('.package_detail_img').attr('src','packages'+'/'+res.image);
                    $('.package_detail_title').html(res.title);
                    $('.package_detail_desc').html(res.description);
                    $('#packagedetailsmodal').modal('show');
                }
            });        
    });



    jq162(".numericOnly").keypress(function(e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
    });
    </script>


    <script>
        $('.order').on('click', function() {
        var packageId = $(this).data('id');
        $('.package_id').val(packageId);
        $('#QuestionAnswerModeal').modal('show');
        $('.paynowbtn').show();
        $('.paynowbtn').attr('href', '/razorpay-payment/' + packageId);

    });

    $('.storymodal').on('click', function() {
        $('#storyAnswerModeal').modal('show');
    });
    </script>




    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        jq = jQuery.noConflict( true );
        var currentTab2 = 0; // Current tab is set to be the first tab (0)
        showTab2(currentTab2); // Display the current tab
        function showTab2(n2) {
        var x2 = document.getElementsByClassName("tab2");
        x2[n2].style.display = "block";
        if (n2 == 0) {
            document.getElementById("prevBtn2").style.display = "none";
        } else {
            document.getElementById("prevBtn2").style.display = "inline";
            
        }
        if (n2 == x2.length  ) {
            document.getElementById("nextBtn2").innerHTML = "Submit"; 
            $('#SolutionAnswerModeal').modal('hide');
            
        } else {
            document.getElementById("nextBtn2").innerHTML = " Save & Next";
            
        }
        fixStepIndicator2(n2)
        }
        
        function nextPrev2(n,id) {
            jq(".submitAnswer"+id).click(function (event) {
                var checkBoxValue = [];
                jq162(".checkbox"+id).each(function() {
                    if (jq162(this).is(':checked')) {
                        var checked = ($(this).val());
                        checkBoxValue.push(checked);
                    }
                });

                    var formData = {
                    "_token": "{{ csrf_token() }}",
    question_id: jq162(".question_id"+id).val(),
    question_type: jq162(".question_type"+id).val(),
    answer: jq162(".answer"+id).val(),
    packageId: jq162(".package_id").val(),
    checkBoxValue:checkBoxValue,

    };
    jq.ajax({
    type: "POST",
    url: "{{route('submitAnswer')}}",
    data: formData,
    dataType: "json",
    encode: true,
    success: function(res){
    if(res==1){
    // alert('done');
    var x2 = document.getElementsByClassName("tab2");
    if (n2 == 1 && !validateForm2()) return false;
    x2[currentTab2].style.display = "none";

    currentTab2 = currentTab2 + n2;

    if (currentTab2 == x2.length ) {
    $('#StoryAnswerModeal').modal('hide');

    }

    showTab2(currentTab2);
    }

    },
    });
    event.preventDefault();
    event.stopImmediatePropagation();

    });

    if(nextPrev2 ==-1){
    var x2 = document.getElementsByClassName("tab2");
    if (n2 == 1 && !validateForm2()) return false;
    x2[currentTab2].style.display = "none";
    currentTab2 = currentTab2 + n2;
    showTab2(currentTab2);

    }

    }


    function skip2(n2) {

    var x2 = document.getElementsByClassName("tab2");
    if (n2 == 1 && !validateForm2()) return false;
    x2[currentTab2].style.display = "none";
    currentTab2 = currentTab2 + n2;
    if (currentTab2 == x2.length ) {
    $('#QuestionAnswerModeal').modal('hide');
    $('#StoryAnswerModeal').modal('hide');


    }
    showTab2(currentTab2);

    }

    function validateForm2() {
    var x2, y2, i2, valid = true;
    x2 = document.getElementsByClassName("tab2");
    y2 = x2[currentTab2].getElementsByTagName("input");
    return valid;
    }


    function fixStepIndicator2(n2) {
    var i2, x2 = document.getElementsByClassName("step2");
    for (i = 0; i <( x2.length)-1; i++) { x2[i].className=x2[i].className.replace(" active", "" ); } } 
    </script> --}}