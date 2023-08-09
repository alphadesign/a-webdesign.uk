<x-admin.layout>
    <x-admin.breadcrumb title='Portfolio Create' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Portfolios', 'url' => route('admin.portfolios.index')],
                ['text' => 'Create']
			]" :actions="[
                ['text' => 'Portfolios', 'icon' => 'fas fa-plus', 'url' => route('admin.portfolios.index'), 'class' => 'btn-success btn-loader btn-loader'],
                ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
            ]" />

    <form method="POST" action="{{ route('admin.portfolios.store') }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Title or Name"
                            value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Portfolio URL</label>
                        <input type="url" class="form-control" name="url" placeholder="https://www.google.com/"
                            value="{{ old('url') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Image Preview</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Select --</option>
                            <option value="1" {{ (old('status')=='1' ) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (old('status')=='0' ) ? 'selected' : '' }}>In-Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Description </label>
                <textarea class="form-control text-editor" name="description" rows="3" placeholder="Write your Description"
                    >{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-dark btn-loader">
                <i class="fas fa-save"></i> Submit
            </button>
        </div>
    </form>
    <x-slot name="script">
        <script>
            tinymce.init({
                toolbar: 'fontselect fontsizeselect | bold italic underline strikethrough | aligncenter alignjustify alignleft alignright | indent outdent |  table forecolor backcolor',
                plugins: 'table autosave',
                selector: '.text-editor',
                height: 400
            });
        </script>
    </x-slot>
</x-admin.layout>
