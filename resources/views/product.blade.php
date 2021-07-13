@extends('layout.layout')

@section('content')


    <div class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-images">
                    <?php
                        $title = "title_".app()->getLocale();
                        $description = "description_".app()->getLocale();
                    ?>
                        <div class="product-main-image">
                            <div class="product-main-slider">
                                <?php
                                    $dirname = "images/products/product_id_".$product->id."/";
                                    $images = glob($dirname."*.{png,gif,jpg,jpeg}", GLOB_BRACE);

                                    //$imageUrl = $product->title_en." ".$product->brand." ".$product->id;
                                    //$imageUrl = str_replace(" ","_",$imageUrl);
                                    //$imageUrl = $product->id."/".$imageUrl;
                                ?>
                                @foreach($images as $image)
                                    <img src="{{"/".$image}}" alt="{{$product->$title}}">
                                @endforeach
                            </div>
                        </div>
                        @if(count($images)>1)
                            <div class="product-other-images">
                                @foreach($images as $image)
                                    <div class="product-other-images-item"><img src="{{"/".$image}}" alt="{{$product->$title}}"></div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-description">
                        <hr>
                        <a id="product-manufacturer" href="/catalog">{{$product->brand}}</a>
                        <h1 id="product-description-head">{{ $product->$title }}</h1>
                        <h2 id="product-description-price">{{ $product->price }}<span>₼</span></h2>
                        <div id="product-request-form">
                            <div class="product-request-qty-input"><span>{{ __('product.quantity') }}:</span><input id="product-request-quantity" type="number" name="quantity" min="1" max="999" value="1"></div>
                            <button id="product-request-button" href="">{{ __('product.order') }}</button>
                        </div>
                        <div id="product-request-modal">
                            <div id="product-request-modal-content">
                                <div class="product-request-modal-top"><i id="product-request-modal-closer" class="fas fa-times"></i></div>
                                <hr>
                                <div class="product-request-modal-product">
                                    <img src="{{"/".$images[0]}}" alt="">
                                    <div class="product-request-modal-product-spans">
                                        <span id="product-request-modal-product-title">{{ $product->$title }}</span>
                                        <br>
                                        <span id="product-request-modal-product-quantity">{{ __('product.quantity') }}: <span id="product-request-modal-quantity"></span></span>
                                    </div>
                                </div>
                                <div class="product-request-modal-form">
                                    <form action="/orderconfirm/{{ $product->id }}" method="POST">
                                        @csrf
                                        <input id="product-request-modal-input-quantity" type="hidden" name="quantity" required>
                                        <input type="text" placeholder="{{ __('product.name') }}" name="name" required>
                                        <input type="text" placeholder="{{ __('product.mobile') }}" name="mobile" required>
                                        <textarea id="" cols="30" rows="5" placeholder="{{ __('product.delivery') }}" name="delivery" required></textarea>
                                        <button type="submit">{{ __('product.confirm') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-features">
                <h2>{{ __('product.features') }}</h2>
                @if(!$feature->isEmpty())
                <table>
                    <?php
                        $property_name = "property_name_".app()->getLocale();
                        $property_value = "property_value_".app()->getLocale();
                    ?>
                    @foreach($feature as $item)
                        <tr>
                            <td class="feature-category">{{ $item->$property_name }}</td>
                            <td>{{ $item->$property_value }}</td>
                        </tr>
                    @endforeach

                </table>
                @endif
                <p id="product-features-description">{{ $product->$description }}</p>
            </div>
            <hr>

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