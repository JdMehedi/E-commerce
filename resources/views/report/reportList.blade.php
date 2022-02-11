







@extends('layouts.user')
@section('custom_css')
    <link href="{{asset('phq/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('phq/style.css')}}" rel="stylesheet" type="text/css" />
@stop


@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ URL::to('/adminUser') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Report List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    {{--<div class="content">--}}
        {{--<div class="col-md-6">--}}
            {{--<h3 class="page-title">Report List </h3>--}}
        {{--</div>--}}


    {{--</div>--}}
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="report">Report List</div>

    <div class="row">
    <div  class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div style="float: right;" class="social clear">
            <div class="searchbtn clear">
                {!! Form::open(array('url' => url('reports/search'), 'files' => true, 'class'=>'d-flex justify-content-between') )  !!}

                <input type="text" name="search"   value="@if(!empty($search)) {{$search->search}} @endif" placeholder="Search keyword..."/>
                <input type="submit" name="submit" value="Search"/>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="sample_1"><!-- table2 -->


    <tbody>

    <div  class="maincontent clear">

        @if(isset($rts[0]))
            @foreach($rts as $report)
                <div  class="samepost clear">
                    <h2 ><a href="#">{{$report->rtitle}}</a></h2>

                    <img  width="100" src="{{asset('/uploads/personalPhotos/'.$report->photo)}}"  alt="">
                    {{--<img  width="100" src="{{asset('/uploads/personalPhotos/'.'5d9a2827ed1e7.jpg')}}"  alt="">--}}

                    <h6><a href="{{url('particularProfile').'?id='.$report->uid}}">{{$report->username}}   </a>  Asked: {{\Carbon\Carbon::parse($report->updated_at)->diffForhumans()}}   </h6>

                    <ul id="menu">

                        @if($userTable->userType==1)

                            <li style=""><a ><i class="fa fa-trash" title="delete"></i> </a>
                                <ul>
                                    <li><a href="{{url('reports/delete').'?id='.$report->id}}"  onclick="return confirm('Do You want to confirm to be Deleted?')">Delete</a></li>


                                </ul>
                            </li>
                        @endif
                    </ul>

                    <h1>  </h1>
                    <div>
                        <p>
                            {{$report->rcontent}}
                        </p>
                    </div>
                    @if($report->rfile!=null)

                        <h5><a target="_blank"  href="{{route('downLoadFile',encrypt($report->rfile))}}">---click Image/Pdf</a></h5>
                    @endif


                    <div class="leftmore clear">

                    </div>
                    <div class="readmore clear">

                    </div>
                </div>
            @endforeach
        @endif




    </div>



    </tbody>
        <li style="float: right;"  class="page-item">{{$rts->links()}}</li>

    </table>
    </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    </div>






























@stop


@section('custom_js')
    <script src="{{asset('phq/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
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
                var csrf_token = "{{ csrf_token() }}";
                if(user_id)
                {
                    var url_op = base_url+"/userDetails/delete";
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
@stop





















