<ul class="pl-1 my-1" style="list-style: none;">
    @foreach ($kategori as $kategori)
    <li class="form-group form-check my-1">
        @if ($categoryChecked && in_array($kategori->id, $categoryChecked))  
            <input class="form-check-input" value="{{ $kategori->id }}" type="checkbox" name="category[]" checked>
        @else
            <input class="form-check-input" value="{{ $kategori->id }}" type="checkbox" name="category[]">
        @endif
        <label class="form-check-label">
            {{ $kategori->title }}
        </label>
        @if ($kategori->descendants)
            @include('dashboard.shops._kategori-list',[
                'kategori' => $kategori->descendants
            ])
        @endif
    </li>
    @endforeach
</ul>