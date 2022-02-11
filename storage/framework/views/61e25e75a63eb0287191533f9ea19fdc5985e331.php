
<?php $__env->startSection('custom_css'); ?>
<!-- <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" type="text/css" /> -->
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
    <div class="container-fluid">
        <?php echo $__env->make('roles.partials.top-show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('roles.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
        <div class="widget">
            <div class="widget-header bordered-top bordered-darkorange">
                <span class="widget-caption">Role List</span>
            </div>
            <div class="widget-body no-padding">
             
                <div class="product-table">
                
                    <!-- <table class="table table-striped table-bordered display ajax_view" id="roles_table"> -->
                    <table class="table table-striped table-hover table-bordered" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">Sl</th>
                                <th width="10%">Name</th>
                                <th width="60%">Total Permissions</th>
                                <th width="15%" style="width: 140px!important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->index+1); ?></td>
                        <td><?php echo e($role->name); ?></td>
                        <td>
                        <?php 
                        $role_id = $role->id;
                    
                        $html = "Total - <span class='badge badge-default mr-1'>" . count( DB::table('role_has_permissions')->where('role_id', $role_id)->get()
                            ) . "</span>";
                        echo $html;
                        ?>
                        </td>
                        <td>
                        <a class="btn btn-default btn-circle btn-xs btn-info" href="<?php echo e(route('roles.show', $role->id )); ?>"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-success text-white" href="<?php echo e(route('roles.edit',$role->id)); ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger text-white" href="<?php echo e(url('roles/destroy', $role->id )); ?>" onclick="return confirm('Are you sure to delete')">
                        <i class="fa fa-trash"></i>
                                    </a>
                                    
                        </td>
                        
                        
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script>
    const ajaxURL = "roles";
    $('table#roles_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'permissions', name: 'permissions'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ansondistributing_barua\resources\views/roles/index.blade.php ENDPATH**/ ?>