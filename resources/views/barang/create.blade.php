@extends('layouts.main')
{{-- @inject('carbon', 'Carbon\Carbon') --}}

@section('title')
Insert Barang
@endsection

@section('content')
<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div id="panel-3" class="panel">
                <div class="panel-hdr">
                    <h2>Data Barang</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="#" id="tambahbarang">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="text" name="KodeBarang" required="required" class="form-control form-control-sm" placeholder="Item Code">
                            </div>

                            <div class="form-group">
                                <input type="text" name="NamaBarang" required="required" class="form-control form-control-sm" placeholder="Item Name">
                            </div>
                            <br>
                            <button class="btn btn-success btn-xs"><i class="fal fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</main>

@endsection

@section('js-addon')
<script>
    $("#tambahbarang").submit(function (event) {
        event.preventDefault()
        var formdata = new FormData(this);
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/barang/store',
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Swal.fire({
                    title: "Success!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(() => {
                    location.replace("/barang/index");
                });
                // Swal.fire(
                //     'Sukses!',
                //     data.reason,
                //     'success'
            }
        });
    });
</script>
@endsection