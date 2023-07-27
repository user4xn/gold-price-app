<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Transaction - Guest</title>
    
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/e-ArsipDigital-Ori.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <div class="d-flex col-12 col-lg-12 justify-content-center flex-row align-items-center">
              <span>
                <img style="height: 50px; width:50px" src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Ethereum-ETH-icon.png" alt="logo_image">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder" style="font-size: 17px!important;  font-family: 'Montserrat', sans-serif!important;">Gold Price</span>
            </div>
            <div class="d-flex col-12 col-lg-12 p-sm-5 p-4">
                <div class="mx-auto">
                  
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Info Personal</span>
                            <span class="bs-stepper-subtitle">Isi Data Diri </span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Produk</span>
                            <span class="bs-stepper-subtitle">Pilih Produk</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Hitung Harga</span>
                            <span class="bs-stepper-subtitle">Berdasar harga pasar</span>
                          </span>
                        </button>
                      </div>
                    </div>
                  
                    <div class="bs-stepper-content">
                      <form onSubmit="return false">
                        <!-- Account Details -->
                        <div id="account-details" class="content">
                          <div class="row g-3">
                            <div class="col-md-12">
                              <label class="form-label" for="buyerName">Nama</label>
                              <input type="text" id="buyerName" name="buyerName" class="form-control" placeholder="Nama..." required/>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label" for="buyerEmail">Email</label>
                              <input type="email" id="buyerEmail" name="buyerEmail" class="form-control" placeholder="Email..." required/>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label" for="buyerPhone">Nomor Telepon</label>
                              <input type="text" id="buyerPhone" name="buyerPhone" class="form-control" placeholder="Nomor Telepon..." required/>
                            </div>
                            <div class="col-md-12">
                              <label class="form-label" for="buyerAddress">Alamat</label>
                              <textarea name="buyerAddress" id="buyerAddress" class="form-control" cols="30" rows="10" placeholder="Alamat..."></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right"></i></button>
                            </div>
                          </div>
                        </div>
                  
                        <div id="personal-info" class="content">
                          <div class="row g-3">
                            <div class="col-md-12">
                              <!-- Shopping bag -->
                              <h5>Produk Dipilih (<span id="countCart">0</span>)</h5>
                              <ul class="list-group mb-3" style="max-height: 400px; overflow-y:scroll">
                                @foreach ($product as $item)
                                <li class="list-group-item p-4">
                                  <div class="d-flex gap-3">
                                    <div class="flex-shrink-0 d-flex align-items-center">
                                      <img class="rounded" style="height: 150px; width:150px; object-fit:cover" src="{{ $item->product_images }}" alt="{{ $item->product_name }}" class="w-px-100">
                                    </div>
                                    <div class="flex-grow-1">
                                      <div class="row">
                                        <div class="col-md-8">
                                          <p class="me-3">
                                            <a href="javascript:void(0)" class="text-body">{{ $item->product_name }}</a>
                                          </p>
                                          <div class="text-muted mb-2 d-flex flex-wrap">
                                            <span class="me-1">Oleh:</span>
                                            <a href="javascript:void(0)" class="me-3">GoldPrice</a>
                                            <span class="badge bg-label-success">In Stock</span>
                                          </div>
                                          <input type="number" id="{{ $item->id.'-qty' }}" class="form-control form-control-sm w-px-75" value="1" min="1">
                                        </div>
                                        <div class="col-md-4">
                                          <div class="text-md-end">
                                            <div class="mb-md-4 mb-md-5 mt-0">
                                              <span class="text-primary">{{ $item->product_weight }}({{ $item->product_unit }})</span>
                                            </div>
                                            <!-- Inside the loop -->
                                            <button type="button" data-product-id="{{ $item->id }}" class="btn btn-sm btn-label-secondary waves-effect add-to-cart-btn">
                                              Tambah
                                            </button>
                                            <button type="button" data-product-id="{{ $item->id }}" class="btn btn-sm btn-label-success waves-effect cancel-add-to-cart-btn d-none">
                                              Ditambahkan
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                @endforeach
                              </ul>
                            </div>

                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right"></i></button>
                            </div>
                          </div>
                        </div>
                  
                        <div id="social-links" class="content">
                          <div class="content-header mb-3">
                            <div class="row">
                              <div class="col">
                                <h6 class="mb-0">Harga Emas (g)</h6>
                                <small id="liveDate"></small>
                              </div>
                              <div class="col text-end">
                                <h3 class="text-success fw-bold" id="livePrice">998.348</h3>
                              </div>
                            </div>
                          </div>
                          <div class="row g-3">
                            <div class="col-md-12">
                              <table class="table table-borderless w-100">
                                <thead class="border-bottom">
                                  <th>Nama Produk</th>
                                  <th>Berat</th>
                                  <th>Qty</th>
                                  <th>Grand Total</th>
                                </thead>
                                <tbody id="cartTableBody">
                                  <tr>
                                    <th class="text-center" colspan="4">Loading...</th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
    <script>
      const wizardNumbered = document.querySelector(".wizard-numbered");
      let currentPage = 1;
      let selectedProducts = [];
      let livePriceGlobal = '';
      let formProduct = [];

      function getCartData(selectedProducts) {
        $('#responseJson').val(JSON.stringify(livePriceGlobal));
        $.ajax({
          url: '{!! route('transaction-cart') !!}', // Replace with the URL of your API endpoint
          method: 'GET', // Use the appropriate HTTP method for your API
          data: {
            payload: JSON.stringify(selectedProducts),
            response: JSON.stringify(livePriceGlobal)
          },
          success: function(response) {
            const cartTableBody = document.getElementById('cartTableBody');
            // Clear existing rows
            cartTableBody.innerHTML = '';

            // Iterate through the data array and create table rows for each item
            response.data.forEach(item => {
              const newRow = document.createElement('tr');
              const totalRounded = parseFloat(item.total_price).toFixed(2);
              // Format the number based on the user's locale
              const totalFormatted = parseFloat(totalRounded).toLocaleString();
              newRow.innerHTML = `
                <td>${item.product_name}</td>
                <td>${item.product_weight}(${item.product_unit})</td>
                <td>${item.qty}</td>
                <td>Rp ${totalFormatted}</td>
              `;
              cartTableBody.appendChild(newRow);

              // Push the object into the formProduct array using curly braces
              formProduct.push({
                productId: item.product_id,
                qty: item.qty,
                totalPrice: item.total_price,
              });

              console.log(formProduct);
            });
          },
          error: function() {
            // Handle the error, if any
            console.log(error)
          }
        });
      }

      if (typeof wizardNumbered !== undefined && wizardNumbered !== null) {
        const wizardNumberedBtnNextList = [].slice.call(wizardNumbered.querySelectorAll('.btn-next')),
          wizardNumberedBtnPrevList = [].slice.call(wizardNumbered.querySelectorAll('.btn-prev')),
          wizardNumberedBtnSubmit = wizardNumbered.querySelector('.btn-submit');

        const numberedStepper = new Stepper(wizardNumbered, {
          linear: false
        });
        if (wizardNumberedBtnNextList) {
          wizardNumberedBtnNextList.forEach(wizardNumberedBtnNext => {
            wizardNumberedBtnNext.addEventListener('click', event => {
              currentPage++;
              if(currentPage == 3) {
                getCartData(selectedProducts);
              }
              console.log(currentPage);
              numberedStepper.next();
            });
          });
        }
        if (wizardNumberedBtnPrevList) {
          wizardNumberedBtnPrevList.forEach(wizardNumberedBtnPrev => {
            wizardNumberedBtnPrev.addEventListener('click', event => {
              currentPage--;
              console.log(currentPage);
              numberedStepper.previous();
            });
          });
        }
        if (wizardNumberedBtnSubmit) {
          wizardNumberedBtnSubmit.addEventListener('click', event => {
            Swal.fire({
              title: 'Submit Belanja',
              text: 'Apakah Anda yakin ingin mengirimkan formulir?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Ya, kirimkan!',
              cancelButtonText: 'Batal',
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '{!! route('transaction-store') !!}',
                  method: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: {
                    buyerName: $('#buyerName').val(),
                    buyerPhone: $('#buyerPhone').val(),
                    buyerEmail: $('#buyerEmail').val(),
                    buyerAddress: $('#buyerAddress').val(),
                    responJson: livePriceGlobal,
                    products: formProduct
                  },
                  success: function (response) {
                    Swal.fire({
                      title: 'Success!',
                      text: 'Form submitted successfully!',
                      icon: 'success',
                      confirmButtonText: 'OK'
                    }).then(function(){
                      window.location.reload();
                    });
                  },
                  error: function (error) {
                    console.log(error);
                    Swal.fire({
                      title: 'Error!',
                      text: 'Error submitting form. Please try again.',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    });
                  }
                });
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User clicked "No," so do nothing
              }
            });
          });
        }
      }

      function updateLivePrice() {
        $.ajax({
          url: '{!! route('gold-price') !!}', // Replace with the URL of your API endpoint
          method: 'GET', // Use the appropriate HTTP method for your API
          success: function(response) {
            // Update the live price in the #livePrice element
            let price = response.data.items[0].xauPrice;
            let timestamp = response.data.date;
            let livePrice = price/31.103;

            livePrice = livePrice.toFixed(2);

            livePriceGlobal = response.data;

            // Format the livePrice with commas for thousands
            let formattedLivePrice = parseFloat(livePrice).toLocaleString();

            $('#livePrice').text(formattedLivePrice)
            $('#liveDate').text(timestamp);
          },
          error: function() {
            // Handle the error, if any
            $('#livePrice').text('Error fetching price');
          }
        });
      }

      $(document).ready(function() {
        updateLivePrice();

        $('.add-to-cart-btn').on('click', function() {

          let productId = $(this).data('product-id');
          let qty = parseInt($('#' + productId + '-qty').val());
        
          let productObj = {
            product_id: productId,
            qty: qty,
          };
        
          selectedProducts.push(productObj);      
          console.log(selectedProducts);
      
          $(this).addClass('d-none');
          $('.cancel-add-to-cart-btn[data-product-id="' + productId + '"]').removeClass('d-none');
          $('#countCart').html(selectedProducts.length)
          $('#' + productId + '-qty').attr('readonly', true);
        });

      
        $('.cancel-add-to-cart-btn').on('click', function() {
        
          let productId = $(this).data('product-id');

          selectedProducts = selectedProducts.filter(product => product.product_id !== productId);      
          console.log(selectedProducts);
        
          $(this).addClass('d-none');
          $('.add-to-cart-btn[data-product-id="' + productId + '"]').removeClass('d-none');
          $('#countCart').html(selectedProducts.length);
          $('#' + productId + '-qty').removeAttr('readonly');
        });
      });
    </script>
</body>

</html>