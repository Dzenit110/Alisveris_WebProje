@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tüm İade Siparişi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tüm İade Siparişi</li>
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
			<th>Seri Numarası</th>
				<th>Tarih </th>
				<th>Fatura </th>
				<th>Miktar </th>
				<th>Ödeme </th>
				<th>Durum </th>
				<th>Sebep </th>
				<th>İşlem</th> 
			</tr>
			</tr>
		</thead>
		<tbody>
	@foreach($siparisler as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td>{{ $item->siparis_tarih }}</td>
				<td>{{ $item->fatura_no }}</td>
				<td>${{ $item->miktar }}</td>
				<td>{{ $item->odeme_method }}</td>
                <td> 

                @if($item->iade_siparis == 1)
      <span class="badge rounded-pill bg-danger"> Beklemede </span>
      			@elseif($item->iade_siparis == 2)
      <span class="badge rounded-pill bg-success"> Başarılı </span>
               @endif
  	         </td> 

  	         <td>{{ $item->iade_sebep }}</td>

				<td>
<a href="{{ route('admin.siparis.detay',$item->id) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>

<a href="{{ route('iade.istek.onaylandi',$item->id) }}" class="btn btn-danger" title="Approved" id="approved"><i class="fa-solid fa-person-circle-check"></i> </a>


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
				<th>Sebep </th>
				<th>İşlem</th> 
			</tr>
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection