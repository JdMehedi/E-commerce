

<?php $__env->startSection('custom_css'); ?>
<!-- <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" type="text/css" /> -->

<style>
.form-check-label{
    margin-bottom:0;
    text-transform:capitalize;
}


</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">All Roles</a>
                        </li>

                    </ul>
                </div>
    <div class="container-fluid" style="margin-top:10px">
     

        <div class="widget">
            <div class="widget-header bordered-top bordered-darkorange">
                <span class="widget-caption">Create New Role</span>
            </div>
            <div class="widget-body">
                <div class="collapse in">
                    <div class="create-page">
                        <form action="<?php echo e(route('roles.store')); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Role Name <span class="required">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter Role Name" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    
            
                                  
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label" for="allManagement">Assign Permissions 
                                                <span class="optional">(optional)</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="allManagement">
                                                <label class="custom-control-label" for="allManagement">
                                                    <strong>All</strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>


                                            <?php $i=1; ?>

                                            <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <div class="row">
                                            <div class="col-md-3">
                                            
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="<?php echo e($i); ?>Management" value="<?php echo e($group->name); ?>" onclick="checkPermissionByGroup('role-<?php echo e($i); ?>-management-checkbox',this)">
                                            
                                           
                                              
                                                <label class="form-check-label" for="checkPermission">
                                               <?php echo e($group->name); ?>

                                                </label>
                                            </div>
                                           
                                            </div>
                                            <div class="col-md-9 role-<?php echo e($i); ?>-management-checkbox">
                                            <?php
                                            
                                            $permissions = \App\User::getPermissionsByGroupName($group->name);
                                           
                                            
                                             

                                            
                                             $j=1; 
                                             ?>
                                            
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission<?php echo e($permission->id); ?>" value="<?php echo e($permission->name); ?>">
                                            
                                           
                                              
                                                <label class="form-check-label" for="checkPermission<?php echo e($permission->id); ?>">
                                               <?php echo e($permission->name); ?>

                                                </label>
                                            </div>
                                            <?php 
                                            $j++;
                                            
                                             ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            <br>
                                        
                                            
                                            </div>
                                            </div>
                                            <?php $i++; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                       
                                    </div>
                                   
                                   
             
                                    
                                      
            
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <div class="form-actions">
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                    <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-success">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>

<?php echo $__env->make('roles.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>; 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Barua Scale Project\ansondistributing_barua\resources\views/roles/create.blade.php ENDPATH**/ ?>