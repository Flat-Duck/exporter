@extends('layouts.app', ['page' => 'companies'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('companies.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.companies.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $company->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.city')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $company->city ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.address')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $company->address ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.phone')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $company->phone ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.url')</label
                            >
                            <a target="_blank" href="{{ $company->url }}"
                                >{{ $company->url ?? '-' }}</a
                            >
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.export_type')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $company->export_type ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.companies.inputs.exporter_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($company->exporter)->first_name ?? '-' }}"
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
                href="{{ route('companies.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Company::class)
            <a href="{{ route('companies.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
