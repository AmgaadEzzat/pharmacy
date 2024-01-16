@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">
                                        {{__('admin/index.Main')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">
                                        {{__('admin/index.Products')}} </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('admin/products.Add product')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">
                                        {{__('admin/sidebar.Add new product')}}
                                    </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('store.newSupplyPharmacy')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>
                                                    {{__('admin/products.Basic data of the product')}}
                                                </h4>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{__('admin/products.Select the pharmacy')}}
                                                            </label>
                                                            <select name="pharmacy" class="select2 form-control">
                                                                    @if($pharmacies && $pharmacies -> count() > 0)
                                                                        @foreach($pharmacies as $pharmacy)
                                                                            <option
                                                                                value="{{$pharmacy -> id }}">
                                                                                {{$pharmacy -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                            </select>
                                                            @error('pharmacy')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{__('admin/products.Select the store')}}
                                                            </label>
                                                            <select id="store-select" name="store"
                                                                    class="select2 form-control">
                                                                    @if($stores && $stores -> count() > 0)
                                                                        @foreach($stores as $store)
                                                                            <option
                                                                                value="{{$store -> id }}">
                                                                                {{$store -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                            </select>
                                                            @error('store')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="products-container" class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{__('admin/products.Choose the medicine')}}
                                                            </label>
                                                            <select id="product-select" name="product"
                                                                    class="select2 form-control">
                                                            </select>
                                                            @error('product')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{__('admin/products.Price')}}
                                                            </label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="price">
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{__('admin/index.Quantity')}}
                                                            </label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="quantity">
                                                            @error("quantity")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>
                                                    {{__('admin/index.Back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{__('admin/index.Add')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('#store-select').change(function() {
                var storeId = $(this).val();
                // Send an AJAX request to retrieve the products
                $.ajax({
                    url: '{{route('getProducts')}}',
                    type: 'GET',
                    data: { storeId: storeId },
                    success: function(response) {
                        // Clear the existing products
                        $('#product-select').empty();
                        // Append the retrieved products to the container
                        $.each(response.products, function(index, product) {
                            var optionHtml = '<option value="' +
                                product.id + '">' + product.name + " >>> الكميه "
                                +  product.pivot.quantity  + '</option>';
                            $('#product-select').append(optionHtml);
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
