@extends('layouts.dashboard')

@section('title')
   {{ trans('kategori.title.create') }}
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
               <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>{{ trans('kategori.title.create') }}</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     {{-- <li class="breadcrumb-item">{{Breadcrumbs::render('add_category')}}</li> --}}
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
                     <form action="{{ route('kategori.store') }}" method="POST">
                           @csrf
                           <!-- title -->
                           <div class="form-group">
                              <label for="input_category_title" class="font-weight-bold">
                              {{ trans('kategori.form_control.input.title.label') }}
                              </label>
                              <input id="input_category_title" value="{{ old('title') }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{ trans('kategori.form_control.input.title.placeholder') }}" />
                              @error('title')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <!-- slug -->
                           <div class="form-group">
                              <label for="input_category_slug" class="font-weight-bold">
                              {{ trans('kategori.form_control.input.slug.label') }}
                              </label>
                              <input id="input_category_slug" value="{{ old('slug') }}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="{{ trans('kategori.form_control.input.slug.placeholder') }}" readonly />
                              @error('slug')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <!-- thumbnail -->
                           <div class="form-group">
                              <label for="input_category_thumbnail" class="font-weight-bold">
                              {{ trans('kategori.form_control.input.thumbnail.label') }}
                              </label>
                              <div class="input-group">
                              <div class="input-group-prepend">
                                 <button id="button_category_thumbnail" data-input="input_category_thumbnail" data-preview="holder" class="btn btn-primary" type="button">
                                       {{ trans('kategori.button.browse.value') }}
                                 </button>
                              </div>
                              <input id="input_category_thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="{{ trans('kategori.form_control.input.thumbnail.placeholder') }}" readonly />
                              @error('thumbnail')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                              </div>
                           </div>
                           {{-- preview thumbnail --}}
                           <div id="holder"></div>
                           <!-- parent_category -->
                           <div class="form-group">
                              <label for="select_category_parent" class="font-weight-bold">{{ trans('kategori.form_control.select.parent_category.label') }}</label>
                              <select id="select_category_parent" name="parent_category" data-placeholder="{{ trans('kategori.form_control.select.parent_category.placeholder') }}" class="custom-select w-100">
                              @if (old('parent_category'))
                                 <option value="{{ old('parent_category')->id }}" selected>{{ old('parent_category')->title }}</option>
                              @endif
                              </select>
                           </div>
                           <!-- description -->
                           <div class="form-group">
                              <label for="input_category_description" class="font-weight-bold">
                              {{ trans('kategori.form_control.textarea.description.label') }}
                              </label>
                              <textarea id="input_category_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="{{ trans('kategori.form_control.textarea.description.placeholder') }}">{{ old('description') }}</textarea>
                              @error('description')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="float-right">
                              <a class="btn btn-warning px-4" href="{{ route('kategori.index') }}">{{ trans('kategori.button.back.value') }}</a>
                              <button type="submit" class="btn btn-primary px-4">{{ trans('kategori.button.save.value') }}</button>
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

@push('css-external')
   <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
   <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
   <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
   {{-- filemanager --}}
   <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('javascript-internal')
   <script>
      $(function() {
         //Generate slug
         function generateSlug(value){
            return value.trim()
               .toLowerCase()
               .replace(/[^a-z\d-]/gi, '-')
               .replace(/-+/g, '-').replace(/^-|-$/g, "");
         } 

         //Select2 parent category
         $('#select_category_parent').select2({
            theme: 'bootstrap4',
            language: "{{ app()->getLocale() }}",
            allowClear: true,
            ajax: {
               url: "{{ route('kategori.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.title,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });

         //event: input title
         $('#input_category_title').change(function() {
            let title = $(this).val();
            let parent_category = $('#select_category_parent').val() ?? "";
            $('#input_category_slug').val(generateSlug(title +" "+ parent_category));
         });

         //event: select parent category
         $('#select_category_parent').change(function() {
            let title = $('#input_category_title').val();
            let parent_category = $(this).val() ?? "";
            $('#input_category_slug').val(generateSlug(title +" "+ parent_category));
         });
         //event: file manager
         $('#button_category_thumbnail').filemanager('image');
      });
   </script>

@endpush