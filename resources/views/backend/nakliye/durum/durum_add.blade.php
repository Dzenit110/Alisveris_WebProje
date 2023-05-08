@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Ekle Sokak </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Ekle Sokak </li>
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

        <form id="myForm" method="post" action="{{ route('store.durum') }}"   >
			@csrf

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Bölüm Adı</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
	 	<select name="bolum_id" class="form-select mb-3" aria-label="Default select example">
			 <option selected="">Bu seçim menüsünü açın</option>

			 @foreach($bolum as $item)
		 	<option value="{{ $item->id }}">{{ $item->bolum_name }}</option>
		 	@endforeach

								</select>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Bölge Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
	 	<select name="bolge_id" class="form-select mb-3" aria-label="Default select example">

			 <option> </option>



								</select>
				</div>
			</div>


           <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Sokak Adı</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="durum" class="form-control"   />
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
                state_name: {
                    required : true,
                }, 
            },
            messages :{
                state_name: {
                    required : 'Lütefn Sokak Adı Giriniz',
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


<script type="text/javascript">
  		
  		$(document).ready(function(){
  			$('select[name="bolum_id"]').on('change', function(){
  				var bolum_id = $(this).val();
  				if (bolum_id) {
  					$.ajax({
  						url: "{{ url('/bolge/ajax') }}/"+bolum_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="bolge_id"]').html('');
  							var d =$('select[name="bolge_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="bolge_id"]').append('<option value="'+ value.id + '">' + value.bolge_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  </script>



@endsection