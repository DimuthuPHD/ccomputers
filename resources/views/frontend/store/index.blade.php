@extends('frontend.layouts.master')
@section('content')
@push('styles')
<link href="{{asset('css/shop.css')}}" rel="stylesheet">
@endpush

    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Store </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Store </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

    <!-- shop sidebar wrapper start -->
    <div class="shop_sidebar_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="sidebar_widget">
                        <h4>Categories</h4>
                        <div class="accordion_wrapper">
                            <div class="panel-group" id="accordion_wrapperLeft">
                                @foreach ($categories as $category)
                                    @if ($category->children->isEmpty())
                                        <div class="panel panel-default">
                                            <div class="panel-heading no-toggle">
                                                <h2 class="panel-title">
                                                    <a href="{{ route('fr.store', ['cat' => $category->slug]) }}">
                                                        {{ $category->name }} ({{ $category->products->count() }})
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapse{{ $category->id }}" aria-expanded="false">
                                                        {{ $category->name }} ({{ $category->products->count() }})
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapse{{ $category->id }}" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                                <div class="panel-body">
                                                    <ul>
                                                        @foreach ($category->children as $child)
                                                            <li>
                                                                <a href="{{ route('fr.store', ['cat' => $child->slug]) }}">
                                                                    {{ $child->name }} ({{ $child->products->count() }})
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--end of /.panel-group-->
                        </div>

                        <!--end of accordion_wrapper-->
                    </div>

                    <div class="sidebar_widget">
                        <h4>filter by price</h4>
                        <div class="widget price-range">
                            <form action="{{ route('fr.store', array_diff(explode(',', http_build_query(request()->except('price'))), ['price'])) }}" method="get">
                                <ul>
                                    <li class="range">
                                        <div id="range-price" class="range-box"></div>
                                        <span>from:</span>
                                        <input type="text" id="price" name="price" class="price-box" readonly/>
                                    </li>
                                    <button type="submit" class="btn">Filter</button>
                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="sidebar_shop_right">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content btc_shop_index_content_tabs_main">
                                    <div id="grid" class="tab-pane fade in active">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                <x-front-end.store-product :product="$product"></x-front-end.store-product>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- blog_pagination_section start -->
                            <div class="shop_pagination_section">
                                <ul>
                                    <li>
                                        <a href="{{ $products->previousPageUrl() }}" class="prev"> previous</a>
                                    </li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li><a href="{{ $products->url($i) }}" class="{{ $products->currentPage() == $i ? 'active_pagination' : '' }}">{{ $i }}</a></li>
                                    @endfor
                                    <li>
                                        <a href="{{ $products->nextPageUrl() }}" class="next">next</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- blog_pagination_section end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- shop sidebar end -->
@endsection
