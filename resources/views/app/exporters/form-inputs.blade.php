@php $editing = isset($exporter) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="first_name"
            label="First Name"
            :value="old('first_name', ($editing ? $exporter->first_name : ''))"
            maxlength="255"
            placeholder="First Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="last_name"
            label="Last Name"
            :value="old('last_name', ($editing ? $exporter->last_name : ''))"
            maxlength="255"
            placeholder="Last Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $exporter->phone : ''))"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nationality"
            label="Nationality"
            :value="old('nationality', ($editing ? $exporter->nationality : ''))"
            maxlength="255"
            placeholder="Nationality"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $exporter->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="license"
            label="License"
            :value="old('license', ($editing ? $exporter->license : ''))"
            maxlength="255"
            placeholder="License"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="commercial_book"
            label="Commercial Book"
            :value="old('commercial_book', ($editing ? $exporter->commercial_book : ''))"
            maxlength="255"
            placeholder="Commercial Book"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="commercial_room"
            label="Commercial Room"
            :value="old('commercial_room', ($editing ? $exporter->commercial_room : ''))"
            maxlength="255"
            placeholder="Commercial Room"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="block_time"
            label="Block Time"
            :value="old('block_time', ($editing ? $exporter->block_time : ''))"
            maxlength="255"
            placeholder="Block Time"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="block_reason"
            label="Block Reason"
            :value="old('block_reason', ($editing ? $exporter->block_reason : ''))"
            maxlength="255"
            placeholder="Block Reason"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $exporter->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
