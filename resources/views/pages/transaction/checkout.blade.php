<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <title>Checkout - Guest</title>
    
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
</head>

<body>
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row m-0">
            <div class="sticky-top card py-4 d-flex col-12 col-lg-12 justify-content-between flex-row align-items-center px-5">
              <span>
                <img style="height: 50px; width:50px" src="https://www.emas-nu.com/ibank-v2/img/logo_emas_nu_landscape.webp" alt="logo_image">
              </span>
              <span class="demo menu-text fw-bolder ms-2 me-auto" style="font-size: 17px!important;  font-family: 'Montserrat', sans-serif!important;">Tukang Emas</span>
              <div class="w-50 text-end d-none d-md-block">
                Temukan Kekilauan Emas Berkualitas, Pesanan Kustom yang Sesuai Kebutuhan!
              </div>
            </div>
            <div class="d-flex col-12 col-lg-12 p-sm-5 p-4">
                <div class="mx-auto row d-flex justify-content-center w-100">
                  <div class="card col-md-12 py-3">
                    <form id="" onsubmit="return false">
                      <!-- Cart -->
                      <div id="checkout-cart" class="content fv-plugins-bootstrap5 fv-plugins-framework active dstepper-block">
                        <div class="row">
                          <!-- Cart left -->
                          <div class="col-xl-8 mb-3 mb-xl-0">
                            <ul class="list-group mb-3">
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
                                          <span class="me-1">Size:</span>
                                          <a href="javascript:void(0)" class="me-3">{{ $item->ring_size ? $item->ring_size.' cm' : '-' }}</a>
                                          <span class="badge bg-label-warning">Kadar {{ $item->gold_rate }}</span>
                                          <span class="badge bg-label-success ms-1">{{ $item->product_weight }}{{ $item->product_unit }}</span>
                                        </div>
                                        <div class="text-muted mb-2 d-flex flex-wrap">
                                          <span class="me-1">Jenis Batu:</span>
                                          <a href="javascript:void(0)" class="me-3">{{ $item->stone_type ? $item->stone_type : '-' }}</a>
                                        </div>
                                        <input type="number" id="{{ $item->id.'-qty' }}" class="form-control form-control-sm w-px-75" value="1" min="1" max="{{ $item->stock }}">
                                      </div>
                                      <div class="col-md-4">
                                        <div class="text-md-end">
                                          <div class="mb-md-4 mb-md-5 mt-0">
                                            <span class="text-primary">Rp {{ number_format($item->product_price,2) }}</span>
                                          </div>
                                        </div>
                                        <div class="text-md-end">
                                          <div class="mb-md-4 mb-md-5 mt-0">
                                            <span class="badge {{ $item->stock <= 10 ? 'bg-label-danger' : 'bg-label-secondary'}}">
                                              Tersisa : {{ $item->stock }}
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              @endforeach
                            </ul>
                          </div>
                
                          <!-- Cart right -->
                          <div class="col-xl-4">
                            <div class="border rounded p-4 mb-3 pb-3">
                              <!-- Offer -->
                              <h6>Offer</h6>
                              <div class="row g-3 mb-3">
                                <div class="col-8 col-xxl-8 col-xl-12">
                                  <input type="text" class="form-control" placeholder="Enter Promo Code" aria-label="Enter Promo Code">
                                </div>
                                <div class="col-4 col-xxl-4 col-xl-12">
                                  <div class="d-grid">
                                    <button type="button" class="btn btn-label-primary waves-effect">Apply</button>
                                  </div>
                                </div>
                              </div>
                
                              <!-- Gift wrap -->
                              <div class="bg-lighter rounded p-3">
                                <p class="fw-medium mb-2">Buying gift for a loved one?</p>
                                <p class="mb-2">Gift wrap and personalized message on card, Only for $2.</p>
                                <a href="javascript:void(0)" class="fw-medium">Add a gift wrap</a>
                              </div>
                              <hr class="mx-n4">
                
                              <!-- Price Details -->
                              <h6>Price Details</h6>
                              <dl class="row mb-0">
                                <dt class="col-6 fw-normal">Bag Total</dt>
                                <dd class="col-6 text-end">$1198.00</dd>
                
                                <dt class="col-sm-6 fw-normal">Coupon Discount</dt>
                                <dd class="col-sm-6 text-end"><a href="javascript:void(0)">Apply Coupon</a></dd>
                
                                <dt class="col-6 fw-normal">Order Total</dt>
                                <dd class="col-6 text-end">$1198.00</dd>
                
                                <dt class="col-6 fw-normal">Delivery Charges</dt>
                                <dd class="col-6 text-end"><s class="text-muted">$5.00</s> <span class="badge bg-label-success ms-1">Free</span></dd>
                              </dl>
                
                              <hr class="mx-n4">
                              <dl class="row mb-0">
                                <dt class="col-6">Total</dt>
                                <dd class="col-6 fw-medium text-end mb-0">$1198.00</dd>
                              </dl>
                            </div>
                            <div class="d-grid">
                              <button class="btn btn-primary btn-next waves-effect waves-light">Place Order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
      $(function(){
        
      });
    </script>
</body>

</html>