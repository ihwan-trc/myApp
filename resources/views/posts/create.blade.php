@extends('layouts.dashboard')

@section('title')
    {{ trans('posts.title.create') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_post') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                        <div class="col-md-8">
                            <!-- title -->
                            <div class="form-group">
                                <label for="input_post_title" class="font-weight-bold">
                                    {{ trans('posts.form_control.input.title.label') }}
                                </label>
                                <input id="input_post_title" value="" name="title" type="text" class="form-control"
                                    placeholder="" />
                            </div>
                            <!-- slug -->
                            <div class="form-group">
                                <label for="input_post_slug" class="font-weight-bold">
                                    {{ trans('posts.form_control.input.slug.label') }}
                                </label>
                                <input id="input_post_slug" value="" name="slug" type="text" class="form-control" placeholder=""
                                    readonly />
                            </div>
                            <!-- thumbnail -->
                            <div class="form-group">
                                <label for="input_post_thumbnail" class="font-weight-bold">
                                    {{ trans('posts.form_control.input.thumbnail.label') }}
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <button id="button_post_thumbnail" data-input="input_post_thumbnail"
                                        class="btn btn-primary" type="button">
                                        {{ trans('posts.button.browse.value') }}
                                    </button>
                                    </div>
                                    <input id="input_post_thumbnail" name="thumbnail" value="" type="text" class="form-control"
                                    placeholder="{{ trans('posts.form_control.input.thumbnail.placeholder') }}" readonly />
                                </div>
                            </div>
                            <!-- description -->
                            <div class="form-group">
                                <label for="input_post_description" class="font-weight-bold">
                                    {{ trans('posts.form_control.textarea.description.label') }}
                                </label>
                                <textarea id="input_post_description" name="description" placeholder="" class="form-control "
                                    rows="3"></textarea>
                            </div>
                            <!-- content -->
                            <div class="form-group">
                                <label for="input_post_content" class="font-weight-bold">
                                    {{ trans('posts.form_control.textarea.content.label') }}
                                </label>
                                <textarea id="input_post_content" name="content" placeholder="" class="form-control "
                                    rows="20"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- catgeory -->
                            <div class="form-group">
                                <label for="input_post_description" class="font-weight-bold">
                                    {{ trans('posts.form_control.input.category.label') }}
                                </label>
                                <div class="form-control overflow-auto" style="height: 886px">
                                    <!-- List category -->
                                    @include('posts._category-list',[
                                        'categories' => $categories
                                    ])
                                    <!-- List category -->
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <!-- tag -->
                            <div class="form-group">
                                <label for="select_post_tag" class="font-weight-bold">
                                    {{ trans('posts.form_control.select.tag.label') }}
                                </label>
                                <select id="select_post_tag" name="tag" data-placeholder="" class="custom-select w-100"
                                    multiple>
                                    <option value="tag1">tag 1</option>
                                    <option value="tag2">tag 2</option>
                                </select>
                            </div>
                            <!-- status -->
                            <div class="form-group">
                                <label for="select_post_status" class="font-weight-bold">
                                    {{ trans('posts.form_control.select.status.label') }}
                                </label>
                                <select id="select_post_status" name="status" class="custom-select">
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <a class="btn btn-warning px-4" href="{{ route('posts.index') }}">{{ trans('posts.button.back.value') }}</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ trans('posts.button.save.value') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('javascript-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    {{-- filemanager --}}
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    {{-- TinyMCE5 --}}
    <script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(document).ready(function(){
            const generateSlug = (value) => {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, "")
            }

            //Event: slug
            $('#input_post_title').change(function(event){
                $('#input_post_slug').val(generateSlug(event.target.value))
            });

            //event: file manager
            $('#button_post_thumbnail').filemanager('image');
            // Text editor content (TinyMCE5)
            $("#input_post_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar1: "fullscreen preview",
                toolbar2:
                    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            });
        });
    </script>
@endpush