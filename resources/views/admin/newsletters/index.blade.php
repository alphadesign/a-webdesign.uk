<x-admin.layout>
    <x-admin.breadcrumb title='Newsletter' :links="[
			['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Newsletter'],
		]" :actions="[
            ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
        ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table mb-0">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Subject</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($newsletters as $key => $newsletter)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $newsletter->title }}</td>
                        <td>{{ $newsletter->name }}</td>
                        <td>{{ $newsletter->email }}</td>
                        <td>{{ $newsletter->mobile }}</td>
                        <td>{{ $newsletter->subject }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('admin.newsletters.show', [$newsletter]) }}"
                                class="btn btn-sm btn-info btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>

                            <form action="{{ route('admin.newsletters.destroy', [$newsletter]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-alert btn-loader load-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $newsletters->links() }}
        </div>
    </div>

</x-admin.layout>
