@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Siparişi Ayrıntıları</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Siparişi Ayrıntıları</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <hr />


    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4>Nakliye ayrıntıları</h4>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                        <tr>
                            <th>Nakliye Adı:</th>
                            <th>{{ $siparis->name }}</th>
                        </tr>

                        <tr>
                            <th>Nakliye Telefon:</th>
                            <th>{{ $siparis->phone }}</th>
                        </tr>

                        <tr>
                            <th>Nakliye Email:</th>
                            <th>{{ $siparis->email }}</th>
                        </tr>

                        <tr>
                            <th>Nakliye Adresi:</th>
                            <th>{{ $siparis->adress }}</th>
                        </tr>


                        <tr>
                            <th>Bölüm:</th>
                            <th>{{ $siparis->bolum->bolum_name }}</th>
                        </tr>

                        <tr>
                            <th>Bölge:</th>
                            <th>{{ $siparis->bolge->bolge_name }}</th>
                        </tr>



                        <tr>
                            <th>Posta kodu :</th>
                            <th>{{ $siparis->post_code }}</th>
                        </tr>

                        <tr>
                            <th>Sıparış Tarihi:</th>
                            <th>{{ $siparis->siparis_tarih }}</th>
                        </tr>

                    </table>

                </div>

            </div>
        </div>


        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Sıparış Detayları
                        <span class="text-danger">Fatura : {{ $siparis->fatura_no }} </span>
                    </h4>
                </div>
                <hr>
                <div class="card-body" style="height:497px">
                    <table class="table" style="background:#F4F6FA;font-weight: 600; height:449px">
                        <tr>
                            <th> Adı :</th>
                            <th>{{ $siparis->user->name }}</th>
                        </tr>

                        <tr>
                            <th>Telefon :</th>
                            <th>{{ $siparis->user->phone }}</th>
                        </tr>

                        <tr>
                            <th>Ödeme Type:</th>
                            <th>{{ $siparis->odeme_method }}</th>
                        </tr>


                        <tr>
                            <th>Transx ID:</th>
                            <th>{{ $siparis->transaction_id }}</th>
                        </tr>

                        <tr>
                            <th>Fatura:</th>
                            <th class="text-danger">{{ $siparis->fatura_no }}</th>
                        </tr>

                        <tr>
                            <th>Sıparış Miktar:</th>
                            <th>{{ $siparis->miktar }}TL</th>
                        </tr>

                        <tr>
                            <th>Sıparış Status:</th>
                            <th><span class="badge bg-danger" style="font-size: 15px;">{{ $siparis->status }}</span></th>
                        </tr>


                        <tr>
                            <th> </th>
                            <th>
      	@if($siparis->status == 'Beklemede')
      	<a href="{{ route('pending-confirm',$siparis->id) }}" class="btn btn-block btn-success" id="confirm" >Confirm Order</a>
      	@elseif($siparis->status == 'Onay')
          <a href="{{ route('confirm-processing',$siparis->id) }}" class="btn btn-block btn-success" id="processing" >Processing Order</a>
		@elseif($siparis->status == 'isleniyor')
		<a href="{{ route('processing-delivered',$siparis->id) }}" class="btn btn-block btn-success" id="delivered" >Delivered Order</a>
      	@endif



      	 </th>
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
                    <table class="table" style="font-weight: 600;">
                        <tbody>
                            <tr>
                                <td class="col-md-1">
                                    <label>Image </label>
                                </td>
                                <td class="col-md-2">
                                    <label>Ürün Adı </label>
                                </td>
                                <td class="col-md-2">
                                    <label>Satici Adı </label>
                                </td>
                                <td class="col-md-2">
                                    <label>Ürün Code </label>
                                </td>
                                <td class="col-md-1">
                                    <label>Renk </label>
                                </td>
                                <td class="col-md-1">
                                    <label>Boyut </label>
                                </td>
                                <td class="col-md-1">
                                    <label>Miktar </label>
                                </td>

                                <td class="col-md-3">
                                    <label>Fiyat </label>
                                </td>

                            </tr>


                            @foreach($siparisItem as $item)
                            <tr>
                                <td class="col-md-1">
                                    <label><img src="{{ asset($item->urun->urun_thambnail) }}" style="width:50px; height:50px;"> </label>
                                </td>
                                <td class="col-md-2">
                                    <label>{{ $item->urun->urun_name }}</label>
                                </td>
                                @if($item->satici_id == NULL)
                                <td class="col-md-2">
                                    <label>Sahibi </label>
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
                                    <label>{{ $item->fiyat }} TL<br> Toplam = {{ $item->fiyat * $item->qty }} TL</label>
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