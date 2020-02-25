@extends('layouts.base')
@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ asset('/') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ asset('cart') }}">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($numbOfOrderProducts as $numbOfOrderProduct)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">                                        
                                        
                                            <img src="img/cart.jpg" alt="">
                                            <!-- <img src="{{$numbOfOrderProduct->image}}" alt=""> -->
                                            <!-- <img class="img-fluid" src = "{{$numbOfOrderProduct->image}}" alt=""></a> -->

                                        </div>
                                        <div class="media-body">

                                            <!-- При вставке описания едет разметка  -->
                                            <!-- <p>{{$numbOfOrderProduct->description}}</p> --> 
                                            <p>Test descriptin</p>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{$numbOfOrderProduct->price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <div class="sorting mr-auto">
                                                                <!-- ДОБАВИТЬ В БД КОЛИЧЕСТВО ТОВАРА И ЗАПИСЫВАТЬ ИЗ БД В COUNT  -->
                                            <select class="price-choosen-product" count="1" id-of-product="{{$numbOfOrderProduct->id}}"  price-of-product="{{$numbOfOrderProduct->price}}">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>   
                                    </div>
                                </td>
                                <td>
                                    <h5 class="price-product-{{$numbOfOrderProduct->id}}">${{$numbOfOrderProduct->price}}</h5>
                                </td>
                            </tr>                          
                            @endforeach
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5 class="sub-total"></h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="{{ asset('category')}}">Continue Shopping</a>
                                        <a class="primary-btn" href="{{ asset('checkout')}}">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection('content')
