@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Aya Göre Tüm Sipariş Raporu</div>
					<div class="ps-3"> 
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Aya Göre Sıralama Raporu</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">

						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				 <h3> Ay - Yıla Göre Ara  : {{ $ay }} - {{ $yil }}</h3>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Seri Numarası</th>
				<th>Tarih </th>
				<th>Fatura </th>
				<th>Miktar </th>
				<th>Ödeme </th>
				<th>Durum </th>
				<th>İşlem</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($siparisler as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td>{{ $item->siparis_tarih }}</td>
				<td>{{ $item->fatura_no }}</td>
				<td>{{ $item->miktar }} TL</td>
				<td>{{ $item->odeme_method }}</td>
                <td> <span class="badge rounded-pill bg-success"> {{ $item->status }}</span></td> 

				<td>
<a href="{{ route('admin.siparis.detay',$item->id) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>

<a href="{{ route('admin.fatura.download',$item->id) }}" class="btn btn-danger" title="Invoice Pdf"><i class="fa fa-download"></i> </a>


				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
			<th>Seri Numarası</th>
				<th>Tarih </th>
				<th>Fatura </th>
				<th>Miktar </th>
				<th>Ödeme </th>
				<th>Durum </th>
				<th>İşlem</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection