@extends('layouts.main')
{{-- @inject('carbon', 'Carbon\Carbon') --}}

@section('title')
Master Barang
@endsection

@section('content')
<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div id="panel-3" class="panel">
                <div class="panel-hdr">
                    <h2>Master Barang</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        
                        <a href="/barang/create" class="btn btn-success btn-xs" title="Tambah Data Baru"
                                            role="button"><i class="fal fa-plus"></i>Tambah</a>

                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach ($barang as $item )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->KodeBarang }}</td>
                                    <td>{{ $item->NamaBarang }}</td>
                                    <td><a href="/barang/edit/{{ $item->IdBarang }}" class="btn btn-icon btn-warning btn-xs btn-icon rounded-circle">
                                        <i class="fal fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-xs btn-icon rounded-circle">
                                        <i class="fal fa-print"></i>
                                    </a>
                                    <button type="button" data-id="{{ $item->IdBarang }}" class="delete-barang btn btn-danger btn-xs btn-icon rounded-circle"><i class="fal fa-times"></i></button>

                                    {{-- <a href="javascript:void(0);" class="btn btn-danger btn-xs btn-icon rounded-circle">
                                        <i class="fal fa-times"></i>
                                    </a> --}}
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

</main>
@endsection

@section('js-addon')
<script>
    $(".delete-barang").on("click", function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                deleteBarang($(this).data('id'));
            }
        });
    })

    function deleteBarang(idBarang) {
        var formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('_token', '{{ csrf_token() }}')
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/barang/delete/' + idBarang,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    location.replace("/barang/index");
                });

            }
        });
    }
</script>
@endsection