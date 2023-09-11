<x-admin.layout>
    <x-admin.breadcrumb title='Edit About' :links="[
        ['text' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['text' => 'Abouts', 'url' => route('admin.abouts.index')],
        ['text' => 'Edit'],
    ]" :actions="[
        // [
        //     'text' => 'Create New',
        //     'icon' => 'fas fa-plus',
        //     'url' => route('admin.abouts.create'),
        //     'class' => 'btn-success btn-loader',
        // ],
        [
            'text' => 'View About',
            'icon' => 'fas fa-list',
            'url' => route('admin.abouts.show',[$about]),
            'class' => 'btn-dark btn-loader',
        ],
    ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.abouts.update', [$about]) }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Title <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required="" value="{{ $about->name }}">
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control" id="short_description" cols="30"
                            rows="5">{{ $about->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="long_description">Long Description </label>
                        <textarea name="long_description" class="form-control text-editor" id="long_description"
                            cols="30" rows="10">{!! $about?->long_description !!}</textarea>
                    </div>
                    <div class="d-flex">
                        <div class="mr-2">
                            <div id="cover-image-preview">
                                @if ($about->cover_image)
                                <img src="{{ $about->coverImage() }}" alt="image" width="70" class="rounded-circle img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="form-group flex-fill">
                            <label for="">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" id="crop-cover-image">
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="mr-2">
                            <div id="main-image-preview">
                                @if ($about->main_image)
                                <img src="{{ $about->mainImage() }}" alt="image" width="70" class="rounded-circle img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="form-group flex-fill">
                            <label for="">Main Image</label>
                            <input type="file" name="main_image" class="form-control" id="crop-main-image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="1"
                                    @checked($about->status)>
                                <label class="form-check-label" for="status1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status2" value="0" @checked(!$about->status)>
                                <label class="form-check-label" for="status2">In-Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" cols="30" rows="2">{{ $about?->meta_title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"
                            rows="3">{{ $about?->meta_keyword }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"
                            rows="5">{{ $about?->meta_description }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            .user_profile_remove {
                position: absolute;
                width: 25px;
                height: 25px;
                font-size: 15px;
            }

        </style>
    @endpush
    <x-slot name="script">
        <script>
           var previewImg = {
                width: '70px',
                height: '70px',
                rounded: '50px',
                targetId:'cover-image-preview'
            };
            imageCropper('crop-cover-image', 16/9, previewImg);
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
