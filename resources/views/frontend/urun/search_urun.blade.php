
@include('frontend.body.header')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style type="text/css">
	
	body {
		 
	}
	.card{
		background-color: #fff;
		padding: 15px;
		border: none;
	}
	.input-box{
		position: relative;
	}
	.input-box i{
		position: absolute;
		right: 13px;
		top: 15px;
		color: #ced4da;
	}
	.form-control{
		height: 50px;
		background-color: #eeeeee69;
	}
	.form-control:focus{
		background-color: #eeeeee69;
		box-shadow: none;
		border-color: #eee;
	}
	.list{
		padding-top: 20px;
		padding-bottom: 10px;
		display: flex;
		align-items: center;
	}
	.border-bottom{
		border-bottom: 2px solid #eee;
	}
	.list i {
		font-size: 19px;
		color: red;
	}
	.list small{
		color: #dedddd;
	}
</style>



@if($urunler -> isEmpty())
<h4 class="text-center text-danger">Product Not Found</h4>
@else 

	<div class="container mt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<div class="card">


		@foreach($urunler as $item)
		<a href="">
			<div class="list border-bottom">
				<img src="{{ asset($item->urun_thambnail) }}" style="width:40px; height:40px">

				<div class="d-flex flex-column ml-5">
 <span>{{ $item->urun_name }}</span> <small>${{ $item->satis_fiyat }}</small>

				</div>

			</div> 
		</a>
		@endforeach


				</div>

			</div>

		</div>

	</div>









@endif