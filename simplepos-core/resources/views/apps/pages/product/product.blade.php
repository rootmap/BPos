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
		<div class="col-md-6 col-xs-10 offset-xs-1 offset-md-3" @if($userguideInit==1) data-step="1" data-intro="In this section, you can add a new product." @endif>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-card-center">
                        
                        @if(isset($edit))
                        <i class="icon-clipboard2"></i> Edit Product
                        @else
                        <i class="icon-clipboard2"></i> Add Product
                        @endif
                    </h4>
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
						<form class="form" method="post" 
                        @if(isset($edit))
                            action="{{url('product/modify/'.$dataRow->id)}}"
                        @else
                            action="{{url('product/save')}}"
                        @endif
                        >
							<div class="form-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="eventRegInput1">Select Category 
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="select2 form-control" name="category_id">
                                            <option 
                                                @if(!isset($dataRow->category_id))
                                                    @if(empty($dataRow->category_id))
                                                    selected="selected" 
                                                    @endif
                                                @endif

                                            value="">Select a Category</option>
                                            @if(isset($existing_cat))
                                                @foreach($existing_cat as $cus)
                                                <option 
                                                    @if(isset($dataRow->category_id))
                                                        @if($dataRow->category_id==$cus->id)
                                                        selected="selected" 
                                                        @endif
                                                    @endif 
                                                value="{{$cus->id}}">{{$cus->name}}</option>
                                                @endforeach
                                            @endif                          
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="eventRegInput1">Product Barcode <span class="text-danger">*</span></label>
                                        <input type="text" 
                                        @if(isset($edit))
                                            value="{{$dataRow->barcode}}" 
                                        @endif 
                                        id="eventRegInput1" class="form-control  border-primary" placeholder="Barcode" name="barcode">
                                    </div>
                                </div>
								<div class="form-group">
									<label for="eventRegInput1">Product Name <span class="text-danger">*</span></label>
									<input type="text" 
                                    @if(isset($edit))
                                        value="{{$dataRow->name}}" 
                                    @endif 
                                    id="eventRegInput1" class="form-control border-primary" placeholder="Product Name" name="name">
								</div>

								<div class="row">
									<div class="form-group col-md-4 mb-2">
										<label for="eventRegInput2">Quantity In Stock <span class="text-danger">*</span></label>
										<input 
                                        @if(isset($edit))
                                        value="{{$dataRow->quantity}}" 
                                        @endif 
                                        type="number" id="number" class="form-control border-primary" placeholder="Quantity In Stock" value="0" name="quantity">
									</div>	

									<div class="form-group col-md-4 mb-2">
										<label for="eventRegInput3">Price Per Item <span class="text-danger">*</span></label>
										<input 
                                        @if(isset($edit))
                                        value="{{$dataRow->price}}" 
                                        @endif 
                                        type="text"  class="form-control border-primary" placeholder="Price Per Item" value="0" name="price">
									</div>
								
									<div class="form-group col-md-4 mb-2">
										<label for="eventRegInput3">Cost Per Item <span class="text-danger">*</span></label>
										<input 
                                        @if(isset($edit))
                                        value="{{$dataRow->cost}}" 
                                        @endif 
                                        type="text"  class="form-control border-primary" placeholder="Cost Per Item" value="0" name="cost">
									</div>
								</div>

							
							</div>

							<div class="form-actions center">
								<button type="reset" class="btn btn-info btn-darken-2 mr-1" @if($userguideInit==1) data-step="3" data-intro="if you want clear all information then click the clear button." @endif>
									<i class="icon-cross2"></i> Cancel
								</button>
								@if(isset($edit))
                                <button type="submit" class="btn btn-info btn-accent-2">
                                    <i class="icon-check2"></i> Update
                                </button>
                                @else
                                <button type="submit" class="btn btn-info btn-accent-2" @if($userguideInit==1) data-step="2" data-intro="When you fill up all information then click save button." @endif>
                                    <i class="icon-check2"></i> Save
                                </button>
                                @endif
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Both borders end-->


    <!-- Both borders end-->



</section>

@endsection

@include('apps.include.datatable',['selectTwo'=>1])