<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <title>Custom Order - Guest</title>
    
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
                <img style="height: 50px;" src="https://www.emas-nu.com/ibank-v2/img/logo_emas_nu_landscape.webp" alt="logo_image">
              </span>
              <div class="w-50 text-end d-none d-md-block">
                Temukan Kekilauan Emas Berkualitas, Pesanan Kustom yang Sesuai Kebutuhan!
              </div>
            </div>
            <div class="d-flex col-12 col-lg-12 p-4">
              <div class="mx-auto row d-flex justify-content-center w-100">
                <div class="text-center fs-4 mb-4">
                  <span class="fw-bold">Form</span> <span class="fw-thin"> Custom Order</span>
                </div>
                <div class="row border rounded-0 rounded-top px-0 bs-stepper wizard-icons wizard-icons-example border-bottom-0">
                  <div class="bs-stepper-header m-auto border-0 py-4">
                    <div class="step active" id="step1">
                      <button type="button" class="step-trigger" aria-selected="true">
                        <span class="bs-stepper-icon">
                          <svg viewBox="0 0 58 54">
                            <use xlink:href="../../assets/svg/icons/wizard-checkout-cart.svg#wizardCart"></use>
                          </svg>
                        </span>
                        <span class="bs-stepper-label">Buat Pesanan</span>
                      </button>
                    </div>
                    <div class="line">
                      <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" id="step2">
                      <button type="button" class="step-trigger" aria-selected="false">
                        <span class="bs-stepper-icon">
                          <svg viewBox="0 0 54 54">
                            <use xlink:href="../../assets/svg/icons/wizard-checkout-address.svg#wizardCheckoutAddress"></use>
                          </svg>
                        </span>
                        <span class="bs-stepper-label">Isi Data Diri</span>
                      </button>
                    </div>
                    <div class="line">
                      <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" id="step3">
                      <button type="button" class="step-trigger" aria-selected="false">
                        <span class="bs-stepper-icon">
                          <svg viewBox="0 0 58 54">
                            <use xlink:href="../../assets/svg/icons/wizard-checkout-confirmation.svg#wizardConfirm"></use>
                          </svg>
                        </span>
                        <span class="bs-stepper-label">Konfirmasi Hitung</span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card col-12 py-4 px-3 rounded-0 rounded-bottom border">
                  <form id="customOrderForm" action="{{ route('transaction-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="form-gold" class="d-block">
                      <h5 class="">Buat Pesanan</h5>
                      
                      <div class="row">
                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="jenis">Jenis</label>
                          <select name="jenis" id="jenis" class="form-control">
                            <option value="">Pilih Jenis</option>
                            <option value="Cincin Kawin">Cincin Kawin</option>
                            <option value="Cincin">Cincin</option>
                            <option value="Gelang">Gelang</option>
                            <option value="Kalung">Kalung</option>
                            <option value="Giwang/Anting">Giwang/Anting</option>
                            <option value="Liontin">Liontin</option>
                            <option value="Pin">Pin</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="kadar">Kadar</label>
                          <select name="kadar" id="kadar" class="form-control">
                            <option value="">Pilih Kadar</option>
                            @foreach ($gold_rate as $rate)
                            <option value="{{$rate->rate}}" data-karat="{{$rate->carat}}">{{$rate->carat}} - {{$rate->rate*100}}%</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="berat">Berat (Gram)</label>
                          <input type="number" class="form-control" name="berat" id="berat" placeholder="Masukan Berat..." min="1" max="100">
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="jumlah">Jumlah (Pcs)</label>
                          <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukan Jumlah...">
                        </div>
                      </div>

                      <h5 class="mt-5">Keterangan Lainnya</h5>

                      <div class="row">
                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="ukuran">Ukuran (Cm)</label>
                          <input type="number" class="form-control" name="ukuran" id="ukuran" placeholder="Masukan Ukuran (cm)...">
                        </div>
                      
                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="jenisBatu">Jenis Batu</label>
                          <input type="text" class="form-control" name="jenisBatu" id="jenisBatu" placeholder="Masukan Jenis Batu...">
                        </div>
                    
                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="beratBatu">Berat Batu (Gram)</label>
                          <input type="number" class="form-control" name="beratBatu" id="beratBatu" placeholder="Masukan Berat Batu..." min="1" max="100">
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="grafirNama">Grafir Nama (Opsional)</label>
                          <input type="text" class="form-control" name="grafirNama" id="grafirNama" placeholder="Masukan Grafir Nama...">
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                          <label for="finishingWarna">Finishing Warna</label>
                          <select name="finishingWarna" id="finishingWarna" class="form-control">
                            <option value="">Pilih Finishing</option>
                            <option value="Kuning 24">Kuning 24</option>
                            <option value="Kuning 22">Kuning 22</option>
                            <option value="Rose Gold">Rose Gold</option>
                            <option value="Putih">Putih</option>
                            <option value="Black/Navi">Black/Navi</option>
                          </select>
                        </div>
                      </div>

                      <h5 class="mt-5">File Pendukung</h5>

                      <div class="row">
                        <div class="col-md-12 mb-2">
                          <label for="contohGambar">Contoh Gambar</label>
                          <input type="file" class="form-control" name="contohGambar" id="contohGambar">
                        </div>
                      </div>
                    </div>

                    <div id="form-person" class="d-none">
                      <h5 class="">Isi Data Diri</h5>
                      
                      <div class="row">
                        <div class="col-md-12 mb-2">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama...">
                        </div>

                        <div class="col-md-6 mb-2">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email...">
                        </div>

                        <div class="col-md-6 mb-2">
                          <label for="noHp">No Whatsapp</label>
                          <input type="number" class="form-control" name="noHp" id="noHp" placeholder="Masukan No Whatsapp...">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="alamat">Alamat</label>
                          <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukan Alamat..."></textarea>
                        </div>
                      </div>
                    </div>

                    <div id="form-checkout" class="d-none">
                      <h5 class="">Konfirmasi Hitung</h5>
                      
                      <div class="row">
                        <div class="col">
                          <h6 class="mb-0">Harga Emas Hari Ini (g)</h6>
                          <small id="liveDate"></small>
                        </div>
                        <div class="col text-end">
                          <h3 class="text-success fw-bold" id="livePrice">998.348</h3>
                        </div>
                      </div>
                      <br>
                      <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Nota Transaksi</h4>
                            <img id="checkImage" src="https://static.vecteezy.com/system/resources/previews/004/141/669/original/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" alt="Contoh Gambar" class="rounded border" style="height: 100px; width:100px; cursor: pointer; object-fit: cover" data-bs-toggle="modal" data-bs-target="#previewModal">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <table class="w-100">
                            <tr>
                              <td style="width:200px">Nama</td>
                              <td class="w-50 text-start">&nbsp;:&nbsp;</td>
                              <td id="checkNama" class="text-end">-</td>
                            </tr>
                            <tr>
                              <td style="2"width:0px">Alamat</td>
                              <td class="w-50 text-start">&nbsp;:&nbsp;</td>
                              <td id="checkAlamat" class="text-end">-</td>
                            </tr>
                            <tr>
                              <td style="width:200px">No Telepon</td>
                              <td class="w-50 text-start">&nbsp;:&nbsp;</td>
                              <td id="checkNoHp" class="text-end">-</td>
                            </tr>
                            <tr>
                              <td style=""width:00px">Email</td>
                              <td class="w-50 text-start">&nbsp;:&nbsp;</td>
                              <td id="checkEmail" class="text-end">-</td>
                            </tr>
                          </table>
                          <hr class="mb-0">
                          <table class="w-100">
                            <thead class="mb-2">
                                <tr>
                                  <td>Jenis</td>
                                  <td>Kadar</td>
                                  <td>Berat</td>
                                  <td>Jumlah</td>
                                  <td>Ukuran</td>
                                  <td class="text-end">Total</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="mt-0">
                                        <hr class="mt-0">
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td id="checkJenis">-</td>
                                  <td id="checkKadar">-</td>
                                  <td id="checkBerat">-</td>
                                  <td id="checkJumlah">-</td>
                                  <td id="checkUkuran">-</td>
                                  <td id="checkTotal" class="text-end">-</td>
                                </tr>
                            </tbody>
                          </table>
                          <hr>
                          Keterangan Tambahan : <br><br>
                          <table class="w-100">
                            <tr>
                              <td style="width: 200px">Jenis Batu</td>
                              <td class="w-50" id="checkJenisBatu">-</td>
                              <td class="text-end" id="checkPriceJenisBatu"> - </td>
                            </tr>
                            <tr>
                              <td style="width: 200px">Berat Batu (Carat)</td>
                              <td class="w-50" id="checkBeratBatu">-</td>
                              <td class="text-end" id="checkPriceBeratBatu"> - </td>
                            </tr>
                            <tr>
                              <td style="width: 200px">Grafir Nama</td>
                              <td class="w-50" id="checkGrafirNama">-</td>
                              <td class="text-end" id="checkPriceGrafirNama"> - </td>
                            </tr>
                            <tr>
                              <td style="width: 200px">Finishing Warna</td>
                              <td class="w-50" id="checkFinishingWarna">-</td>
                              <td class="text-end" id="checkPriceFinishingWarna"> - </td>
                            </tr>
                            <tr>
                              <td style="width: 200px">Biaya Admin</td>
                              <td></td>
                              <td class="text-end" id="checkPriceBiayaAdmin"> - </td>
                            </tr>
                          </table>
                          <hr>
                          <table class="w-100">
                            <tr>
                              <td class="text-start">Grand Total</td>
                              <td></td>
                              <td id="grandTotal" class="text-end">-</td>
                            </tr>
                          </table>

                          <div class="row mb-3 mt-3">
                            <span class="mb-4">Pilih Pembayaran</span>
                            <div class="col-md mb-md-0 mb-2">
                              <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="customRadioAddress1">
                                  <input name="pembayaran" class="form-check-input" type="radio" value="" id="customRadioAddress1" checked="">
                                  <span class="custom-option-header">
                                    <span class="fw-medium mb-0">Saldo EmasNu</span>
                                  </span>
                                </label>
                              </div>
                            </div>
                            <div class="col-md">
                              <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioAddress2">
                                  <input name="pembayaran" class="form-check-input" type="radio" value="" id="customRadioAddress2">
                                  <span class="custom-option-header">
                                    <span class="fw-medium mb-0">Cash</span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="btn btn-secondary w-100 mb-2" id="btnPrev">Kembali</div>
                      </div>
                      <div class="col-md-6">
                        <div class="btn btn-primary w-100 mb-2" id="btnNext">Selanjutnya</div>
                      </div>
                    </div>
                    <div class="alert bg-primary mt-5 text-white py-4">
                      <ul class="m-0">
                        <li>Kami Akan memberikan penawaran setelah 1 x 24 jam dari pengajuan formulir ini kami terima</li>
                        <li>Penawaran akan kami kirimkan melalui WA dan bisa langsung berdiskusi dengan team tukang emas</li>			
                        <li>Penawaran Berlaku 1 x 24 jam bila lewat dari waktu tsb maka anda wajib mengisi form custom emas kembali</li>
                        <li>Pembayaran dibayarkan full 100% setelah desain dan harga disepakati</li>
                        <li>Waktu pembuatan akan di konfirmasi oleh team tukang emas</li>
                      </ul>
                    </div>

                    {{-- HIDDEN INPUT --}}
                    <input type="hidden" name="grandTotal" id="inputGrandTotal">
                    <input type="hidden" name="jsonData" id="jsonData">
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pt-1">
            <img id="checkImagePreview" src="https://static.vecteezy.com/system/resources/previews/004/141/669/original/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" alt="" class="rounded border w-100">
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
      let form = [
        'form-gold',
        'form-person',
        'form-checkout',
      ];

      let pos = 0;
      let dataPriceGlobal;
      let livePriceGlobal;

      let goldRate = {!! json_encode($gold_rate) !!};
      
      function updateLivePrice() {
        $.ajax({
          url: '{!! route('gold-price') !!}', 
          method: 'GET', 
          success: function(response) {
            
            let price = response.data.items[0].xauPrice;
            let timestamp = response.data.date;
            let livePrice = price/31.103;
            
            livePriceGlobal = livePrice; 
            dataPriceGlobal = response.data;
            
            livePrice = livePrice.toFixed(2);
            
            let formattedLivePrice = parseFloat(livePrice).toLocaleString();

            $('#livePrice').text(formattedLivePrice)
            $('#liveDate').text(timestamp);
            $('#jsonData').val(JSON.stringify(dataPriceGlobal));
          },
          error: function() {
            $('#livePrice').text('Error');
          }
        });
      }

      $(function(){
        updateLivePrice();

        $('#contohGambar').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                var previewImg = $('#checkImage');
                var previewImgModal = $('#checkImagePreview');
                previewImg.attr('src', reader.result);
                previewImgModal.attr('src', reader.result);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            }
        });

        $('#btnPrev').on('click', function() {
          if(pos != 0) {
            $('#'+form[pos]).addClass('d-none');
            $('#'+form[pos-1]).removeClass('d-none');
            pos = pos-1;

            if(pos != (form.length - 1)) {
              $('#btnNext').text('Selanjutnya');
            }

            console.log(pos);

            $('#step'+(pos+2)).removeClass('active');
            $('#step'+(pos+1)).addClass('active');
          }
        });

        $('#btnNext').on('click', function() {
          if(pos < (form.length - 1)) {
            $('#'+form[pos]).addClass('d-none');
            $('#'+form[pos+1]).removeClass('d-none');
            pos = pos+1;

            if(pos == (form.length - 1)) {
              $('#btnNext').text('Submit');

              var searchResult = goldRate.find(function(item) {
                return item.rate === $('#kadar').val();
              });

              var caratValue = searchResult ? searchResult.carat : null;
              var rateValue = searchResult ? searchResult.rate : null;

              $('#checkNama').text($('#nama').val());
              $('#checkNoHp').text($('#noHp').val());
              $('#checkEmail').text($('#email').val());
              $('#checkAlamat').text($('#alamat').val());
            
              $('#checkJenis').text($('#jenis').val());
              $('#checkKadar').text(caratValue+' ('+(rateValue*100)+'%)');
              $('#checkBerat').text($('#berat').val()+' Gram');
              $('#checkJumlah').text($('#jumlah').val());
              $('#checkUkuran').text($('#ukuran').val()+' cm');
              $('#checkJenisBatu').text($('#jenisBatu').val());
              $('#checkBeratBatu').text($('#beratBatu').val());
              $('#checkGrafirNama').text($('#grafirNama').val());
              $('#checkFinishingWarna').text($('#finishingWarna').val());

              let berat = $('#berat').val();
              let jumlah = $('#jumlah').val();
              let kadar = parseFloat($('#kadar').val()) + 0.05;
              let admin = 800000.00;
              console.log(kadar);

              let total = (berat * livePriceGlobal.toFixed(2));
              
              total = total * kadar;
              
              total = total * jumlah;

              $('#checkTotal').text("Rp "+parseFloat(total).toLocaleString());
              
              total = total + (admin*jumlah);

              total = total.toFixed(2);
              $('#inputGrandTotal').val(total);
              
              // Format the livePrice with commas for thousands
              let formattedLivePrice = parseFloat(total).toLocaleString();
              let formattedAdminPrice = parseFloat(admin*jumlah).toLocaleString();

              $('#checkPriceBiayaAdmin').text("Rp "+formattedAdminPrice);
              $('#grandTotal').text("Rp "+formattedLivePrice);
            }

            console.log(pos);

            $('#step'+(pos)).removeClass('active');
            $('#step'+(pos+1)).addClass('active');
          } else if(pos == (form.length - 1)) {
            $('#customOrderForm').submit();
          }
        });

      });
    </script>
</body>

</html>