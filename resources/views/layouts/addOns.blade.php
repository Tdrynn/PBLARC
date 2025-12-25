<div class="container mt-4">
    <h3 class="fw-bold mb-3">+ Add-ons</h3>

    <div class="row row-cols-2 row-cols-md-3 g-3">

        @foreach ($addons as $addon)
            <div class="col">
                <div class="p-3 rounded-4 shadow-sm text-center bg-white">

                    <h6 class="fw-semibold mb-1">{{ $addon->name }}</h6>
                    <p class="text-muted mb-2">
                        IDR {{ number_format($addon->price / 1000) }}K
                    </p>

                    <div class="d-flex justify-content-center align-items-center gap-2 mt-2">

                        <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                            data-target="addon-{{ $addon->id }}">
                            −
                        </button>

                        <input type="number" name="addons[{{ $addon->id }}]" id="addon-{{ $addon->id }}"
                            class="form-control form-control-sm text-center addon-input" value="0" min="0" max="{{ $addon->stock }}"
                            data-price="{{ $addon->price }}" style="width: 60px;">

                        <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                            data-target="addon-{{ $addon->id }}">
                            +
                        </button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>