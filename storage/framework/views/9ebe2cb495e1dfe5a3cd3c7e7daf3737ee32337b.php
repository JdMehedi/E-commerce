<?php $__env->startSection('custom_css'); ?>
    <link href="<?php echo e(asset('assets/global/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
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
                <a href="#">Document</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Add Docuemnt Form </h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">
                    <form class="form-horizontal" method="post" action="<?php echo e(route('document.store')); ?>" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                         <div class="form-body">
                             <div class="form-group">
                                 <label class="col-md-5 control-label"> Order Number </label>
                                 <div class="col-md-7">
                                    <select class="form-control selectTag input-medium" id="order_id" placeholder="Order Number"  name="order_id">
                                     <option  value="" >Select Order Number</option>
                                     <?php if(!empty($orders)): ?>
                                         <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($order->id); ?>"><?php echo e($order->order_number); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                 </select>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-md-5 control-label"> Document Type </label>
                                 <div class="col-md-7">
                                     <select class="form-control selectTag input-medium" id="doc_type_id" placeholder="Document Type"  name="doc_type_id">
                                         <option  value="" >Select Document Type</option>
                                         <?php if(!empty($document_types)): ?>
                                             <?php $__currentLoopData = $document_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($document_type->id); ?>"><?php echo e($document_type->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>
                                     </select>
                                 </div>
                             </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">Upload File <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="file"  name="file_name" id="file_name"  placeholder="Enter File" class="form-control input-inline input-medium" >
                                    <div class="red"><?php echo e($errors->first('file_name')); ?></div>
                                </div>
                            </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Document List </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div id="table_content">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th style="display: none">Serial</th>
                            <th style="display: none">ID</th>
                            <th>Order Number</th>
                            <th>Document Type</th>
                            <th> File</th>
                            <th>Created Date</th>
                            <th>ACTION</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($documents)): ?>
                            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <tr>
                                    <td style="display: none"><?php echo e($document->document_type_info->serial); ?></td>
                                    <td style="display: none"><?php echo e($document->id); ?></td>
                                    <td><?php echo e($document->order_info->order_number); ?></td>
                                    <td><?php echo e($document->document_type_info->name); ?></td>
                                    <td><a target="_blank"  href="<?php echo e(route('document.downLoadFile', encrypt($document->file_name))); ?>"><i class="fa fa-file"></i> File</a></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($document->updated_at)->diffForhumans()); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('document/delete').'?id='.$document->id); ?>" class="btn btn-xs red" onclick="return confirm('Do You want to confirm the document delete?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>



                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE TITLE-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script src="<?php echo e(asset('phq/assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>

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
    </script>
    <script>
        function dataTable(){
            $('#sample_1').DataTable({
                "iDisplayLength": 10,
                "ordering": true,
                "order": [[0, "asc"], [1, "asc"]],
                "aLengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "all"]
                ]
            });
        }
        $('#sample_1').DataTable({
            "iDisplayLength": 10,
            "ordering": true,
            "order": [[0, "asc"], [1, "asc"]],
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "all"]
            ]
        });
    </script>
    <script>
        $(document).ready(function(){
            selectTagging();
        });
        $('#order_id').on('change', function () {
            var order_id = $('#order_id').val();
            $.ajax({
                type: "post",
                url: "<?php echo e(\Illuminate\Support\Facades\URL::route('document.list.order')); ?>",
                data: {_token : csrf_token, order_id: order_id},
                success: function (data) {
                    $('#table_content').html(data.documents);
                    dataTable();
                },
                error: function (data) {
                    console.log(data);
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mehedi/Laravel/ansondistributing_barua_new/resources/views/document/list.blade.php ENDPATH**/ ?>