@php
$saticiler = App\Models\User::where('status','active')->where('role','satici')->orderBy('id','DESC')->limit(4)->get();
@endphp


<div class="container">

    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
        <h3 class="">All Our Vendor List </h3>
        <a class="show-all" href="{{ route('satici.all') }}">            All Vendors
            <i class="fi-rs-angle-right"></i>
        </a>
    </div>


    <div class="row vendor-grid">

        @foreach($saticiler as $satici)


        <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
            <div class="vendor-wrap mb-40">
                <div class="vendor-img-action-wrap">
                    <div class="vendor-img">
                        <a href="vendor-details-1.html">


                            <img class="default-img" src="{{ (!empty($satici->photo)) ? url('upload/satici_images/'.$satici->photo):url('upload/no_image.jpg') }}" style="width:120px;height: 120px;" alt="" />

                        </a>
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot">Mall</span>
                    </div>
                </div>
                <div class="vendor-content-wrap">
                    <div class="d-flex justify-content-between align-items-end mb-30">
                        <div>
                            <div class="product-category">
                                <span class="text-muted">Since {{ $satici->satici_join }}</span>
                            </div>
                            <h4 class="mb-5"><a href="{{ route('satici.detay',$satici->id) }}">{{ $satici->name }}</a></h4>
                            <div class="product-rate-cover">

                                @php
                                $urunler = App\Models\Urun::where('satici_id',$satici->id)->get();
                                @endphp

                                <span class="font-small total-product">{{ count($urunler) }} urunler</span>
                            </div>
                        </div>

                    </div>
                    <div class="vendor-info mb-30">
                        <ul class="contact-infor text-muted">

                            <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Call Us:</strong><span>{{ $satici->phone }}</span></li>
                        </ul>
                    </div>
                    <a href="{{ route('satici.detay',$satici->id) }}" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
                </div>
            </div>
        </div>
        <!--end vendor card-->
        @endforeach

    </div>
</div>