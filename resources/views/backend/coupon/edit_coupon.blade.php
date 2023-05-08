@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Kupon Düzenle </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Kupon Düzenle </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">

<div class="col-lg-10">
	<div class="card">
		<div class="card-body">

 <form id="myForm" method="post" action="{{ route('update.coupon') }}"   >
			@csrf

		<input type="hidden" name="id" value="{{ $coupon->id }}">	

			   <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Kupon Adı</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
	 <input type="text" name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}"  />
				</div>
			</div>

           <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Kupon Indirim(%)</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="coupon_indirim" class="form-control" value="{{ $coupon->coupon_indirim }}"   />
				</div>
			</div>

	<div class="row mb-3">
		<div class="col-sm-3">
			<h6 class="mb-0">Kupon Geçerlilik Tarih</h6>
		</div>
		<div class="form-group col-sm-9 text-secondary">
			<input type="date" name="coupon_gecerli" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  value="{{ $coupon->coupon_gecerli }}"  />
		</div>
	</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" value="Kaydet" />
				</div>
			</div>
		</div>

		</form>



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>




<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                coupon_name: {
                    required : true,
                },
                 coupon_discount: {
                    required : true,
                }, 
            },
            messages :{
                coupon_name: {
                    required : 'Lütfen Kupon Adı Giriniz',
                },
                coupon_discount: {
                    required : 'Lütfen Kupon Indirimi Giriniz',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>






@endsection