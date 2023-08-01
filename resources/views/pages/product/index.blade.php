@extends('layouts.app')
@section('title')
Produk
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <span class="alert-icon text-danger me-2">
            <i class="ti ti-ban ti-xs"></i>
        </span>
        {{ $error }}
    </div>
    @endforeach
    @endif
    <div class="card">
        <div class="card-header d-flex">
            <h5 class="align-self-center m-0">Data Produk</h5>
            <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddProduct" class="btn btn-primary ms-auto"><i class="fa fa-plus"></i> &NonBreakingSpace;Tambah Product</button>
        </div>
        <hr class="mt-0">
        <div class="card-datatable table-responsive">
            <div class="col-md-12">
            <div class="row d-flex justify-content-between">
              <div class="px-0 col-xl-2 col-lg-3 col-md-4 col-sm-12 my-1  align-items-center d-flex justify-content-between">
                <div class="input-group mb-3">
                  <label class="input-group-text" for="custom-row">Baris</label>
                  <select class="form-select" id="custom-row">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <div class="px-0 col-lg-4 col-md-8 col-sm-12 my-1">
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="ti ti-search"></i></span>
                  <input type="text" id="custom-search" class="form-control" placeholder="Search..." aria-label="Search..." />
                </div>
              </div>
            </div>
          </div>
            <table class="dt-advanced-search table" id="get-data">
                <thead>
                    <tr>
                        <th width="220">Foto</th>
                        <th>Nama Produk</th>
                        <th>Berat Produk</th>
                        <th width="320">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('pages.product.offcanvas-addproduct')
    @include('pages.product.offcanvas-detailproduct')
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/tables/datatable/responsive.dataTables.min.css') }}" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
@endsection

@section('scripts')
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script>
    $(function() {
        $('#offcanvasDetailProduct').on('shown.bs.offcanvas', function () {
            $('.loading-spinner').show();
            setTimeout(function() {
                $('.loading-spinner').hide();
            }, 1000);
        });

        $('#offcanvasDetailProduct').on('hide.bs.offcanvas', function () {
            $('.loading-spinner').show();
        });

        $('#updateProductForm').on('submit', function(e) {
            // Show the loading spinner during form submission
            $('.loading-spinner').show();
        });

        // Handle form submission
        $('#updateProductForm').on('submit', function(e) {
            // Show the loading spinner during form submission
            $('.loading-spinner').show();
        });
        
        $('#productImage').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                var previewImg = $('#productImagePreview');
                previewImg.attr('src', reader.result);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            }
        });
        $('#productImageAdd').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                var previewImg = $('#productImagePreviewAdd');
                previewImg.attr('src', reader.result);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            }
        });
        var table = $('#get-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('product-datatable') !!}',
            columns: [
                { 
                    data: 'product_images',
                    orderable: false,
                    render: function(product_images) {
                        return '<img src="'+product_images+'" width="120px" height="120px" style="object-fit:cover; border-radius:3px;">';
                    },
                },
                { data: 'product_name'},
                { 
                    data: 'product_weight',
                    render: function(data, type, row) {
                        return row.product_weight+'('+row.product_unit+')';
                    }
                },
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-primary btn-sm detail-product" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDetailProduct" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Detail</button> <button class="my-1 btn btn-danger btn-sm delete-product" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

        $('#get-data').on('click', '.detail-product', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('product-detail', ':id') }}'.replace(':id', id),
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                statusCode:{
                    200:function(response) {
                        var data = response.data;

                        $('#productImagePreview').attr('src', data.product_images).attr('alt', 'Product Image');
                        $('#productName').val(data.product_name);
                        $('#productUnit').val(data.product_unit);
                        $('#productWeight').val(data.product_weight);
                        
                        var actionUrl = "{{ route('product-update', ':inputValue') }}";
                        actionUrl = actionUrl.replace(':inputValue', encodeURIComponent(data.id));
                        $('#updateProductForm').attr('action', actionUrl);
                    },
                    400:function(response){
                        Swal.fire({
                            title: 'Error!',
                            text: response.responseJSON.message,
                            icon: 'error',
                            customClass: {
                            confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    },
                    500:function(response){
                        Swal.fire({
                            title: 'Error!',
                            text: response.responseJSON.message,
                            icon: 'error',
                            customClass: {
                            confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    }
                }
            });
        });

        $('#get-data').on('click', '.delete-product', function() {
            var id = $(this).data('id');

            Swal.fire({
                text: 'Apakah kamu yakin mau menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: 'btn btn-primary me-2',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('product-destroy', ':id') }}'.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        statusCode:{
                            200:function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: response.message,
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    $('#get-data').DataTable().ajax.reload();
                                });
                            },
                            400:function(response){
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.responseJSON.message,
                                    icon: 'error',
                                    customClass: {
                                    confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            500:function(response){
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.responseJSON.message,
                                    icon: 'error',
                                    customClass: {
                                    confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                });
                            }
                        }
                    });
                }
            });
        });

        $('#get-data_length, #get-data_filter').addClass('d-none');

        $('#custom-search').on('keyup change', function() {
          var val = $(this).val();
          table.search(val).draw();
        });

        $('#custom-row').on('change', function() {
          var val = $(this).val();
          table.page.len(val).draw();
        });
    });
</script>
@endsection