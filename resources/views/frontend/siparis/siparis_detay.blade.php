@extends('dashboard')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">

                    <!-- // Start Col md 3 menu -->

                    @include('frontend.body.dashboard_sidebar_menu')
                    <!-- // End Col md 3 menu -->



                    <!-- // Start Col md 9  -->
                    <div class="col-md-9">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Shipping Details</h4>
                                    </div>
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
                                                <th>Post Code :</th>
                                                <th>{{ $siparis->post_code }}</th>
                                            </tr>

                                            <tr>
                                                <th>Order Date :</th>
                                                <th>{{ $siparis->siparis_tarih }}</th>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                            </div>
                            <!-- // End col-md-6  -->


                            <div class="col-md-6">
                                <div class="card" style="height:497px">
                                    <div class="card-header">
                                        <h4>Order Details
                                            <span class="text-danger">Invoice : {{ $siparis->fatura_no }} </span>
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <table class="table" style="background:#F4F6FA;font-weight: 600; height:352px;">
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
                                                <th><span class="badge rounded-pill bg-warning">{{ $siparis->status }}</span></th>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                            </div>
                            <!-- // End col-md-6  -->

                        </div><!-- // End Row  -->




                    </div>
                    <!-- // End Col md 9  -->







                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <label>Image </label>
                            </td>
                            <td class="col-md-2">
                                <label>Product Name </label>
                            </td>
                            <td class="col-md-2">
                                <label>Satici Name </label>
                            </td>
                            <td class="col-md-2">
                                <label>Urun Code </label>
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
                                <label>Sahip </label>
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

                            @endforeach

                        </tr>





                    </tbody>
                </table>


            </div>

        </div>
        <!--  // Start Return Order Option  -->

        @if($siparis->status != 'Teslim_edildi')
    <!-- Sipariş henüz teslim edilmediyse -->
@else 
    @php
        $siparis_iade = App\Models\Siparis::where('id', $siparis->id)->whereNull('iade_sebep')->first();
    @endphp
    @if($siparis_iade)
        <!-- Sipariş iade edilmemişse -->
        <form action="{{ route('iade.siparis', $siparis_iade->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label>Sipariş İade Nedeni</label>
                <textarea name="iade_sebep" class="form-control" style="width: 40%;"></textarea>
            </div>
            <button type="submit" class="btn-sm btn-danger" style="width: 40%;">Order Return</button>
        </form>
    @else
        <!-- Sipariş zaten iade edilmişse -->
        <h5><span style="color: red;">Bu ürün için daha önce iade talebini gönderdiniz.</span></h5><br><br>
    @endif
@endif

<!-- İptal Sipariş -->
@if($siparis->status != 'Beklemede')
    <!-- Sipariş henüz bekliyorsa -->
@else 
    @php
        $siparis_iptal = App\Models\Siparis::where('id', $siparis->id)->whereNull('iptal_sebep')->first();
    @endphp
    @if($siparis_iptal)
        <!-- Sipariş iptal edilmemişse -->
        <form action="{{ route('iptal.siparis', $siparis_iptal->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label>Sipariş İptal Nedeni</label>
                <textarea name="iptal_sebep" class="form-control" style="width: 40%;"></textarea>
            </div>
            <button type="submit" class="btn-sm btn-danger" style="width: 40%;">Siparişi İptal Et</button>
        </form>
    @else
        <!-- Sipariş zaten iptal edilmişse -->
        <h5><span style="color: red;">Bu ürün daha önce iptal talebini gönderdiniz.</span></h5><br><br>
    @endif
@endif

<!--  // End Return Order Option  -->

    </div>



</div>


@endsection