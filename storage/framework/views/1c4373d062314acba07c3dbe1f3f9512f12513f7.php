<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo e(asset('public/assets\template\img/icon.ico')); ?>" />
    <script src="<?php echo e(asset('public//assets/template/')); ?>/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['<?php echo e(asset('public//assets/template/')); ?>/css/fonts.min.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        }); 
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('public//assets/template/')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public//assets/template/')); ?>/css/atlantis.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div
            class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
            <h1 class="title fw-bold text-white mb-3">HRD</h1>
            <p class="subtitle text-white op-7">SISTEM INFORMASI KARYAWN </p>
            <?php if($message = Session::get('success')): ?>
            <li><?php echo e($message); ?></li>
            <?php endif; ?>
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container container-login container-transparent animated fadeIn">
                <form action="<?php echo e(route('login')); ?>" method="POST" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <h3 class="text-center">Login Aplikasi</h3>
                    <div class="login-form">
                        <div class="form-group">
                            <?php if($errors->has('email')): ?>
                            <b>
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </b>
                            <?php endif; ?>
                            <label for="email" class="placeholder"><b>email</b></label>
                            <input id="email" name="email" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <?php if($errors->has('password')): ?>
                            <b>
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </b>
                            <?php endif; ?>
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="position-relative">
                                <input id="password" name="password" type="password" class="form-control" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-action-d-flex mb-3">
                            <button type="submit" name="login"
                                class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Login</a>
                        </div>
                        <div class="login-account">
                            <span class="msg"><a href="<?php echo e(route('register')); ?>">Register ?</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('public//assets/template/')); ?>/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo e(asset('public//assets/template/')); ?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('public//assets/template/')); ?>/js/core/popper.min.js"></script>
    <script src="<?php echo e(asset('public//assets/template/')); ?>/js/core/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('public//assets/template/')); ?>/js/atlantis.min.js"></script>
</body>

</html><?php /**PATH D:\xampp64\www\edi_test\resources\views/auth/login.blade.php ENDPATH**/ ?>