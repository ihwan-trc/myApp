@extends('layouts.dashboard')

@section('title')
    {{ trans('kategori.title.index') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('kategori.title.index') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            {{ Breadcrumbs::render('kategori') }}
                        </li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="{{ route('kategori.index') }}" method="GET">
                            <div class="input-group">
                                <input name="keyword" type="search" class="form-control" placeholder="{{ trans('kategori.form_control.input.search.placeholder') }}" value="{{ request()->get('keyword') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="col-md-6">
                                <a href="{{ route('kategori.create') }}" class="btn btn-primary float-right" role="button">
                                    {{ trans('kategori.title.create') }}
                                    <i class="fas fa-plus-square"></i>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list category -->
                        @if (count($kategori))
                            @include('dashboard.shops.kategori._kategori-list', [
                                'kategori' => $kategori,
                                'count' => 0
                            ])
                        @else
                            <p>
                                <strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('kategori.label.no_data.search',['keyword' => request()->get('keyword') ]) }}
                                    @else
                                        {{ trans('kategori.label.no_data.fetch') }}
                                    @endif
                                </strong>
                            </p>
                        @endif
                    </ul>
                </div>
                
                @if ($kategori->hasPages())
                <div class="card-footer">
                    {{ $kategori->links('vendor.pagination.bootstrap-4') }}
                </div>
                @endif
                
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            //event : delete category
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush