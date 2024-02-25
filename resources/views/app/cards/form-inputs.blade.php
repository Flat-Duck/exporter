@php $editing = isset($card) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="status"
            label="Status"
            :value="old('status', ($editing ? $card->status : ''))"
            maxlength="255"
            placeholder="Status"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="issued_at"
            label="Issued At"
            value="{{ old('issued_at', ($editing ? optional($card->issued_at)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="expires_at"
            label="Expires At"
            value="{{ old('expires_at', ($editing ? optional($card->expires_at)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="exporter_id" label="Exporter" required>
            @php $selected = old('exporter_id', ($editing ? $card->exporter_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Exporter</option>
            @foreach($exporters as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
