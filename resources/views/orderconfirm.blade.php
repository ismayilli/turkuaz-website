@extends('layout.layout')

@section('content')


    <div class="product-section">
        <div class="container">

            <div class="product-order-confirm">
                <?php
                    $title = "title_".app()->getLocale();
                    $dirname = "images/products/product_id_".$product->id."/";
                    $images = glob($dirname."*.{png,gif,jpg,jpeg}", GLOB_BRACE);
                ?>

                <div class="product-order-confirm-product">
                    <h1>{{ __('product.orderconfirmed')  }}</h1>
                    <p>{{ __('product.ordercontact') }}</p><hr>
                    <a href="/product/{{ $product->id }}">
                        <div class="order-confirm-product-box">

                                    <?php
                                        $dirname = "images/products/product_id_".$product->id."/";
                                        $images = glob($dirname."*.{png,gif,jpg,jpeg}", GLOB_BRACE);
                                    ?>
                                    <img src="{{ "/".$images[0] }}" alt="">
                                    <h3 id="order-confirm-title">{{ $product->$title}} <span>({{ $quantity." ".__('product.piece') }})</span></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="products-more-interested">
                <h2>{{ __('product.similarProducts') }}</h2>
                <div class="row">

                    @foreach($products as $item)
                        <?php
                        $dirname = "images/products/product_id_".$item->id."/";
                        $images = glob($dirname."*.{png,gif,jpg,jpeg}", GLOB_BRACE);

                        //$imageUrl = $item->title_en." ".$item->brand." ".$item->id;
                        //$imageUrl = str_replace(" ","_",$imageUrl);
                        //$imageUrl = $item['id']."/".$imageUrl."_1.png";
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="/product/{{ $item->id }}">
                                <div class="products-catalog-item">
                                    <div class="products-catalog-item-img">
                                        <img src="{{ "/".$images[0] }}">
                                    </div>
                                    <hr>
                                    <div class="products-catalog-item-description">
                                        <?php $title = "title_" . app()->getLocale(); ?>
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
        </div>
    </div>


@endsection