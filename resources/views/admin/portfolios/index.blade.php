<x-admin.layout>
    <x-admin.breadcrumb title='All Portfolios' :links="[
				['text' => 'Dashboard',
                'url' => route('admin.dashboard') ],
                ['text' => 'Portfolios']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus',
                 'url' => route('admin.portfolios.create'),
                'class' => 'btn-success btn-loader btn-loader'],
            ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $portfolio->image() }}" alt="image" width="50" class="rounded-circle">
                        </td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->url }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-{{ $portfolio->status ? 'success' : 'danger' }} text-nowrap btn-sm">
                                    {!! $portfolio->status ? 'Active '.str_repeat('&nbsp;', 2) : 'In-active' !!}
                                </button>
                                <button type="button"
                                    class="btn btn-{{ $portfolio->status ? 'success' : 'danger' }} btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-caret-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item bg-danger text-white"
                                        href="{{ route('admin.portfolios.status', [$portfolio]) }}">
                                        In-active
                                    </a>
                                    <a class="dropdown-item bg-success text-white"
                                        href="{{ route('admin.portfolios.status', [$portfolio]) }}">
                                        Active
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-nowrap">
                            {{-- <a href="{{ route('admin.portfolios.show', [$portfolio]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a> --}}
                            <a href="{{ route('portfolio', [$portfolio]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle" title="Preview" target="_blank">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ route('admin.portfolios.edit', [$portfolio]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.portfolios.destroy', [$portfolio]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
