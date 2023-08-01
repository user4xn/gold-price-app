<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <title>Transaction - Guest</title>
    
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
                  <form action="/" class="w-75 mb-3">
                    <input type="text" name="search" value="{{ $search }}" class="form-control rounded-pill" placeholder="Cari...">
                  </form> 
                  <div class="ps-4 ms-2 mb-3">
                    @if($search)
                    Menampilkan hasil pencarian <span class="border-bottom border-primary">{{ $search }}</span>, <a href="{{route('guest')}}">Reset</a>
                    @endif
                  </div>
                  <div class="row mx-n2 mx-sm-n3">
                    <a href="{{ route('custom-order') }}" class="col-6 col-xl-2 col-lg-3 col-md-4 px-2 px-sm-3 mb-3 mb-sm-5" id="customOrderButton">
                      <!-- Product -->
                      <div class="card text-center h-100 border border-5 border-primary d-flex justify-content-center bg-none" style="border-style: dashed !important; transition: background-color 0.3s; min-height:371px">
                        <div id="text" class="fw-bold">
                          CUSTOM ORDER
                        </div>
                      </div>
                      <!-- End Product -->
                    </a>  
                    @foreach ($product as $item)
                    <!-- Products -->
                    <div class="col-6 col-xl-2 col-lg-3 col-md-4 px-2 px-sm-3 mb-3 mb-sm-5">
                      <!-- Product -->
                      <div class="card text-center h-100">
                        <div class="position-relative w-100 h-100">
                          <img class="card-img-top border-bottom h-100" src="{{ $item->product_images }}" alt="{{ $item->product_name }}" style="object-fit: cover">
                        </div>

                        <div class="card-body pt-2 px-4 pb-0" style="min-height: 100px">
                          <div class="mb-2 d-flex flex-column justify-content-between h-100">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">{{ $item->product_name }}</a>
                            <div class="d-block font-size-1 mb-3">
                              <span class="font-weight-medium">Rp {{number_format($item->product_price,2)}}</span>
                            </div>
                          </div>
                        </div>

                        
                        <div id="detail-{{ $item->id }}" data-product-id="{{ $item->id }}" class="card-footer btn btn-outline-primary w-100 border-0 py-2 px-4 border-top text-center" data-bs-toggle="modal" data-bs-target="#basicModal{{ $item->id }}">
                            Detail
                        </div>
                      </div>
                      <!-- End Product -->
                    </div>
                    <!-- End Products -->
                    @endforeach
                    <!-- Products -->                  
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 mb-4 me-4 d-none" id="cartArea">
        <button type="button" class="btn btn-primary btn-lg" id="checkoutButton">
            <i class="ti ti-shopping-cart"></i>&nbsp; Keranjang &nbsp;(<span id="cartCount">0</span>)
        </button>
    </div>
    
    @include('pages.transaction.product-modal')

    <style>
      #customOrderButton:hover .card {
        background-color: rgba(115, 103, 240, 0.5);
      }
    </style>

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
      var selectedProductIds = []; // Array to store the selected product IDs
      
      function removeCart(id) {
          var index = selectedProductIds.indexOf(id);
          if (index !== -1) {
              selectedProductIds.splice(index, 1); // Remove the product ID from the array
              console.log(selectedProductIds); // Print the array for demonstration
              var detailButton = document.getElementById('detail-' + id);

              detailButton.classList.remove('btn-primary');
              detailButton.classList.add('btn-outline-primary');
              detailButton.textContent = 'Detail';
              detailButton.setAttribute('data-bs-toggle', 'modal');
              detailButton.setAttribute('data-bs-target', '#basicModal' + id);
              detailButton.removeAttribute('onclick');
              
              document.getElementById('cartCount').textContent = selectedProductIds.length;
              document.getElementById('cartArea').classList.add('d-none');
          }

          console.log(selectedProductIds);
      }

      $(function(){
        // Click event handler for the "Beli" button
        $('.buyButton').on('click', function() {
          var productId = $(this).data('product-id');
          if (!selectedProductIds.includes(productId)) {
            selectedProductIds.push(productId);
            console.log(selectedProductIds); // Print the array for demonstration
          }

          console.log(selectedProductIds.length); //why undefined ?
          $('#cartCount').text(selectedProductIds.length);
          var area = $('#cartArea');
          
          if(selectedProductIds.length > 0){
            area.removeClass('d-none');
          }

          $('#detail-'+productId).removeClass('btn-outline-primary');
          $('#detail-'+productId).addClass('btn-primary');
          $('#detail-'+productId).text('Batal');
          $('#detail-'+productId).removeAttr('data-bs-toggle');
          $('#detail-'+productId).removeAttr('data-bs-target');
          $('#detail-'+productId).attr('onclick', 'removeCart('+productId+')');
        });
        
        $('#checkoutButton').on('click', function() {
            if (selectedProductIds.length > 0) {
                // Assuming you have a route named "checkout" in Laravel, generate the URL using the route function
                var checkoutUrl = '{{ route("checkout") }}';
                checkoutUrl += '?product_ids=' + selectedProductIds.join(',');
                // Redirect to the checkout page
                window.location.href = checkoutUrl;
            }
        });
      });
    </script>
</body>

</html>