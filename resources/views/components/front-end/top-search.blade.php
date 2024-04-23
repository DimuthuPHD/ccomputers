<div class="header_search_wrapper">
   <form action="{{route('fr.store')}}">
    <input type="text" placeholder="Search here" name="search" value="{{request()->get('search')}}">
    <select name="cat">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{$category->slug}}" {{request()->get('cat') == $category->slug ? 'selected' : null}}>{{$category->name}}</option>
        @endforeach
    </select>
    <button>
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
   </form>
</div>
