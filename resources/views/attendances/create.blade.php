@extends('admin.layout.dashboard')


@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="fa fa-user text-primary"></i></span>
            <h3 class="card-label">Attendance: {{$lecture->course->name}} - Group: {{$lecture->month}}</h3>
        </div>
        <div class="card-toolbar">

        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
						<table id="table_id" class="table table-bordered data_table">
							<thead>
								<tr>
									<th>Select</th>
									<th>#</th>
									<th>Student Name</th>
									<th>Student serial</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($lecture->students as $record)

                                <tr>
                                        <td>
                                            <input type="hidden" name="id" value="{{$record->id}}">
                                        </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->serial}}</td>
                                        {{-- <td>{{date('l, Y/m/d', strtotime($record->created_at))}}</td> --}}
                                </tr>
                            @endforeach

							</tbody>
                        </table>
                        <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                        <div class="text-center">
                            <button class="btn btn-warning save-btn">
                                Save
                            </button>
                        </div>
					</div>
				</div>

@endsection



@section('js')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{--
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script> --}}
<script>
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


        $('.save-btn').on("click", function() {
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
                url: "{{route('take.attendance')}}",
                type: 'post',
                data: {'arr':arr.toString()},
                success: function(response){
                    // setPrograms(response);
                    swal.fire("Saved!", 'Success save', 'success');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // alert(thrownError);
            }
            });
            // rows.remove().draw();
        });
    });

</script>
@endsection

