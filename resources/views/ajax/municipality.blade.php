<div class="col-sm-12 col-lg-6 set_municipality">
    <div class="mb-3">
        <div class="mb-2 fw-bold">Укажите муниципалитет *</div>
        <select required name="municipality" class="form-select">
            <option value="">Выберите</option>
            @foreach($muns as $mun)
                <option value="{{ $mun->municipality }}">{{ $mun->municipality }}</option>
            @endforeach
        </select>
    </div>
</div>
