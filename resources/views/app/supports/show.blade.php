@extends('layouts.app', ['page' => 'supports'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('supports.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.supports.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.supports.inputs.description')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $support->description ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.supports.inputs.support_type_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($support->supportType)->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.supports.inputs.exporter_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($support->exporter)->first_name ?? '-' }}"
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
                href="{{ route('supports.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Support::class)
            <a href="{{ route('supports.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
