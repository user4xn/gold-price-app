<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetailProduct" aria-labelledby="offcanvasDetailProductLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasDetailProductLabel" class="offcanvas-title">Detail Produk</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
    <!-- Add a loading spinner here with the class "loading-spinner" -->
    <div class="loading-spinner" style="display: block;">
      <div class="spinner"></div>
    </div>
    <form id="updateProductForm" method="POST" action="#" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="PUT">  
      <div class="mb-3">
        <label class="form-label" for="productName">Nama Produk</label>
        <input type="text" id="productName" class="form-control" placeholder="Nama Produk" aria-label="Nama Produk" name="productName" required />
      </div>
      <div class="mb-3 text-center">
        <img id="productImagePreview" style="width:200px; height:200px; object-fit:cover" src="https://static.vecteezy.com/system/resources/previews/004/141/669/original/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" alt="">
        <div class="text-muted mt-1">
          (200x200)
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="productImage">Upload Foto Produk</label>
        <input type="file" id="productImage" class="form-control" name="productImage" required />
        <span class="text-muted ms-2">*upload untuk mengganti foto</span>
      </div>
      <div class="mb-3">
        <label class="form-label" for="productUnit">Satuan Produk</label>
        <select name="productUnit" id="productUnit" class="form-control" required>
          <option value="">Pilih Unit</option>
          <option value="g">Gram (g)</option>
          <option value="kg">Kilogram (kg)</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="productWeight">Berat Produk</label>
        <input type="number" id="productWeight" class="form-control" placeholder="Berat Produk" name="productWeight" required />
      </div>
      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>

<style>
/* Add CSS for the loading spinner */
.loading-spinner {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #fff; /* Set a solid background color for the spinner */
  z-index: 9999; /* Set a high z-index to show the spinner on top of other elements */
}

.loading-spinner .spinner {
  border: 4px solid rgba(0, 0, 0, 0.3);
  border-top: 4px solid #8f8f8f;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 1.5s linear infinite;
  position: absolute;
  top: 45%;
  left: 45%;
  transform: translate(-50%, -50%);
}

/* Keyframes animation for the spinner */
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>