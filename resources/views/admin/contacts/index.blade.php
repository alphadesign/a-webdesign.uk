<x-admin.layout>
    <x-admin.breadcrumb title='Contact' :links="[
			['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Contact'],
		]" :actions="[
            ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
        ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table mb-0">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Message</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->mobile }}</td>
                        <td>{{ $contact->message }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('admin.contacts.show', [$contact]) }}"
                                class="btn btn-sm btn-info btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>

                            <form action="{{ route('admin.contacts.destroy', [$contact]) }}" method="POST"
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
            {{ $contacts->links() }}
        </div>
    </div>

</x-admin.layout>
