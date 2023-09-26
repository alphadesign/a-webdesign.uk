<x-admin.layout>
    <x-admin.breadcrumb title='Create Service' :links="[
            ['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Services', 'url' => route('admin.services.index')],
            ['text' => 'Create']
        ]" :actions="[
            ['text' => 'All Services',
            'icon'  => 'fas fa-list',
            'url'   => route('admin.services.index'),
            'class' => 'btn-dark btn-loader'],
        ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.services.store') }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required="" value="{{ old('name') }}">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Breadcrumb Title</label>
                                <input type="text" name="breadcrumb_title" class="form-control"
                                    value="{{ old('breadcrumb_title') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Breadcrumb Subtitle</label>
                                <input type="text" name="breadcrumb_subtitle" class="form-control"
                                    value="{{ old('breadcrumb_subtitle') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control" id="short_description" cols="30"
                            rows="5">{{ old('short_description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description </label>
                        <textarea name="long_description" class="form-control text-editor" id="long_description"
                            cols="30" rows="10">{{ old('long_description') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <div id="cover-image-preview"></div>
                                </div>
                                <div class="form-group flex-fill">
                                    <label for="">Cover Image</label>
                                    <input type="file" name="cover_image" class="form-control" id="crop-cover-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Cover ImageTitle / Alternate <span class="text-danger">*</span></label>
                                <input type="text" name="cover_image_title" class="form-control" value="{{ old('cover_image_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <div id="main-image-preview"></div>
                                </div>
                                <div class="form-group flex-fill">
                                    <label for="">Main Image <span>(Make sure image should be 1600X400 pixel)</span></label>
                                    <input type="file" name="main_image" class="form-control" id="crop-main-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Main Image Title / Alternate <span class="text-danger">*</span></label>
                                <input type="text" name="main_image_title" class="form-control" value="{{ old('main_image_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="1"
                                    checked>
                                <label class="form-check-label" for="status1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status2" value="0">
                                <label class="form-check-label" for="status2">In-Active</label>
                            </div>
                        </div>
                    </div>
                    <h4 class="my-2">SEO</h4>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" cols="30" rows="2">{{ old('meta_title') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"
                            rows="3">{{ old('meta_keyword') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"
                            rows="5">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark btn-loader">
                        <i class="fas fa-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script>
            var previewImg = {
                width: '70px',
                height: '70px',
                rounded: '50px',
                targetId:'cover-image-preview'
            };
            imageCropper('crop-cover-image', 1/1, previewImg);
            var previewImg2 = {
                width: '70px',
                height: '70px',
                rounded: '50px',
                targetId:'main-image-preview'
            };
            imageCropper('crop-main-image', 16/9, previewImg2);

            tinymce.init({
                toolbar: 'fontselect fontsizeselect | bold italic underline strikethrough | aligncenter alignjustify alignleft alignright | indent outdent |  table forecolor backcolor',
                plugins: 'table autosave',
                selector: '.text-editor',
                height: 400
            });
        </script>
    </x-slot>
</x-admin.layout>
