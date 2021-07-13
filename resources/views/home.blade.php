@extends('layout.layout')

@section('content')

    <div class="categories-line">
        <div class="container">
            <ul id="categories-list">
                <li class="categories-list-item"><a href="/catalog?category={{ __('home.washbasin') }}">{{ __('home.washbasin') }}</a></li>
                <li class="categories-list-item"><a href="/catalog?category={{ __('home.toilet') }}">{{ __('home.toilet') }}</a></li>
                <li class="categories-list-item"><a href="/catalog?category={{ __('home.shower') }}">{{ __('home.shower') }}</a></li>
                <li class="categories-list-item"><a href="/catalog?category={{ __('home.urinal') }}">{{ __('home.urinal') }}</a></li>
                <li class="categories-list-item"><a href="/catalog?category={{ __('home.faucet') }}">{{ __('home.faucet') }}</a></li>
                <li class="categories-list-item"><a href="/catalog?category={{ __('home.bathtub') }}">{{ __('home.bathtub') }}</a></li>
            </ul>
        </div>
    </div>



    <div class="categories-select">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12 categories-select-box">
                            <a href="/catalog?category={{ __('home.washbasin') }}">
                                <div class="categories-select-item categories-select-item-head" style="background-image: url('{{ asset('/img/washbasin_cover.jpg') }}');">
                                    <span>{{ __('home.washbasin') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 categories-select-box">
                            <a href="/catalog?category={{ __('home.urinal') }}">
                                <div class="categories-select-item categories-select-item-sec" style="background-image: url('{{ asset('/img/urinal_cover.jpg') }}');">
                                    <span>{{ __('home.urinal') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 categories-select-box">
                            <a href=/catalog?category={{ __('home.shower') }}">
                                <div class="categories-select-item categories-select-item-sec" style="background-image: url('{{ asset('/img/shower_cover.png') }}');">
                                    <span>{{ __('home.shower') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6 categories-select-box">
                            <a href="/catalog?category={{ __('home.faucet') }}">
                                <div class="categories-select-item categories-select-item-sec" style="background-image: url('{{ asset('/img/faucet_cover.jpg') }}');">
                                    <span>{{ __('home.faucet') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 categories-select-box">
                            <a href="/catalog?category={{ __('home.toilet') }}">
                                <div class="categories-select-item categories-select-item-sec" style="background-image: url('{{ asset('/img/toilet_cover.png') }}');">
                                    <span>{{ __('home.toilet') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 categories-select-box">
                            <a href="/catalog?category={{ __('home.bathtub') }}">
                                <div class="categories-select-item categories-select-item-head" style="background-image: url('{{ asset('/img/bathtub_cover.jpg') }}');">
                                    <span>{{ __('home.bathtub') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-page-banner">
        <div class="middle-page-single">
            <a href="catalog"><img src="{{ asset('/img/banner.png') }}" alt="Turkuaz Baku Create your Design"></a>
        </div>
        <div class="middle-page-multiple">
            <div class="middle-page-multiple-div"><img src="{{ asset('/img/banner.png') }}" alt="Turkuaz Baku Create your Design"></div><div class="middle-page-multiple-div"><img src="/img/banner.png"></div>
        </div>
    </div>

    <div class="products-catalog-home">
        <div class="container">
            <div class="products-catalog-home-head-div">
                <h2 id="products-catalog-home-head">{{ __('home.featured') }}</h2>
                <a href="catalog" id="featured-products-more-button">{{ __('home.showAll') }}<i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            <div class="row">

                @foreach($product as $item)
                    <?php
                        $dirname = "images/products/product_id_".$item->id."/";
                        $images = glob($dirname."*.{png,gif,jpg,jpeg}", GLOB_BRACE);

                        //$imageUrl = $item->title_en." ".$item->brand." ".$item->id;
                        //$imageUrl = str_replace(" ","_",$imageUrl);
                        //$imageUrl = $item['id']."/".$imageUrl."_1.png";
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <a href="product/{{$item->id}}">
                            <div class="products-catalog-item">
                                <div class="products-catalog-item-img">
                                    <img src="{{ asset("/".$images[0]) }}" alt="{{$item->title}}">
                                </div>
                                <hr>
                                <div class="products-catalog-item-description">
                                    <?php $title = "title_" . app()->getLocale(); ?>
                                    <span class="products-catalog-item-title">{{$item->$title}}</span>
                                    <br>
                                    <span class="products-catalog-item-price">{{$item->price}}<span>₼</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
            <div class="featured-products-more-button-res-div"><a href="catalog" id="featured-products-more-button-res">{{ __('home.showAll') }}<i class="fas fa-long-arrow-alt-right"></i></a></div>
        </div>
    </div>

    <div class="brands-home">
        <div class="container">
            <div class="brands-home-container">
                <h2 id="brands-home-headline">{{ __('home.brands') }}</h2>
                <div class="brands-home-left"><i class="fas fa-chevron-left"></i></div>
                <div class="brands-home-row">
                    <div class="brands-home-row-class">
                        <div class="brands-home-col"><a href="/catalog?brand[]=Turkuaz%20Seramik"><img src="{{ asset('/img/turkuaz.png') }}" alt="Turkuaz Baku"></a></div>
                        <div class="brands-home-col"><a href="/catalog?brand[]=Kale"><img src="{{ asset('/img/kale.png') }}" alt="Kale Baku"></a></div>
                        <div class="brands-home-col"><a href="/catalog?brand[]=Creavit"><img src="{{ asset('/img/creavit.png') }}" alt="Creavit Baku"></a></div>
                        <div class="brands-home-col"><a href="/catalog?brand[]=Durabagno"><img src="{{ asset('/img/durabagno.png') }}" alt="Durabagno Baku"></a></div>
                        <div class="brands-home-col"><a href="/catalog?brand[]=Artema"><img src="{{ asset('/img/artema.jpg') }}" alt="Artema Baku"></a></div>
                    </div>
                </div>
                <div class="brands-home-right"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </div>

@endsection