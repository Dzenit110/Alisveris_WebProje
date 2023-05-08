@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Düzenle Ürün</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Düzenle Ürün</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Düzenle Ürün</h5>
            <hr />

            <form id="myForm" method="post" action="{{ route('update.urun') }}">
                @csrf

                <input type="hidden" name="id" value="{{ $urunler->id }}">


                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">


                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Adı</label>
                                    <input type="text" name="urun_name" class="form-control" id="inputProductTitle" value="{{ $urunler->urun_name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Etiketleri</label>
                                    <input type="text" name="urun_tags" class="form-control visually-hidden" data-role="tagsinput" value="{{ $urunler->urun_tags }}">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Boyut</label>
                                    <input type="text" name="urun_size" class="form-control visually-hidden" data-role="tagsinput" value="{{ $urunler->urun_size }} ">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Ürün Renk</label>
                                    <input type="text" name="urun_color" class="form-control visually-hidden" data-role="tagsinput" value="{{ $urunler->urun_color }}">
                                </div>



                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Kisa Tanim</label>
                                    <textarea name="kisa_tanim" class="form-control" id="inputProductDescription" rows="3">
                                    {{ $urunler->kisa_tanim }}
                                    </textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Uzun Tanim</label>
                                    <textarea name="uzun_tanim" class="form-control" id="inputProductDescription" rows="3">
                                    {{ $urunler->uzun_tanim }}
                                    </textarea>
                                </div>






                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">

                                    <div class="form-group col-md-6">
                                        <label for="inputPrice" class="form-label">Ürün Fiyat</label>
                                        <input type="text" name="satis_fiyat" class="form-control" id="inputPrice" value="{{ $urunler->satis_fiyat }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice" class="form-label">Indirimli Fiyat</label>
                                        <input type="text" name="indirimli_fiyat" class="form-control" id="inputPrice" value="{{ $urunler->indirimli_fiyat }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Ürün Code</label>
                                        <input type="text" name="urun_code" class="form-control" id="inputCostPerPrice" value="{{ $urunler->urun_code }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputStarPoints" class="form-label">Ürün Miktar</label>
                                        <input type="text" name="urun_qty" class="form-control" id="inputStarPoints" value="{{ $urunler->urun_qty }}">
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="inputProductType" class="form-label">Ürün Markası</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $urunler->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}</option> @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">Ürün Kategori</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $urunler->category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option> @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputCollection" class="form-label">Ürün Alt Kategori</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            <option></option>
                                            @foreach($subcategory as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $urunler->subcategory_id ? 'selected' : '' }}>{{ $subcat->subcategory_name }}</option> @endforeach

                                        </select>
                                    </div>


                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Satıcı Seç</label>
                                        <select name="satici_id" class="form-select" id="inputCollection">
                                            <option></option>
                                            @foreach($activeSatici as $satici)
                                            <option value="{{ $satici->id }}" {{ $satici->id == $urunler->satici_id ? 'selected' : '' }}>{{ $satici->name }}</option> @endforeach
                                        </select>
                                    </div>


                                    <div class="col-12">

                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="sicak_firsat" type="checkbox" value="1" id="flexCheckDefault" {{ $urunler->sicak_firsat == 1 ? 'checked' : '' }}> <label class="form-check-label" for="flexCheckDefault"> Sıcak fırsatlar</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="ozellik" type="checkbox" value="1" id="flexCheckDefault" {{ $urunler->ozellik == 1 ? 'checked' : '' }}> <label class="form-check-label" for="flexCheckDefault">Öne Çıkanlar</label>
                                                </div>
                                            </div>




                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="ozel_teklif" type="checkbox" value="1" id="flexCheckDefault" {{ $urunler->ozel_teklif == 1 ? 'checked' : '' }}> <label class="form-check-label" for="flexCheckDefault">Özel teklif</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="ozel_firsat" type="checkbox" value="1" id="flexCheckDefault" {{ $urunler->ozel_firsat == 1 ? 'checked' : '' }}> <label class="form-check-label" for="flexCheckDefault">Özel Fırsatlar</label>
                                                </div>
                                            </div>



                                        </div> <!-- // end row  -->

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
                    </div><!--end row-->
                </div>
        </div>

        </form>

    </div>

</div>

<!--MAIN IMAGE  UPDATE-->
<div class="page-content">
	<h6 class="mb-0 text-uppercase">Ana Resim Küçük Resmini Güncelle </h6>
	<hr>
<div class="card">
<form method="post" action="{{ route('update.urun.thambnail') }}" enctype="multipart/form-data" >
			@csrf
	<input type="hidden" name="id" value="{{ $urunler->id }}">	
	<input type="hidden" name="old_img" value="{{ $urunler->urun_thambnail }}">		
	<div class="card-body">
		<div class="mb-3">
			<label for="formFile" class="form-label">Küçük Resim Seçin </label>
			<input name="urun_thambnail" class="form-control" type="file" id="formFile">
		</div>
		<div class="mb-3">
			<label for="formFile" class="form-label"> </label>
			 <img src="{{ asset($urunler->urun_thambnail) }}" style="width:100px; height:100px">
		</div>
<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
			 </div>
			</form>
			    </div>
			</div>

<!-- /// End Main Image Thambnail Update ////// -->


<!-- MULTI IMAGE-->


<div class="page-content">
	<h6 class="mb-0 text-uppercase">Çoklu Görüntüyü Güncelle </h6>
	<hr>
<div class="card">
<div class="card-body">
	<table class="table mb-0 table-striped">
		<thead>
			<tr>
				<th scope="col">#Seri Numarası</th>
				<th scope="col">Image</th>
				<th scope="col">Image Değiştir </th>
				<th scope="col">Sil </th>
			</tr>
		</thead>
		<tbody>

        <form method="post" action="{{ route('update.urun.multiimage') }}" enctype="multipart/form-data" >
			@csrf
	@foreach($multiImgs as $key => $img)
	<tr>
		<th scope="row">{{ $key+1 }}</th>
		<td> <img src="{{ asset($img->photo_ad) }}" style="width:70; height: 40px;"> </td>
		<td> <input type="file" class="form-group" name="multi_img[{{ $img->id }}]"> </td>
		<td> 
	<input type="submit" class="btn btn-primary px-4" value="Update Image " />		
	<a href="{{ route('urun.multiimg.sil',$img->id) }}" class="btn btn-danger" id="delete" > Sil </a>		
		</td>
	</tr>
	@endforeach		 
		</form>	 
		</tbody>
	</table>
</div>
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