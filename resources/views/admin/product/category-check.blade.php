@php
    $cat_ids = $cat_ids  ?? [];
@endphp
<div>
    <input type="checkbox" name="categories[]" id="category_{{ $child->id }}" value="{{ $child->id }}" {{in_array($child->id, $cat_ids) ?    'checked' : null}}>
    <label for="category_{{ $child->id }}">{{ $prefix }} {{ $child->name }}</label>
</div>
@if($child->children->isNotEmpty())
    <div style="margin-left: 20px;">
        @foreach($child->children as $subChild)
            @include('admin.product.category-check', ['child' => $subChild, 'prefix' => $prefix.'-', 'cat_ids' => $cat_ids])
        @endforeach
    </div>
@endif
