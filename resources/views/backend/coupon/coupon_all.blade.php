@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tüm Kupon </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tüm Kupon</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('add.coupon') }}" class="btn btn-primary">Kupon Ekle</a> 				 
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
				<th>Seri Numarası</th>
				<th>Kupon Name </th>
				<th>Kupon İndirim  </th>
				<th>Kupon Geçerlilik  </th>
				<th>Kupon Status  </th>
				<th>İşlem</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($coupon as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td> {{ $item->coupon_name }}</td>
				<td> {{ $item->coupon_indirim }}%  </td>
				<td> {{ Carbon\Carbon::parse($item->coupon_gecerli)->format('D, d F Y') }}  </td>


				<td> 
@if($item->coupon_gecerli >= Carbon\Carbon::now()->format('Y-m-d'))
<span class="badge rounded-pill bg-success">Valid</span>
@else
<span class="badge rounded-pill bg-danger">Invalid</span>
@endif

				  </td>

				<td>
<a href="{{ route('edit.coupon',$item->id) }}" class="btn btn-info">Düzenle</a>
<a href="{{ route('delete.coupon',$item->id) }}" class="btn btn-danger" id="delete" >Sil</a>
				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>Seri Numarası</th>
				<th>Kupon Name </th>
				<th>Kupon Indirim  </th>
				<th>Kupon Geçerlilik  </th>
				<th>Kupon Status  </th>
				<th>İşlem</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection