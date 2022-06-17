@foreach ($kategori as $item)
    <!-- category list -->
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto text-white">
        <!-- todo: show category title -->
        {{ str_repeat('-',$count) . ' ' . $item->title }}
        </label>
        <div>
        <!-- detail -->
            <a href="{{ route('kategori.show',['kategori' => $item]) }}" class="btn btn-sm btn-primary" role="button">
                <i class="fas fa-eye"></i>
            </a>
        <!-- edit -->
            <a href="{{ route('kategori.edit',['kategori' => $item]) }}" class="btn btn-sm btn-info" role="button">
                <i class="fas fa-edit"></i>
            </a>
        <!-- delete -->
            <form class="d-inline" action="{{ route('kategori.destroy', ['kategori' => $item]) }}" role="alert" method="POST" 
                alert-title="{{ trans('kategori.alert.delete.title') }}"
                alert-text="{{  trans('kategori.alert.delete.message.confirm',['title' => $item->title])  }}"
                alert-btn-cancel="{{ trans('kategori.button.cancel.value') }}"
                alert-btn-yes="{{ trans('kategori.button.delete.value') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        <!-- todo:show subcategory -->
        @if ($item->descendants && !trim(request()->get('keyword')))
            @include('dashboard.shops.kategori._kategori-list', [
                'kategori' => $item->descendants,
                'count' => $count + 2
            ])
        @endif
    </li>
<!-- end  category list -->
@endforeach