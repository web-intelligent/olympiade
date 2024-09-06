<div class="col-sm-12 col-lg-6 set_region">
    <div class="mb-3">
        <div class="mb-2 fw-bold">Укажите субъект РФ *</div>
        <select required name="region" class="form-select">
            <option value="">Выберите</option>
            @foreach($regions as $region)
                <option value="{{ $region->region }}">{{ $region->region }}</option>
            @endforeach
        </select>
    </div>
</div>
