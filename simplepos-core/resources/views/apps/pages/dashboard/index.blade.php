@extends('apps.layout.master')
@section('title','Dashboard')
@section('content')
    <!-- main menu-->
<?php 
    $dataMenuAssigned=array();
    $dataMenuAssigned=StaticDataController::dataMenuAssigned();
    $userguideInit=StaticDataController::userguideInit();
?>

<style type="text/css">
    .mini-stat-type-2 {
        position: relative;
        background-color: #FBFBFB;
        padding: 10px;
        margin-bottom: 20px;
    }

    .quick_link_box2 {
        background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #ffffff 0%, #f4f4f4 100%) repeat scroll 0 0 !important;
        border-radius: 0px !important;
        -webkit-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.5) !important;
        -moz-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.5) !important;
        box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.5) !important;
    }

    .td_none {
        text-decoration: none !important;
        color: #0c0c0c;
    }
    .td_none:hover {
        text-decoration: none !important;
        color: #0c0c0c;
        font-weight: bolder;
    }

    .overview-icon {
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        height: 50px;
        width: 50px;
        text-align: center;
        display: block;
        content: "";
        line-height: 50px;
        font-size: 30px;
        margin: 15px auto;
    }

    .slow-spin {
      -webkit-animation: fa-spin 6s infinite linear;
      animation: fa-spin 6s infinite linear;
    }

    .overview-icon > i
    {
        color: #fff;
    }
</style>


@if(in_array('dashboard_other_report', $dataMenuAssigned))
<div class="row">
    <div class="col-xs-12" @if($userguideInit==1) data-step="8" data-intro="Here is the report section and you can see the report." @endif>
        <div class="card" style="background:none; box-shadow:none; border: none; margin-bottom:0px; ">
            <div class="card-body" style="padding-top: 20px;">



                <div class="col-md-2 col-xs-4 col-xs-override">
                    <a href="{{url('payment/report')}}" class="td_none">
                        <div class="mini-stat-type-2 shadow quick_link_box2">
                            <h6 class="text-xs-center text-strong text-inverse">Payment Report</h6>
                            <p class="text-xs-center">
                                <span class="overview-icon bg-info bg-lighten-2"><i class="icon-undo"></i></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-2 col-xs-4 col-xs-override">
                    <a href="{{url('customer/list')}}" class="td_none">
                        <div class="mini-stat-type-2 shadow quick_link_box2">
                            <h6 class="text-xs-center text-strong text-inverse">Customer Report</h6>
                            <p class="text-xs-center">
                                <span class="overview-icon bg-info bg-lighten-3"><i class="icon-bar-chart"></i></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-2 col-xs-4 col-xs-override">
                    <a href="{{url('product/report')}}" class="td_none">
                        <div class="mini-stat-type-2 shadow quick_link_box2">
                            <h6 class="text-xs-center text-strong text-inverse">Product Status</h6>
                            <p class="text-xs-center">
                                <span class="overview-icon bg-info bg-lighten-4"><i class="icon-pie-chart"></i></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-2 col-xs-4 col-xs-override">
                    <a href="{{url('sales/report')}}" class="td_none">
                        <div class="mini-stat-type-2 shadow quick_link_box2">
                            <h6 class="text-xs-center text-strong text-inverse">Sales Report</h6>
                            <p class="text-xs-center">
                                <span class="overview-icon bg-info bg-darken-1"><i class="icon-bar-chart"></i></span>
                            </p>
                        </div>
                    </a>
                </div>
                
                
                <div class="col-md-2 col-xs-4 col-xs-override">
                    <a href="{{url('product/profit/report')}}" class="td_none">
                        <div class="mini-stat-type-2 shadow quick_link_box2">
                            <h6 class="text-xs-center text-strong text-inverse">Product Profit</h6>
                            <p class="text-xs-center">
                                <span class="overview-icon bg-info bg-darken-4"><i class="icon-desktop"></i></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-2 col-xs-4 col-xs-override">
                    <a href="{{url('expense/voucher/report')}}" class="td_none">
                        <div class="mini-stat-type-2 shadow quick_link_box2">
                            <h6 class="text-xs-center text-strong text-inverse">Expense Report</h6>
                            <p class="text-xs-center">
                                <span class="overview-icon bg-info bg-accent-1"><i class="icon-money"></i></span>
                            </p>
                        </div>
                    </a>
                </div>
               

       
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endif


<div class="row">

    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="info accent-2"><b>Tk</b> {{number_format($dbDash[0]->total_sales,2)}}</h3>
                            <span>Today Total Sales</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-cart4 info accent-2 font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                    <progress class="progress progress-sm progress-info bg-accent-2 mt-1 mb-0" value="80" max="100"></progress>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="info lighten-3"><b>Tk</b> {{number_format($dbDash[0]->total_cost,2)}}</h3>
                            <span>Today Total Cost</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-shop2 info lighten-3 font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                    <progress class="progress progress-sm progress-info bg-lighten-3 mt-1 mb-0" value="35" max="100"></progress>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="info"><b>Tk</b> {{number_format($dbDash[0]->total_profit,2)}}</h3>
                            <span>Today Total Profit</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-banknote info font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                    <progress class="progress progress-sm progress-info mt-1 mb-0" value="35" max="100"></progress>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-8">
        <div class="card">
            <div class="card-header card-info bg-darken-1" style="color: #fff;">
                <h4 class="card-title"><i class="icon-history"></i> Lowest Product / Product Re-Order List</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4" style="color: #fff;"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2" style="color: #fff;"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <table class="table table-striped table-bordered" id="example">
                        <thead class="bg-info bg-lighten-3" style="color: #fff;">
                            <tr>
                                <th>Barcode</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($product))
                            @foreach($product as $row)
                            <tr>
                                <td>{{$row->barcode}}</td>
                                <td>{{$row->category_name}}</td>
                                <td>{{$row->name}}</td>
                                <td class="bg-red" style="color: #fff; font-weight: bolder; text-align: center;">{{$row->quantity}}</td>
                                <td>{{$row->sold_times}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
</div>



@endsection

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/vendors/css/extensions/unslider.css')}}">

    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/css/core/colors/palette-climacon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/css/pages/users.min.css')}}">
    <!-- END Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    
    <style type="text/css">
        div.dataTables_length{
                padding-left: 10px;
                padding-top: 15px;
        }

        .dataTables_length>label{
            margin-bottom: 0px !important;
            display:block; !important;
        }

        div.dataTables_filter
        {
            padding-right: 10px;
        }

        div.dataTables_info{
            padding-left: 10px;
        }

        div.dataTables_paginate{
            padding-right: 10px;
            padding-top: 5px;
        }
    </style>

@endsection

@section('js')
    <!-- BEGIN PAGE LEVEL JS-->
    
    <!-- END PAGE LEVEL JS-->
     <!-- build:js app-assets/js/vendors.min.js-->
    <!-- /build-->
    <script src="{{url('theme/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{url('theme/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{url('theme/app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    
    <script src="{{url('theme/app-assets/vendors/js/charts/gmaps.min.js')}}" type="text/javascript"></script>
    
    <script src="{{url('theme/app-assets/vendors/js/extensions/jquery.knob.min.js')}}" type="text/javascript"></script>
    <script src="{{url('theme/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>

    <script src="{{url('theme/app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>

    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->

    <script src="{{url('theme/app-assets/js/scripts/pages/dashboard-crm.min.js')}}" type="text/javascript"></script>

    <<script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": [[ 3, "asc" ]]
            } );
        } );
    </script>


    
@endsection