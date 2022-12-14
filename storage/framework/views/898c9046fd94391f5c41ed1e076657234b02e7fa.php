<?php $__env->startSection('custom_css'); ?>
    <link href="<?php echo e(asset('phq/assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        .select2-selection--single{
            height: 24px !important;
            padding: 2px 8px !important;
        }
        .form-control{
            height: 24px !important;
            padding: 2px 8px !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(URL::to('/adminUser')); ?>">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(URL::to('orderLog')); ?>">OrderLog</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> OrderLog List</h3>
        </div>

        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="<?php echo e(URL::to('orders/create')); ?>" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add Order </a>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div style="" class="portlet-body form">
                <button id="filter_show" style="margin-left: 2%;margin-bottom: 2px"  class="btn btn-sm green"><i class="fa fa-filter"></i>  Filter </button>
                <button id="filter_hide" style="margin-left: 2%; display: none"  class="btn btn-sm green"><i class="fa fa-eye-slash"></i>  Hide </button>
                <form id="filter_form" style="display: none" class="form-horizontal" enctype="multipart/form-data" role="form" autocomplete="off">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">ID</label>
                                        <input class="form-control" id="order_number_start_filter" placeholder="From"  name="order_number_start_filter">
                                    </div>
                                </div>

                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right"> &nbsp; </label>
                                        <input class="form-control input-medium" id="order_number_end_filter" placeholder="To"  name="order_number_end_filter">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">Date </label>
                                        <input type="date"  class="form-control" name="start_date_filter" id="start_date_filter" placeholder="From">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label no-padding-right">&nbsp;</label>
                                            <input type="date"  class="form-control input-medium" name="end_date_filter" id="end_date_filter" placeholder="To">
                                        </div>
                                    </div>
                            </div>
                            <div style="margin-top: -10px" class="col-md-12">
                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">PO#</label>
                                        <input class="form-control input-medium" id="PO_No_filter" placeholder="PO#"  name="PO_No_filter">
                                    </div>
                                </div>

                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right"> Shipper </label>
                                        <select class="form-control selectTag input-medium" id="shipper_filter" placeholder="Shipper"  name="shipper_filter">
                                            <option  value="" >Select Shipper</option>
                                            <?php if(!empty($shippers)): ?>
                                                <?php $__currentLoopData = $shippers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($shipper->id); ?>"><?php echo e($shipper->fname); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right"> Consignee </label>
                                        <select class="form-control selectTag input-medium" id="consignee_filter" placeholder="Consignee"  name="consignee_filter">
                                            <option  value="" >Select Consignee</option>
                                            <?php if(!empty($consignees)): ?>
                                                <?php $__currentLoopData = $consignees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consignee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($consignee->id); ?>"><?php echo e($consignee->fname); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">MBL</label>
                                        <input class="form-control input-medium" id="MBL_filter" placeholder="MBL"  name="MBL_filter">
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: -10px" class="col-md-12">
                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">HBL</label>
                                        <input class="form-control input-medium" id="HBL_filter" placeholder="HBL"  name="HBL_filter">
                                    </div>
                                </div>
                                <div  class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">Container</label>
                                        <input class="form-control input-medium" id="container_filter" placeholder="Container"  name="container_filter">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">Eta </label>
                                        <input type="date"  class="form-control" name="eta_port_date_filter" id="eta_port_date_filter" placeholder="From">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label no-padding-right">&nbsp;</label>
                                        <input type="date"  class="form-control input-medium" name="eta_ramp_date_filter" id="eta_ramp_date_filter" placeholder="To">
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
                    <div class="">
                        <table class="table  table-striped table-bordered table-hover" id="orderLogTable" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>ETA</th>
                            <th>Shipper</th>
                            <th>Consignee</th>
                            <th>Container No</th>
                            <th>MBL</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
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
        const ajaxURL = "<?php echo e(\Illuminate\Support\Facades\URL::to('orderLog')); ?>";
        var table = $('table#orderLogTable').DataTable({
            dom: 'Blfrtip',
            language: {processing: "<span class='loading-datatable'><span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data...</span>"},
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: ajaxURL,
                data: function (d){
                    d['order_number_start_filter'] = $('#order_number_start_filter').val();
                    d['order_number_end_filter'] = $('#order_number_end_filter').val();
                    d['start_date_filter'] = $('#start_date_filter').val();
                    d['end_date_filter'] = $('#end_date_filter').val();
                    d['PO_No_filter'] = $('#PO_No_filter').val();
                    d['shipper_filter'] = $('#shipper_filter').val();
                    d['consignee_filter'] = $('#consignee_filter').val();
                    d['MBL_filter'] = $('#MBL_filter').val();
                    d['HBL_filter'] = $('#HBL_filter').val();
                    d['container_filter'] = $('#container_filter').val();
                    d['eta_port_date_filter'] = $('#eta_port_date_filter').val();
                    d['eta_ramp_date_filter'] = $('#eta_ramp_date_filter').val();
                },
            },
            order: [[0, "desc"]],
            aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
            buttons: [
                'copy', 'excel', 'print'
            ],
            columns: [
                {data: 'order_number', name: 'order_number'},
                {data: 'created_at', name: 'created_at'},
                {data: 'eta_ramp_date', name: 'eta_ramp_date'},
                {data: 'shipper_id', name: 'shipper_info.fname'},
                {data: 'consignee_id', name: 'consignee_info.fname'},
                {data: 'container', name: 'container'},
                {data: 'MBL', name: 'MBL'},
                {data: 'orderLogUpdate', name: 'orderLogUpdate'},
                {data: 'deleteOrderLog', name: 'deleteOrderLog'}
            ]
        });
        $("#order_number_start_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#order_number_end_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#start_date_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#end_date_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#PO_No_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#shipper_filter").on('change',function () {
            table.ajax.reload();
        });
        $("#consignee_filter").on('change',function () {
            table.ajax.reload();
        });
        $("#MBL_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#HBL_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#container_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#eta_port_date_filter").on('input',function () {
            table.ajax.reload();
        });
        $("#eta_ramp_date_filter").on('input',function () {
            table.ajax.reload();
        });
    </script>

    <script>
        $(document).ready(function(){
            selectTagging();
            $('#filter_show').on('click', function () {
                $('#filter_hide').show();
                $('#filter_form').show();
                $('#filter_show').hide();
            });
            $('#filter_hide').on('click', function () {
                $('#order_number_start_filter').val('');
                $('#order_number_end_filter').val('');
                $('#start_date_filter').val('');
                $('#end_date_filter').val('');
                $('#PO_No_filter').val('');
                $('#shipper_filter').val('');
                $('#consignee_filter').val('');
                $('#container_filter').val('');
                $('#MBL_filter').val('');
                $('#HBL_filter').val('');
                $('#eta_ramp_date_filter').val('');
                $('#eta_port_date_filter').val('');
                $('#filter_hide').hide();
                $('#filter_form').hide();
                $('#filter_show').show();
                selectTagging();
                table.ajax.reload();
            });
        });
    </script>
<?php $__env->stopSection(); ?>





















<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mehedi/Laravel/ansondistributing_barua_new/resources/views/orderLog/orderLogList.blade.php ENDPATH**/ ?>