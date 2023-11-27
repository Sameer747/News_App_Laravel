@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Category') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Edit Category') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    {{-- langguage --}}
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">{{ __('--Select--') }}</option>
                            @foreach ($languages as $lang)
                                <option {{ $lang->lang === $category->language ? 'selected' : '' }}
                                    value="{{ $lang->lang }}">
                                    {{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="">{{ __('Name') }}</label>
                        <input name="name" type="text" class="form-control" id="name"
                            value="{{ $category->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- show at nav --}}
                    <div class="form-group">
                        <label for="">{{ __('Show at Nav?') }}</label>
                        <select name="show_at_nav" id="" class="form-control">
                            <option {{ $category->show_at_nav === 1 ? 'selected' : '' }} value="1">
                                {{ __('Yes') }}</option>
                            <option {{ $category->show_at_nav === 0 ? 'selected' : '' }} value="0">
                                {{ __('No') }}</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- status --}}
                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $category->status === 1 ? 'selected' : '' }} value="1">{{ __('Active') }}
                            </option>
                            <option {{ $category->status === 0 ? 'selected' : '' }} value="0">{{ __('Inactive') }}
                            </option>
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
