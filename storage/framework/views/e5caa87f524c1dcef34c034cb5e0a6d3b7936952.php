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
                <div class="item">
                    <div class="inr-slider-box ">
                        <div class="img-area">
                            <img src="<?php echo e(asset('img/qp1.jpg')); ?>" alt="quic3.png">
                        </div>
                        <div class="w-100 d-block qtext">
                            <h5>Start-up PR packages </h5>
                            <p>Unsure about whether you need PR for your Small business or a new start-up? Hit this
                                package up for a consultation and press strategy solutions </p>
                            <div class="bar-list">
                                <ul>
                                    <li><img src="<?php echo e(asset('img/ppt.png')); ?>" alt="pdf.png"></li>
                                    <li><img src="<?php echo e(asset('img/excel.png')); ?>" alt="excel.png"></li>
                                </ul>
                                <a href="" class="order"> order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="inr-slider-box ">
                        <div class="img-area">
                            <img src="<?php echo e(asset('img/qp2.jpg')); ?>" alt="quic3.png">
                        </div>
                        <div class="w-100 d-block qtext">
                            <h5>Press Release/ Press documents </h5>
                            <p>Quick PR fixes? Hit this package for singular press documents and press releases</p>
                            <div class="bar-list">
                                <ul>
                                    <li><img src="<?php echo e(asset('img/pdf.png')); ?>" alt="ppt.png"></li>
                                </ul>
                                <a href="" class="order"> order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="inr-slider-box ">
                        <div class="img-area">
                            <img src="<?php echo e(asset('img/qp3.jpg')); ?>" alt="quic3.png">
                        </div>
                        <div class="w-100 d-block qtext">
                            <h5>Crisis Communication </h5>
                            <p>Focused PR strategy and official statement for combating negative press coverage
                            </p>
                            <div class="bar-list">
                                <ul>
                                    <li><img src="<?php echo e(asset('img/pdf.png')); ?>" alt="ppt.png"></li>
                                </ul>
                                <a href="" class="order"> order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="inr-slider-box ">
                        <div class="img-area">
                            <img src="<?php echo e(asset('img/quic3.png')); ?>" alt="quic3.png">
                        </div>
                        <div class="w-100 d-block qtext">
                            <h5>Influencer Marketing
                            </h5>
                            <p>Content curation & creation with relevant influencers with actual influence
                            </p>
                            <div class="bar-list">

                                <ul>


                                    <li><img src="<?php echo e(asset('img/pdf.png')); ?>" alt="ppt.png"></li>

                                    <li><img src="<?php echo e(asset('img/excel.png')); ?>" alt="excel.png"></li>

                                </ul>

                                <a href="" class="order"> order</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="item">

                    <div class="inr-slider-box ">

                        <div class="img-area">

                            <img src="<?php echo e(asset('img/quic3.png')); ?>" alt="quic3.png">

                        </div>

                        <div class="w-100 d-block qtext">

                            <h5>Blog post

                            </h5>

                            <p>Posts that position thought leadership & innovation of the brand in a crisp & engaging
                                narrative

                            </p>



                            <div class="bar-list">

                                <ul>


                                    <li><img src="<?php echo e(asset('img/pdf.png')); ?>" alt="ppt.png"></li>

                                </ul>

                                <a href="" class="order"> order</a>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="item">

                    <div class="inr-slider-box ">

                        <div class="img-area">

                            <img src="<?php echo e(asset('img/quic3.png')); ?>" alt="quic3.png">

                        </div>

                        <div class="w-100 d-block qtext">

                            <h5>Press Release dissemination

                            </h5>

                            <p>Nation-wide dissemination service based on the target markets that are relevant for the
                                business

                            </p>



                            <div class="bar-list">

                                <ul>


                                    <li><img src="<?php echo e(asset('img/excel.png')); ?>" alt="ppt.png"></li>

                                </ul>

                                <a href="" class="order"> order</a>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="item">

                    <div class="inr-slider-box ">

                        <div class="img-area">

                            <img src="<?php echo e(asset('img/quic3.png')); ?>" alt="quic3.png">

                        </div>

                        <div class="w-100 d-block qtext">

                            <h5>Comprehensive PR Strategy

                            </h5>

                            <p>No shortcut to the art of story-telling. Long term PR strategy which creates a
                                quarter-on-quarter impact for the brand and aides in achieving the perception vision of
                                the business.

                            </p>



                            <div class="bar-list">

                                <ul>


                                    <li><img src="<?php echo e(asset('img/pdf.png')); ?>" alt="pdf.png"></li>

                                </ul>

                                <a href="" class="order"> order</a>

                            </div>

                        </div>

                    </div>

                </div>



            </div>



        </div>

        <div id="howdo"></div>

    </div>





</section>

<!--end New Arrivals-->
<!-- What do we do -->

<div class="Whatdo my-5 pt-5">

    <h2 class="titleall mb-3">How do we do?</h2>

    <div class="col-md-6 m-auto py-4 text-center">

        <p>Depending on the stage of your company ~ we work across Indiaâ€™s fastest growing startups to some of
            Indiaâ€™s biggest unicorn founders..</p>

    </div>

    <div class="container">

        <div class="row">

            <ul class="stape-area">

                <li>

                    <div class="rw-box">

                        <img src="<?php echo e(asset('img/icon.png')); ?>" alt="">

                    </div>

                    <span>Questionair </span>

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



<!-- end What do we do -->









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
                        <button  onClick="submitForm()"> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end incontact -->
    <?php echo $__env->make('layouts.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


    </script><?php /**PATH /home/billu/Data/Professional/Laravel/CraftGenie-New/resources/views/welcome.blade.php ENDPATH**/ ?>