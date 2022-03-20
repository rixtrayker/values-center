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
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('students.update',$student->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            @method('PUT')
                            <div class="kt-portlet__body">

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Name : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="name" value="{{$student->name}}" />
									</div>

								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Mobile : </label>
									<div class="col-lg-4">
										<input type="number" class="form-control m-input" name="mobile" value="{{$student->mobile}}" />
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Center : </label>
									<div class="col-lg-4">
                                        <select name="edu_center_id"class="form-control m-input">
                                            @foreach ($centers as $center)
                                            <option value="{{$center->id}}" @if($student->edu_center_id == $center->id ) selected @endif>{{$center->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Grade : </label>
									<div class="col-lg-4">
                                        <select name="grade"class="form-control m-input">
                                            @for($i=1; $i<=12;$i++)
                                            <option value="{{$i}}" @if($student->grade == $i ) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
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


