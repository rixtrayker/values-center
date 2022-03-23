@extends('admin.layout.dashboard')


@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="fa fa-user text-primary"></i></span>
            <h3 class="card-label">Students Lectures</h3>
        </div>

    </div>
    <div class="card-body">


        <form action="{{route('student.lecture.post')}}" method="POST">
            @csrf
            <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Select student : </label>
                <div class="col-lg-4">
                    <select class="form-control m-input select2" name="student_id" id="student_id">
                        @foreach ($students as $student )
                            <option value="{{$student->id}}">{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Select lecture : </label>
                <div class="col-lg-4">
                    <select class="form-control m-input select2" name="lecture_id" id="lecture_id" multiple>
                        @foreach ($lectures as $lecture )
                            <option value="{{$lecture->id}}">{{$lecture->course->name}} / {{$lecture->month}}</option>
                        @endforeach
                    </select>
                </div>
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
        <!--begin: Datatable-->
						{{-- <table id="table_id" class="table table-bordered data_table">
							<thead>
								<tr>
									<th>Select</th>
									<th>#</th>
									<th>Student Name</th>
									<th>Student serial</th>
									<th>Status</th>
								    <th>Action</th
								</tr>
							</thead>
							<tbody>
									@foreach ($records as $record)

									<tr>
                                            <td>
                                                <input type="hidden" name="id" value="{{$record->id}}">
                                            </td>
											<td>{{$loop->iteration}}</td>
											<td>{{$record->name}}</td>
											<td>{{$record->national_id}}</td>
											<td>{{$record->mobile}}</td>
                                            <td>
                                                @if($record->attended == 0 ) Absent @endif
                                                @if($record->attended == 1 ) Attended @endif
                                            </td>
                                            <td>{{$record->city->name ?? '-'}}</td>
											<td>{{date('l, Y/m/d', strtotime($record->created_at))}}</td>
											<td>
											<button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="true">Action</button>

											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="{{route('users.edit', $record->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="dropdown-item" data-toggle="modal" href="#myModal-{{ $record->id }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>

												<div class="modal fade" id="myModal-{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
												<div class="modal-content">
												<div class="modal-body">
												<form role="form" action="{{ route('users.destroy',$record->id) }}" class="" method="POST">
												<input name="_method" type="hidden" value="DELETE">
												{{ csrf_field() }}
												<p>are you sure</p>
												<button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
												</form>
												</div>
												</div>
												</div>
												</div>
										</td>
									</tr>
								@endforeach

							</tbody>
                        </table> --}}

					</div>
				</div>

@endsection



@section('js')
<script>
    $('#lecture_id').select2({
        'placeholder' : 'select a lecture'
    });
    $('#student_id').select2({
        'placeholder' : 'select a student'
    });
</script>

{{-- <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script> --}}
{{--
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script> --}}
{{-- <script>

    $(document).ready( function () {
        // alert($('meta[name="csrf-token"]').attr('content'));
        var table = $('#table_id').DataTable({
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        dom: 'Bfrtip',
        buttons: [
            'selectAll',
            'selectNone'
        ],
        "order": [[0, 'desc']]
        });

        table.on("click", "th.select-checkbox", function() {
            if ($("th.select-checkbox").hasClass("selected")) {
                table.rows().deselect();
                $("th.select-checkbox").removeClass("selected");
            } else {
                table.rows().select();
                $("th.select-checkbox").addClass("selected");
            }
        }).on("select deselect", function() {
            ("Some selection or deselection going on")
            if (table.rows({
                    selected: true
                }).count() !== table.rows().count()) {
                $("th.select-checkbox").removeClass("selected");
            } else {
                $("th.select-checkbox").addClass("selected");
            }
        });


        $('.delete-btn').on("click", function() {
            var rows = table.rows( '.selected' );
            var arr = [];
            table.rows('.selected').data().each(function(e){
                arr.push($(e[0]).val());
            });
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert(arr.toString());
            $.ajax({
                url: "{{route('take-attendance')}}",
                type: 'delete',
                data: {'arr':arr.toString()},
                success: function(response){
                    // setPrograms(response);
                    swal.fire("deleted!", 'Success Delete', 'success');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // alert(thrownError);
            }
            });
            rows.remove().draw();
        });
    });

</script> --}}
@endsection

