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
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('authenticates.update',$authenticate->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            @method('PUT')
                            <div class="kt-portlet__body">

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Student : </label>
									<div class="col-lg-4">
                                        <select name="student_id" class="form-control m-input">
                                            @foreach ($students as $student)
                                            <option value="{{$student->id}}" @if($authenticate->student_id == $student->id) selected @endif>{{$student->name}} - {{$student->eduCenter->name}}  </option>
                                            @endforeach
                                        </select>
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">ACT 1 : </label>
									<div class="col-lg-2">
										<input type="number" min="0" class="form-control m-input" name="ACT1" value="{{$authenticate->ACT1}}"/>
									</div>
                                    <label class="col-lg-2 col-form-label">ACT 2 : </label>
									<div class="col-lg-2">
										<input type="number" min="0" class="form-control m-input" name="ACT2" value="{{$authenticate->ACT2}}"/>
									</div>
								</div>
                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">EST 1 : </label>
									<div class="col-lg-2">
										<input type="number" min="0" class="form-control m-input" name="EST1" value="{{$authenticate->EST1}}"/>
									</div>
                                    <label class="col-lg-2 col-form-label">EST 2 : </label>
									<div class="col-lg-2">
										<input type="number" min="0" class="form-control m-input" name="EST2" value="{{$authenticate->EST2}}"/>
									</div>
								</div>
                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Send score times : </label>
									<div class="col-lg-2">
										<input type="number" min="1" class="form-control m-input" name="send_score_times" value="{{$authenticate->send_score_times}}"/>
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


