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