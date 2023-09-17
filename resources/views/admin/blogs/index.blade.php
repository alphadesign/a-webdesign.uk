<x-admin.layout>
    <x-admin.breadcrumb title='All Blogs' :links="[
				[
                    'text' => 'Dashboard',
                    'url'  => route('admin.dashboard')
                ],
                [
                    'text' => 'Blog'
                ]
			]" :actions="[
                [
                    'text'  => 'Filter',
                    'icon'  => 'fas fa-filter',
                    'class' => 'btn-secondary btn-loader',
                    'url'   => route('admin.blogs.index', ['filter' => 1])
                ],
                [
                    'text'       => 'Create New',
                    'icon'       => 'fas fa-plus',
                    'url'        => route('admin.blogs.create'),
                    'class'      => 'btn-dark btn-loader'
            ],
            ]" />

    @if(request()->get('filter'))
    <div class="card" id="filter">
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <input type="text" name="search" class="form-control mb-sm-0 mb-2" placeholder="Search" value="{{ Request::get('search') }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <select name="blog_category_id" class="form-control" required>
                            <option value="">-- Select --</option>
                            @foreach ($blogCategories as $blogCategory)
                            <option value="{{ $blogCategory->id }}" {{ (Request::get('search')==$blogCategory->
                                id) ? 'selected' : '' }}>{{ $blogCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-dark btn-loader">
                            <i class="fas fa-save"></i> Submit
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-basic border btn-loader">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <div class="card shadow-sm">
        <x-admin.paginator-info :items="$blogs" class="card-header" />
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td width="2%">{{ $loop->iteration }}</td>
                        <td width="10%"><img src="{{ $blog->imageThumb() }}" alt="cover image" width="100"></td>
                        <td width="60%">{{ $blog->title }}
                        <div class="text-small">{{ Str::limit($blog->sub_title,150) }}</div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-{{ $blog->status ? 'success' : 'danger' }} text-nowrap btn-sm">
                                    {!! $blog->status ? 'Active'.str_repeat('&nbsp;', 3) : 'In-active' !!}
                                </button>
                                <button type="button"
                                    class="btn btn-{{ $blog->status ? 'success' : 'danger' }} btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-caret-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item bg-danger text-white"
                                        href="{{ route('admin.blogs.status', [$blog]) }}">
                                        In-active
                                    </a>
                                    <a class="dropdown-item bg-success text-white"
                                        href="{{ route('admin.blogs.status', [$blog]) }}">
                                        Active
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td width="15%">
                            {{-- <a href="{{ route('admin.blogs.show', [$blog]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a> --}}
                            <a href="{{ route('blog', [$blog]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle" title="Preview" target="_blank">
                                <i class="fas fa-info-circle"></i>
                            </a>

                            <a href="{{ route('admin.blogs.edit', [$blog]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.blogs.destroy', [$blog]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $blogs->links() }}
        </div>
    </div>
</x-admin.layout>
