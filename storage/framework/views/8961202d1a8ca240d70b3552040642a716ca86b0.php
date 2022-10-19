<?php $__env->startSection('custom_css'); ?>
    <link href="<?php echo e(asset('/phq/assets/global/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/phq/assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <script src="<?php echo e(asset('phq/assets/js/tableToExcel.js')); ?>" type="text/javascript"></script>

    <style type="text/css">
        #sample_12 th{
            text-align: center;
        }

    </style>

    <div style="margin-bottom: 5%;" class="portlet light bordered">

    </div>




        <div class="row">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <div class="portlet-body">



                <div   class="col-md-8 col-md-offset-2">
                    <div style="margin-top: 0%; min-height: 500px" class="panel panel-default">
                        <div style="background-color: purple" class="panel-heading">Login</div>

                        <div style="margin-top: 10%" class="panel-body">
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- END EXAMPLE TABLE PORTLET-->









<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom_js'); ?>
    <script src="<?php echo e(asset('/phq/assets/global/plugins/select2/js/select2.full.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/phq/assets/pages/scripts/components-select2.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //console.log('value');
            $(document).on('change', '.password_change', function (evt) {
                var value = $(this).val();
                // document.write(value);
                console.log(value);
                if(value == 1){

                    $('.pass').removeClass('hide');
                    $('.log').addClass('hidden');


                }

                   if(value==0){

                    $('.pass').addClass('hide');
                       $('.log').removeClass('hidden');
                }

            });
        });
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mehedi/Laravel/ansondistributing_barua_new/resources/views/auth/login.blade.php ENDPATH**/ ?>