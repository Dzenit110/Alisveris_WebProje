@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tüm Afiş</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tüm Afiş</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.afis') }}" class="btn btn-primary">Ekle Afiş</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Seri Numarası</th>
                            <th>Afiş Başlık </th>
                            <th>Afiş Url </th>
                            <th>Afiş Image </th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($afis as $key => $item)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td>{{ $item->afis_title }}</td>
                            <td>{{ $item->afis_url }}</td>
                            <td> <img src="{{ asset($item->afis_image) }}" style="width: 70px; height:40px;"> </td>

                            <td>
                                <a href="{{ route('edit.afis',$item->id) }}" class="btn btn-info">Düzenle</a>
                                <a href="{{ route('sil.afis',$item->id) }}" class="btn btn-danger" id="delete">Sil</a>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Seri Numarası</th>
                            <th>Afiş Başlık </th>
                            <th>Afiş Url </th>
                            <th>Afiş Image </th>
                            <th>İşlem</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



</div>




@endsection