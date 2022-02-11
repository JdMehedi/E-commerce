


<?php $__env->startSection('custom_css'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(URL::to('adminUser')); ?>">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(URL::to('users/add')); ?>">Add User</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Add User Form </h3>
        </div>
        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="<?php echo e(URL::to('users')); ?>" class="btn btn-sm blue"> <i class="fa fa-list"> </i> User List</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">



                    <?php echo Form::open(array('url' => url('users/save'), 'files' => true, 'class'=>'form-horizontal') ); ?>


                        


                        <div class="form-body">






                            <?php if(!empty($users)): ?>
                                <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="col-md-5 control-label"> First Name <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="text" name="fname" value="<?php if(!empty($users->fname)): ?><?php echo e($users->fname); ?><?php else: ?><?php echo e(old('fname')); ?><?php endif; ?>" class="form-control input-inline input-medium" placeholder="Enter First Name">
                                    <div class="red"><?php echo e($errors->first('fname')); ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label"> Last Name <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="text" name="lname"   value="<?php if(!empty($users->lname)): ?><?php echo e($users->lname); ?><?php else: ?><?php echo e(old('lname')); ?><?php endif; ?>" placeholder="Enter Last Name" class="form-control input-inline input-medium" >
                                    <div class="red"><?php echo e($errors->first('lname')); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label"> Email <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="email" name="email"  value="<?php if(!empty($users->email)): ?><?php echo e($users->email); ?><?php else: ?><?php echo e(old('email')); ?><?php endif; ?>" placeholder="Enter Unique email" class="form-control input-inline input-medium" >
                                    <div class="red"><?php echo e($errors->first('email')); ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label"> Password <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="password" name="password"   placeholder="Enter password" class="form-control input-inline input-medium" >
                                    <div class="red"><?php echo e($errors->first('password')); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label"> Nick Name <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="text"  name="nick_name"   value="<?php if(!empty($users->nick_name)): ?><?php echo e($users->nick_name); ?><?php else: ?><?php echo e(old('nick_name')); ?><?php endif; ?>" placeholder="Nick Name" class="form-control input-inline input-medium" >
                                    <div class="red"><?php echo e($errors->first('nick_name')); ?></div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Roles<span class="red">*</span>:</label>
                                    <div class="col-lg-7">
                                        <select class="roles_select form-control selectTag" id="roles"  name="roles[]" style="width:35%;">
                                            <?php if(empty($users)): ?>
                                                <?php if(!empty($roles)): ?>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(!empty($roles)): ?>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->name); ?>"
                                                                <?php echo e($users->hasrole($role->name) ? 'selected' : null); ?>>
                                                            <?php echo e($role->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </select>
                                        <strong class="red"><?php echo e($errors->first('roles')); ?></strong>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label"> Address <span class="red">*</span> : </label>
                                    <div class="col-md-7">
                                        <input type="text" name="address" value="<?php if(!empty($users->address)): ?><?php echo e($users->address); ?><?php else: ?><?php echo e(old('address')); ?><?php endif; ?>" placeholder="Enter address" class="form-control input-inline input-medium" >
                                        <div class="red"><?php echo e($errors->first('address')); ?></div>
                                    </div>
                                </div>
                            <div class="form-group">
                            <label class="col-md-5 control-label"> Phone <span class="red">*</span> : </label>
                            <div class="col-md-7">
                            <input type="text" name="phone" value="<?php if(!empty($users->phone)): ?><?php echo e($users->phone); ?><?php else: ?><?php echo e(old('phone')); ?><?php endif; ?>" placeholder="Enter Phone" class="form-control input-inline input-medium" >
                            <div class="red"><?php echo e($errors->first('phone')); ?></div>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-5 control-label">Mobile <span class="red">*</span> : </label>
                            <div class="col-md-7">
                            <input type="text" name="mobile" value="<?php if(!empty($users->mobile)): ?><?php echo e($users->mobile); ?><?php else: ?><?php echo e(old('mobile')); ?><?php endif; ?>" placeholder="Enter Mobile" class="form-control input-inline input-medium" >
                            <div class="red"><?php echo e($errors->first('mobile')); ?></div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-5 control-label"> Contact <span class="red">*</span> : </label>
                            <div class="col-md-7">
                            <input type="text" name="contact" value="<?php if(!empty($users->contact)): ?><?php echo e($users->contact); ?><?php else: ?><?php echo e(old('contact')); ?><?php endif; ?>" placeholder="Enter contact" class="form-control input-inline input-medium" >
                            <div class="red"><?php echo e($errors->first('contact')); ?></div>
                            </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-5 control-label"> Fax <span class="red">*</span> : </label>
                                    <div class="col-md-7">
                                        <input type="text" name="fax" value="<?php if(!empty($users->fax)): ?><?php echo e($users->fax); ?><?php else: ?><?php echo e(old('fax')); ?><?php endif; ?>" placeholder="Enter Fax" class="form-control input-inline input-medium" >
                                        <div class="red"><?php echo e($errors->first('fax')); ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Profile Image <span class="red">*</span> : </label>
                                    <div class="col-md-7">
                                        <input type="file" name="profile_image"  placeholder="Enter photo" class="form-control input-inline input-medium" >
                                        <?php if(!empty($users->profile_image)): ?>
                                            <img width="80" src="<?php echo e(asset('/uploads/personalPhotos/'.$users->profile_image)); ?>"  alt="">
                                        <?php endif; ?>

                                        <div class="red"><?php echo e($errors->first('profile_image')); ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label"> Date Of Birth <span class="red">*</span> : </label>
                                    <div class="col-md-7">
                                        <input type="text" data-date-format="dd-mm-yyyy" name="DOB" value="<?php if(!empty($users->DOB)): ?><?php echo e($users->DOB); ?><?php else: ?><?php echo e(old('DOB')); ?><?php endif; ?>" placeholder="Enter birth date" class="form-control date-picker input-medium" >
                                        <div class="red"><?php echo e($errors->first('DOB')); ?></div>
                                    </div>
                                </div>

                                <?php if(!empty($users)): ?>
                                <div class="form-group">
                                    <label class="col-md-5 control-label"> Status <span class="red">*</span> : </label>
                                    <div class="col-md-7">
                                        <select class="form-control input-inline input-medium" type="text" name="status"  >
                                                <option <?php if($users->status==1): ?> selected <?php endif; ?> value=1>Active</option>
                                                <option <?php if($users->status==0): ?> selected <?php endif; ?> value=0>Inactive</option>
                                        </select>
                                        <div class="red"><?php echo e($errors->first('status')); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-5 col-md-6">
                                            <button type="submit" class="btn green">Save</button>
                                            <button type="reset" class="btn default reset">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script src="<?php echo e(asset('/phq/assets/global/plugins/select2/js/select2.full.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/phq/assets/pages/scripts/components-select2.min.js')); ?>" type="text/javascript"></script>

    <script>
        function selectTagging() {
            $(".js-example-tokenizer").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            $('.selectTag').select2({
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                }
            });
            $('.selectTag').select2({
                createTag: function (params) {
                    // Don't offset to create a tag if there is no @ symbol
                    if (params.term.indexOf('@') === -1) {
                        // Return null to disable tag creation
                        return null;
                    }

                    return {
                        id: params.term,
                        text: params.term
                    }
                }
            });

            $('.selectTag').select2({
                insertTag: function (data, tag) {
                    // Insert the tag at the end of the results
                    data.push(tag);
                }
            });
        }

        $(document).ready(function(){
            selectTagging();

       });


        $(function() {
            $( "#date" ).datepicker({dateFormat: 'yy'});
        });

    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Barua Scale Project\ansondistributing_barua\resources\views/admin/set/userAddEdit.blade.php ENDPATH**/ ?>