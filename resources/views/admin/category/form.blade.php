@php
    $model = $model ?? null;
@endphp
<form action="{{ $model ? route('admin.categories.update', $model) : route('admin.categories.store') }}" method="post">
    @if ($model)
@method('PUT')
    @endif
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="name">First name</label>
                <input type="text" class="form-control" id="name" placeholder="First name" name="name" value="{{ old('name', $model?->name) }}" required>
                <div class="invalid-feedback d-block">{{$errors->first('name')}}</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">select</option>
                      @foreach ($categories as $id => $value)
                            <option value="{{$id}}" {{old('parent_id', $model?->parent_id) == $id ? 'selected' : null}}>{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="invalid-feedback d-block">{{$errors->first('parent_id')}}</div>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary" type="submit">Submit form</button>

</form>
