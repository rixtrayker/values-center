@extends('admin.layout.dashboard')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="fa fa-users text-primary"></i></span>
            <h3 class="card-label">Payments</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('payments.create') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon--></span> New Record
            </a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
						<table id="table_id" class="table table-bordered data_table">
							<thead>
								<tr>
                                    <th>#</th>

                                    <th>Serial</th>
                                    <th>Reason</th>
                                    <th>Payment amount</th>
                                    <th>Paid for</th>
                                    <th>Related to</th>
                                    <th>Payment method</th>
                                    <th>Status</th>
                                    <th>Date</th>

									<th>Action</th>

								</tr>
							</thead>
							<tbody>
									@foreach ($records as $record)
									<tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$record->serial}}</td>
                                            <td>{{$record->reason}}</td>
                                            <td>{{$record->payment_amount}}</td>
                                            <td>{{$record->user->name}}</td>
                                            <td>{{$record->eduCenter->name??''}}</td>
                                            <td>{{$record->paying_method}}</td>
                                            <td>
                                                @if($record->status == 0 ) Pending @endif
                                                @if($record->status == 1 ) Done @endif
                                                @if($record->status == 2 ) Refunded @endif
                                            </td>
                                            <td>{{$record->created_at->format('Y-m-d')}}</td>
                                            <td>
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">Action</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <a class="dropdown-item" href="{{route('payments.edit', $record->id)}}"><i class="fa fa-edit"></i> &nbsp; Edit</a></a>
                                                    <a class="dropdown-item" data-toggle="modal" href="#myModal-{{ $record->id }}"><i class="fa fa fa-trash"></i> &nbsp; Delete</a>>
                                                </div>
                                                    <div class="modal fade" id="myModal-{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-body">
                                                    <form role="form" action="{{ route('payments.destroy',$record->id) }}" class="" method="POST">
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
						</table>
					</div>
				</div>

@endsection
@section('js')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endsection
