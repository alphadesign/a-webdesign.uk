<x-admin.layout>
    <x-admin.breadcrumb title='Portfolio Detail' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Portfolio', 'url' => route('admin.portfolios.index')],
                ['text' => 'Detail']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.portfolios.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'All Portfolios','icon' => 'fas fa-list','url' => route('admin.portfolios.index'),'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">Portfolio Detail</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Title:</b></td>
                            <td>{{ $portfolio->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Portfolio URL:</b></td>
                            <td>{{ $portfolio->url }}</td>
                        </tr>
                        <tr>
                            <td><b>Description:</b></td>
                            <td>{!! $portfolio->description !!}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $portfolio->status ? 'success' : 'danger' }} fs-12">
                                    {{ $portfolio->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($portfolio->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="text-center">
                                <a href="{{ route('admin.portfolios.edit', [$portfolio]) }}" class="btn btn-success px-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
