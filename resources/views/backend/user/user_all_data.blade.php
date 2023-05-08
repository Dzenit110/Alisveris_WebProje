@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tüm Kullanıcı Bilgi </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tüm Kullanıcı Bilgi</li>
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
				<th>Image </th>
				<th>Adı </th>
				<th>E-mail </th>
				<th>Telefon </th>
				<th>Status </th> 
				<th>İşlem</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($users as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td> <img src="{{ (!empty($item->photo)) ? url('upload/user_images/'.$item->photo):url('upload/no_image.jpg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
				<td> {{ $item->name }}  </td>
				<td> {{ $item->email }}  </td>
				<td> {{ $item->phone }}  </td>

                <td>
	 	@if($item->UserOnline())
     <span class="badge badge-pill bg-success">Aktif Şimdi </span>
	 	@else
<span class="badge badge-pill bg-danger"> {{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }} </span>
	 	@endif

	 	 </td>
				<td>
<a href="{{ route('edit.subcategory',$item->id) }}" class="btn btn-info">Düzenle</a>
<a href="{{ route('sil.subcategory',$item->id) }}" class="btn btn-danger" id="delete" >Sil</a>

				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
			<th>Seri Numarası</th>
				<th>Image </th>
				<th>Adı </th>
				<th>E-mail </th>
				<th>Telefon </th>
				<th>Status </th> 
				<th>İşlem</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection