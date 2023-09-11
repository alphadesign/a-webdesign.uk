<x-admin.layout>
	<x-admin.breadcrumb
			title='Blog Detail'
			:links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Blog', 'url' => route('admin.blogs.index')],
                ['text' => 'Detail']
			]"
            :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.blogs.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'All Blog', 'icon' => 'fas fa-list', 'url' => route('admin.blogs.index'), 'class' => 'btn-dark btn-loader'],
            ]"
		/>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">Blog Detail</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Image:</b></td>
                            <td><img src="{{ $blog->image() }}" alt="alt" srcset="{{ $blog->image() }}" width="200"></td>
                        </tr>
                        <tr>
                            <td><b>Thumbnail:</b></td>
                            <td><img src="{{ $blog->imageThumb() }}" alt="alt" srcset="{{ $blog->imageThumb() }}" width="100"></td>
                        </tr>
                        <tr>
                            <td><b>Title:</b></td>
                            <td>{{ $blog->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Sub Title:</b></td>
                            <td>{{ $blog->sub_title }}</td>
                        </tr>

                        <tr>
                            <td><b>Description:</b></td>
                            <td>{!! $blog->content !!}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Title:</b></td>
                            <td>{{ $blog->meta_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Keyword:</b></td>
                            <td>{{ $blog->meta_keyword }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Description:</b></td>
                            <td>{{ $blog->meta_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $blog->status ? 'success' : 'danger' }} fs-12">
                                {{ $blog->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($blog->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="text-center">
                                <a href="{{ route('admin.blogs.edit', [$blog]) }}" class="btn btn-success px-3"><i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
