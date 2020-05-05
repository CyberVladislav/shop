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
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderProducts as $orderProduct)
                            <tr class="js-tr-del-product-{{$orderProduct->id}}"> 
                                <td width="65%">
                                    <div class="media">
                                        <div class="d-flex">                              
                                        <a href="{{asset('product/'.$orderProduct->id)}}"><img src="{{$orderProduct->image}}" alt="" width=152px height=102px></a>
                                        </div>
                                        <div class="media-body">
                                            <p>{{$orderProduct->description}}</p> 
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{$orderProduct->price}}</h5>
                                </td>
                                <td width="67" class="text-center">
                                    <div class="product_count">
                                        <div class="inputTN">
                                            <input class="inputTN__input price-choosen-product" id="product_{{$orderProduct->id}}" count="{{$orderProduct->productsCartCount()}}" id-of-product="{{$orderProduct->id}}" price-of-product="{{$orderProduct->price}}" type="text" pattern="^[0-9]+$" value="{{$orderProduct->productsCartCount()}}">
                                            <div class="inputTN__top" id-of-product="{{$orderProduct->id}}" ></div>
                                            <div class="inputTN__bottom" id-of-product="{{$orderProduct->id}}"></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="14%" class="text-center">
                                    <h5 class="price-product-{{$orderProduct->id}}">${{$orderProduct->price}}</h5>
                                </td>
                                <td width="4%" class="d-flex">
                                    <i class="fa fa-lg fa-close" style="cursor: pointer;" js-del-product="{{$orderProduct->id}}"></i> 
                                </td>
                            </tr>                         
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="bottom_button col-md-9">
                        <div class="cupon_text d-flex align-items-center ml-md-3">
                            <input type="text" placeholder="Coupon Code" style="width: 200px;padding: 0px 15px;border-radius: 3px;border: 1px solid #eeeeee;height: 40px;
                            font-size: 14px;color: #cccccc;font-family: Roboto, sans-serif;font-weight: normal;margin-right: -3px;outline: none;box-shadow: none;">
                                <a class="primary-btn" href="##" style="height: 40px;line-height: 38px;text-transform: uppercase;padding: 0px 38px;margin-right: -3px;
    border-radius: 0;">Apply</a>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center mt-3 mt-lg-0" >
                        <h5 style="font-size: 20px;">Subtotal:</h5>
                        <div class="ml-3">
                            <h5 class="sub-total js-subtotal" style="font-size: 20px;"></h5>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <div class="container pt-5">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" id="billing-form">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="js-first" name="firstName" placeholder="First name*" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="js-last" name="firstName" placeholder="Last name*" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control mask-phone" id="js-phone" name="phone" placeholder="Phone number*" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="js-postcode" name="postcode" placeholder="Postcode/ZIP*" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="js-address" name="address" placeholder="Address*" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="js-city" name="city" placeholder="City*" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                </div>
                                <textarea class="form-control" id="js-notes" name="notes" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><span class="product-order-list-head">Product <span class="float-right">Total</span></span></li>
                                @foreach ($orderProducts as $orderProduct)
                                    <li class="align-items-baseline d-flex justify-content-between js-tr-del-product-{{$orderProduct->id}}">
                                        <div class="align-items-baseline d-flex"><a href="{{ asset('product/'.$orderProduct->id) }}" class="product-order-list">{{$orderProduct->brand}} {{$orderProduct->name}}</a>
                                            <span class="middle ml-2 text-dark js-count-product-{{$orderProduct->id}}"></span>
                                        </div>
                                        <span class="price-product-{{$orderProduct->id}}">${{$orderProduct->price}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li><span class="product-order-list">Total <span class="float-right sub-total"></span></span></li>
                            </ul>
                            <a class="primary-btn js-billing-btn" href="##">Proceed to Paypal</a>
                            <div id="js-help-error-cart" style="color: red;text-align: center"></div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
	<!-- Already send order modal  -->
	<div class="modal fade" id="alreadySendModal" tabindex="-1" role="dialog" aria-labelledby="alreadySendModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content align-items-center">
				<div class="modal-body text-center text-warning h5">
					The order already received.
				</div>
			</div>
		</div>
	</div>
<!-- End already send order modal -->
@endsection('content')
