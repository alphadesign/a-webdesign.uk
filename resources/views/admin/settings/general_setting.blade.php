<x-admin.layout>
    <x-admin.breadcrumb title='Website Setting Edit' />
    <form method="POST" action="{{ route('admin.settings.store') }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @php $setting_value = !empty($setting->option_value) ? $setting->option_value : ''; @endphp
        @csrf
        <div class="card-header">
            Website Setting
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Application Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="app_name" placeholder="Application Name"
                            value="{{ $setting_value['app_name'] ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Support Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="support_email" placeholder="Support Email"
                            value="{{ $setting_value['support_email'] ?? '' }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Support Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="support_phone" placeholder="Support Phone No"
                            value="{{ $setting_value['support_phone'] ?? '' }}">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Company Address <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="company_address" rows="3" placeholder="Company Address"
                            required>{{ $setting_value['company_address'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['logo']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['logo']) }}" alt="logo" width="70">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Logo</label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['mobile_logo']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['mobile_logo']) }}" alt="mobile_logo"
                                width="70">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Mobile Logo</label>
                            <input type="file" class="form-control" name="mobile_logo">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['favicon']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['favicon']) }}" alt="image" width="70"
                                class="rounded-circle">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Favicon</label>
                            <input type="file" class="form-control" name="favicon">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3 class="my-3">Banner Setting</h3>
                    <div class="col-sm-12">
                        <div class="d-flex">
                            @if(!empty($setting_value['banner']))
                            <div class="mr-3">
                                <img src="{{ asset('storage/'.$setting_value['banner']) }}" alt="banner" width="100">
                            </div>
                            @endif
                            <div class="form-group flex-fill">
                                <label for="">Banner <span class="text-danger">(Please ensure the image is sized at
                                        1600x800
                                        pixels.)</span></label>
                                <input type="file" class="form-control" name="banner">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Heading<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="banner_heading" placeholder="Banner Heading"
                                value="{{ $setting_value['banner_heading'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subheading <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="banner_subheading"
                                placeholder="Banner subheading" value="{{ $setting_value['banner_subheading'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button 1</label>
                            <input type="text" class="form-control" name="banner_action_name1" placeholder="Button Name"
                                value="{{ $setting_value['banner_action_name1'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button URL 1</label>
                            <input type="url" class="form-control" name="banner_action_url1" placeholder="Full URL"
                                 value="{{ $setting_value['banner_action_url1'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button 2</label>
                            <input type="text" class="form-control" name="banner_action_name2"
                                placeholder="Button Name" value="{{ $setting_value['banner_action_name2'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button URL 2</label>
                            <input type="url" class="form-control" name="banner_action_url2" placeholder="Full URL"
                                 value="{{ $setting_value['banner_action_url2'] ?? '' }}">
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <h3 class="my-3">About Section Setting</h3>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="about[title]" placeholder="Title"
                            value="{{ $setting_value['about']['title'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Subtitle <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="about[subtitle]" placeholder="Subtitle"
                            value="{{ $setting_value['about']['subtitle'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Content <span class="text-danger">*</span> </label>
                        <textarea class="form-control text-editor" name="about[content]"
                            rows="3">{{ $setting_value['about']['content'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['about']['main_image']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['about']['main_image']) }}" alt="main_image"
                                width="70">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Main Image <span class="text-danger">(Please ensure the image is sized at
                                    500x400
                                    pixels.)</span></label>
                            <input type="file" class="form-control" name="about_main_image">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['about']['thumbnail']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['about']['thumbnail']) }}" alt="thumbnail"
                                width="70">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Thumbnail <span class="text-danger">(Please ensure the image is sized at
                                    410x175
                                    pixels.)</span></label>
                            <input type="file" class="form-control" name="about_thumbnail">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Video Link <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="about[video_link]" placeholder="Youtube link"
                            value="{{ $setting_value['about']['video_link'] ?? '' }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <h3 class="my-3">Projects & Experience Setting</h3>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Number Of Projects <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="number_of_projects" placeholder="eg. 24"
                            value="{{ $setting_value['number_of_projects'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Years Of Experience <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="years_of_experience" placeholder="eg. 10"
                            value="{{ $setting_value['years_of_experience'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Winning Awards <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="winning_awards" placeholder="eg. 12"
                            value="{{ $setting_value['winning_awards'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Happy Clients <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="happy_clients" placeholder="eg. 200"
                            value="{{ $setting_value['happy_clients'] ?? '' }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <input type="hidden" name="RecordId" value="{{ $setting->id ?? '' }}" />
            <button type="submit" class="btn btn-dark btn-loader">
                <i class="fas fa-save mr-2"></i> Update
            </button>
        </div>
    </form>

    @push('scripts')
    <script>
        tinymce.init({
                selector: '.text-editor',
                height: 300,
            });
    </script>
    @endpush

</x-admin.layout>
