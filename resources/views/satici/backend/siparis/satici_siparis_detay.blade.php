@extends('satici.satici_dashboard')
@section('satici')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor Order Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Order Details</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

				<hr/>


<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col">
					<div class="card">
               <div class="card-header"><h4>Shipping Details</h4> </div> 
               <hr>
               <div class="card-body">
                 <table class="table" style="background:#F4F6FA;font-weight: 600;">
                    <tr>
                        <th>Shipping Name:</th>
                        <th>{{ $siparis->name }}</th>
                    </tr>

                    <tr>
                        <th>Shipping Phone:</th>
                        <th>{{ $siparis->phone }}</th>
                    </tr>

                    <tr>
                        <th>Shipping Email:</th>
                        <th>{{ $siparis->email }}</th>
                    </tr>

                     <tr>
                        <th>Shipping Address:</th>
                        <th>{{ $siparis->adress }}</th>
                    </tr>


                    <tr>
                        <th>Division:</th>
                       <th>{{ $siparis->bolum->bolum_name }}</th>
                    </tr>

                    <tr>
                        <th>District:</th>
                       <th>{{ $siparis->bolge->bolge_name }}</th>
                    </tr>

                   

                     <tr>
                        <th>Post Code  :</th>
                         <th>{{ $siparis->post_code }}</th>
                    </tr>

                     <tr>
                        <th>Order Date   :</th>
                        <th>{{ $siparis->siparis_tarih }}</th>
                    </tr>

                </table>

               </div>

            </div>
					</div>


					<div class="col">
					 <div class="card">
               <div class="card-header"><h4>Order Details
<span class="text-danger">Invoice : {{ $siparis->fatura_no }} </span></h4>
                </div> 
               <hr>
               <div class="card-body">
                <table class="table" style="background:#F4F6FA;font-weight: 600;">
                    <tr>
                        <th> Name :</th>
                        <th>{{ $siparis->user->name }}</th>
                    </tr>

                    <tr>
                        <th>Phone :</th>
                      <th>{{ $siparis->user->phone }}</th>
                    </tr>

                    <tr>
                        <th>Payment Type:</th>
                       <th>{{ $siparis->odeme_method }}</th>
                    </tr>


                    <tr>
                        <th>Transx ID:</th>
                       <th>{{ $siparis->transaction_id }}</th>
                    </tr>

                    <tr>
                        <th>Invoice:</th>
                       <th class="text-danger">{{ $siparis->fatura_no }}</th>
                    </tr>

                    <tr>
                        <th>Order Amonut:</th>
                         <th>${{ $siparis->miktar }}</th>
                    </tr>

                     <tr>
                        <th>Order Status:</th>
      <th><span class="badge bg-danger" style="font-size: 15px;">{{ $siparis->status }}</span></th>
                    </tr>




                </table>

               </div>

            </div>
					</div>
				</div>






<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
					<div class="col">
						<div class="card">


<div class="table-responsive">
<table class="table" style="font-weight: 600;"  >
    <tbody>
        <tr>
            <td class="col-md-1">
                <label>Image </label>
            </td>
            <td class="col-md-2">
                <label>Product Name </label>
            </td>
            <td class="col-md-2">
                <label>Vendor Name </label>
            </td>
            <td class="col-md-2">
                <label>Product Code  </label>
            </td>
            <td class="col-md-1">
                <label>Color </label>
            </td>
            <td class="col-md-1">
                <label>Size </label>
            </td>
            <td class="col-md-1">
                <label>Quantity </label>
            </td>

            <td class="col-md-3">
                <label>Price  </label>
            </td> 

        </tr>


        @foreach($siparisItem as $item)
         <tr>
            <td class="col-md-1">
                <label><img src="{{ asset($item->urun->urun_thambnail) }}" style="width:50px; height:50px;" > </label>
            </td>
            <td class="col-md-2">
                <label>{{ $item->urun->urun_name }}</label>
            </td>
            @if($item->satici_id == NULL)
             <td class="col-md-2">
                <label>Owner </label>
            </td>
            @else
                <td class="col-md-2">
                <label>{{ $item->urun->satici->name }} </label>
            </td>
            @endif

            <td class="col-md-2">
                <label>{{ $item->urun->urun_code }} </label>
            </td>
            @if($item->color == NULL)
             <td class="col-md-1">
                <label>.... </label>
            </td>
            @else
            <td class="col-md-1">
                <label>{{ $item->color }} </label>
            </td>
            @endif

            @if($item->size == NULL)
             <td class="col-md-1">
                <label>.... </label>
            </td>
            @else
            <td class="col-md-1">
                <label>{{ $item->size }} </label>
            </td>
            @endif
            <td class="col-md-1">
                <label>{{ $item->qty }} </label>
            </td>

            <td class="col-md-3">
                <label>${{ $item->fiyat }} <br> Total = ${{ $item->fiyat * $item->qty }}   </label>
            </td> 

        </tr>
        @endforeach

    </tbody>
</table>

                    </div>



						</div>
					</div>

				</div>






			</div> 

@endsection