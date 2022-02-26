


@extends('layouts.user')

@section('custom_css')
    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('phq/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ URL::to('adminUser') }}">Dashboard</a>
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
                    <form class="form-horizontal" method="post" action="{{route('document.store')}}" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <div class="form-body">
                             <div class="form-group">
                                 <label class="col-md-5 control-label"> Order Number </label>
                                 <div class="col-md-7">
                                    <select class="form-control selectTag input-medium" id="order_id" placeholder="Order Number"  name="order_id">
                                     <option  value="" >Select Order Number</option>
                                     @if(!empty($orders))
                                         @foreach($orders as $order)
                                             <option value="{{$order->id}}">{{$order->order_number}}</option>
                                         @endforeach
                                     @endif
                                 </select>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-md-5 control-label"> Document Type </label>
                                 <div class="col-md-7">
                                     <select class="form-control selectTag input-medium" id="doc_type_id" placeholder="Document Type"  name="doc_type_id">
                                         <option  value="" >Select Document Type</option>
                                         @if(!empty($document_types))
                                             @foreach($document_types as $document_type)
                                                 <option value="{{$document_type->id}}">{{$document_type->name}}</option>
                                             @endforeach
                                         @endif
                                     </select>
                                 </div>
                             </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">Upload File <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="file"  name="file_name" id="file_name"  placeholder="Enter File" class="form-control input-inline input-medium" >
                                    <div class="red">{{ $errors->first('file_name') }}</div>
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
                            <th>ID</th>
                            <th>Order Number</th>
                            <th>Document Type</th>
                            <th> File</th>
                            <th>Created Date</th>
                            <th>ACTION</th>

                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($documents))
                            @foreach($documents as $document)
                            
                                <tr>
                                    <td>{{$document->id}}</td>
                                    <td>{{$document->order_info->order_number}}</td>
                                    <td>{{$document->document_type_info->name}}</td>
                                    <td><a target="_blank"  href="{{route('document.downLoadFile', encrypt($document->file_name))}}"><i class="fa fa-file"></i> File</a></td>
                                    <td>{{\Carbon\Carbon::parse($document->updated_at)->diffForhumans()}}</td>
                                    <td>
                                        <a href="{{url('document/delete').'?id='.$document->id}}" class="btn btn-xs red" onclick="return confirm('Do You want to confirm the document delete?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
                                    </td>

                                </tr>

                            @endforeach
                        @endif



                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE TITLE-->


@stop

@section('custom_js')
    <script src="{{asset('phq/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

    <script src="{{asset('/phq/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/phq/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>

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
                "order": [[0, "desc"]],
                "aLengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "all"]
                ]
            });
        }
        $('#sample_1').DataTable({
            "iDisplayLength": 10,
            "ordering": true,
            "order": [[0, "desc"]],
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
                url: "{{\Illuminate\Support\Facades\URL::route('document.list.order')}}",
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
@stop

