<x-admin.layout>
	<x-admin.breadcrumb
		title='Queries'
		:links="[
			['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Queries'],
		]"
        :actions="[
            ['text' => 'Queries', 'icon' => 'fas fa-list', 'permission' => 'queries_access', 'url' => route('admin.contacts.index'), 'class' => 'btn-info btn-loader'],
            ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
        ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td><b>Name:</b></td>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td><b>email:</b></td>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td><b>mobile:</b></td>
                                <td>{{ $contact->mobile }}</td>
                            </tr>
                            <tr>
                                <td><b>subject:</b></td>
                                <td>{{ $contact->message }}</td>
                            </tr>

                            <tr>
                                <td><b>created_at:</b></td>
                                <td>{{ $contact->created_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.contacts.destroy', [$contact]) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-alert btn-loader load-circle">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
