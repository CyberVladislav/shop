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
                    <table class="table" style="border-bottom: 1px solid #aaa">
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
                                            <div class="mr-auto">
                                                                    <!-- ДОБАВИТЬ В БД КОЛИЧЕСТВО ТОВАРА И ЗАПИСЫВАТЬ ИЗ БД В COUNT  -->
                                                <!-- <select class="price-choosen-product" count="1" id-of-product="{{$numbOfOrderProduct->id}}"  price-of-product="{{$numbOfOrderProduct->price}}">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>           
                                                </select> -->
                                                <input  class="price-choosen-product" count="1" id-of-product="{{$numbOfOrderProduct->id}}"  price-of-product="{{$numbOfOrderProduct->price}}" type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                                    class="input-text qty">
                                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                    class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                    class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                            </div>   
                                        </div>
                                </td>
                                <td>
                                    <h5 class="price-product-{{$numbOfOrderProduct->id}}">${{$numbOfOrderProduct->price}}</h5>
                                </td>
                            </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="bottom_button col-md-9">
                        <div class="cupon_text d-flex align-items-center">
                            <input type="text" placeholder="Coupon Code">
                                <a class="primary-btn" href="#">Apply</a>
                                <a class="gray_btn" href="#">Close Coupon</a>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex py-xl-3 align-items-center" >
                        <h5 class="ml-3">Subtotal</h5>
                        <div class="ml-5">
                            <h5 class="sub-total"></h5>
                        </div>
                    </div>
                </div>
                <div class="shipping_area ">
                    <div>
                        <h5>Shipping</h5>
                    </div> 
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
                </div>
                <div class="out_button_area">                                                                       
                    <div class="checkout_btn_inner d-flex align-items-center">
                        <a class="gray_btn" href="{{ asset('category')}}">Continue Shopping</a>
                        <a class="primary-btn" href="{{ asset('checkout')}}">Proceed to checkout</a>
                    </div>                                
                </div>                
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection('content')
