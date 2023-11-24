@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Language') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Language') }}</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.language.store')}}">
                    @csrf
                    {{-- langguage --}}
                    <div class="form-group">
                        <label for="">Language</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">--Select--</option>
                            @foreach (config('language') as $key => $lang)
                                <option value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" readonly type="text" class="form-control" id="name">
                    </div>
                    {{-- slug --}}
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input name="slug" readonly type="text" class="form-control" id="slug">
                    </div>
                    {{-- default --}}
                    <div class="form-group">
                        <label for="">Default?</label>
                        <select name="default" id="" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    {{-- status --}}
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    {{-- submit btn --}}
                    <button type="submit" class="btn btn-primary">Create</button>
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
