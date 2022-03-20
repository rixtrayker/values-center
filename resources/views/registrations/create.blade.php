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
                        <form class="kt-form kt-form--label-left" id="kt_form_1" method="post"  action="{{ route('registrations.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                            <div class="kt-portlet__body">

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Test Center : </label>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" name="test_center"/>
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Student : </label>
									<div class="col-lg-4">
                                        <select name="student_id"class="form-control m-input">
                                            @foreach ($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}} - {{$student->eduCenter->name}}  </option>
                                            @endforeach
                                        </select>
									</div>
								</div>

                                <div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Center : </label>
									<div class="col-lg-4">
                                        <select name="edu_center_id"class="form-control m-input">
                                            @foreach ($centers as $center)
                                            <option value="{{$center->id}}">{{$center->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>

                                <div class="form-group row">

                                    <label class="col-form-label pt-2 inline col-lg-2">Status : </label>
                                    <div class="radio-inline col-lg-4">
                                        <label class="radio">
                                            <input type="radio" value="0" name="status"  @if(old('status') === 0 ) checked @endif/>
                                            <span></span>
                                            Just book
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="1" name="status" @if(old('status') === 1 ) checked @endif />
                                            <span></span>
                                            Paid
                                        </label>
                                        <label class="radio">
                                            &nbsp;
                                            <input  type="radio" value="2" name="status" @if(old('status') === 2 ) checked @endif />
                                            <span></span>
                                            Booked and Paid
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


