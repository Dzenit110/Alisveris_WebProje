@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Kullanıcı Rapor</div>
					<div class="ps-3"> 
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Kullanıcı Rapor</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

				<hr/>




<div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3" style="align-items:center; justify-content:center;" >


 <form method="post" action="{{ route('arama-by-user')}}">
		@csrf
		<div class="col">
			<div class="card">

				<div class="card-body">
					<h5 class="card-title">Kullanıcıya Göre Ara</h5>


	  <label class="form-label">Kullanıcı seçin:</label>
		<select name="user" class="form-select mb-3" aria-label="Default select example">
		<option selected="">Seçmek istediğiniz Kullanıcıyı açın</option>
		@foreach($users as $user)
		<option value="{{ $user->id }}">{{ $user->name }}</option>
		 @endforeach
	</select>


		<br>
		<input type="submit" class="btn btn-rounded btn-primary" value="Search">
				</div>


			</div>
		</div>
	</form>



				</div> 


			</div>




@endsection