<x-admin.layout>
    <x-admin.breadcrumb title='All Testimonials' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Testimonials']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.testimonials.create'), 'permission' => 'testimonials_create', 'class' => 'btn-success btn-loader btn-loader'],
            ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $testimonial->avatarUrl() }}" alt="image" width="50" class="rounded-circle">
                        </td>
                        <td>
                            {{ $testimonial->title }}
                            <div class="small text-nowrap">{{ $testimonial->subtitle }}</div>
                            <div class="small text-nowrap">
                                <b>Rating: </b> {{ $testimonial->rating }}
                            </div>
                        </td>
                        <td class="small">{{ $testimonial->content }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-{{ $testimonial->status ? 'success' : 'danger' }} text-nowrap btn-sm">
                                    {!! $testimonial->status ? 'Active '.str_repeat('&nbsp;', 2) : 'In-active' !!}
                                </button>
                                <button type="button"
                                    class="btn btn-{{ $testimonial->status ? 'success' : 'danger' }} btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-caret-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item bg-danger text-white"
                                        href="{{ route('admin.testimonials.status', [$testimonial]) }}">
                                        In-active
                                    </a>
                                    <a class="dropdown-item bg-success text-white"
                                        href="{{ route('admin.testimonials.status', [$testimonial]) }}">
                                        Active
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('testimonials', [$testimonial]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle" title="Preview" target="_blank">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            @can('testimonials_update')
                            <a href="{{ route('admin.testimonials.edit', [$testimonial]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan

                            @can('testimonials_delete')
                            <form action="{{ route('admin.testimonials.destroy', [$testimonial]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
