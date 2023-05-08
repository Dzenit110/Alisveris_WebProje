@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tüm Bölüm </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tüm Bölüm</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('add.bolum') }}" class="btn btn-primary">Bölüm Ekle</a> 				 
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
				<th>Bölüm Adı </th> 
				<th>İşlem</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($bolum as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
				<td> {{ $item->bolum_name }}</td> 
				<td>
                <a href="{{ route('edit.bolum',$item->id) }}" class="btn btn-info">Düzenle</a>
<a href="{{ route('delete.bolum',$item->id) }}" class="btn btn-danger" id="delete" >Sil</a>
				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>Seri</th>
				<th>Bölüm Adı </th> 
				<th>İşlem</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection