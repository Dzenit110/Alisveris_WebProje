@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Yeni Ürün Ekle</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Yeni Ürün Ekle</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Yeni Ürün Ekle</h5>
            <hr />
            <form id="myForm" method="post" action="{{ route('store.urun') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">


                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Adı</label>
                                    <input type="text" name="urun_name" class="form-control" id="inputProductTitle" placeholder="Lüten Ürün Başlık Yazınız">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Etiketleri</label>
                                    <input type="text" name="urun_tags" class="form-control visually-hidden" data-role="tagsinput" value="yeni Ürün,taze Ürün">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Boyut</label>
                                    <input type="text" name="urun_size" class="form-control visually-hidden" data-role="tagsinput" value="Küçük,Orta,Büyük ">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Renk</label>
                                    <input type="text" name="urun_color" class="form-control visually-hidden" data-role="tagsinput" value="Kırmızı,Mavi,Siyah">
                                </div>



                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Kisa Tanim</label>
                                    <textarea name="kisa_tanim" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Uzun Tanim</label>
                                    <textarea id="mytextarea" name="uzun_tanim"> </textarea>
                                </div>



                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Ana Küçük Resim</label>
                                    <input name="urun_thambnail" class="form-control" type="file" id="formFile" onchange="mainThamUrl(this)">

                                    <img src="" id="mainThmb" />
                                </div>



                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Çoklu Resim</label>
                                    <input class="form-control" name="multi_img[]" type="file" id="multiImg" multiple="">

                                    <div class="row" id="preview_img">

                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice" class="form-label">Ürün Fiyati</label>
                                        <input type="text" name="satis_fiyat" class="form-control" id="inputPrice" placeholder="00.00">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Indirimli Fiyat</label>
                                        <input type="text" name="indirimli_fiyat" class="form-control" id="inputCompareatprice" placeholder="00.00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Ürün Kodu</label>
                                        <input type="text" name="urun_code" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputStarPoints" class="form-label">Ürün Miktarı</label>
                                        <input type="text" name="urun_qty" class="form-control" id="inputStarPoints" placeholder="00.00">
                                    </div>



                                    <div class="form-group col-12">
                                        <label for="inputProductType" class="form-label">Ürünün Markası</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">Ürünün Kategorisi</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="inputCollection" class="form-label">Ürünün Alt Kategorisi</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            <option></option>

                                        </select>
                                    </div>


                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Satıcıyı Seçiniz</label>
                                        <select name="satici_id" class="form-select" id="inputCollection">
                                            <option></option>
                                            @foreach($activeSatici as $satici)
                                            <option value="{{ $satici->id }}">{{ $satici->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="sicak_firsat" type="checkbox" value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Sıcak Fırsatlar</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="ozellik" type="checkbox" value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Öne Çıkanlar</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="ozel_teklif" type="checkbox" value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Özel Teklif</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="ozel_firsat" type="checkbox" value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Özel Fırsatlar</label>
                                                </div>
                                            </div>


                                        </div> <!--Checkbox için satır bitiyor -->
                                    </div>
                                    <hr>


                                    <div class="col-12">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary px-4" value="Kaydet" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--satir kismi bitiyor-->
                </div>
        </div>

        </form>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                urun_name: {
                    required: true,
                },
                kisa_tanim: {
                    required: true,
                },
                urun_thambnail: {
                    required: true,
                },
                multi_img: {
                    required: true,
                },
                satis_fiyat: {
                    required: true,
                },
                urun_code: {
                    required: true,
                },
                urun_qty: {
                    required: true,
                },
                brand_id: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                subcategory_id: {
                    required: true,
                },
            },
            messages: {
                urun_name: {
                    required: 'Lütfen Ürün Adını Giriniz',
                },
                kisa_tanim: {
                    required: 'Lütfen Kısa Açıklama Girin',
                },
                urun_thambnail: {
                    required: 'Lütfen Ürün Küçük Resmini Seçin',
                },
                multi_img: {
                    required: 'Lütfen Ürün Seçiniz Çoklu Görsel',
                },
                satis_fiyat: {
                    required: 'Lütfen Satış Fiyatını Giriniz',
                },
                urun_code: {
                    required: 'Lütfen Ürün Kodunu Giriniz',
                },
                urun_qty: {
                    required: 'Lütfen Ürün Adetini Giriniz',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


<script type="text/javascript">
    function mainThamUrl(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);

            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>

<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) { //check supported file type

                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
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