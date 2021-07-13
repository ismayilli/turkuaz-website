@extends('layout.layout')

@section('content')

    <div class="catalog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <form action="" method="GET">
                        @if(request()->has('search'))
                            <input type="hidden" name="search" value="{{ request()->search }}">
                        @endif
                        @if(request()->has('category'))
                            <input type="hidden" name="category" value="{{ request()->category }}">
                        @endif
                    <div class="catalog-left-side-filter-res-button">
                        <h3 id="catalog-left-side-filter-res-head">{{ __('catalog.filter') }}</h3>
                    </div>
                    <div class="catalog-left-side-filter">
                        <div class="catalog-left-filter catalog-filter-categories">
                            <?php
                                $category = "category_".app()->getLocale();
                            ?>
                            <h4>{{ __('catalog.categories') }}</h4>
                            <hr>
                            @foreach($category_db as $item)
                                <input class="filter-link-input" type="submit" value="{{ $item->$category }}" name="category">
                            @endforeach
                        </div>
                        <div class="catalog-left-filter catalog-filter-brands">
                            <h4>{{ __('catalog.brands') }}</h4>
                            <hr>
                            @foreach($brand_db as $item)
                                @if(request()->has('brand'))
                                    @if(in_array($item->brand ,request()->brand))
                                        <input id="filter-brands" style="display: none" class="filter-link-input" type="checkbox" value="{{ $item->brand }}" name="brand[]" checked>
                                        <label for="filter-brands">{{ $item->brand }}</label>
                                    @else
                                        <input class="filter-link-input" type="submit" value="{{ $item->brand }}" name="brand[]">
                                    @endif
                                @else
                                    <input class="filter-link-input" type="submit" value="{{ $item->brand }}" name="brand[]">
                                @endif
                            @endforeach
                        </div>
                        <div class="catalog-left-filter catalog-filter-price">
                            <h4>{{ __('catalog.price') }}</h4>
                            <hr>
                            <div class="catalog-filter-price-inside">
                                    <div class="filter-price-input"><input name="min" type="number" placeholder="{{ __('catalog.min') }}" value="<?php if(isset($_GET['min'])) echo $_GET['min']; ?>"></div>
                                    <div class="filter-price-input"><input name="max" type="number" placeholder="{{ __('catalog.max') }}" value="<?php if(isset($_GET['max'])) echo $_GET['max']; ?>"></div>
                                    <button class="filter-submit-button" type="submit">{{ __('catalog.priceButton') }}</button>
                            </div>
                        </div>
                    </form>
                    <a id="reset-filter-button" href="/catalog">{{ __('catalog.reset') }}</a>
                        <!--<div class="catalog-left-filter catalog-filter-sizes">
                            <h4>{{ __('catalog.sizes') }}</h4>
                            <hr>
                            <a href=""><div class="input-checkbox"></div><span>30x60</span></a>
                            <a href=""><div class="input-checkbox"></div><span>30x60</span></a>
                            <a href=""><div class="input-checkbox"></div><span>30x60</span></a>
                            <a href=""><div class="input-checkbox"></div><span>30x60</span></a>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="catalog-right-side-products">
                        <div class="catalog-filter-options">
                            <span>{{ $allProducts->count() }} {{ __('catalog.results') }}</span>
                        </div>
                        <hr>
                        <div class="catalog-filters">
                            @if(request()->has('search'))
                                <span style="background-color: #4F5ACF;" class="catalog-filters-span"><i class="fas fa-times"></i>{{ request()->search }}</span>
                            @endif
                            @if(request()->has('category'))
                                <span style="background-color: #39C6C9;" class="catalog-filters-span"><i class="fas fa-times"></i>{{ request()->category }}</span>
                            @endif
                            @if(request()->has('brand'))
                                @foreach(request()->brand as $item)
                                    <span style="background-color: #35C359;" class="catalog-filters-span"><i class="fas fa-times"></i>{{ $item }}</span>
                                @endforeach
                            @endif
                            @if(request()->has('min')&&!empty(request()->min))
                                    <span style="background-color: #FFC300;" class="catalog-filters-span"><i class="fas fa-times"></i>min: {{ request()->min }}₼</span>
                            @endif
                            @if(request()->has('max')&&!empty(request()->max))
                                <span style="background-color: #FFC300;" class="catalog-filters-span"><i class="fas fa-times"></i>max: {{ request()->max }}₼</span>
                            @endif
                        </div>
                        <div class="catalog-products">
                            <div class="row">

                                @foreach($products as $item)
                                    <?php
                                        $dirname = "images/products/product_id_".$item->id."/";
                                        $images = glob($dirname."*.{png,gif,jpg,jpeg}", GLOB_BRACE);

                                        //$imageUrl = $item->title_en." ".$item->brand." ".$item->id;
                                        //$imageUrl = str_replace(" ","_",$imageUrl);
                                        //$imageUrl = $item['id']."/".$imageUrl."_1.png";
                                    ?>
                                    <div class="col-sm-6 col-md-4">
                                        <a href="/product/{{ $item->id }}">
                                            <div class="products-catalog-item">
                                                <?php $title = "title_" . app()->getLocale(); ?>
                                                <div class="products-catalog-item-img">
                                                    <img src="{{ "/".$images[0] }}" alt="{{$item->$title}}">
                                                </div>
                                                <hr>
                                                <div class="products-catalog-item-description">
                                                    <span class="products-catalog-item-title">{{ $item->$title }}</span>
                                                    <br>
                                                    <span class="products-catalog-item-price">{{ $item->price }}<span>₼</span></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        @if(count($allProducts)>12)
                            <div class="catalog-products-pager">
                                {{ $products->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection