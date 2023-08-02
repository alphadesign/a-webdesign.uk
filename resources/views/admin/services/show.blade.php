<x-admin.layout>
	<x-admin.breadcrumb
			title='Service Detail'
			:links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Services', 'url' => route('admin.services.index')],
                ['text' => 'Detail']
			]"
            :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.services.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'All Services', 'icon' => 'fas fa-list', 'url' => route('admin.services.index'), 'class' => 'btn-dark btn-loader'],
            ]"
		/>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">Service Information</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{ $service->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Short Description:</b></td>
                            <td>{{ $service->short_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Long Description:</b></td>
                            <td>{!! $service->long_description !!}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Title:</b></td>
                            <td>{{ $service->meta_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Keyword:</b></td>
                            <td>{{ $service->meta_keyword }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Description:</b></td>
                            <td>{{ $service->meta_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $service->status ? 'success' : 'danger' }} fs-12">
                                {{ $service->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($service->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="text-center">
                                <a href="{{ route('admin.services.edit', [$service]) }}" class="btn btn-success px-3">
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
