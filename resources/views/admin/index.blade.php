@extends('admin.admin_dashboard')
@section('admin')

@php
$tarih = date('d-m-y');
$bugun = App\Models\Siparis::where('siparis_tarih',$tarih)->sum('miktar');
$ay = date('F');
$ay = App\Models\Siparis::where('siparis_ay',$ay)->sum('miktar');
$yil = date('Y');
$yil = App\Models\Siparis::where('siparis_yil',$yil)->sum('miktar');
$beklemede = App\Models\Siparis::where('status','Beklemede')->get();
$satici = App\Models\User::where('status','active')->where('role','satici')->get();
$musteri = App\Models\User::where('status','active')->where('role','user')->get();
@endphp



<div class="page-content">

	<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
		<div class="col">
			<div class="card radius-10 bg-gradient-deepblue">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $bugun }} TL</h5>
						<div class="ms-auto">
							<i class='bx bx-cart fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Bugünün İndirimi</p>
						<p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-orange">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $ay }} TL</h5>
						<div class="ms-auto">
							<i class='bx bx-dollar fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Aylık Satış</p>
						<p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ohhappiness">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $yil }} TL</h5>
						<div class="ms-auto">
							<i class='bx bx-group fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Yıllık Satış</p>
						<p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ibiza">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ count($beklemede) }}</h5>
						<div class="ms-auto">
							<i class='bx bx-envelope fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Beklemede Sıparış</p>
						<p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ibiza">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ count($satici) }}</h5>
						<div class="ms-auto">
							<i class='bx bx-envelope fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Toplam Satici Sayısı </p>
						<p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>




		<div class="col">
			<div class="card radius-10 bg-gradient-ibiza">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ count($musteri) }}</h5>
						<div class="ms-auto">
							<i class='bx bx-envelope fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Toplam Müşteri Sayısı </p>
						<p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>


	</div><!--end row-->


	@php
	$siparisler = App\Models\Siparis::where('status','Beklemede')->orderBy('id','DESC')->limit(10)->get();
	@endphp



	<div class="card radius-10">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<h5 class="mb-0">Sipariş Özeti</h5>
				</div>
				<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
				</div>
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table align-middle mb-0">
					<thead class="table-light">
						<tr>
							<th>Seri Numarası</th>
							<th>Tarih</th>
							<th>Fatura</th>
							<th>Miktar</th>
							<th>Ödeme</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>

						@foreach($siparisler as $key => $siparis)
						<tr>
							<td>{{ $key+1 }}</td>

							<td>{{ $siparis->siparis_tarih }}</td>
							<td>{{ $siparis->fatura_no }}</td>
							<td>{{ $siparis->miktar }} TL</td>
							<td>{{ $siparis->odeme_method }}</td>
							<td>
								<div class="badge rounded-pill bg-light-info text-info w-50">
									{{ $siparis->status  }}
								</div>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection