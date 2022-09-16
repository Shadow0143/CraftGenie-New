<div class="modal fade" id="login55" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="col-12 popup-text">


                <form method="POST" action="<?php echo e(route('login')); ?>" class="login-gap">
                    <?php echo csrf_field(); ?>
                    <h3 class="text-center">Welcome !</h3>
                    <div class="col-12" style="text-align: center; margin-bottom:3px;margin-top:0px">
                        <img src="<?php echo e(asset('img/logo.png')); ?>" alt="main-logo" style="width: 100px; height:30px">
                    </div>

                    <div class="form-holder">
                        <i class="fa fa-envelope envelope" aria-hidden="true"></i>
                        <input id="email" type="email"
                            class="form-control holder-gap <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                            value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>


                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback " style="color:red">
                        <?php echo e($message); ?>

                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-holder">
                        <i class="fa fa-lock lock" aria-hidden="true"></i>
                        <input id="password" type="password"
                            class="form-control holder-gap2 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                            required autocomplete="current-password">


                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback " style="color:red">
                        <?php echo e($message); ?>

                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-holder check-gap">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember')
                            ? 'checked' : ''); ?>>

                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                    <?php if(Route::has('password.request')): ?>
                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('Forgot Your Password?')); ?>

                    </a>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-outline-primary">
                        <span>LOGIN</span>
                    </button>
                    <p class="click-text">Don't have an account ? <span><a href="<?php echo e(route('register')); ?>"
                                class="click-gap">Click here</a></span></p>
                </form>

            </div>

        </div>
    </div>
</div>


<!-- footer-box -->
<div class="" style="background-color: #efefef">
    <div class="container pt-5 pl-5">

        <footer>
            <div class="row">
                <div class="col-md-6 col-sm-6 mt-2">
                    <h3>QUICK LINKS</h3>
                    <div class="row">
                        
                        <div class="quick">
                            <ul>
                                <li>
                                    <a href="<?php echo e(route('faq')); ?>">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Condition</a>
                                </li>
                                <li>
                                    <a href="#">Booking Policies</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policie</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 col-sm-12 mt-3 contact">
                    <h3>CONTACT </h3>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker marker" aria-hidden="true"></i>
                            Palm Spring Center, 4th Floor, Link Rd,
                        </li>
                        <li class="phone-text">
                            <i class="fa fa-phone phone" aria-hidden="true"></i>
                            8548785485
                        </li>
                        <li class="message-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            craft-genie&gmail.com
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</div>
<div class="footer-box">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-logo">
                    <img src="<?php echo e(asset('img/logo.png')); ?>" alt="footer-main-logo">
                </div>
            </div>
            <div class="col-md-5 ml-auto text-right">
                <div class="share">
                    <h2>
                        
                        Copyright © 2022 Craftgenie.All Rights Reserved.Powered by <a href="http://www.bluehorse.in"
                            target="_blank">BlueHorse</a>

                    </h2>
                    <ul>
                        <li>
                            <a href=""> <img src="<?php echo e(asset('img/face.png')); ?>" alt="facebook-logo"></a>
                        </li>
                        <li>
                            <a href=""> <img src="<?php echo e(asset('img/ins.png')); ?>" alt="insta-logo"></a>
                        </li>
                        <li>
                            <a href=""> <img src="<?php echo e(asset('img/tw.png')); ?>" alt="twit-logo"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





<!--jquery min  -->
<script src="<?php echo e(asset('js/jquery-slim.min.js')); ?>"></script>
<!--bootstrap.min  -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!--popper.min  -->
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<!--popper.min  -->
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<!-- owl -->
<script src="<?php echo e(asset('js/owl.carousel.js')); ?>"></script>
<!-- Custom jquery -->
<script src="<?php echo e(asset('js/script.js')); ?>"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- fontawesome -->
<script src="https://use.fontawesome.com/8ae5a19cac.js"></script>




</body>

</html><?php /**PATH /home/billu/Data/Professional/Laravel/CraftGenie-New/resources/views/layouts/frontend/footer.blade.php ENDPATH**/ ?>