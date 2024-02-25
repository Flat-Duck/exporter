@extends('layouts.app', ['page' => 'exporters'])
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
                @can('create', App\Models\Exporter::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('exporters.create') }}"
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
                        @lang('crud.exporters.inputs.first_name')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.last_name')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.phone')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.nationality')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.gender')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.license')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.commercial_book')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.commercial_room')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.block_time')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.block_reason')
                    </th>
                    <th class="text-left">
                        @lang('crud.exporters.inputs.user_id')
                    </th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exporters as $exporter)
                <tr>
                    <td>{{ $exporter->first_name ?? '-' }}</td>
                    <td>{{ $exporter->last_name ?? '-' }}</td>
                    <td>{{ $exporter->phone ?? '-' }}</td>
                    <td>{{ $exporter->nationality ?? '-' }}</td>
                    <td>{{ $exporter->gender ?? '-' }}</td>
                    <td>{{ $exporter->license ?? '-' }}</td>
                    <td>{{ $exporter->commercial_book ?? '-' }}</td>
                    <td>{{ $exporter->commercial_room ?? '-' }}</td>
                    <td>{{ $exporter->block_time ?? '-' }}</td>
                    <td>{{ $exporter->block_reason ?? '-' }}</td>
                    <td>{{ optional($exporter->user)->name ?? '-' }}</td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $exporter)
                            <a
                                href="{{ route('exporters.edit', $exporter) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                <i class="ti ti-edit"></i>
                            </a>
                            @endcan @can('view', $exporter)
                            <a
                                href="{{ route('exporters.show', $exporter) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                <i class="ti ti-eye"></i>
                            </a>
                            @endcan @can('delete', $exporter)
                            <form
                                action="{{ route('exporters.destroy', $exporter) }}"
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
                    <td colspan="12">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $exporters->render() !!}
    </div>
</div>
@endsection
