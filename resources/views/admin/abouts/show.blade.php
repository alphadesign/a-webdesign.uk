<x-admin.layout>
    <x-admin.breadcrumb title='About Detail' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Abouts', 'url' => route('admin.abouts.index')],
                ['text' => 'Detail']
			]" :actions="[
                // ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.abouts.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'Edit About', 'icon' => 'fas fa-list', 'url' => route('admin.abouts.edit',[$about]), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">About Information</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{ $about->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Short Description:</b></td>
                            <td>{{ $about->short_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Long Description:</b></td>
                            <td>{!! $about->long_description !!}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Title:</b></td>
                            <td>{{ $about->meta_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Keyword:</b></td>
                            <td>{{ $about->meta_keyword }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Description:</b></td>
                            <td>{{ $about->meta_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $about->status ? 'success' : 'danger' }} fs-12">
                                    {{ $about->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($about->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="{{ route('admin.abouts.edit', [$about]) }}" class="btn btn-success px-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.abouts.destroy', [$about]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger px-3"><i
                                        class="fas fa-trash"></i> Delete</button>
                            </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
