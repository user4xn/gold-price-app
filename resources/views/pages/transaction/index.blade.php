@extends('layouts.app')
@section('title')
Transaksi
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
            <h5 class="align-self-center m-0">Data Transaksi</h5>
        </div>
        <hr class="mt-0">
        <div class="card-datatable">
            <div class="col-md-12">
                <div class="row d-flex">
                  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 my-1  align-items-center d-flex justify-content-between px-0">
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
                  <div class="px-0 col-lg-4 col-md-8 col-sm-12 my-1 ms-auto">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="ti ti-search"></i></span>
                      <input type="text" id="custom-search" class="form-control" placeholder="Cari..." aria-label="Cari..." />
                    </div>
                  </div>
                </div>
            </div>
            <table class="dt-multilingual table display nowarp" id="get-data">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Pembeli</th>
                        <th>Barang</th>
                        <th>Qty</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('pages.users.offcanvas-adduser')
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian</h5> <span class="text-muted" id="transactionDate"> 23-23-2023</span>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <table>
            <tr>
                <td>Nama</td>
                <td>&nbsp;:&nbsp;</td>
                <td id="buyerName">-</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>&nbsp;:&nbsp;</td>
                <td id="buyerAddres">-</td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>&nbsp;:&nbsp;</td>
                <td id="buyerPhone">-</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>&nbsp;:&nbsp;</td>
                <td id="buyerEmail">-</td>
            </tr>
          </table>
          <hr class="mb-0">
          <table class="w-100">
            <thead class="mb-2">
                <tr>
                    <td>Nama</td>
                    <td>Quantity</td>
                    <td>Berat</td>
                    <td>Harga /g</td>
                    <td class="text-end">Total</td>
                </tr>
                <tr>
                    <td colspan="5" class="mt-0">
                        <hr class="mt-0">
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="productName">Cincin</td>
                    <td id="qty">2</td>
                    <td id="productWeight">2g</td>
                    <td id="perGram">23092</td>
                    <td id="grandTotal" class="text-end">2132130</td>
                </tr>
            </tbody>
          </table>
          <hr>
          <table class="w-100">
            <tr>
                <td></td>
                <td></td>
                <td id="grandTotal2" class="text-end">2132130</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/tables/datatable/responsive.dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/tables/datatable/rowReorder.dataTables.min.css') }}" />
<style>
    @media screen and (max-width: 767px){
        #get-data_filter label input{
            min-width:232px!important;
            max-width:341px!important;
        }
        #get-data_length select{
            min-width:186px!important;
            max-width:296px!important;
        }
    }
</style>
@endsection

@section('scripts')
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/tables/datatable/dataTables.responsive.min.js') }}"></script>

<script>
    $(function() {
        var table = $('#get-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('transaction-datatable') !!}',
            columns: [
                { data: 'transaction_date' },
                { data: 'buyer_name' },
                { data: 'product_name' },
                { data: 'qty' },
                { 
                    data: 'grand_total',
                    render: function(grand_total) {
                        const roundedGrandTotal = parseFloat(grand_total).toFixed(2);
                        // Format the rounded grand total with commas for thousands
                        const formattedGrandTotal = parseFloat(roundedGrandTotal).toLocaleString();
                        return 'Rp '+formattedGrandTotal
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-primary btn-sm detail-data" style="display: inline-block;" data-id="' + id + '" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</button>';
                    },
                },
            ],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });

        $('#get-data').on('click', '.detail-data', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('transaction-detail', ':id') }}'.replace(':id', id),
                type: 'GET',
                statusCode:{
                    200:function(response) {
                        $('#buyerName').text(response.data.buyer_name);
                        $('#buyerAddress').text(response.data.buyer_address);
                        $('#buyerPhone').text(response.data.buyer_phone);
                        $('#buyerEmail').text(response.data.buyer_email);
                        
                        $('#productName').text(response.data.product_name);
                        $('#qty').text(response.data.qty);
                        $('#perGram').text('Rp '+parseFloat(response.data.gold_price).toLocaleString());
                        $('#productWeight').text(response.data.product_weight+'('+response.data.product_unit+')');
                        
                        const roundedGrandTotal = parseFloat(response.data.grand_total).toFixed(2);
                        // Format the rounded grand total with commas for thousands
                        const formattedGrandTotal = parseFloat(roundedGrandTotal).toLocaleString();

                        // Update the grand total in the HTML element
                        $('#grandTotal').text('Rp '+formattedGrandTotal);
                        $('#grandTotal2').text('Rp '+formattedGrandTotal);
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