@extends('frontend.master_dashboard')
@section('main')

@section('title')
    Home Easy Multi Vendor Shop 
@endsection


@include('frontend.home.home_slider')




@include('frontend.home.home_features_category')



@include('frontend.home.home_banner')



@include('frontend.home.home_new_product')

@include('frontend.home.home_features_product')


<!-- 1 Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{ $skip_category_1->category_name }} Category </h3>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach($skip_product_1 as $urun)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}">
                                        <img class="default-img" src="{{ asset( $urun->urun_thambnail ) }}" alt="" />

                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $urun->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                    <a aria-label="Compare" class="action-btn" id="{{ $urun->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $urun->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>

                                </div>
                                @php
                                $miktar = floatval($urun->satis_fiyat) - floatval($urun->indirimli_fiyat);
                                $indirim = floatval((floatval($miktar)/floatval($urun->satis_fiyat)) * 100);
                                @endphp

                                <div class="product-badges product-badges-position product-badges-mrg">

                                    @if($urun->indirimli_fiyat == NULL)
                                    <span class="new">Yeni</span>
                                    @else
                                    <span class="hot"> {{ round($indirim) }} %</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $urun['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $urun->urun_name }} </a></h2>
                                @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">

                                        @if($ortalama == 0)

                                        @elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
                                    </div>
                                    @elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
                                </div>
                                @elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
                            </div>
                            @elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
                        </div>
                        @elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
                    </div>
                    @endif

                </div>
                <span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
            </div>
            <div>
                @if($urun->satici_id == NULL)
                <span class="font-small text-muted">By <a href="vendor-details-1.html">Sahibi</a></span>
                @else
                <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $urun['satici']['name'] }}</a></span>

                @endif



            </div>
            <div class="product-card-bottom">

                @if($urun->indirimli_fiyat == NULL)
                <div class="product-price">
                    <span>${{ $urun->satis_fiyat }}</span>

                </div>

                @else
                <div class="product-price">
                    <span>${{ $urun->indirimli_fiyat }}</span>
                    <span class="old-price">${{ $urun->satis_fiyat }}</span>
                </div>
                @endif



                <div class="add-cart">
                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end product card-->
    @endforeach





    </div>
    <!--End product-grid-4-->
    </div>


    </div>
    <!--End tab-content-->
    </div>


</section>

<!--2 Category -->

<!-- Sebze Category -->
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{ $skip_category_2->category_name }} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach($skip_product_2 as $urun)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}">
                                        <img class="default-img" src="{{ asset( $urun->urun_thambnail ) }}" alt="" />

                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $urun->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                    <a aria-label="Compare" class="action-btn" id="{{ $urun->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $urun->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>

                                </div>



                                @php
                                $miktar = floatval($urun->satis_fiyat) - floatval($urun->indirimli_fiyat);
                                $indirim = floatval((floatval($miktar)/floatval($urun->satis_fiyat)) * 100);
                                @endphp



                                <div class="product-badges product-badges-position product-badges-mrg">

                                    @if($urun->indirimli_fiyat == NULL)
                                    <span class="new">Yeni</span>
                                    @else
                                    <span class="hot"> {{ round($indirim) }} %</span>
                                    @endif


                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $urun['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $urun->urun_name }} </a></h2>
                                @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp


                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if($ortalama == 0)

                                        @elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
                                    </div>
                                    @elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
                                </div>
                                @elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
                            </div>
                            @elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
                        </div>
                        @elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
                    </div>
                    @endif
                </div>
                <span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
            </div>
            <div>
                @if($urun->satici_id == NULL)
                <span class="font-small text-muted">By <a href="vendor-details-1.html">Sahibi</a></span>
                @else
                <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $urun['satici']['name'] }}</a></span>

                @endif



            </div>
            <div class="product-card-bottom">

                @if($urun->indirimli_fiyat == NULL)
                <div class="product-price">
                    <span>${{ $urun->satis_fiyat }}</span>

                </div>

                @else
                <div class="product-price">
                    <span>${{ $urun->indirimli_fiyat }}</span>
                    <span class="old-price">${{ $urun->satis_fiyat }}</span>
                </div>
                @endif



                <div class="add-cart">
                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end product card-->
    @endforeach




    </div>
    <!--End product-grid-4-->
    </div>


    </div>
    <!--End tab-content-->
    </div>
</section>
<!--End Sebze Category -->




<!--Yapraklı sebzeler Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{ $skip_category_7->category_name }} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($skip_product_7 as $urun)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun) }}">
                                        <img class="default-img" src="{{ asset( $urun->urun_thambnail ) }}" alt="" />

                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $urun->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                    <a aria-label="Compare" class="action-btn" id="{{ $urun->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $urun->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>

                                </div>
                                @php
                                $miktar = floatval($urun->satis_fiyat) - floatval($urun->indirimli_fiyat);
                                $indirim = floatval((floatval($miktar)/floatval($urun->satis_fiyat)) * 100);
                                @endphp

                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if($urun->indirimli_fiyat == NULL)
                                    <span class="new">New</span>
                                    @else
                                    <span class="hot"> {{ round($indirim) }} %</span>
                                    @endif

                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $urun['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $urun->urun_name }} </a></h2>
                                @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp

                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if($ortalama == 0)

                                        @elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
                                    </div>
                                    @elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
                                </div>
                                @elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
                            </div>
                            @elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
                        </div>
                        @elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
                    </div>
                    @endif
                </div>
                <span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
            </div>
            <div>
                @if($urun->satici_id == NULL)
                <span class="font-small text-muted">By <a href="vendor-details-1.html">Sahibi</a></span>
                @else
                <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $urun['satici']['name'] }}</a></span>
                @endif

            </div>
            <div class="product-card-bottom">
                @if($urun->indirimli_fiyat == NULL)
                <div class="product-price">
                    <span>${{ $urun->satis_fiyat }}</span>

                </div>
                @else
                <div class="product-price">
                    <span>${{ $urun->indirimli_fiyat }}</span>
                    <span class="old-price">${{ $urun->satis_fiyat }}</span>
                </div>
                @endif

                <div class="add-cart">
                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end product card-->
    @endforeach


    </div>
    <!--End product-grid-4-->
    </div>


    </div>
    <!--End tab-content-->
    </div>
</section>
<!--End Mobile Category -->

<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                <div class="product-list-small animated animated">

                    @foreach($sicak_firsat as $item)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"><img src="{{ asset( $item->urun_thambnail ) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $item->urun_name }} </a>
                            </h6>
                            @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                @if($ortalama == 0)

@elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
</div>
@elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
</div>
@elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
</div>
@elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
</div>
@elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
</div>
@endif                                </div>
<span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
                            </div>
                            @if($item->indirimli_fiyat == NULL)
                            <div class="product-price">
                                <span>${{ $item->satis_fiyat }}</span>

                            </div>
                            @else
                            <div class="product-price">
                                <span>${{ $item->indirimli_fiyat }}</span>
                                <span class="old-price">${{ $item->satis_fiyat }}</span>
                            </div>
                            @endif
                        </div>
                    </article>
                    @endforeach

                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Offer </h4>
                <div class="product-list-small animated animated">

                    @foreach($ozel_teklif as $item)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"><img src="{{ asset( $item->urun_thambnail ) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $item->urun_name }} </a>
                            </h6>
                            @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                @if($ortalama == 0)

@elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
</div>
@elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
</div>
@elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
</div>
@elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
</div>
@elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
</div>
@endif                                                 </div>
<span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
                            </div>
                            @if($item->indirimli_fiyat == NULL)
                            <div class="product-price">
                                <span>${{ $item->satis_fiyat }}</span>

                            </div>
                            @else
                            <div class="product-price">
                                <span>${{ $item->indirimli_fiyat }}</span>
                                <span class="old-price">${{ $item->satis_fiyat }}</span>
                            </div>
                            @endif
                        </div>
                    </article>
                    @endforeach

                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">

                    @foreach($new as $item)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"><img src="{{ asset( $item->urun_thambnail ) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $item->urun_name }} </a>
                            </h6>
                            @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                @if($ortalama == 0)

@elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
</div>
@elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
</div>
@elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
</div>
@elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
</div>
@elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
</div>
@endif                                                </div>
<span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
                            </div>
                            @if($item->indirimli_fiyat == NULL)
                            <div class="product-price">
                                <span>${{ $item->satis_fiyat }}</span>

                            </div>

                            @else
                            <div class="product-price">
                                <span>${{ $item->indirimli_fiyat }}</span>
                                <span class="old-price">${{ $item->satis_fiyat }}</span>
                            </div>
                            @endif
                        </div>
                    </article>
                    @endforeach



                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                <div class="product-list-small animated animated">

                    @foreach($ozel_firsat as $item)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"><img src="{{ asset( $item->urun_thambnail ) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}"> {{ $item->urun_name }} </a>
                            </h6>
                            @php
                                $reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
                                $ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
                                @endphp
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                @if($ortalama == 0)

@elseif($ortalama == 1 || $ortalama < 2) <div class="product-rating" style="width: 20%">
</div>
@elseif($ortalama == 2 || $ortalama < 3) <div class="product-rating" style="width: 40%">
</div>
@elseif($ortalama == 3 || $ortalama < 4) <div class="product-rating" style="width: 60%">
</div>
@elseif($ortalama == 4 || $ortalama < 5) <div class="product-rating" style="width: 80%">
</div>
@elseif($ortalama == 5 || $ortalama < 5) <div class="product-rating" style="width: 100%">
</div>
@endif                                                                     </div>
<span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
                            </div>
                            @if($item->indirimli_fiyat == NULL)
                            <div class="product-price">
                                <span>${{ $item->satis_fiyat }}</span>

                            </div>

                            @else
                            <div class="product-price">
                                <span>${{ $item->indirimli_fiyat }}</span>
                                <span class="old-price">${{ $item->satis_fiyat }}</span>
                            </div>
                            @endif
                        </div>
                    </article>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</section>
<!--End 4 columns-->

<!--Vendor List -->
@include('frontend.home.home_satici_list')
<!--End Vendor List -->
@endsection