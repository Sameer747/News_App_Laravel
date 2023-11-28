@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('News') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create News') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- langguage --}}
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">{{ __('--Select--') }}</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="form-group">
                        <label for="">{{ __('Category') }}</label>
                        <select name="category" id="category" class="form-control select2">
                            <option value="">{{ __('--Select--') }}</option>
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <label for="">{{ __('Image') }}</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div class="form-group">
                        <label for="">{{ __('Title') }}</label>
                        <input name="title" type="text" class="form-control" id="title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="form-group">
                        <label for="">{{ __('Content') }}</label>
                        <textarea name="content" class="summernote-simple"></textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tags --}}
                    <div class="form-group">
                        <label for="">{{ __('Tags') }}</label>
                        <input type="text" class="form-control inputtags" name="tags">
                        @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Meta Title --}}
                    <div class="form-group">
                        <label for="">{{ __('Meta Title') }}</label>
                        <input name="meta_title" type="text" class="form-control" id="title">
                        @error('meta_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Meta Description --}}
                    <div class="form-group">
                        <label for="">{{ __('Meta Description') }}</label>
                        <textarea name="meta_description" class="form-control"></textarea>
                        @error('meta_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Toggle Buttons --}}
                    <div class="row">
                        {{-- Status --}}
                        <div class="col-md">
                            <div class="form-group">
                                <div class="control-label">{{ __('Status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        {{-- Is Breaking News --}}
                        <div class="col-md">
                            <div class="form-group">
                                <div class="control-label">{{ __('Is Breaking News') }}</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="is_breaking_news"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        {{-- Show at slider --}}
                        <div class="col-md">
                            <div class="form-group">
                                <div class="control-label">{{ __('Show At Slider') }}</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="show_at_slider" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        {{-- Show at popular --}}
                        <div class="col-md">
                            <div class="form-group">
                                <div class="control-label">{{ __('Show At Popular') }}</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="show_at_popular"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- submit btn --}}
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                // alert('hello world');
                let lang = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.fetch-news-category') }}",
                    data: {
                        lang: lang
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#category').html("");
                        $('#category').html(
                            `<option value="">--{{ __('Select') }}--</option>`);
                        $.each(data, function(index, data) {
                            $('#category').append(
                                `<option value="${data.id}">${data.name}</option>`)
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
        })
    </script>
@endpush
