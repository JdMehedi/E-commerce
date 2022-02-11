
<!-- ============================================================== -->
<!-- Top Show Data of Roles List Page -->
<!-- ============================================================== -->
<div class="row mt-1">
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='<?php echo e(route('roles.index')); ?>'">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                
                 <h1 class="font-light text-white"><?php echo e($count_roles); ?></h1>
                 
                <h6 class="text-white">Total Roles</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='<?php echo e(route('roles.index')); ?>'">
        <div class="card card-hover">
            <div class="box bg-primary text-center">
            <h1 class="font-light text-white"><?php echo e($count_permissions); ?></h1> 
                <h6 class="text-white">Total Permissions</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='<?php echo e(route('roles.create')); ?>'">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">
                    <i class="fa fa-plus-circle"></i>
                </h1>
                <h6 class="text-white">Create New Role</h6>
            </div>
        </div>
    </div>
    
</div><?php /**PATH C:\xampp\htdocs\ansondistributing_barua\resources\views/roles/partials/top-show.blade.php ENDPATH**/ ?>