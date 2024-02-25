@extends('layouts.app', ['page' => 'cards'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('cards.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.cards.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.cards.inputs.status')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $card->status ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.cards.inputs.issued_at')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $card->issued_at ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.cards.inputs.expires_at')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $card->expires_at ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.cards.inputs.exporter_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($card->exporter)->first_name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a
                href="{{ route('cards.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Card::class)
            <a href="{{ route('cards.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
