<?php if(Session::has('sticky_error')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span> </button>
        <h3 class="text-danger"><i class="fa fa-times-circle"></i> Error</h3>
        <?php echo Session::get('sticky_error'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('sticky_success')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span> </button>
        <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
        <?php echo Session::get('sticky_success'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="alert alert-success">
        <h3 class="sunset"> <?php echo Session::get('success'); ?> </h3>
    </div>
<?php endif; ?>

<div style="display:none" class="alert alert-danger m-t-sm error_message"></div>
<div style="display:none;" class="alert alert-success m-t-sm success_message"></div>
<?php if(Session::has('error_message')): ?>
    <div class="alert alert-danger m-t-sm"><?php echo html_entity_decode(Session::get('error_message')); ?></div>
<?php endif; ?>
<?php if(Session::has('warning_message')): ?>
    <div class="alert alert-warning m-t-sm"><?php echo e(Session::get('warning_message')); ?></div>
<?php endif; ?>
<?php if(Session::has('success_message')): ?>
    <div class="alert alert-success m-t-sm"><?php echo e(Session::get('success_message')); ?></div>
<?php endif; ?>
<?php if(Session::has('delete')): ?>
    <div class="alert alert-danger m-t-sm"><?php echo e(Session::get('delete')); ?></div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        new Noty({
            type: 'success',
            theme: 'sunset',
            text: "<?php echo Session::get('success'); ?>",
            timeout: 2000
        }).show();
    </script>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span> </button>
    <h3 class="text-danger"><i class="fa fa-times-circle"></i> Error</h3>
    <div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p><?php echo $error; ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<script>

    // setTimeout(function(){
    //     $(".alert").delay(5000).slideUp(300);
    // });

    // setTimeout (function (){
    //     $('.alert').delay(5000).slideUp(300);
    // });
</script>
<?php /**PATH C:\xampp\htdocs\Barua Scale Project\ansondistributing_barua\resources\views/roles/partials/messages.blade.php ENDPATH**/ ?>