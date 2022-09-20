<?php $__env->startSection('title', ''); ?>
<?php echo $__env->make('layouts.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="banner">
    <div id="home"> </div>

    <div id="banner" class="owl-carousel owl-theme">
        <?php $__currentLoopData = $cms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($val->type =='banner'): ?>
        <div class="item" style="background: url(<?php echo e(asset('banners')); ?>/<?php echo e($val->image); ?>) no-repeat;">
            <div class="container">
                <div class="text-box">
                    <h2><?php echo e($val->title); ?></h2>
                    <p><?php echo e($val->subtitle); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        Craftgenie is a one-of-its-kind web platform, where brands get a chance to tell their story through easy-to-access communication solutions, made available for every need. With 30+ years of cumulative team experience, our trusted specialists create impact-driven narratives & perception journeys for players across industries. We have curated communication functions which can be selected and activated through simple steps instead of complicated processes. Craftgenie works with companies at various stages, right from the fastest-growing startups to some of India’s biggest unicorn founders.
        </p>
    </div>
    <div class="about-bnr mt-5">
        <div class="container">
            <div class="about-text col-md-7">
                <h3>Powerful Narratives Powerful Perception
                </h3>
                <p> 30+ years of cumulative team experience, our trusted specialists create impact-driven narratives & perception journeys for players across industries. We have curated communication functions which can be selected and activated through simple steps instead of complicated processes. </p>
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
                        <img src="<?php echo e(asset('img/b1.png')); ?>" alt="b1.png">
                    </span>
                    <h4>EXPERIENCED PROFESSIONAL</h4>
                </div>
            </div>
            <div class="col-md-4 mb-sm-0 mb-3 d-flex">
                <div class="bg-inner text-center">
                    <span class=" d-flex align-items-center justify-content-center radius-box1">
                        <img src="<?php echo e(asset('img/b2.png')); ?>" alt="b2.png">
                    </span>
                    <h4>SAME- DAY TURN AROUND </h4>
                </div>
            </div>
            <div class="col-md-4 mb-sm-0 mb-3 d-flex">
                <div class="bg-inner text-center">
                    <span class=" d-flex align-items-center justify-content-center radius-box1">
                        <img src="<?php echo e(asset('img/b3.png')); ?>" alt="b3.png">
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

                <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="inr-slider-box ">
                        <div class="img-area">
                            <img src="<?php echo e(asset('packages')); ?>/<?php echo e($val->image); ?>" alt="quic3.png">
                        </div>
                        <div class="w-100 d-block qtext">
                            <h5><?php echo e($val->title); ?> </h5>
                            
                            <span><?php echo $val->description; ?></span>
                            <div class="bar-list">
                                <ul>
                                    <?php if(!empty($val->file)): ?>
                                    <?php $__currentLoopData = $val->file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(asset('extra_files')); ?>/<?php echo e($value->file_name); ?>" target="_blank">
                                            <?php if($value->extension == 'docx'): ?>
                                            <img src="<?php echo e(asset('img/download.jpeg')); ?>" alt="word-img">
                                            <?php elseif($value->extension == 'ppt'): ?>
                                            <img src="<?php echo e(asset('img/ppt.png')); ?>" alt="ppt-img">
                                            <?php elseif($value->extension == 'xlxs' || $value->extension == 'xl'): ?>
                                            <img src="<?php echo e(asset('img/excel.png')); ?>" alt="xl-img">
                                            <?php endif; ?>

                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </li>



                                </ul>
                                <?php if(!Auth::user()): ?>
                                <a class="order2" href="javaScript:void(0);" data-toggle="modal"
                                    data-target="#login55">Order</a>
                                <?php else: ?>
                                
                                <a href="javaScript:void(0);" class="order" data-id="<?php echo e($val->id); ?>"> Order</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <img src="<?php echo e(asset('img/icon.png')); ?>" alt="">
                    </div>
                    <span> Questionnaire </span>
                </li>
                <li>
                    <div class="rw-box">
                        <img src="<?php echo e(asset('img/icon2.png')); ?>" alt="">
                    </div>
                    <span>What is your story? </span>
                </li>
                <li>
                    <div class="rw-box">
                        <img src="<?php echo e(asset('img/icon4.png')); ?>" alt="">
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
                <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route('submitAnswer')); ?>" id="question_form<?php echo e($key+1); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="tab">
                        <div class="name-text">
                            <p><?php echo e($key+1); ?> ). &nbsp; <?php echo e($val->question); ?></p>
                            <input type="hidden" name="question_id" id="question_id<?php echo e($val->id); ?>" value="<?php echo e($val->id); ?>"
                                class="question_id<?php echo e($val->id); ?>">
                            <input type="hidden" name="question_type" id="question_type<?php echo e($val->id); ?>"
                                value="<?php echo e($val->question_type); ?>" class="question_type<?php echo e($val->id); ?>">

                            <input type="hidden" name="package_id" id="package_id" class="package_id" value="" readonly>
                        </div>
                        <p class="mb-5">
                            <?php if($val->question_type == 'text'): ?>
                            <input type="<?php echo e($val->question_type); ?>" name="answer"
                                class="form-control answer<?php echo e($val->id); ?> name-text2" id="answer<?php echo e($val->id); ?>">
                            <?php elseif($val->question_type == 'textarea'): ?>
                            <textarea name="answer" id="answer<?php echo e($val->id); ?>" cols="30" rows="10"
                                class="form-control answer<?php echo e($val->id); ?>"></textarea>
                            <?php elseif($val->question_type == 'radio'): ?>
                        <ul>
                            <?php $__currentLoopData = $val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label for="<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                <input type="<?php echo e($val->question_type); ?>" name="answer"
                                    class="form-control answer<?php echo e($val->id); ?>" value="<?php echo e($value); ?>" id="answer<?php echo e($val->id); ?>">
                            </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <?php elseif($val->question_type == 'checkbox'): ?>
                        <div class="name-gap">
                            <ul>
                                <?php $__currentLoopData = $val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <label for="<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                    <input type="<?php echo e($val->question_type); ?>" name="checkbox[]"
                                        class="form-control checkbox<?php echo e($val->id); ?>" value="<?php echo e($value); ?>"
                                        id="checkbox<?php echo e($val->id); ?>">
                                </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php elseif($val->question_type == 'select'): ?>
                        <select name="answer" id=" answer<?php echo e($val->id); ?>" class="form-control answer<?php echo e($val->id); ?>">
                            <option value="">--Select please--</option>
                            <?php $__currentLoopData = $val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>"><?php echo e(ucfirst($value)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>
                        <span>
                            <strong class="que"> Don’t know the answer to any of these questions? </strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="faq-text"><a href="<?php echo e(route('faq')); ?>">Find
                                    FAQ's</a> or <a href="<?php echo e(route('welcome')); ?>#contact"
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
                                            class="btn btn-outline-success btn-sm submitAnswer<?php echo e($val->id); ?>"
                                            type="submit" id="nextBtn" onclick="nextPrev(1,'<?php echo e($val->id); ?>')">
                                            >> </a>

                            </div>
                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>

                <!-- Circles which indicates the steps of the form: -->
                <!-- <div style="text-align:center;margin-top:40px;">
                    <?php for( $i =0; $i< (count($question) -1 );$i++): ?> <span class="step"></span>
                        <?php endfor; ?>
                </div> -->
            </div>

        </div>
    </div>
</div>




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
            <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item text-left">
                <div class="boxinn">
                    <div class="col-md-3">
                        <div class="profile">
                            <img src="<?php echo e(asset('testimonial')); ?>/<?php echo e($val->image); ?>" alt="user.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $val->user_say; ?></p>
                        <h2 class="mt-5">
                            <?php echo e($val->user_name); ?>

                            <span class="d-block"><?php echo e($val->user_designation); ?></span>
                        </h2>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('blogDetails',['id'=>$val->id])); ?>">
                            <div class="blog-item">
                                <div class="date">
                                    <?php echo e(date('d',strtotime($val->created_at))); ?>

                                    <small> <?php echo e(date('M',strtotime($val->created_at))); ?></small>
                                    <span> <?php echo e(date('Y',strtotime($val->created_at))); ?></span>
                                </div>
                                <div class="blog-img"><img src="<?php echo e(asset('blogs')); ?>/<?php echo e($val->image); ?>"
                                        alt="<?php echo e($val->image); ?>"></div>
                                <div class="blog-p">
                                    <h3><?php echo e($val->title); ?></h3>
                                    <p><?php echo e($val->subtitle); ?></p>
                                    <div class="time">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span><?php echo e(date('H A',strtotime($val->created_at))); ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- our blogs end -->



    <!-- our work -->

    <div class="work-sec my-5 py-5">

        <h2 class="titleall mb-5">OUR WORK</h2>

        <div class="container">

            <div class="row">

                <?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-md-4">

                        <div class="work-item">

                            <div class="work-img"><img src="<?php echo e(asset('extra_files')); ?>/<?php echo e($val->image); ?>" alt=""></div>

                            <div class="work-p">

                                <h3><?php echo e($val->title); ?></h3>

                                <p><?php echo $val->description; ?></p>

                            </div>

                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                

                

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
                    <form class="Contact_form" method="POST" action="<?php echo e(route('submitContact')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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

    <!-- end incontact -->
    <?php echo $__env->make('layouts.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                "_token": "<?php echo e(csrf_token()); ?>",
                question_id: jq162(".question_id" + id).val(),
                question_type: jq162(".question_type" + id).val(),
                answer: jq162(".answer" + id).val(),
                packageId: jq162(".package_id").val(),
                checkBoxValue: checkBoxValue,

            };
            jq162.ajax({
                type: "POST",
                url: "<?php echo e(route('submitAnswer')); ?>",
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

    <?php /**PATH /home/billu/Data/Professional/Laravel/CraftGenie-New/resources/views/welcome.blade.php ENDPATH**/ ?>