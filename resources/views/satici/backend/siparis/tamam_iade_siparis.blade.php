@extends('satici.satici_dashboard')
@section('satici')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Vendor
					 Complete Return Order</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Complete Return Order</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">

						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Sl</th>
				<th>Date </th>
				<th>Invoice </th>
				<th>Amount </th>
				<th>Payment </th>
				<th>Reason </th>
				<th>State </th>
				<th>Action</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($siparisitem as $key => $item)
		@if($item->siparis->iade_siparis == 2) 

			<tr>
				<td> {{ $key+1 }} </td>
				<td>{{ $item['siparis']['siparis_tarih'] }}</td>
				<td>{{ $item['siparis']['fatura_no'] }}</td>
				<td>{{ $item['siparis']['miktar'] }} TL</td>
				<td>{{ $item['siparis']['odeme_method'] }}</td>
				<td>{{ $item['siparis']['iade_sebep'] }}</td>
                <td> 
                @if($item->siparis->iade_siparis == 1)
<span class="badge rounded-pill bg-danger"> Return </span>
                @else
 <span class="badge rounded-pill bg-success"> Done </span>
                @endif

                 </td> 

				<td>
				<a href="{{ route('satici.siparis.detay',$item->siparis->id) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>


				</td> 
			</tr>
			@else

		    @endif
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Date </th>
				<th>Invoice </th>
				<th>Amount </th>
				<th>Payment </th>
				<th>Reason </th>
				<th>State </th>
				<th>Action</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection