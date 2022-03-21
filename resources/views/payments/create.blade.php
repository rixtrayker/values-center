@extends('admin.layout.dashboard')

@section('content')


<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="fa fa-paperclip text-primary"></i></span>
            <h3 class="card-label">Create {{$pageName}}</h3>
        </div>
    </div>
    <div class="card-body">
                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('payments.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                            <div class="kt-portlet__body">

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Reason : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="reason"  />
									</div>
								</div>


                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Payment amount : </label>
									<div class="col-lg-4">
										<input type="number" class="form-control m-input" name="payment_amount"  />
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Paying method : </label>
									<div class="col-lg-4">
                                        <select id="paying_method" name="paying_method" class="form-control m-input">
                                            <option value="">Please choose one ..</option>
                                            <option value="cash">Cash</option>
                                            <option value="vodafone_cash">Vodafone</option>
                                            <option value="bank">Bank</option>
                                        </select>
									</div>
								</div>
                                <div id="bank_id_div" style="display: none;" class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">if bank select one : </label>
									<div class="col-lg-4">
                                        <select id="bank_id" name="bank_id" class="form-control m-input">
                                            <option value="">None</option>
                                            @foreach ( \App\Models\Bank::all() as $bank )
                                                <option value="{{$bank->id}}">{{$bank->name}}</option>
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
                                                <option value="{{$acc->id}}">{{$acc->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>

                                <div id="is_vf_trans_div" style="display: none;" class="form-group row">
                                    <label class="col-form-label pt-2 inline col-lg-2">is vodafone transaction : </label>
                                    <div id="is_vf_trans" class="radio-inline col-lg-4">
                                        <label class="radio">
                                            <input type="radio" value="0" name="is_vf_trans"/>
                                            <span></span>
                                            No
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="1" name="is_vf_trans" />
                                            <span></span>
                                            Yes
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label pt-2 inline col-lg-2">Status : </label>
                                    <div class="radio-inline col-lg-4">
                                        <label class="radio">
                                            <input type="radio" value="0" name="status"/>
                                            <span></span>
                                            Pending
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="1" name="status" checked />
                                            <span></span>
                                            Done
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Document image: </label>
									<div class="col-lg-4">
										<input type="file" class="form-control m-input" name="image"  />
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
</script>

@endsection
