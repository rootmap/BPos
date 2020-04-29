@extends('apps.layout.master')
@section('title','Product')
@section('content')
<section id="form-action-layouts">
    <?php 
        $dataMenuAssigned=array();
        $dataMenuAssigned=StaticDataController::dataMenuAssigned();
        $userguideInit=StaticDataController::userguideInit();
        //dd($dataMenuAssigned);
    ?>
<div class="row">
    <div class="col-md-12" @if($userguideInit==1) data-step="1" data-intro="You can see product by date wise and generate excel or PDF." @endif>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-card-center"><i class="icon-filter_list"></i> Product Report Filter</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form method="post" action="{{url('product/report')}}">
                        {{csrf_field()}}
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Start Date</h4>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                        <input 
                                        @if(!empty($start_date))
                                            value="{{$start_date}}"  
                                        @endif
                                        name="start_date" type="text" class="form-control DropDateWithformat" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4>End Date</h4>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                        <input 
                                        @if(!empty($end_date))
                                            value="{{$end_date}}"  
                                        @endif 
                                         name="end_date" type="text" class="form-control DropDateWithformat" />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    
                                    <div class="input-group" style="margin-top:32px;">
                                        <button type="submit" class="btn btn-info btn-darken-1 mr-1" @if($userguideInit==1) data-step="2" data-intro="If you click this button then it will generate your report." @endif>
                                            <i class="icon-check2"></i> Generate Report
                                        </button>
                                        <a href="javascript:void(0);" data-url="{{url('product/excel/report')}}" class="btn btn-info btn-darken-2 mr-1 change-action" @if($userguideInit==1) data-step="3" data-intro="If you click this button then it will generate excel file." @endif>
                                            <i class="icon-file-excel-o"></i> Generate Excel
                                        </a>
                                        <a href="javascript:void(0);" data-url="{{url('product/pdf/report')}}" class="btn btn-info btn-darken-3 mr-1 change-action" @if($userguideInit==1) data-step="4" data-intro="If you click this button then it will generate pdf file." @endif>
                                            <i class="icon-file-pdf-o"></i> Generate PDF
                                        </a>
                                        <a href="{{url('product/report')}}" style="margin-left: 5px;" class="btn btn-info btn-darken-4" @if($userguideInit==1) data-step="5" data-intro="if you want clear all information then click the reset button." @endif>
                                            <i class="icon-refresh"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


        <?php 
        $invoice_quantity=0;
        $cost_total=0;
        $price_total=0;
        ?>
        @if(isset($dataTable))
            @foreach($dataTable as $inv)
            <?php 
                $invoice_quantity+=$inv->quantity;
                $price_total+=$inv->price*$inv->quantity;
                $cost_total+=$inv->cost*$inv->quantity;
            ?>
            @endforeach
        @endif


        <div class="col-lg-4 col-sm-12 border-right-pink bg-info bg-lighten-1 border-right-lighten-4">
            <div class="card-block text-xs-center">
                <h1 class="display-4 white"><i class="icon-database font-large-2"></i> {{$invoice_quantity}}</h1>
                <span class="white">Total Stock</span>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 bg-info bg-lighten-2 border-right-pink border-right-lighten-4">
            <div class="card-block text-xs-center">
                <h1 class="display-4 white"><i class="icon-trending_up font-large-2"></i> <b>Tk</b> {{$cost_total}}</h1>
                <span class="white">Total Cost</span>
            </div>
        </div>
        
        <div class="col-lg-4 bg-info bg-lighten-3 col-sm-12">
            <div class="card-block text-xs-center">
                <h1 class="display-4 white"><i class="icon-banknote font-large-2"></i> <b>Tk</b> {{$price_total}}</h1>
                <span class="white">Total Price</span>
            </div>
        </div>
    <!-- Both borders end-->
  
    <!-- Both borders end-->
<div class="row">
    <div class="col-xs-12" @if($userguideInit==1) data-step="6" data-intro="You are seeing your product by search." @endif>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="icon-database"></i> Product List</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="{{url('product/excel/report')}}"><i class="icon-file-excel" style="font-size: 20px;"></i></a></li>
                        <li><a href="{{url('product/pdf/report')}}"><i class="icon-file-pdf"  style="font-size: 20px;"></i></a></li>
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>

                <div class="card-body collapse in">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th style="width: 50px;">Quantity in Stock</th>
                                <th>Price</th>
                                <th>Cost</th>
                                <th>Product Added</th>
                                <th>Total price</th>
                                <th>Total cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($dataTable))
                            @foreach($dataTable as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->barcode}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->cost}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>{{($row->price*$row->quantity)}}</td>
                                <td>{{($row->cost*$row->quantity)}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">No Record Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Both borders end -->

</section>

@endsection

@include('apps.include.datatable',['JDataTable'=>1,'dateDrop'=>1])