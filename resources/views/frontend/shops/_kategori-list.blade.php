@foreach ($kategori as $item)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $item->title }} <span class="badge bg-primary rounded-pill">2</span>
            {{-- @if ($kategori->descendants)
                @include('frontend.shops._kategori-list',[
                    'kategori' => $kategori->descendants
                ])
            @endif --}}
    </li>
@endforeach