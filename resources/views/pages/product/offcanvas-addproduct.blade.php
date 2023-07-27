<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddProduct" aria-labelledby="offcanvasAddProductLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasAddProductLabel" class="offcanvas-title">Add Produk</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
    <form id="addProductForm" method="POST" action="{{ route('product-store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="form-label" for="productName">Nama Produk</label>
        <input type="text" id="productNameAdd" class="form-control" placeholder="Nama Produk" aria-label="Nama Produk" name="productName" required />
      </div>
      <div class="mb-3 text-center">
        <img id="productImagePreviewAdd" style="width:200px; height:200px; object-fit:cover" src="https://static.vecteezy.com/system/resources/previews/004/141/669/original/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" alt="">
        <div class="text-muted mt-1">
          (200x200)
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="productImage">Upload Foto Produk</label>
        <input type="file" id="productImageAdd" class="form-control" name="productImage" required />
        <span class="text-muted ms-2">*upload untuk mengganti foto</span>
      </div>
      <div class="mb-3">
        <label class="form-label" for="productUnit">Satuan Produk</label>
        <select name="productUnit" id="productUnitAdd" class="form-control" required>
          <option value="">Pilih Unit</option>
          <option value="g">Gram (g)</option>
          <option value="kg">Kilogram (kg)</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="productWeight">Berat Produk</label>
        <input type="number" id="productWeightAdd" class="form-control" placeholder="Berat Produk" name="productWeight" required />
      </div>
      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>