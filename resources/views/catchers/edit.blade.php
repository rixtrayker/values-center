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
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('catchers.update',$catcher->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            @method('PUT')
                            <div class="kt-portlet__body">


                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Student name : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="student_name" value="{{$catcher->student_name}}" />
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Mobile : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="mobile" value="{{$catcher->mobile}}" />
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Admin name : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="admin_name" value="{{$catcher->toUser->name}}" />
									</div>
								</div>
                                {{-- <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Admin name : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="admin_name" value="{{$catcher->admin_name}}" />
									</div>
								</div> --}}

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Notes : </label>
									<div class="col-lg-4">
                                        <textarea name="notes" class="form-control m-textarea" cols="30" rows="5">{{$catcher->notes}}</textarea>
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Comment : </label>
									<div class="col-lg-4">
                                        <textarea name="comment" class="form-control m-textarea" cols="30" rows="5" ></textarea>
									</div>
								</div>

                                <div class="form-group row">
                                    <label class="col-form-label pt-2 inline col-lg-2">Status : </label>
                                    <div class="radio-inline col-lg-4">
                                        <label class="radio">
                                            <input type="radio" value="0" name="status"  @if($catcher->status === 0) checked @endif>
                                            <span></span>
                                            Pending
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="1" name="status" @if($catcher->status === 1) checked @endif />
                                            <span></span>
                                            Processing
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="2" name="status" @if($catcher->status === 2) checked @endif />
                                            <span></span>
                                            Completed
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="2" name="status" @if($catcher->status === 3) checked @endif />
                                            <span></span>
                                            Failed
                                        </label>
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


