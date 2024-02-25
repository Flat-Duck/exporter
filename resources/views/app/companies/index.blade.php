@extends('layouts.app', ['page' => 'companies'])
@section('content')
<div class="card">
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <form>
                <div class="row g-2">
                    <div class="input-icon col">
                        <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                        <input
                            id="indexSearch"
                            name="search"
                            type="text"
                            value=""
                            class="form-control"
                            placeholder="Search…"
                            aria-label="Search..."
                            spellcheck="false"
                            data-ms-editor="true"
                            autocomplete="off"
                        />
                    </div>
                    <div class="col-auto">
                        <button
                            class="btn btn-icon btn-primary"
                            aria-label="Button"
                        >
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-auto ms-auto d-print-none">
                @can('create', App\Models\Company::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('companies.create') }}"
                >
                    <i class="ti ti-plus"></i>
                    @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th class="text-left">
                        @lang('crud.companies.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.companies.inputs.city')
                    </th>
                    <th class="text-left">
                        @lang('crud.companies.inputs.address')
                    </th>
                    <th class="text-left">
                        @lang('crud.companies.inputs.phone')
                    </th>
                    <th class="text-left">
                        @lang('crud.companies.inputs.url')
                    </th>
                    <th class="text-left">
                        @lang('crud.companies.inputs.export_type')
                    </th>
                    <th class="text-left">
                        @lang('crud.companies.inputs.exporter_id')
                    </th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $company)
                <tr>
                    <td>{{ $company->name ?? '-' }}</td>
                    <td>{{ $company->city ?? '-' }}</td>
                    <td>{{ $company->address ?? '-' }}</td>
                    <td>{{ $company->phone ?? '-' }}</td>
                    <td>
                        <a target="_blank" href="{{ $company->url }}"
                            >{{ $company->url ?? '-' }}</a
                        >
                    </td>
                    <td>{{ $company->export_type ?? '-' }}</td>
                    <td>
                        {{ optional($company->exporter)->first_name ?? '-' }}
                    </td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $company)
                            <a
                                href="{{ route('companies.edit', $company) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                <i class="ti ti-edit"></i>
                            </a>
                            @endcan @can('view', $company)
                            <a
                                href="{{ route('companies.show', $company) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                <i class="ti ti-eye"></i>
                            </a>
                            @endcan @can('delete', $company)
                            <form
                                action="{{ route('companies.destroy', $company) }}"
                                method="POST"
                                class="inline pointer ms-1"
                                onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-icon btn-outline-danger"
                                >
                                    <i class="ti ti-trash-x"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $companies->render() !!}
    </div>
</div>
@endsection
