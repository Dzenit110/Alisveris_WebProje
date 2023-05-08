@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tüm Ürün Stok</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tüm Ürün Stok <span class="badge rounded-pill bg-danger"> {{ count($urunler) }} </span> </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

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
				<th>Image </th>
				<th>Ürün Name </th>
				<th>Fiyat </th>
				<th>Miktar </th>
				<th>Indirim </th>
				<th>Status </th> 
			</tr>
		</thead>
		<tbody>
	@foreach($urunler as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>				
				<td> <img src="{{ asset($item->urun_thambnail) }}" style="width: 70px; height:40px;" >  </td>
				<td>{{ $item->urun_name }}</td>
				<td>{{ $item->satis_fiyat }}</td>
				<td>{{ $item->urun_qty }}</td>

				<td>
					@if($item->indirimli_fiyat == NULL)
			<span class="badge rounded-pill bg-info">Indırım Yok</span>
			@else
			@php
			$miktar = $item->satis_fiyat - $item->indirimli_fiyat;
			$indirim = ($miktar/$item->satis_fiyat) * 100;
			@endphp
		<span class="badge rounded-pill bg-danger"> {{ round($indirim) }}%</span>
			@endif
					 </td>



				<td> @if($item->status == 1)
					<span class="badge rounded-pill bg-success">Active</span>
					@else
					<span class="badge rounded-pill bg-danger">InActive</span>
					@endif
				   </td>


			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
			<th>Seri Numarası</th>
				<th>Image </th>
				<th>Ürün Name </th>
				<th>Fiyat </th>
				<th>Miktar </th>
				<th>Indirim </th>
				<th>Status </th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection