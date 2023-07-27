@extends('layouts.app')
@section('title')
Data User
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
            <h5 class="align-self-center m-0">Data User</h5>
            <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" class="btn btn-primary ms-auto"><i class="fa fa-plus"></i> &NonBreakingSpace;Tambah User</button>
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
            <table class="dt-multilingual table display nowarp" id="get-user">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('pages.users.offcanvas-adduser')
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
        #get-user_filter label input{
            min-width:232px!important;
            max-width:341px!important;
        }
        #get-user_length select{
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
        var table = $('#get-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get-users') !!}',
            columns: [
                { data: 'full_name' },
                { data: 'email' },
                {
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-danger btn-sm delete-post" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });

        $('#get-user').on('click', '.delete-post', function() {
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
                        url: '{{ route('delete-user', ':id') }}'.replace(':id', id),
                        type: 'POST',
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
                                    $('#get-user').DataTable().ajax.reload();
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

        $('#get-user_length, #get-user_filter').addClass('d-none');

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