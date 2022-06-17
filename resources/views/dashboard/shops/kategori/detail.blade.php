@extends('layouts.dashboard')

@section('title')
    {{ trans('kategori.title.detail') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('kategori.title.detail') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            {{ Breadcrumbs::render('kategori_detail',$kategori) }}
                        </li>
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
                        @if (file_exists(public_path($kategori->thumbnail)))
                            <!-- thumbnail:true -->
                            <div class="category-tumbnail" style="background-image: url('{{ asset($kategori->thumbnail) }}');"></div>
                        @else
                            <!-- thumbnail:false -->
                            <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                                <rect width="100%" height="100%" fill="#868e96"></rect>
                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                                    font-size="24">
                                    {{ $kategori->title }}
                                </text>
                            </svg>
                        @endif
                        <!-- title -->
                        <h2 class="my-1">
                            {{ $kategori->title }}
                        </h2>
                        <!-- description -->
                        <p class="text-justify">
                            {{ $kategori->description }}
                        </p>
                        <div class="d-flex justify-content-end">
                        <a href="{{ route('kategori.index') }}" class="btn btn-primary mx-1" role="button">
                            {{ trans('kategori.button.back.value') }}
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('css-internal')
<style>
    .category-tumbnail {
        width: 100%;
        height: 400px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
@endpush