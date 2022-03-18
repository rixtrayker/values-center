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
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('banks.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                            <div class="kt-portlet__body">

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Name : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="name"  />
									</div>

								</div>
                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Initial Balance : </label>
									<div class="col-lg-4">
										<input type="number" class="form-control m-input" name="init_balance"  />
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


