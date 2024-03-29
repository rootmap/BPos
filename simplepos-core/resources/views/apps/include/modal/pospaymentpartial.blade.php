<!-- Modal for Make Payment start-->
<div class="modal fade text-xs-left" id="addPartialPayment" tabindex="-2" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" align="center" id="myModalLabel35"> Add Partial Payment</h3>
      </div>
      <form>
        <div class="modal-body">
          
          <div class="col-md-12" id="partialpayMSG"></div>
          <div class="row">
            
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput2">Invoice </label>
                            <select style="width: 100%;"  class="select2 form-control" name="partialpay_invoice_id">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">Total Invoice Amount</label>
                            <input type="text" readonly="readonly" id="projectinput1" class="form-control" placeholder="Total Invoice Amount" name="partialpay_total_bill">
                        </div>
                    </div>
                  
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput2">Customer Name </label>
                            <input type="text" readonly="readonly" id="projectinput1" class="form-control" placeholder="Customer Name " name="partialpay_customer_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">Previously Paid Amount </label>
                            <input type="text"  readonly="readonly" id="projectinput1" class="form-control" placeholder="Previously Paid Amount " name="partialpay_pre_paid">
                        </div>
                    </div>
                  
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput2">Today Paid Amount </label>
                            <input type="text" id="projectinput1" class="form-control" placeholder="Previously Paid Amount " name="partialpay_today_paid">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">Current Due Amount</label>
                            <input type="text" readonly="readonly" id="projectinput1" class="form-control" placeholder="Today Paid Amount" name="partialpay_amount">
                            <input type="hidden" name="partialpay_hidden_due_amount" value="0">
                        </div>
                    </div>
                  
                </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <style type="text/css">
            .authorizenet > .dropdown-toggle::after
            {
            margin: -0.2em 0 0 0;
            }
            </style>
            
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 button button1">
              @if(isset($tender))
              @foreach($tender as $ten)
              <button id="btn-payment-modal_modal_button" data-id="{{$ten->id}}" type="button" class="btn btn-info btn-responsive margin-all-bottom-button manualMakePayment" >
              {{$ten->name}}
              </button>
              @endforeach
              @endif
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Pay Modal End-->