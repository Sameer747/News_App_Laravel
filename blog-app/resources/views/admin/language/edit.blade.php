@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Language') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Edit Language') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.language.update', $language->id) }}">
                    @csrf
                    @method('PUT')
                    {{-- langguage --}}
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">--Select--</option>
                            @foreach (config('language') as $key => $lang)
                                <option @if ($language->lang === $key) @selected(true) @endif
                                    value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input value="{{ $language->name }}" name="name" readonly type="text" class="form-control"
                            id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- slug --}}
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input value="{{ $language->slug }}" name="slug" readonly type="text" class="form-control"
                            id="slug">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- default --}}
                    <div class="form-group">
                        <label for="">{{__('Default?')}}</label>
                        <select name="default" id="" class="form-control">
                            <option {{ $language->default === 1 ? 'selected' : '' }} value="1">Yes</option>
                            <option {{ $language->default === 0 ? 'selected' : '' }} value="0">No</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- status --}}
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $language->status === 1 ? 'selected' : '' }} value="1">Active</option>
                            <option {{ $language->status === 0 ? 'selected' : '' }} value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- submit btn --}}
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            })
        })
    </script>
@endpush
