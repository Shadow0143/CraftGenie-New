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
        <p>Depending on the stage of your company ~ we work across Indiaâ€™s fastest growing startups to some of
            Indiaâ€™s biggest unicorn founders..</p>
    </div>
    <div class="about-bnr mt-5">
        <div class="container">
            <div class="about-text col-md-7">
                <h3>Powerful Narratives Powerful Perception
                </h3>
                <p>30+ years of combined experience in helping brands achieve their perception journey goals, we connect
                    real business stories of impact across platforms of trust. </p>
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
        <h2 class="titleall mb-5">Quick packages</h2>
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
                                    <li><img src="<?php echo e(asset('img/pdf.png')); ?>" alt="ppt.png"></li>
                                </ul>
                                <a href="javaScript:void(0);" class="order"  data-id="<?php echo e($val->id); ?>" > order</a>
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
    <h2 class="titleall mb-3">How do we do?</h2>
    <div class="col-md-6 m-auto py-4 text-center">
        <p>Depending on the stage of your company ~ we work across Indiaâ€™s fastest growing startups to some of
            Indiaâ€™s biggest unicorn founders..</p>
    </div>
    <div class="container">
        <div class="row">
            <ul class="stape-area">
                <li  class="Questionnaire">
                    <div class="rw-box">
                        <img src="<?php echo e(asset('img/icon.png')); ?>" alt="">
                    </div>
                    <span>     Questionnaire  </span>
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
    .step.active {
      opacity: 1;
    }
   
</style>

<!-- Modal -->
<div class="modal fade" id="QuestionAnswerModeal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Questions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(route('submitAnswer')); ?>" id="question_form<?php echo e($key+1); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="tab">
                    <p>
                       <?php echo e($key+1); ?> ). &nbsp;  <?php echo e($val->question); ?>

                        <input type="hidden" name="question_id" id="question_id<?php echo e($val->id); ?>" value="<?php echo e($val->id); ?>" class="question_id<?php echo e($val->id); ?>">
                        <input type="hidden" name="question_type" id="question_type<?php echo e($val->id); ?>"
                            value="<?php echo e($val->question_type); ?>" class="question_type<?php echo e($val->id); ?>">
                    </p>
                    <p class="mb-5">
                        <?php if($val->question_type == 'text'): ?>
                            <input type="<?php echo e($val->question_type); ?>" name="answer" class="form-control answer<?php echo e($val->id); ?>" id="answer<?php echo e($val->id); ?>">
                        <?php elseif($val->question_type == 'textarea'): ?>
                             <textarea name="answer" id="answer<?php echo e($val->id); ?>" cols="30" rows="10"
                            class="form-control answer<?php echo e($val->id); ?>"></textarea>
                        <?php elseif($val->question_type == 'radio'): ?>
                        <?php $__currentLoopData = $val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label for="<?php echo e($value); ?>"><?php echo e($value); ?></label>
                            <input type="<?php echo e($val->question_type); ?>" name="answer" class="form-control answer<?php echo e($val->id); ?>"
                                value="<?php echo e($value); ?>" id="answer<?php echo e($val->id); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php elseif($val->question_type == 'checkbox'): ?>
                        <?php $__currentLoopData = $val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label for="<?php echo e($value); ?>"><?php echo e($value); ?></label>
                            <input type="<?php echo e($val->question_type); ?>" name="checkbox[]" class="form-control checkbox<?php echo e($val->id); ?>"
                                value="<?php echo e($value); ?>" id="checkbox<?php echo e($val->id); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php elseif($val->question_type == 'select'): ?>
                            <select name="answer" id=" answer<?php echo e($val->id); ?>" class="form-control answer<?php echo e($val->id); ?>">
                                <option value="">--Select please--</option>
                                <?php $__currentLoopData = $val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>"><?php echo e(ucfirst($value)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>
                    </p>
                    <div style="overflow:auto;">
                        <div style="float:right">
                            
                            <a href="javaScript:void(0);" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-outline-dark btn-sm"> << </a>
                            <a  href="javaScript:void(0);" class="btn btn-outline-success btn-sm submitAnswer<?php echo e($val->id); ?>"  type="submit"  id="nextBtn" onclick="nextPrev(1,'<?php echo e($val->id); ?>')">Save & Next</a>
                            <a class="btn btn-outline-danger btn-sm paynowbtn " href="#">Skip & Checkout</a>
                            <a class="btn btn-outline-warning btn-sm" onclick="skip(1)" href="javaScript:void(0);"> >> </a>
                            
                        </div>
                    </div>
                    
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <?php for( $i =0; $i< (count($question) -1 );$i++): ?>
                <span class="step"></span>
                <?php endfor; ?>
            </div>
        </div>
        
      </div>
    </div>
  </div>

<!-- CLIENTS SPEAK -->

<div class="client-sp my-5 py-5">

    <h2 class="titleall mb-5">CLIENTS SPEAK</h2>

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
    <h2 class="titleall mb-5">OUR BLOGS</h2>
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

            <div class="col-md-4">

                <div class="work-item">

                    <div class="work-img"><img src="<?php echo e(asset('img/work-1.jpg')); ?>" alt=""></div>

                    <div class="work-p">

                        <h3>Lorem Ipsum is simply</h3>

                        <p>Ipsum passages, and more

                            recently withIpsum passages, and more</p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="work-item">

                    <div class="work-img"><img src="<?php echo e(asset('img/work-2.jpg')); ?>" alt=""></div>

                    <div class="work-p">

                        <h3>Lorem Ipsum is simply</h3>

                        <p>Ipsum passages, and more

                            recently withIpsum passages, and more</p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="work-item">

                    <div class="work-img"><img src="<?php echo e(asset('img/work-3.jpg')); ?>" alt=""></div>

                    <div class="work-p">

                        <h3>Lorem Ipsum is simply</h3>

                        <p>Ipsum passages, and more

                            recently withIpsum passages, and more</p>

                    </div>

                </div>

            </div>

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
                <form class="Contact_form" method="GET" action="<?php echo e(route('submitContact')); ?>">
                    <input type="text" name="name" placeholder="Full Name" id="name">
                    <input type="text" name="email" placeholder="Email Id" id="email">
                    <input type="text" name="contact" placeholder="Contact Number" id="contact">
                    <button onClick="submitForm()"> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end incontact -->
<?php echo $__env->make('layouts.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js">

    <script>
        function submitForm()
        {
            $(".Contact_form").submit(function (event) {
            var formData = {
                "_token": "<?php echo e(csrf_token()); ?>",
                name: $("#name").val(),
                email: $("#email").val(),
                contact_no: $("#contact").val(),
            };
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: formData,
                dataType: "json",
                encode: true,
                success: function(res){
                    alert('Done');
                },
            });
            event.preventDefault();
            event.stopImmediatePropagation();
            });
        }


    </script>


    <script>
        jq162 = jQuery.noConflict( true );
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
        if (n == x.length  ) {
            document.getElementById("nextBtn").innerHTML = "Submit"; 
            $('#QuestionAnswerModeal').modal('hide');
            
        } else {
            document.getElementById("nextBtn").innerHTML = " Save & Next";
            
        }
        fixStepIndicator(n)
        }
        
        function nextPrev(n,id) {
            jq162(".submitAnswer"+id).click(function (event) {
                var checkBoxValue = [];
                jq162(".checkbox"+id).each(function() {
                    if (jq162(this).is(':checked')) {
                        var checked = ($(this).val());
                        checkBoxValue.push(checked);
                    }
                });

                    var formData = {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    question_id: jq162(".question_id"+id).val(),
                    question_type: jq162(".question_type"+id).val(),
                    answer: jq162(".answer"+id).val(),
                    checkBoxValue:checkBoxValue,

                };
                jq162.ajax({
                    type: "POST",
                    url: "<?php echo e(route('submitAnswer')); ?>",
                    data: formData,
                    dataType: "json",
                    encode: true,
                    success: function(res){
                    if(res==1){ 
                        // alert('done');
                        var x = document.getElementsByClassName("tab");
                        if (n == 1 && !validateForm()) return false;
                        x[currentTab].style.display = "none";
                        
                        currentTab = currentTab + n;
                        if (currentTab == x.length  ) {
                            $('#QuestionAnswerModeal').modal('hide');
                            
                        } 
                        
                        showTab(currentTab);
                        }
                        
                    },
                });
                event.preventDefault();
                event.stopImmediatePropagation();
            });

            if(n ==-1){
                var x = document.getElementsByClassName("tab");
                if (n == 1 && !validateForm()) return false;
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;
                showTab(currentTab);
                
            }
            
        }


        function skip(n) {

            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab == x.length  ) {
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
            for (i = 0; i <( x.length)-1; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
        
        }
    </script>

    <script>
        $('.order').on('click',function(){
            var packageId = $(this).data('id');
            $('#QuestionAnswerModeal').modal('show');
            $('.paynowbtn').attr('href','/razorpay-payment/'+packageId);
            
        });
        $('.Questionnaire').on('click',function(){
           
            $('#QuestionAnswerModeal').modal('show');
            $('.paynowbtn').hide();
            
        });

      

    </script><?php /**PATH /home/billu/Data/Professional/Laravel/CraftGenie-New/resources/views/welcome.blade.php ENDPATH**/ ?>