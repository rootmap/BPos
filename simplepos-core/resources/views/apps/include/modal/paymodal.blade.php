     <!-- Modal for Make Payment start-->
                            <div class="modal fade text-xs-left" id="payModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                              <h3 class="modal-title" id="myModalLabel35"> Payment</h3>
                                          </div>
                                          <form>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-md-4 label-control" for="projectinput1">Amount To Pay Today</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text"  name="amount_to_pay"  class="form-control" placeholder="0.00" aria-describedby="button-addon2" data-amount="">
                                                            <span class="input-group-btn" id="button-addon2">
                                                                <button class="btn btn-info amountextract" type="button">Exact</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                  <label class="col-md-4 label-control" for="Description">Payment Due</label>
                                                  <div class="col-md-8">
                                                    <span id="prmDue">$0.00</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                              <div class="payModal-message-area"></div>
                                            </div>

                                            


                                        </div>
                                        <div class="modal-footer">
                                          <style type="text/css">
                                              .authorizenet > .dropdown-toggle::after
                                              {
                                                  margin: -0.2em 0 0 0;
                                              }
                                          </style>
                                          
                                            @if(isset($tender))
                                              @foreach($tender as $ten)
                                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 button button1">
                                            
                                                  <button id="btn-payment-modal_modal_button" data-id="{{$ten->id}}" type="button" class="btn btn-block btn-info btn-responsive margin-all-bottom-button make-payment" >
                                                      {{$ten->name}}
                                                  </button>  
                                                 
                                          </div>
                                             @endforeach
                                        @endif  
                                            

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Pay Modal End-->
