@extends('layouts.app', ['page' => 'exporters'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('exporters.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.exporters.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.first_name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->first_name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.last_name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->last_name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.phone')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->phone ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.nationality')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->nationality ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.gender')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->gender ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.license')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->license ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.commercial_book')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->commercial_book ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.commercial_room')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->commercial_room ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.block_time')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->block_time ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.block_reason')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $exporter->block_reason ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.exporters.inputs.user_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($exporter->user)->name ?? '-' }}"
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
                href="{{ route('exporters.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Exporter::class)
            <a href="{{ route('exporters.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
