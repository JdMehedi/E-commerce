

<?php $__env->startSection('custom_css'); ?>
    <link href="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(URL::to('/adminUser')); ?>">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(URL::to('users')); ?>">UserList</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title">User List </h3>
        </div>
        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="<?php echo e(URL::to('users/add')); ?>" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add User </a>
        </div>

    </div>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1"><!-- table2 -->
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>EMAIL</th>
                            <th>Nick Name</th>
                            <th> Roles </th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Contact</th>
                            <th>Fax</th>
                            <th>Profile Image</th>
                            <th>Date Of Birth</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($users[0])): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->fname); ?></td>
                                    <td><?php echo e($user->lname); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->nick_name); ?></td>
                                    <?php
                                        $html = '';
                                        $roles = App\User::find($user->id)->getRoleNames();
                                        foreach ($roles as $role) {
                                            $html .=  $role;
                                        }
                                    ?>
                                    <td> <span class="badge badge-info"><?php echo e($html); ?></span></td>
                                    <td><?php echo e($user->address); ?></td>
                                    <td><?php echo e($user->phone); ?></td>
                                    <td><?php echo e($user->mobile); ?></td>
                                    <td><?php echo e($user->contact); ?></td>
                                    <td><?php echo e($user->fax); ?></td>
                                    <td>
                                        <?php if(!empty($user->profile_image)): ?>
                                            <img width="80%" src="<?php echo e(asset('/uploads/personalPhotos/'.$user->profile_image)); ?>"  alt="">
                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo e($user->DOB); ?></td>
                                    <?php if($user->status==1): ?>
                                        <td>Active</td>
                                    <?php else: ?>
                                        <td>Inactive</td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(url('users/edit').'?id='.$user->id); ?>" class="btn btn-xs blue"> <i class="fa fa-edit"></i> Edit /</a>
                                        <a href="<?php echo e(url('users/delete').'?id='.$user->id); ?>" class="btn btn-xs red" onclick="return confirm('Do You confirm?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->



<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom_js'); ?>
    <script src="<?php echo e(asset('phq/assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
    <script>
        $('#sample_1').DataTable({
            "iDisplayLength": 10,
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "all"]
            ]
        });

        $(document).ready(function(){
            $('.delete-user').on('click', function(e){
                e.preventDefault();
                var user_id = $(this).attr("data-user_id");
                var csrf_token = "<?php echo e(csrf_token()); ?>";
                if(user_id)
                {
                    var url_op = base_url+"/users/delete";
                    $.ajax({
                        type: "POST",
                        url: url_op,
                        dataType: 'json',
                        data: {user_id: user_id, _token: csrf_token},
                        success: function(msg) {
                            if(msg['output'] == 'ture')
                            {
                                alert('Successfully Deleted.');
                                location.reload();
                            }
                            else{
                                alert(msg['output']);
                            }
                        }
                    });
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>





















<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ansondistributing_barua\resources\views/admin/set/userList.blade.php ENDPATH**/ ?>