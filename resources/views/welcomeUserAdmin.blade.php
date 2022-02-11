

{{--@include('layouts.user')--}}

@extends('layouts.user')

@section('content')
    <script src="{{asset('phq/assets/js/tableToExcel.js')}}" type="text/javascript"></script>

    <style type="text/css">
        #sample_12 th{
            text-align: center;
        }

    </style>

    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->


            <div class="hall" ></div>
            <div class="bsmrstu"></div>
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->



                    <div style="margin: auto; text-align: center"   class="banner banner-1">


                    </div>



                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->






@stop


@section('custom_js')

@stop
