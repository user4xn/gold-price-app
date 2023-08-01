@foreach($product as $item)
<!-- Modal -->
<div class="modal fade" id="basicModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-0">
          <div class="d-flex flex-column">
            <div class="text-center mb-3">
              <img class="border rounded" src="{{ $item->product_images }}" style="width: 100%; height:400px; object-fit:cover" alt="">
            </div>
            <div class="col">
              <h5>{{ $item->product_name != '' ? $item->product_name : '-' }}</h5>
              <div>Jenis: {{ $item->product_type != '' ? $item->product_type : '-' }}</div>
              <div>Kategori: {{ $item->product_category != '' ? $item->product_category : '-' }}</div>
              <div>Kadar: {{ $item->gold_rate != '' ? $item->gold_rate : '-' }}</div>
              <div>Berat: {{ $item->product_weight != '' ? $item->product_weight.'('.$item->product_unit.')' : '-' }}</div>
              <div>Ring Size: {{ $item->ring_size != '' ? $item->ring_size : '-' }}</div>
              <div>Stock: {{ $item->stock != '' ? $item->stock : '-' }}</div>
              <br>Keterangan Lainnya: <br>
              <div>Batu: {{ $item->stone_type != '' ? $item->stone_type : '-' }}</div>
              <div>Berat Batu: {{ $item->stone_weight != '' ? $item->stone_weight : '-' }}</div>
              <hr>
              <div class="text-center text-primary fw-bold h3">Rp {{ $item->product_price != '' ? number_format($item->product_price,2) : '-' }}</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary buyButton" data-product-id="{{ $item->id }}" data-bs-dismiss="modal">Beli</button>
        </div>
      </div>
    </div>
</div>
@endforeach