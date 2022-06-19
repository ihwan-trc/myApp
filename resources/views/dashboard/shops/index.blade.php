@extends('layouts.dashboard')

@section('title')
    {{ trans('shops.title.index') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('shops.title.index') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">{{ Breadcrumbs::render('shops') }}</li>
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
                        <form action="" method="GET" class="form-inline form-row">
                            <div class="col-6">
                                <div class="input-group mx-1">
                                    <select name="status" class="custom-select">
                                        @foreach ($statuses as $value => $label)
                                            <option value="{{ $value }}" {{ $statusSelected == $value ? 'selected' : null }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">{{ trans('shops.button.apply.value') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mx-1">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="{{ trans('shops.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-tools">
                            @can('post_create')
                                <a href="{{ route('shops.create') }}" class="btn btn-primary" role="button">
                                    {{ trans('shops.button.create.value') }}
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 1%">
                                    No
                                </th>
                                <th class="text-center">
                                    Title
                                </th>
                                <th class="text-center">
                                    Description
                                </th>
                                <th class="text-center">
                                    Status
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        {{ $post->title }}
                                    </a>
                                    <br/>
                                    <small>
                                        {{ $post->updated_at }}
                                    </small>
                                </td>
                                <td>
                                    {{ Str::limit($post->description, 50) }}
                                </td>
                                <td class="project-state">
                                    <span class="badge {{ $post->status == 'draft' ? 'badge-info' : 'badge-success' }}"> 
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td class="project-actions text-center">
                                    <!-- detail -->
                                    @can('post_detail')
                                        <a class="btn btn-primary btn-sm" href="{{ route('shops.show', ['shop' => $post]) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan
                                    <!-- edit -->
                                    @can('post_update')
                                        <a class="btn btn-info btn-sm" href="{{ route('shops.edit', ['shop' => $post]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    <!-- delete -->
                                    @can('post_delete')
                                        <form class="d-inline" role="alert" alert-text="{{ trans('shops.alert.delete.message.confirm',['title' => $post->title]) }}"  action="{{ route('shops.destroy',['shop' => $post]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                                <p>
                                    <strong>
                                        @if (request()->get('keyword'))
                                            {{ trans('shops.label.no_data.search',['keyword'=> request()->get('keyword')]) }}
                                        @else
                                            {{ trans('shops.label.no_data.fetch') }}
                                        @endif
                                    </strong>
                                </p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function(){

            //Event : Delete tag
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "{{ trans('shops.alert.delete.title') }}",
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('shops.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('shops.button.delete.value') }}",
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
