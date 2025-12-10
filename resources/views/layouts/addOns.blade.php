<div class="container p-0">
    <div class="justify-content-start align-items-center d-flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
            viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>
        <p class="fs-5 fw-semibold my-auto">Add-ons (optional)</p>
    </div>

    <p class="text-success text-center">Enter the amount if you want to rent, leave it blank if you don't want to rent.
    </p>

    <!-- START ADDONS -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <!-- 1. Flysheet -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Flysheet 3x3</h6>
                <p class="text-muted">IDR 25K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_1">−</button>
                    <input type="number" id="addon_1" name="addons[1]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_1">+</button>
                </div>
            </div>
        </div>

        <!-- 2. Small Stove -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Small Stove</h6>
                <p class="text-muted">IDR 10K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_2">−</button>
                    <input type="number" id="addon_2" name="addons[2]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_2">+</button>
                </div>
            </div>
        </div>

        <!-- 3. Regular Mat -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Regular Mat</h6>
                <p class="text-muted">IDR 10K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_3">−</button>
                    <input type="number" id="addon_3" name="addons[3]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_3">+</button>
                </div>
            </div>
        </div>

        <!-- 4. Portable Stove -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Portable Stove</h6>
                <p class="text-muted">IDR 15K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_4">−</button>
                    <input type="number" id="addon_4" name="addons[4]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_4">+</button>
                </div>
            </div>
        </div>

        <!-- 5. Sleeping Bag -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Sleeping Bag</h6>
                <p class="text-muted">IDR 15K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_5">−</button>
                    <input type="number" id="addon_5" name="addons[5]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_5">+</button>
                </div>
            </div>
        </div>

        <!-- 6. Grill Pan -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Grill Pan</h6>
                <p class="text-muted">IDR 15K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_6">−</button>
                    <input type="number" id="addon_6" name="addons[6]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_6">+</button>
                </div>
            </div>
        </div>

        <!-- 7. Folding Chair -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Folding Chair</h6>
                <p class="text-muted">IDR 15K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_7">−</button>
                    <input type="number" id="addon_7" name="addons[7]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_7">+</button>
                </div>
            </div>
        </div>

        <!-- 8. Nesting -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Nesting</h6>
                <p class="text-muted">IDR 15K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_8">−</button>
                    <input type="number" id="addon_8" name="addons[8]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_8">+</button>
                </div>
            </div>
        </div>

        <!-- 9. Folding Table -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Folding Table</h6>
                <p class="text-muted">IDR 20K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_9">−</button>
                    <input type="number" id="addon_9" name="addons[9]" class="form-control form-control-sm text-center"
                        value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_9">+</button>
                </div>
            </div>
        </div>

        <!-- 10. Tent Lamp -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Tent Lamp</h6>
                <p class="text-muted">IDR 10K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_10">−</button>
                    <input type="number" id="addon_10" name="addons[10]"
                        class="form-control form-control-sm text-center" value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_10">+</button>
                </div>
            </div>
        </div>

        <!-- 11. Hammock -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Hammock</h6>
                <p class="text-muted">IDR 15K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_11">−</button>
                    <input type="number" id="addon_11" name="addons[11]"
                        class="form-control form-control-sm text-center" value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_11">+</button>
                </div>
            </div>
        </div>

        <!-- 12. Portable Gas -->
        <div class="col">
            <div class="p-3 text-center">
                <h6 class="fw-semibold">Portable Gas</h6>
                <p class="text-muted">IDR 30K</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-success btn-sm minus-btn"
                        data-input="addon_12">−</button>
                    <input type="number" id="addon_12" name="addons[12]"
                        class="form-control form-control-sm text-center" value="0" min="0" style="width:60px;">
                    <button type="button" class="btn btn-outline-success btn-sm plus-btn"
                        data-input="addon_12">+</button>
                </div>
            </div>
        </div>

    </div>
    <!-- END ADDONS -->

</div>

<!-- SCRIPT -->
<script>
    document.querySelectorAll('.plus-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.input);
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.minus-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.input);
            input.value = Math.max(0, parseInt(input.value) - 1);
        });
    });
</script>