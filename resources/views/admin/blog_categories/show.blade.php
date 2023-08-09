<x-admin.layout>
	<x-admin.breadcrumb
			title='Blog Category Detail'
			:links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Blog Categories', 'url' => route('admin.blog_categories.index')],
                ['text' => 'Detail']
			]"
            :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.blog_categories.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'All Blog Categories', 'icon' => 'fas fa-list', 'url' => route('admin.blog_categories.index'), 'class' => 'btn-dark btn-loader'],
            ]"
		/>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">Blog Category Detail</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Image:</b></td>
                            <td><img src="{{ $blogCategory->image() }}" alt="alt" srcset="{{ $blogCategory->image() }}" width="40"></td>
                        </tr>
                        <tr>
                            <td><b>Thumbnail:</b></td>
                            <td><img src="{{ $blogCategory->imageThumb() }}" alt="alt" srcset="{{ $blogCategory->imageThumb() }}" width="40"></td>
                        </tr>
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{ $blogCategory->name }}</td>
                        </tr>

                        <tr>
                            <td><b>Description:</b></td>
                            <td>{!! $blogCategory->content !!}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Title:</b></td>
                            <td>{{ $blogCategory->meta_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Keyword:</b></td>
                            <td>{{ $blogCategory->meta_keyword }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Description:</b></td>
                            <td>{{ $blogCategory->meta_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $blogCategory->status ? 'success' : 'danger' }} fs-12">
                                {{ $blogCategory->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($blogCategory->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="text-center">
                                <a href="{{ route('admin.blog_categories.edit', [$blogCategory]) }}" class="btn btn-success px-3"><i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
