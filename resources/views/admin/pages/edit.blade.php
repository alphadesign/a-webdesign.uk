<x-admin.layout>
    <x-admin.breadcrumb title='Pages Edit' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Pages', 'url' => route('admin.pages.index')],
                ['text' => 'Edit']
			]" :actions="[
                ['text' => 'Create Pages', 'icon' => 'fas fa-plus', 'url' => route('admin.pages.create'), 'permission' => 'pages_create', 'class' => 'btn-success btn-loader'],
                ['text' => 'All Pages', 'icon' => 'fas fa-list', 'url' => route('admin.pages.index'), 'permission' => 'pages_access', 'class' => 'btn-dark btn-loader'],
            ]" />

    <form method="POST" action="{{ route('admin.pages.update', [$page]) }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body table-responsive">
            <div class="form-group">
                <label for="">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" required value="{{ $page->title }}">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Breadcrumb Title</label>
                        <input type="text" name="breadcrumb_title" class="form-control" value="{{ $page->breadcrumb_title }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Breadcrumb Subtitle</label>
                        <input type="text" name="breadcrumb_subtitle" class="form-control" value="{{ $page->breadcrumb_subtitle }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="d-flex mb-2">
                        @if($page->banner)
                        <div class="mr-3">
                            <img src="{{ $page->banner() }}" alt="image" width="120" class="rounded">
                        </div>
                        @endif

                        <div class="flex-fill">
                            <label for="">Banner <span>(Make sure image should be 1600X400 pixel)</span></label>
                            <input type="file" name="thumbnail" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Banner Title / Alternate <span class="text-danger">*</span></label>
                        <input type="text" name="banner_title" class="form-control" value="{{ $page->banner_title }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Select --</option>
                            <option value="1" {{ ($page->status == '1') ? 'selected' : '' }} >Active</option>
                            <option value="0" {{ ($page->status == '0') ? 'selected' : '' }} >In-Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Page Content <span class="text-danger">*</span></label>
                <textarea name="content" rows="4" class="form-control text-editor">{{ $page->content }}</textarea>
            </div>
            <h4 class="my-2">Visibility</h4>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Show on main menu <span class="text-danger">*</span></label>
                        <select name="is_main_menu" class="form-control select2" required>
                            <option value="">-- Select --</option>
                            <option value="1" {{ ($page->is_main_menu == '1') ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ ($page->is_main_menu == '0') ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Show on footer menu <span class="text-danger">*</span></label>
                        <select name="is_footer_menu" class="form-control select2" required>
                            <option value="">-- Select --</option>
                            <option value="1" {{ ($page->is_footer_menu == '1') ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ ($page->is_footer_menu == '0') ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <h4 class="my-2">SEO</h4>
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <textarea name="meta_title" class="form-control" id="meta_title" cols="30"
                    rows="2">{{ $page?->meta_title }}</textarea>
            </div>
            <div class="form-group">
                <label for="meta_keyword">Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"
                    rows="3">{{ $page?->meta_keyword }}</textarea>
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control" id="meta_description" cols="30"
                    rows="5">{{ $page?->meta_description }}</textarea>
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
                selector: '.text-editor',
                plugins: 'print preview paste importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
                imagetools_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar1: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent',
                toolbar2: 'numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image link codesample',
                toolbar_sticky: true,
                autosave_ask_before_unload: true,
                height: 400,
                toolbar_mode: 'sliding',
                file_picker_types: 'image',
                images_upload_handler: function (blobinfo, success, failure) {
                    success("data:" + blobinfo.blob().type + ";base64," + blobinfo.base64());
                }
            });
        </script>
    </x-slot>
</x-admin.layout>
