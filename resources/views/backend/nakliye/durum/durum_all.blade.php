@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tüm Sokak </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tüm Sokak</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.durum') }}" class="btn btn-primary">Tüm Sokak</a>
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
                            <th>Bölüm Adı </th>
                            <th>Bölge Adı </th>
                            <th>Sokak Adı </th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($durum as $key => $item)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td> {{ $item['bolum']['bolum_name'] }}</td>
                            <td> {{ $item['bolge']['bolge_name'] }}</td>
                            <td> {{ $item->durum }}</td>
                            <td>
                                <a href="{{ route('edit.durum',$item->id) }}" class="btn btn-info">Düzenle</a>
                                <a href="{{ route('delete.durum',$item->id) }}" class="btn btn-danger" id="delete">Sil</a>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Seri Numarası</th>
                            <th>Bölüm Adı </th>
                            <th>Bölge Adı </th>
                            <th>State Adı </th>
                            <th>İşlem</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



</div>




@endsection