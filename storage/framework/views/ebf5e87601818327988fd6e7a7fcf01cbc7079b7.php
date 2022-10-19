 

<?php $__env->startSection('custom_css'); ?>
<style>
		.widget-body{
			min-height:400px;
		}
	</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid text-center">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title">403</h1>
                <h3 class="text-uppercase error-subtitle">FORBIDDON ERROR!</h3>
                <p class="text-muted m-t-30 m-b-30">YOU DON'T HAVE PERMISSION TO DO THIS ACTION.</p>
                <a href="<?php echo e(route('displayWelcome')); ?>" class="btn btn-primary btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-arrow-left"></i> Back to home</a>


                <?php if(\Illuminate\Support\Facades\Auth::user()): ?>
                    <button class="btn btn-danger btn-rounded waves-effect waves-light m-b-40" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false" > Logout Now <i class="fa fa-arrow-right"></i></button>
                    <form id="logout-form" method="POST" style="display: none;" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"> Login Again <i class="fa fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mehedi/Laravel/ansondistributing_barua_new/resources/views/errors/404.blade.php ENDPATH**/ ?>