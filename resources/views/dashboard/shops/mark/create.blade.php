@extends('layouts.dashboard')

@section('title')
    {{ trans('tags.title.create') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('tags.title.create') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">{{ Breadcrumbs::render('add_tag') }}</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('mark.store') }}" method="POST">
                                @csrf
                                <!-- title -->
                                <div class="form-group">
                                <label for="input_tag_title" class="font-weight-bold">
                                    {{ trans('tags.form_control.input.title.label') }}
                                </label>
                                <input id="input_tag_title" value="{{ old('title') }}" name="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ trans('tags.form_control.input.title.placeholder') }}" />
                                    @error('title')
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                <label for="input_tag_slug" class="font-weight-bold">
                                    {{ trans('tags.form_control.input.slug.label') }}
                                </label>
                                <input id="input_tag_slug" value="{{ old('slug') }}" name="slug" type="text"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    placeholder="{{ trans('tags.form_control.input.slug.placeholder') }}" readonly />
                                    @error('slug')
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a class="btn btn-warning px-4 mx-2" href="{{ route('mark.index') }}">
                                        {{ trans('tags.button.back.value') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary float-right px-4">
                                        {{ trans('tags.button.save.value') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function(){
            const generateSlug = (value) => {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "")
            }

            //Event: slug
            $('#input_tag_title').change(function(event){
                $('#input_tag_slug').val(generateSlug(event.target.value))
            });
        });
    </script>
@endpush