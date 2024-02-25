@php $editing = isset($support) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $support->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="support_type_id" label="Support Type" required>
            @php $selected = old('support_type_id', ($editing ? $support->support_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Support Type</option>
            @foreach($supportTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="exporter_id" label="Exporter" required>
            @php $selected = old('exporter_id', ($editing ? $support->exporter_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Exporter</option>
            @foreach($exporters as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
