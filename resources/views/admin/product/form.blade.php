@php
    $model = $model ?? null;
@endphp
<style>
    .cat-container {
        height: 410px;
        overflow-x: scroll;
    }

    .prodouct-image-container {
        width: 250px;
        height: 250px;
        position: relative;
        float: inline-end;
    }

    .remove_image {
        position: absolute;
        z-index: 999;
        font-size: 20px;
        color: red;
        right: 0;
        background: white;
        top: -26;
    }
</style>
<form action="{{ $model ? route('admin.products.update', $model) : route('admin.products.store') }}" method="post"
    enctype="multipart/form-data">
    @if ($model)
        @method('PUT')
    @endif
    <div class="form-row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                    value="{{ old('name', $model?->name) }}" required>
                <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
            </div>

            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" placeholder="Price" name="price"
                    value="{{ old('price', $model?->price) }}" required min="0">
                <div class="invalid-feedback d-block">{{ $errors->first('price') }}</div>
            </div>

            <div class="mb-3">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" placeholder="Stock" name="stock"
                    value="{{ old('stock', $model?->stock) }}" required min="0">
                <div class="invalid-feedback d-block">{{ $errors->first('stock') }}</div>
            </div>


            <div class="mb-3">
                <label for="stock">images</label>
                <input type="file" class="form-control" id="stock" name="images[]" multiple>
                <div class="invalid-feedback d-block">{{ $errors->first('images') }}</div>
            </div>
            <div class="mb-3">
                <label for="stock">images</label><br>
                @php
                    $mediaItems = $model?->getMedia('product-images');
                @endphp

                @if ($mediaItems)
                    @foreach ($mediaItems as $key => $image)
                        <div class="prodouct-image-container">
                            <a href="{{ route('admin.products.delete.images', [$model->id, $image->id]) }}"
                                class="remove_image"><i class="fas fa-fw fa-window-close"></i></a>
                            <img src="{{ $image->getFullUrl() }}" alt="" class="product-images">
                        </div>
                    @endforeach
                @endif
            </div>
            @csrf
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>

        <div class="col-md-6 cat-container">
            @foreach ($categories as $category)
                @php
                    $cat_ids = $model ? $model->categories->pluck('id')->toArray() : [];
                @endphp
                <div>
                    <input type="checkbox" name="categories[]" id="category_{{ $category->id }}"
                        value="{{ $category->id }}" {{ in_array($category->id, $cat_ids) ? 'checked' : null }}>
                    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                </div>
                @if ($category->children->isNotEmpty())
                    <div style="margin-left: 20px;">
                        @foreach ($category->children as $child)
                            @include('admin.product.category-check', [
                                'child' => $child,
                                'prefix' => '-',
                                'cat_ids' => $cat_ids,
                            ])
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>

    </div>
</form>
