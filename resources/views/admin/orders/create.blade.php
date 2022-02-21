@extends('layouts.user')

@section('custom_css')
    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">

    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">
                        {!! Form::open(array('url' => url('orders/store'),'method' => 'post', 'files' => true, 'class'=>'form-horizontal') )  !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="d-flex flex-wrap">
                                <label class="col-md-2 control-label" for="">Order Number:</label>
                                <div class="col-md-7">
                                <input type="text" name="order_number" class="form-control mt-5" placeholder="Enter order number">

                                </div>

                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="d-flex flex-wrap">
                                <label class="col-md-2 control-label" for="">Shipper:</label>
                                <div class="col-md-7">
                                    <select name="shipper"  id="shipper" class="col-md-12 mb-2 selectTag">
                                        <option value="">Select a Shipper</option>
                                    @foreach($shippers as $shipper)
                                    <option value="{{$shipper->id}}">{{$shipper->fname}}</option>
                                    @endforeach                                    
                                    </select>

                                </div>
                                <div class="col-md-3">
                             <a href="{{route('shipper.index')}}"><i class="fa-solid fa-circle-plus"></i></a>

                                </div>

                            </div>
                        </div><br>

                        <div class="row m-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                             
                            <select class="col-md-12 mb-2 selectTag" style="background:white" name="shipper_contact_id" id="shipper_contact_id">
                             <option value="" >select shipper contact</option>
                            
                            </select> 
                            <div class="col-md-3"></div>                           
                            </div>
                        </div>   

                        <div class="row m-2" style="display:none" id="shipper_cinfo">
                             
                                  <div class="col-md-2"></div>
                                <label class="col-md-1 " for=""><b>Phone:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="shipper_contact_phone">
                                        
                                    </div>                           
                          
                                </div>
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pl-2" for=""><b>Mobile:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group" id="shipper_contact_mobile">
                                   
                                    </div>                           
                              
                                </div> 
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pl-2" for=""><b>Fax:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group" id="shipper_contact_fax">
                                      
                                    </div>                           
                             
                                 </div> 
                                 <div class="col-md-2"></div>              
                                <label class="col-md-1 pl-2" for=""><b>Email:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="shipper_contact_email">
                                    
                                    </div>                           
                               
                                </div>  
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pr-2" for=""><b>Address:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="shipper_contact_address">
                                   
                                    </div>                           
                                </div>
                     
                        </div><br>
                        <!--  -->
                        <div class="row m-2">
                                <label class="col-md-2 control-label" for="">Consignee:</label>
                                <div class="col-md-7">
                                    <select name="consignee"  id="consignee" class="col-md-12 mb-2 selectTag">
                                        <option value="">Select a Consignee</option>
                                    @foreach($consignees as $consignee)
                                    <option value="{{$consignee->id}}">{{$consignee->fname}}</option>
                                    @endforeach                                    
                                    </select>

                                </div>
                                <div class="col-md-3">
                             <a href="{{route('consignee.index')}}"><i class="fa-solid fa-circle-plus"></i></a>

                                </div>

                        </div><br>

                        <div class="row m-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                            <select class="col-md-12 mb-2 selectTag" style="background:white" name="consignee_contact_id" id="consignee_contact_id">
                         <option value="">select consignee contact</option>
                            </select>                             
                            </div>
                            <div class="col-md-3"></div>
                        </div>  

                        <div class="row m-2" style="display:none" id="consignee_cinfo">
                             
                                  <div class="col-md-2"></div>
                                <label class="col-md-1 " for=""><b>Phone:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="consignee_contact_phone">
                                        
                                    </div>                           
                          
                                </div>
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pl-2" for=""><b>Mobile:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group" id="consignee_contact_mobile">
                                   
                                    </div>                           
                              
                                </div> 
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pl-2" for=""><b>Fax:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group" id="consignee_contact_fax">
                                      
                                    </div>                           
                             
                                 </div> 
                                 <div class="col-md-2"></div>              
                                <label class="col-md-1 pl-2" for=""><b>Email:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="consignee_contact_email">
                                    
                                    </div>                           
                               
                                </div>  
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pr-2" for=""><b>Address:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="consignee_contact_address">
                                   
                                    </div>                           
                                </div>
                     
                        </div><br>

                        <div class="row m-2">
                                <label class="col-md-2 control-label" for="">Notifying party:</label>
                                <div class="col-md-7">
                                    <select name="party"  id="party" class="col-md-12 mb-2 selectTag">
                                        <option value="">Select a party</option>
                                    @foreach($consignees as $consignee)
                                    <option value="{{$consignee->id}}">{{$consignee->fname}}</option>
                                    @endforeach                                    
                                    </select>

                                </div>
                                <div class="col-md-3">
                             <a  href="{{route('consignee.index')}}"><i class="fa-solid fa-circle-plus"></i></a>
                           <span style="padding:6px">
                           <input  type="checkbox" id="" name="" value="">
                             <label for="vehicle1"> Same as Consignee</label><br>

                           </span>
                                </div>

                        </div><br>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                            <select class="col-md-12 mb-2 selectTag" style="background:white" name="party_contact_id" id="party_contact_id">
                         <option value="">select party contact</option>
                            </select>                             
                            </div>
                            <div class="col-md-3"></div>
                        </div>  

                        <div class="row m-2" style="display:none" id="party_cinfo">
                             
                                  <div class="col-md-2"></div>
                                <label class="col-md-1 " for=""><b>Phone:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="party_contact_phone">
                                        
                                    </div>                           
                          
                                </div>
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pl-2" for=""><b>Mobile:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group" id="party_contact_mobile">
                                   
                                    </div>                           
                              
                                </div> 
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pl-2" for=""><b>Fax:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group" id="party_contact_fax">
                                      
                                    </div>                           
                             
                                 </div> 
                                 <div class="col-md-2"></div>              
                                <label class="col-md-1 pl-2" for=""><b>Email:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="party_contact_email">
                                    
                                    </div>                           
                               
                                </div>  
                                <div class="col-md-2"></div>
                                <label class="col-md-1 pr-2" for=""><b>Address:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group" id="party_contact_address">
                                   
                                    </div>                           
                                </div>
                     
                        </div><br>

                       <div class="row">
                           <div class="d-flex">
                               <label class="col-md-2 control-label" for="">PO:</label>
                               <div class="col-md-4">
                                   <input type="text" class="form-control w-75" name="PO_No" placeholder="Enter PO"> <br>
                               </div>
                           </div>
                           <label class="col-md-2 control-label" for="">POl:</label>
                           <div class="col-md-4">
                               <input type="text" name="POL" class="form-control mt-5" placeholder="Enter POL">
                           </div>
                       </div>

                       <!--  -->
                     

                       

                       <div class="row">
                           <div class="d-flex">
                               <label class="col-md-2 control-label" for="">PO:</label>
                               <div class="col-md-4">
                                   <input type="text" class="form-control w-75" name="PO_No" placeholder="Enter PO"> <br>
                               </div>
                           </div>
                           <label class="col-md-2 control-label" for="">POl:</label>
                           <div class="col-md-4">
                               <input type="text" name="POL" class="form-control mt-5" placeholder="Enter POL">
                           </div>
                       </div>
                       <!--  -->
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">POD:</label>
                                <div class="col-md-4">
                                    <input type="text" name="POD" class="form-control w-75" placeholder="Enter POD"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Ramp/Vai:</label>
                            <div class="col-md-4">

                                <input type="text" name="ramp_via" class="form-control mt-5" placeholder="Enter Ramp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Size:</label>
                                <div class="col-md-4">
                                    <input type="text" name="size" class="form-control w-75" placeholder="Enter Size"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Carrier:</label>
                            <div class="col-md-4">
                                <input type="text" name="carrier" class="form-control mt-5" placeholder="Enter Carrier">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Vassel/voyage:</label>
                                <div class="col-md-4">
                                    <input type="text" name="vessel_voyage" class="form-control w-75" placeholder="Enter voyage"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Container:</label>
                            <div class="col-md-4">

                                <input type="text" name="container" class="form-control mt-5" placeholder="Enter Container">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Seal:</label>
                                <div class="col-md-4">
                                    <input type="text" name="seal" class="form-control w-75" placeholder="Enter Seal"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Weight:</label>
                            <div class="col-md-4">
                                <input type="text" name="cargo_weight" class="form-control mt-5" placeholder="Enter Weight">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Quantity:</label>
                                <div class="col-md-4">
                                    <input type="text" name="quantity" class="form-control w-75" placeholder="Enter Quantity"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">MBL:</label>
                            <div class="col-md-4">

                                <input type="text" name="MBL" class="form-control mt-5" placeholder="Enter MBL">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">HBL:</label>
                                <div class="col-md-4">
                                    <input type="text" name="HBL" class="form-control w-75" placeholder="Enter HBL"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Commodity:</label>
                            <div class="col-md-4">

                                <input type="text" name="Commodity" class="form-control mt-5" placeholder="Enter Commodity">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Cut off Date:</label>
                                <div class="col-md-4">
                                    <input type="date" name="cut_of_date" class="form-control w-75" placeholder="Enter Date"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">On Board Date:</label>
                            <div class="col-md-4">

                                <input type="date" name="on_board_date" class="form-control mt-5" placeholder="Enter Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Eta Port Date:</label>
                                <div class="col-md-4">
                                    <input type="date" name="eta_port_date"  class="form-control w-75" placeholder="Enter Date"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Eta Ramp Date:</label>
                            <div class="col-md-4">
                                <input type="date"name="eta_ramp_date" class="form-control mt-5" placeholder="Enter Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Freight Quota:</label>
                                <div class="col-md-4">
                                    <input type="text" name="freight_quote" class="form-control w-75" placeholder="Enter Freight Quota"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 control-label" for="">Exw Local:</label>
                            <div class="col-md-4">

                                <input type="text" name="exw_local" class="form-control mt-5" placeholder="Enter Exw Local">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 control-label" for="">Wharfage:</label>
                                <div class="col-md-4">
                                    <input type="text" name="wharfage" class="form-control w-75" placeholder="Enter Wharfage"> <br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 control-label" for="">Delivery Address:</label>
                            <div class="col-md-10">
                                <textarea name="delivery_address" id="" cols="80" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn green">
                                    {{isset($shipper) ? 'Submit' : 'Update'}}
                                </button>
                                <button type="reset" class="btn default reset">Cancel</button>
                            </div>
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE-->


@stop

@section('custom_js')
    <script src="{{asset('/phq/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/phq/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>

    <script>
        $(function() {
            $( "#date" ).datepicker({dateFormat: 'yy'});
        });

    </script>
    <script>
        $(document).ready( function (){  
        $('#shipper').on('change', function (event){
           var shipper = $('#shipper').val();
      
                    $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('shipper_info_order_form')}}",
                        dataType: 'json',
                        data: {shipper:shipper},

                        success: function (data){
                           $('#shipper_contact_id').html(data.shipper_info_order_form);
                            
                        },
                        error: function(data){
                            // console.log('error',data);
                            $('.error_message').html('Error!! Try Again Latter');
                            $('.error_message').show();
                            $('.success_message').hide();
                            
                            return;
                        }


                    });


        });

        $('#shipper_contact_id').on('change', function (event){
           var shipper_contact_id = $('#shipper_contact_id').val();
      
                    $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('shipper_contact_info_order_form')}}",
                        dataType: 'json',
                        data: {shipper_contact_id:shipper_contact_id},

                        success: function (data){
                           $('#shipper_contact_phone').html(data.shipper_contact_info_order_form['phone']);
                           $('#shipper_contact_mobile').html(data.shipper_contact_info_order_form['mobile']);
                           $('#shipper_contact_email').html(data.shipper_contact_info_order_form['email']);
                           $('#shipper_contact_fax').html(data.shipper_contact_info_order_form['fax']);
                           $('#shipper_contact_address').html(data.shipper_contact_info_order_form['address']);

                           $('#shipper_cinfo').show();
                            
                        },
                        error: function(data){
                            // console.log('error',data);
                            $('.error_message').html('Error!! Try Again Latter');
                            $('.error_message').show();
                            $('.success_message').hide();
                            
                            return;
                        }


                    });


        });

        });

        // consignee
        $(document).ready( function (){
        $('#consignee').on('change', function (event){
           var consignee = $('#consignee').val();
           console.log(consignee);
                    $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('consignee_info_order_form')}}",
                        dataType: 'json',
                        data: {consignee:consignee},

                        success: function (data){
                           $('#consignee_contact_id').html(data.consignee_info_order_form);
                            
                        },
                        error: function(data){
                            $('.error_message').html('Error!! Try Again Latter');
                            $('.error_message').show();
                            $('.success_message').hide();
                            
                            return;
                        }


                    });


        });

        $('#consignee_contact_id').on('change', function (event){
           var consignee_contact_id = $('#consignee_contact_id').val();
                    $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('consignee_contact_info_order_form')}}",
                        dataType: 'json',
                        data: {consignee_contact_id:consignee_contact_id},

                        success: function (data){
                           $('#consignee_contact_phone').html(data.consignee_contact_info_order_form['phone']);
                           $('#consignee_contact_mobile').html(data.consignee_contact_info_order_form['mobile']);
                           $('#consignee_contact_email').html(data.consignee_contact_info_order_form['email']);
                           $('#consignee_contact_fax').html(data.consignee_contact_info_order_form['fax']);
                           $('#consignee_contact_address').html(data.consignee_contact_info_order_form['address']);

                           $('#consignee_cinfo').show();
                            
                        },
                        error: function(data){
                            // console.log('error',data);
                            $('.error_message').html('Error!! Try Again Latter');
                            $('.error_message').show();
                            $('.success_message').hide();
                            
                            return;
                        }


                    });


        });

        $('#party').on('change', function (event){
           var party = $('#party').val();
           console.log(party);
                    $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('party_info_order_form')}}",
                        dataType: 'json',
                        data: {party:party},

                        success: function (data){
                           $('#party_contact_id').html(data.party_info_order_form);
                            
                        },
                        error: function(data){
                            $('.error_message').html('Error!! Try Again Latter');
                            $('.error_message').show();
                            $('.success_message').hide();
                            
                            return;
                        }


                    });


        });

        $('#party_contact_id').on('change', function (event){
           var party_contact_id = $('#party_contact_id').val();
                    $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('party_contact_info_order_form')}}",
                        dataType: 'json',
                        data: {party_contact_id:party_contact_id},

                        success: function (data){
                           $('#party_contact_phone').html(data.party_contact_info_order_form['phone']);
                           $('#party_contact_mobile').html(data.party_contact_info_order_form['mobile']);
                           $('#party_contact_email').html(data.party_contact_info_order_form['email']);
                           $('#party_contact_fax').html(data.party_contact_info_order_form['fax']);
                           $('#party_contact_address').html(data.party_contact_info_order_form['address']);

                           $('#party_cinfo').show();
                            
                        },
                        error: function(data){
                            $('.error_message').html('Error!! Try Again Latter');
                            $('.error_message').show();
                            $('.success_message').hide();
                            
                            return;
                        }


                    });


        });


        });
    </script>

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

@stop

