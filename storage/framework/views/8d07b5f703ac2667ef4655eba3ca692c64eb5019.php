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
                <a href="<?php echo e(URL::to('freight/list')); ?>">Invoice</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Freight List</h3>
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
                    Under Development
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
    </script>

    <script>
        $(document).ready(function(){
            selectTagging();
        });
    </script>
<?php $__env->stopSection(); ?>





















<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mehedi/Laravel/ansondistributing_barua_new/resources/views/freight/list.blade.php ENDPATH**/ ?>