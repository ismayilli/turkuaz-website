@extends('layout.layout')

@section('content')

    <div class="admin-section">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h2>Add New Product</h2>

                    <label>Title (AZ)</label>
                    <input class="form-control" type="text" name="title_az" required>

                    <label>Title (RU)</label>
                    <input class="form-control" type="text" name="title_ru" required>

                    <label>Title (EN)</label>
                    <input class="form-control" type="text" name="title_en" required>

                    <label>Price</label>
                    <input class="form-control" type="number" name="price" required>

                    <label>Brand</label>
                    <select id="admin-brand-selector" class="form-control" name="brand">
                        <option value=""></option>
                        @foreach($brands as $item)
                            <option value="{{ $item->brand }}">{{$item->brand}}</option>
                        @endforeach
                    </select>
                    <a id="admin-brand-button" class="btn btn-primary">Add Brand</a>
                    <input class="form-control admin-brand-input" type="text" name="brand_new">

                    <label>Category</label>
                    <select id="admin-category-selector" class="form-control" name="category">
                        <option value=""></option>
                        @foreach($categories as $item)
                            <option value="{{ $item->category_en }}">{{ $item->category_en }}</option>
                        @endforeach
                    </select>
                    <a id="admin-category-button" class="btn btn-primary">Add Category</a>
                    <div class="admin-category-inputs">
                        <input class="form-control admin-category-input" type="text" name="category_az" placeholder="Category (AZ)">
                        <input class="form-control admin-category-input" type="text" name="category_ru" placeholder="Category (RU)">
                        <input class="form-control admin-category-input" type="text" name="category_en" placeholder="Category (EN)">
                    </div>

                    <label>Description (AZ)</label>
                    <textarea class="form-control" name="description_az"></textarea>
                    <label>Description (RU)</label>
                    <textarea class="form-control" name="description_ru"></textarea>
                    <label>Description (EN)</label>
                    <textarea class="form-control" name="description_en"></textarea>

                    <label>Sale</label>
                    <select class="form-control" name="sale">
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select>

                    <label>Featured</label>
                    <select class="form-control" name="featured">
                        <option value="featured">Featured</option>
                        <option value="nf">Not Featured</option>
                    </select>

                    <label>Features</label>
                    <div>
                        <div class="admin-features-clone" id="features-clone0">
                            <input placeholder="Feature Name (AZ)" class="form-control" type="text" name="property_name_az[]">
                            <input placeholder="Feature (AZ)" class="form-control" type="text" name="property_value_az[]">
                            <input placeholder="Feature Name (RU)" class="form-control" type="text" name="property_name_ru[]">
                            <input placeholder="Feature (RU)" class="form-control" type="text" name="property_value_ru[]">
                            <input placeholder="Feature Name (EN)" class="form-control" type="text" name="property_name_en[]">
                            <input placeholder="Feature (EN)" class="form-control" type="text" name="property_value_en[]">
                        </div>
                    </div>
                    <a id="add-feature-button" class="btn btn-primary">Add Feature</a>

                    <label>Product Images</label>
                    <input type="file" name="images[]" multiple>
                    <hr>
                    <button id="add-product-button" class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
            <div class="admin-edit-product-section">
                <h2>Edit Product</h2>
                <input placeholder="Product name"  type="text" name="">
                <button type="submit">Find</button>
            </div>
            <div class="admin-logout-button">
                <hr>
                <a href="/admin/logout" class="btn btn-primary">LOG OUT</a>
            </div>
        </div>
    </div>

@endsection