@extends('apps.layout.master')
@section('title','Sales Item List')
@section('content')
<section id="form-action-layouts">
<?php 
    $userguideInit=StaticDataController::userguideInit();
    //dd($dataMenuAssigned);
?>
<div class="row">
    <div class="col-md-12" @if($userguideInit==1) data-step="1" data-intro="In this section, you can create a sales report by date wise or invoice or customer or status and generate excel or PDF" @endif>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-card-center"><i class="icon-filter_list"></i> Sales Item Report Filter</h4>
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
                    <form id="salesSu" method="post" action="{{url('sales-item/report')}}">
                        {{csrf_field()}}
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-md-2">
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
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <h4>Invoice ID</h4>
                                    <div class="input-group">
                                    <input 
                                     @if(!empty($invoice_id))
                                            value="{{$invoice_id}}"  
                                     @endif 
                                     type="text" id="eventRegInput1" class="form-control border-primary" placeholder="Invoice ID" name="invoice_id">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h4>Barcode</h4>
                                    <div class="input-group">
                                    <input 
                                     @if(!empty($barcode))
                                            value="{{$barcode}}"  
                                     @endif 
                                     type="text" id="eventRegInput1" class="form-control border-primary" placeholder="Barcode" name="barcode">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4>Customer</h4>
                                    <div class="input-group">
                                        <select name="customer_id" class="select2 form-control">
                                            <option value="">Select a customer</option>
                                            @if(isset($customer))
                                                @foreach($customer as $cus)
                                                <option 
                                                 @if(!empty($customer_id) && $customer_id==$cus->id)
                                                    selected="selected"  
                                                 @endif 
                                                value="{{$cus->id}}">{{$cus->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    
                                    <div class="input-group" style="margin-top:32px;">
                                        <button type="submit" id="salesSUSub" class="btn btn-info btn-darken-1 mr-1" @if($userguideInit==1) data-step="2" data-intro="If you click this button then it will generate your report." @endif>
                                            <i class="icon-check2"></i> Generate Report
                                        </button>
                                        <a href="javascript:void(0);" data-url="{{url('sales-item/excel/report')}}" class="btn btn-info btn-darken-2 mr-1 change-action-export-sales" @if($userguideInit==1) data-step="3" data-intro="If you click this button then it will generate excel file." @endif>
                                            <i class="icon-file-excel-o"></i> Generate Excel
                                        </a>
                                        <a href="javascript:void(0);" data-url="{{url('sales-item/pdf/report')}}" class="btn btn-info btn-darken-3 mr-1 change-action-export-sales" @if($userguideInit==1) data-step="4" data-intro="If you click this button then it will generate pdf file." @endif>
                                            <i class="icon-file-pdf-o"></i> Generate PDF
                                        </a>
                                        <a href="{{url('sales-item/report')}}" style="margin-left: 5px;" class="btn btn-info btn-darken-4" @if($userguideInit==1) data-step="5" data-intro="if you want clear all information then click the reset button." @endif>
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
	$invoice_total=0;
	$cost_total=0;
	$profit_total=0;
	?>
	@if(isset($dataTable))
		@foreach($dataTable as $inv)
		<?php 
			$invoice_total+=$inv->total_amount;
			$cost_total+=$inv->total_cost;
			$profit_total+=$inv->total_amount-$inv->total_cost;
		?>
        @endforeach
	@endif


<div class="col-lg-4 col-sm-12 border-right-pink bg-info bg-lighten-1 border-right-lighten-4">
            <div class="card-block text-xs-center">
                <h1 class="display-4 white"><i class="icon-cart font-large-2"></i> <b>Tk</b> {{$invoice_total}}</h1>
                <span class="white">Total Invoice</span>
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
                <h1 class="display-4 white"><i class="icon-banknote font-large-2"></i> <b>Tk</b> {{$profit_total}}</h1>
                <span class="white">Profit</span>
            </div>
        </div>

    <!-- Both borders end-->
<div class="row">
    <div class="col-xs-12" @if($userguideInit==1) data-step="6" data-intro="You are seeing your sales report by search." @endif>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="icon-cart4"></i> Sales Item Report</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><a href="{{url('sales/excel/report')}}"><i class="icon-file-excel" style="font-size: 20px;"></i></a></li>
                        <li><a href="{{url('sales/pdf/report')}}"><i class="icon-file-pdf"  style="font-size: 20px;"></i></a></li> --}}
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>

                <div class="card-body collapse in">
                    <div class="table-responsive" style="min-height: 360px;">
                        <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice ID</th>
                                <th>Invoice Date</th>
                                <th>Sold To</th>
                                <th>Barcode</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($dataTable))
                            @foreach($dataTable as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->invoice_id}}</td>
                                <td>{{date('Y-m-d',strtotime($row->created_at))}}</td>
                                <td>{{$row->customer_name}}</td>
                                <td>{{$row->product_barcode}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>{{$row->total_price}}</td>
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
@include('apps.include.modal.sendSlipModal')
@include('apps.include.modal.invoiceAttachmentSlipModal')
</section>

@endsection

@include('apps.include.datatable',['JDataTable'=>1,'selectTwo'=>1,'dateDrop'=>1,'invoiceSlip'=>1])