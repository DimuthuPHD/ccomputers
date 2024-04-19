<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="#">
                Home
            </a>
        </li>

        @foreach ($categories as $category)
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{$category->name}}
                </a>
            </li>
        @endforeach


    </ul>
</div>
