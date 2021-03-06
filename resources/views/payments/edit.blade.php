@extends('admin.layout.dashboard')

@section('content')

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="fa fa-paperclip text-primary"></i></span>
            <h3 class="card-label">Edit {{$pageName}}</h3>
        </div>
    </div>
    <div class="card-body">

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('payments.update',$payment->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            @method('PUT')
                            <div class="kt-portlet__body">

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Reason : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="reason" value="{{$payment->reason}}" />
									</div>
								</div>


                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Payment amount : </label>
									<div class="col-lg-4">
										<input type="number" class="form-control m-input" name="payment_amount" value="{{$payment->payment_amount}}" />
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Paying method : </label>
									<div class="col-lg-4">
                                        <select id="paying_method" name="paying_method" class="form-control m-input">
                                            <option value="">Please choose one ..</option>
                                            <option value="cash" @if($payment->paying_method == 'cash') selected @endif >Cash</option>
                                            <option value="vodafone_cash" @if($payment->paying_method == 'vodafone_cash') selected @endif >Vodafone</option>
                                            <option value="bank" @if($payment->paying_method == 'bank') selected @endif >Bank</option>
                                        </select>
									</div>
								</div>
                                <div id="bank_id_div" style="display: none;" class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">if bank select one : </label>
									<div class="col-lg-4">
                                        <select id="bank_id" name="bank_id" class="form-control m-input">
                                            <option value="">None</option>
                                            @foreach ( \App\Models\Bank::all() as $bank )
                                                <option value="{{$bank->id}}" @if($payment->bank_id == $bank->id) selected @endif >{{$bank->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                                <div id="vf_acc_id_div" style="display: none;" class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">if vodafone select number : </label>
									<div class="col-lg-4">
                                        <select id="vf_acc_id" name="vf_acc_id" class="form-control m-input">
                                            <option value="">None</option>
                                            @foreach ( \App\Models\VCash::all() as $acc )
                                                <option value="{{$acc->id}}" @if($payment->vf_acc_id == $acc->id) selected @endif>{{$acc->number}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>

                                <div id="is_vf_trans_div" style="display: none;" class="form-group row">
                                    <label class="col-form-label pt-2 inline col-lg-2">is vodafone transaction : </label>
                                    <div id="is_vf_trans" class="radio-inline col-lg-4">
                                        <label class="radio">
                                            <input type="radio" value="0" name="is_vf_trans" @if($payment->is_vf_trans == 0) checked @endif/>
                                            <span></span>
                                            No
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="1" name="is_vf_trans" @if($payment->is_vf_trans == 1) checked @endif />
                                            <span></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label pt-2 inline col-lg-2">Status : </label>
                                    <div class="radio-inline col-lg-4">
                                        <label class="radio">
                                            <input type="radio" value="0" name="status" @if($payment->status == 0) checked @endif/>
                                            <span></span>
                                            Pending
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="1" name="status" @if($payment->status == 1) checked @endif />
                                            <span></span>
                                            Done
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="2" name="status" @if($payment->status == 2) checked @endif />
                                            <span></span>
                                            Refunded
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Document image: </label>
                                    <a target=???_blank??? class="btn btn-large btn-success" href="{{route('private-images',$payment->image)}}"><i class="fa fa-eye"></i> &nbsp;view</a>

									<div class="col-lg-4">
										<input type="file" class="form-control m-input" name="image_file"  />
									</div>
								</div>


                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-xl"></div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-9 ml-lg-auto">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>

@endsection




@section('js')
<script>
    $('#paying_method').change(
        function(){
            if($(this).val() == 'vodafone_cash')
            {
                $('#is_vf_trans_div').show();
                $('#vf_acc_id_div').show();
                $('#bank_id_div').hide();
            }
            else if($(this).val() == 'bank' ){
                $('#is_vf_trans_div').hide();
                $('#vf_acc_id_div').hide();
                $('#bank_id_div').show();
            }else {
                $('#is_vf_trans_div').hide();
                $('#vf_acc_id_div').hide();
                $('#bank_id_div').hide();
            }

        }
    );
    $(Document).ready( function(){
        if($('#paying_method').val() == 'vodafone_cash')
        {
            $('#is_vf_trans_div').show();
            $('#vf_acc_id_div').show();
            $('#bank_id_div').hide();
        }
        else if($('#paying_method').val() == 'bank' ){
            $('#is_vf_trans_div').hide();
            $('#vf_acc_id_div').hide();
            $('#bank_id_div').show();
        }else {
            $('#is_vf_trans_div').hide();
            $('#vf_acc_id_div').hide();
            $('#bank_id_div').hide();
        }

    });
</script>
@endsection
