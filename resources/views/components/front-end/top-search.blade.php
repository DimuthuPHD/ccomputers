<div class="header_search_wrapper">
   <form action="">
    <input type="text" placeholder="Search here">
    <select>
        <option value="0" selected="selected">All Categories</option>

        @foreach ($categories as $category)
            <option value="{{$category->slug}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button>
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
   </form>
</div>
