@extends('layouts.user')

@section('custom_css')
    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css" />
@stop


@section('content')
<style>
    .MinusMargin{
        margin-bottom:-15px;
    }
    .pad-24{
        padding-left: 25px;
    }
    .customeheight{
        height: 24px !important;
    }
    .select2-selection--single{
        height: 24px !important;
        padding: 2px 8px !important;
    }
    .paddingtopZero{
        padding-top: 0px !important;
    }
    .cheight{
        height: -34px
    }
</style>

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">

    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">
                        {!! Form::open(array('url' => url('orders/update'),'method' => 'post', 'files' => true, 'class'=>'form-horizontal') )  !!}
                        <input type="hidden" name="id" value="@if(!empty($orders->id)) {{$orders->id}} @endif">

                    <div class="form-body">
                        <div class="row">
                            <div class="d-flex flex-wrap">
                                <label class="col-md-2 control-label" for="">Shipper:</label>
                                <div class="col-md-7">
                                    <select  name="shipper"   id="shipper" class="col-md-12 mb-2 selectTag shn">
                                        <option value="">Select a Shipper</option>
                                @if(!empty($shippers))      
                                    @foreach($shippers as $shipper)
                                    <option value="{{$shipper->id}}" @if($orders->shipper_id == $shipper->id) selected @endif>{{$shipper->fname}}</option>
                                    @endforeach  
                                @endif                                  
                                    </select>

                                </div>
                                <div class="col-md-3">
                             <a href="{{route('shipper.index')}}"><i class="fa-solid fa-circle-plus"></i></a>

                                </div>

                            </div>
                        </div><br>
                        <?php  
                            $shipperContactInfo = App\UserContact::where('user_id',$orders->shipper_id)->get();
                        ?>
                        <div class="row m-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                             
                            <select class="col-md-12 mb-2 selectTag" style="background:white" name="shipper_contact_id" id="shipper_contact_id">
                             <option value="" >select shipper contact</option>
                             @if(!empty($shipperContactInfo))
                                @foreach($shipperContactInfo as $shipperContact)
                                    <option value="{{$shipperContact->id}}" @if($orders->shipper_contact_id == $shipperContact->id) selected @endif>{{$shipperContact->contact}}</option>
                                @endforeach 
                             @endif 
                            </select> 
                            <div class="col-md-3"></div>                           
                            </div>
                        </div>   
                        <?php 
                          $shipperContactDetailInfo = App\UserContact::where('id',$orders->shipper_contact_id)->first();
                        ?>
                        <div class="row m-2" style="" id="shipper_cinfo">
                             
                              <div class="row">
                              <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block " for=""><b>Phone:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="shipper_contact_phone">
                                        @if(!empty($shipperContactDetailInfo->phone)) {{$shipperContactDetailInfo->phone}} @endif
                                    </div>                           
                          
                                </div>
                              </div>
                              <div class="row">
                              <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Mobile:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group MinusMargin" id="shipper_contact_mobile">
                                    @if(!empty($shipperContactDetailInfo->mobile)) {{$shipperContactDetailInfo->mobile}} @endif
                                   
                                    </div>                           
                              
                                </div> 
                              </div>
                              <div class="row">
                              <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Fax:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group MinusMargin" id="shipper_contact_fax">
                                    @if(!empty($shipperContactDetailInfo->fax)) {{$shipperContactDetailInfo->fax}} @endif
                                      
                                    </div>                           
                             
                                 </div> 
                              </div>
                             <div class="row">
                             <div class="col-md-2"></div>              
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Email:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="shipper_contact_email">
                                    @if(!empty($shipperContactDetailInfo->email)) {{$shipperContactDetailInfo->email}} @endif
                                    
                                    </div>                           
                               
                                </div>  
                             </div>
                               <div class="row">
                               <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pr-2" for=""><b>Address:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="shipper_contact_address">
                                    @if(!empty($shipperContactDetailInfo->address)) {{$shipperContactDetailInfo->address}} @endif
                                   
                                    </div>                           
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
                                        <option value="{{$consignee->id}}" @if($orders->consignee_id == $consignee->id) selected @endif>{{$consignee->fname}}</option>
                                    @endforeach                                    
                                    </select>

                                </div>
                                <div class="col-md-3">
                             <a href="{{route('consignee.index')}}"><i class="fa-solid fa-circle-plus"></i></a>

                                </div>

                        </div><br>
                        <?php  
                            $consigneeContactInfo = App\UserContact::where('user_id',$orders->consignee_id)->get();
                        ?>
                        <div class="row m-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                            <select class="col-md-12 mb-2 selectTag" style="background:white" name="consignee_contact_id" id="consignee_contact_id">
                         <option value="">select consignee contact</option>
                             @if(!empty($consigneeContactInfo))
                                @foreach($consigneeContactInfo as $consigneeContact)
                                    <option value="{{$consigneeContact->id}}" @if($orders->consignee_contact_id == $consigneeContact->id) selected @endif>{{$consigneeContact->contact}}</option>
                                @endforeach 
                             @endif 
                            </select>                             
                            </div>
                            <div class="col-md-3"></div>
                        </div>  
                        <?php 
                          $consigneeContactDetailInfo = App\UserContact::where('id',$orders->consignee_contact_id)->first();
                        ?>
                        <div class="row m-2" style="" id="consignee_cinfo">
                             
                             <div class="row">
                             <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block " for=""><b>Phone:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="consignee_contact_phone">
                                    @if(!empty($consigneeContactDetailInfo->phone)) {{$consigneeContactDetailInfo->phone}} @endif
                                        
                                    </div>                           
                          
                                </div>
                             </div>
                             <div class="row">
                             <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Mobile:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group MinusMargin" id="consignee_contact_mobile">
                                    @if(!empty($consigneeContactDetailInfo->mobile)) {{$consigneeContactDetailInfo->mobile}} @endif
                                   
                                    </div>                           
                              
                                </div> 
                             </div>
                              <div class="row">
                              <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Fax:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group MinusMargin" id="consignee_contact_fax">
                                    @if(!empty($consigneeContactDetailInfo->fax)) {{$consigneeContactDetailInfo->fax}} @endif
                                      
                                    </div>                           
                             
                                 </div> 
                              </div>
                              <div class="row">
                              <div class="col-md-2"></div>              
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Email:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="consignee_contact_email">
                                    @if(!empty($consigneeContactDetailInfo->email)) {{$consigneeContactDetailInfo->email}} @endif
                                    
                                    </div>                           
                               
                                </div> 
                              </div> 
                              <div class="row">
                              <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pr-2" for=""><b>Address:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="consignee_contact_address">
                                    @if(!empty($consigneeContactDetailInfo->address)) {{$consigneeContactDetailInfo->address}} @endif
                                   
                                    </div>                           
                                </div>
                              </div>
                     
                        </div><br>

                        <div class="row m-2">
                                <label class="col-md-2 control-label" for="">Notifying party:</label>
                                <div class="col-md-7">
                                    <select name="party"  id="party" class="col-md-12 mb-2 selectTag">
                                        <option value="">Select a party</option>
                                    @foreach($consignees as $consignee)
                                    <option value="{{$consignee->id}}" @if($orders->consignee_id == $consignee->id) selected @endif>{{$consignee->fname}}</option>
                                    @endforeach                                    
                                    </select>

                                </div>
                                <div class="col-md-3">
                             <a  href="{{route('consignee.index')}}"><i class="fa-solid fa-circle-plus"></i></a>
                           <span style="padding:6px">
                           <input  type="checkbox" id="sameAsConsignee"  class="pointer" name="sameAsConsignee" value="1">
                             <label for="vehicle1"> Same as Consignee</label><br>

                           </span>
                                </div>

                        </div><br>
                        <?php  
                            $partyContactInfo = App\UserContact::where('user_id',$orders->party_id)->get();
                        ?>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                            <select class="col-md-12 mb-2 selectTag" style="background:white" name="party_contact_id" id="party_contact_id">
                         <option value="">select party contact</option>
                             @if(!empty($consigneeContactInfo))
                                @foreach($consigneeContactInfo as $consigneeContact)
                                    <option value="{{$consigneeContact->id}}" @if($orders->consignee_contact_id == $consigneeContact->id) selected @endif>{{$consigneeContact->contact}}</option>
                                @endforeach 
                             @endif 
                            </select>                             
                            </div>
                            <div class="col-md-3"></div>
                        </div>   
                        <?php 
                          $partyContactDetailInfo = App\UserContact::where('id',$orders->party_contact_id)->first();
                        ?>
                        <div class="row m-2" style="" id="party_cinfo">
                             
                             <div class="row">
                             <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block " for=""><b>Phone:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="party_contact_phone">
                                    @if(!empty($partyContactDetailInfo->phone)) {{$partyContactDetailInfo->phone}} @endif

                                    </div>                           
                          
                                </div>
                             </div>
                              <div class="row">
                              <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Mobile:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group MinusMargin" id="party_contact_mobile">
                                    @if(!empty($partyContactDetailInfo->mobile)) {{$partyContactDetailInfo->mobile}} @endif
                                   
                                    </div>                           
                              
                                </div> 
                              </div>
                             <div class="row">
                             <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Fax:</b></label>
                                <div class="col-md-9">
                                    <div class=" form-group MinusMargin" id="party_contact_fax">
                                    @if(!empty($partyContactDetailInfo->fax)) {{$partyContactDetailInfo->fax}} @endif
                                      
                                    </div>                           
                             
                                 </div> 
                             </div>
                                <div class="row">
                                <div class="col-md-2"></div>              
                                <label class="col-md-1 pad-24 inline-block pl-2" for=""><b>Email:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="party_contact_email">
                                    @if(!empty($partyContactDetailInfo->email)) {{$partyContactDetailInfo->email}} @endif
                                    
                                    </div>                           
                               
                                </div> 
                                </div> 
                               <div class="row">
                               <div class="col-md-2"></div>
                                <label class="col-md-1 pad-24 inline-block pr-2" for=""><b>Address:</b></label>
                                <div class="col-md-9">
                                    <div class="form-group MinusMargin" id="party_contact_address">
                                    @if(!empty($partyContactDetailInfo->address)) {{$partyContactDetailInfo->address}} @endif
                                   
                                    </div>                           
                                </div>
                     
                               </div>
                        </div><br>

                       <!--  -->      

                       <div class="row">
                           <div class="d-flex">
                               <label class="col-md-2 paddingtopZero control-label" for="">PO:</label>
                               <div class="col-md-4">
                                   <input type="text" class="form-control customeheight w-75" name="PO_No" value="@if(!empty($orders->PO_No)) {{$orders->PO_No}} @endif" placeholder="Enter PO"> <br>
                               </div>
                           </div>
                           <label class="col-md-2 paddingtopZero control-label" for="">POl:</label>
                           <div class="col-md-4">
                               <input type="text" name="POL" class="form-control customeheight mt-5" value="@if(!empty($orders->POL)) {{$orders->POL}} @endif" placeholder="Enter POL">
                           </div>
                       </div>
                       <!--  -->
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">POD:</label>
                                <div class="col-md-4">
                                    <input type="text" name="POD" class="form-control customeheight w-75" value="@if(!empty($orders->POD)) {{$orders->POD}} @endif" placeholder="Enter POD"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Ramp/Vai:</label>
                            <div class="col-md-4">

                                <input type="text" name="ramp_via" class="form-control customeheight mt-5" value="@if(!empty($orders->ramp_via)) {{$orders->ramp_via}} @endif" placeholder="Enter Ramp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Size:</label>
                                <div class="col-md-4">
                                    <input type="text" name="size" class="form-control customeheight w-75" value="@if(!empty($orders->size)) {{$orders->size}} @endif" placeholder="Enter Size"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Carrier:</label>
                            <div class="col-md-4">
                                <input type="text" name="carrier" class="form-control customeheight mt-5" value="@if(!empty($orders->carrier)) {{$orders->carrier}} @endif" placeholder="Enter Carrier">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Vassel/voyage:</label>
                                <div class="col-md-4">
                                    <input type="text" name="vessel_voyage" class="form-control customeheight w-75" value="@if(!empty($orders->vessel_voyage)) {{$orders->vessel_voyage}} @endif" placeholder="Enter voyage"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Container:</label>
                            <div class="col-md-4">

                                <input type="text" name="container" class="form-control customeheight mt-5" value="@if(!empty($orders->container)) {{$orders->container}} @endif" placeholder="Enter Container">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Seal:</label>
                                <div class="col-md-4">
                                    <input type="text" name="seal" class="form-control customeheight w-75" value="@if(!empty($orders->seal)) {{$orders->seal}} @endif" placeholder="Enter Seal"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Weight:</label>
                            <div class="col-md-4">
                                <input type="text" name="cargo_weight" class="form-control customeheight mt-5" value="@if(!empty($orders->cargo_weight)) {{$orders->cargo_weight}} @endif" placeholder="Enter Weight">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Quantity:</label>
                                <div class="col-md-4">
                                    <input type="text" name="quantity" class="form-control customeheight w-75" value="@if(!empty($orders->quantity)) {{$orders->quantity}} @endif" placeholder="Enter Quantity"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">MBL:</label>
                            <div class="col-md-4">

                                <input type="text" name="MBL" class="form-control customeheight mt-5" value="@if(!empty($orders->MBL)) {{$orders->MBL}} @endif" placeholder="Enter MBL">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">HBL:</label>
                                <div class="col-md-4">
                                    <input type="text" name="HBL" class="form-control customeheight w-75" value="@if(!empty($orders->HBL)) {{$orders->HBL}} @endif" placeholder="Enter HBL"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Commodity:</label>
                            <div class="col-md-4">

                                <input type="text" name="Commodity" class="form-control customeheight mt-5" value="@if(!empty($orders->Commodity)) {{$orders->Commodity}} @endif" placeholder="Enter Commodity">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Cut off Date:</label>
                                <div class="col-md-4">
                                    <input type="date" name="cut_of_date" class="form-control customeheight w-75" value="{{old('cut_of_date', date('Y-m-d'))}}" placeholder="Enter Date"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">On Board Date:</label>
                            <div class="col-md-4">

                                <input type="date" name="on_board_date" class="form-control customeheight mt-5" value="{{old('on_board_date', date('Y-m-d'))}}" placeholder="Enter Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Eta Port Date:</label>
                                <div class="col-md-4">
                                    <input type="date" name="eta_port_date"  class="form-control customeheight w-75"  value="{{old('eta_port_date', date('Y-m-d'))}}" placeholder="Enter Date"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Eta Ramp Date:</label>
                            <div class="col-md-4">
                                <input type="date"name="eta_ramp_date" class="form-control customeheight mt-5"  value="{{old('eta_ramp_date', date('Y-m-d'))}}"  placeholder="Enter Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Freight Quota:</label>
                                <div class="col-md-4">
                                    <input type="text" name="freight_quote" class="form-control customeheight w-75" value="@if(!empty($orders->freight_quote)) {{$orders->freight_quote}} @endif"  placeholder="Enter Freight Quota"> <br>
                                </div>
                            </div>
                            <label class="col-md-2 paddingtopZero control-label" for="">Exw Local:</label>
                            <div class="col-md-4">

                                <input type="text" name="exw_local" class="form-control customeheight mt-5" value="@if(!empty($orders->exw_local)) {{$orders->exw_local}} @endif" placeholder="Enter Exw Local">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex">
                                <label class="col-md-2 paddingtopZero control-label" for="">Wharfage:</label>
                                <div class="col-md-4">
                                    <input type="text" name="wharfage" class="form-control customeheight w-75" value="@if(!empty($orders->wharfage)) {{$orders->wharfage}} @endif" placeholder="Enter Wharfage"> <br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2  control-label" for="">Delivery Address:</label>
                            <div class="col-md-10">
                                <textarea name="delivery_address" id="" cols="80" rows="2">@if(!empty($orders->delivery_address)) {{$orders->delivery_address}} @endif</textarea>
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
                           selectTagging();
                            
                        },
                        error: function(data){
                    
                            
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
                           selectTagging();

                            
                        },
                        error: function(data){
                          
                            
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
                           selectTagging();

                            
                        },
                        error: function(data){
                       
                            
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
                         
                            
                            return;
                        }


                    });


        });

   $('#sameAsConsignee').on('change', function (event){

        var SAconsignee =$("input[name='sameAsConsignee']:checked").val();
            if (SAconsignee == 1){
           var consignee = $('#consignee').val();
           var consignee_contact_id = $('#consignee_contact_id').val();
           console.log(consignee);
           console.log(consignee_contact_id);
                $.ajax({
                        type: 'get',                    
                        url: "{{\Illuminate\Support\Facades\URL::to('sameAsConsignee')}}",
                        dataType: 'json',
                        data: {consignee:consignee, consignee_contact_id:consignee_contact_id},

                        success: function (data){
                           $('#party').val(consignee);
                           $('#party_contact_id').html(data.party_info_order_form);
                           $('#party_contact_phone').html(data.party_contact_info_order_form['phone']);
                           $('#party_contact_mobile').html(data.party_contact_info_order_form['mobile']);
                           $('#party_contact_email').html(data.party_contact_info_order_form['email']);
                           $('#party_contact_fax').html(data.party_contact_info_order_form['fax']);
                           $('#party_contact_address').html(data.party_contact_info_order_form['address']);

                           $('#party_cinfo').show();
                           selectTagging();
                            
                        },
                        error: function(data){
                          
                            return;
                        }
                    });
            }
            else{
                $('#party').val(0);
                $('#party_contact_id').val(0);
                $('#party_cinfo').hide();
                selectTagging();


            }
                   
        });
        $('#sameAsConsignee').on('change', function (event){

var SAconsignee =$("input[name='sameAsConsignee']:checked").val();
    if (SAconsignee == 1){
   var consignee = $('#consignee').val();
   var consignee_contact_id = $('#consignee_contact_id').val();
   console.log(consignee);
   console.log(consignee_contact_id);
        $.ajax({
                type: 'get',                    
                url: "{{\Illuminate\Support\Facades\URL::to('sameAsConsignee')}}",
                dataType: 'json',
                data: {consignee:consignee, consignee_contact_id:consignee_contact_id},

                success: function (data){
                   $('#party').val(consignee);
                   $('#party_contact_id').html(data.party_info_order_form);
                   $('#party_contact_phone').html(data.party_contact_info_order_form['phone']);
                   $('#party_contact_mobile').html(data.party_contact_info_order_form['mobile']);
                   $('#party_contact_email').html(data.party_contact_info_order_form['email']);
                   $('#party_contact_fax').html(data.party_contact_info_order_form['fax']);
                   $('#party_contact_address').html(data.party_contact_info_order_form['address']);

                   $('#party_cinfo').show();
                   selectTagging();
                    
                },
                error: function(data){
                  
                    return;
                }
            });
    }
    else{
        $('#party').val(0);
        $('#party_contact_id').val(0);
        $('#party_cinfo').hide();
        selectTagging();


    }
           


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

