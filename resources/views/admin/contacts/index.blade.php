<x-admin.layout>
    <x-admin.breadcrumb title='Contact' :links="[
			['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Contact'],
		]" :actions="[
            ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
        ]" />

    <div class="card shadow-sm">
        <div class="card-header py-2">
            <h2>
                <button class="btn btn-danger delete_all" data-url="{{ route('admin.contacts.destroy.all') }}">Delete All</button>
                <div class="btn-group">
                <button type="button"
                    class="btn btn-primary text-nowrap">
                    Sort by
                </button>
                <button type="button"
                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown">
                    <i class="fas fa-caret-down"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item bg-primary text-white"
                        href="{{ route('admin.contacts.index') }}">
                        Newest
                    </a>
                    <a class="dropdown-item bg-primary text-white"
                        href="{{ route('admin.contacts.index', ['order'=>'asc']) }}">
                        A - Z
                    </a>
                    <a class="dropdown-item bg-primary text-white"
                        href="{{ route('admin.contacts.index', ['order'=>'desc']) }}">
                        Z - A
                    </a>
                </div>
            </h2>
        </div>
        <div class="card-body table-responsive">
            <table class="table mb-0">
                <thead>
                    <th>
                        <input type="checkbox" class="check_all">
                    </th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $contact)
                    <tr id="tr_{{$contact->id}}">
                        <td><input type="checkbox" class="sub_chk" data-id="{{$contact->id}}"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->mobile }}</td>
                        <td>{{ Str::limit($contact->message,50,'...') }}</td>
                        <td>{{ $contact->created_at->diffForHumans() }}</td>
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

    @push('scripts')
    <script>
        $(document).ready(function () {
            $('.check_all').on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });

            $('.delete_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                if(allVals.length <=0)
                {
                    alert("Please select row for delete?");
                }else{
                    var check = confirm("Are you sure you want to delete this row?");
                    if(check == true){
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });

                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });
        });

    </script>
    @endpush

</x-admin.layout>
