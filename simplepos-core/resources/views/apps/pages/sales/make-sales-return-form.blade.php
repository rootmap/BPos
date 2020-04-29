@extends('apps.layout.master')
@section('title','POS Setting')
@section('content')
<section id="form-action-layouts">
	<?php 
    $userguideInit=StaticDataController::userguideInit();
    //dd($dataMenuAssigned);
?>
	<div class="row">
		<div class="col-md-8 offset-md-2" @if($userguideInit==1) data-step="1" data-intro="In this section, you can create a sales return." @endif>
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="striped-label-layout-card-center">
	                	<i class="icon-share"></i> Sales Return Form 
	                </h4>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
	                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block">
						<form method="post" action="{{url('sales/return/make/'.$ps->id)}}" class="form form-horizontal striped-labels">
							{{csrf_field()}}
							<div class="form-body">
	                			<div class="form-group row last">
	                        		<div class="col-md-12">
										<table class="table table-border">
											<thead class="thead-inverse">
												<tr>
													<th>SL</th>
													<th>Barcode</th>
													<th>Product Name</th>
													<th>Sold Quantity</th>
													<th>Unit Price</th>
													<th>Total Price</th>
													<th>Want TO Return This ?</th>
												</tr>
											</thead>
											<tbody>
												@if(count($sales_item)>0)
													@foreach($sales_item as $key=>$row)
														<tr>
															<td>{{$key+1}}</td>
															<td>{{$row->product_barcode}}</td>
															<td>{{$row->product_name}}</td>
															<td>{{$row->quantity}}</td>
															<td>{{$row->price}} Tk</td>
															<td>{{$row->total_price}} Tk</td>
															<td>
															<input type="checkbox" checked="checked" name="return_item[]" value="{{$row->id}}" />
															</td>
														</tr>
													@endforeach
												@endif
											</tbody>
										</table>
									</div>
		                        </div>
							</div>
							<div class="form-body">
	                			<div class="form-group row last">
	                        		<label class="col-md-4 label-control">Customer Name</label>
	                        		<div class="col-md-7">
										<div class="form-group">
											<input type="text" id="eventRegInput1" class="form-control border-info" placeholder="Customer Name" readonly="readonly" 
											@if(isset($ps))
												value="{{$ps->customer_name}}"  
											@endif 
											 name="customer_name">
										</div>
									</div>
		                        </div>
							</div>
							<div class="form-body">
	                			<div class="form-group row last">
	                        		<label class="col-md-4 label-control">Sales Invoice ID</label>
	                        		<div class="col-md-4">
										<div class="form-group">
											<input type="text" id="eventRegInput1" class="form-control border-info" placeholder="Sales Invoice ID"  readonly="readonly" 
											@if(isset($ps))
												value="{{$ps->invoice_id}}"  
											@endif 
											 name="invoice_id">
										</div>
									</div>
		                        </div>
							</div>
							<div class="form-body">
	                			<div class="form-group row last">
	                        		<label class="col-md-4 label-control">Sales Amount</label>
	                        		<div class="col-md-4">
										<div class="form-group">
											<input type="text" id="eventRegInput1" class="form-control border-info" placeholder="Total Amount"  readonly="readonly" 
											@if(isset($ps))
												value="{{number_format($ps->total_amount,2)}}"  
											@endif 
											 name="total_amount">
										</div>
									</div>
		                        </div>
							</div>

							<div class="form-body">
	                			<div class="form-group row last">
	                        		<label class="col-md-4 label-control">Return Amount</label>
	                        		<div class="col-md-4">
										<input type="text" id="eventRegInput1" class="form-control border-info" placeholder="Return Amount" name="return_amount">
									</div>
		                        </div>
							</div>

							<div class="form-body">
	                			<div class="form-group row last">
	                        		<label class="col-md-4 label-control">Sales Return Note</label>
	                        		<div class="col-md-7">
										<input type="text" id="eventRegInput1" class="form-control border-info" placeholder="Sales Return Note" name="sales_return_note">
									</div>
		                        </div>
							</div>

							<div class="form-actions center">
	                            <button type="button" class="btn btn-info btn-darken-2 mr-1" @if($userguideInit==1) data-step="3" data-intro="if you want clear all information then click the clear button." @endif>
	                            	<i class="icon-cross2"></i> Cancel
	                            </button>
	                            <button type="submit" class="btn btn-info btn-accent-2" @if($userguideInit==1) data-step="2" data-intro="When you fill up all information then click save button." @endif>
	                                <i class="icon-check2"></i> Save
	                            </button>
	                        </div>
						</form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
@endsection

@section("css")
<link rel="stylesheet" type="text/css" href="{{url('theme/app-assets/css/plugins/ui/jqueryui.min.css')}}">
@endsection

@section("js")
<script src="{{url('theme/app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{url('theme/app-assets/js/scripts/ui/jquery-ui/buttons-selects.min.js')}}" type="text/javascript"></script>
@endsection