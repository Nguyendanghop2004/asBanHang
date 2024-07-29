@extends('Client.layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">
                                Cart
                            </h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Salessa
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Cart
                                </li>
                            </ol>
                        </div>
                        <a href="#" class="white_btn3">Create Report</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card QA_section border-0">
                        <div class="card-body QA_table">
                            <div class="table-responsive shopping-cart">
                                <table class="table mb-0">
                                    <thead>

                                        <tr>
                                            <th class="border-top-0">
                                                Product
                                            </th>
                                            <th class="border-top-0">
                                                Price
                                            </th>
                                            <th class="border-top-0">
                                                Quantity
                                            </th>
                                            <th class="border-top-0">
                                                Total
                                            </th>
                                            <th class="border-top-0">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $key => $item)
                                            {{-- @dd($cart) --}}
                                            <tr>
                                                <td>
                                                    <img src=" {{ \Storage::url($item['img_thumbnail']) }}" alt
                                                        height="52" />
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href
                                                            class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">{{ $item['name'] }}</a><br /><span
                                                            class="text-muted font_s_13">size-08 (Model
                                                            2019)</span>
                                                    </p>
                                                </td>
                                                <td>{{ $item['price_regular'] }}</td>
                                                <td>
                                                    <input class="form-control w-25" type="number"
                                                        value="{{ $item['quantity'] }}" id="example-number-input1" />
                                                </td>
                                                <td>
                                                    @php
                                                            echo $cum = $item['quantity'] *$item['price_regular']
                                                    @endphp 
                                                </td>
                                                <td>
                                                    <a href class="text-dark"><i
                                                            class="far fa-times-circle font_s_18"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="row justify-content-end mt_30">
                                <div class="col-md-6">
                                    <div class="total-payment p-3">
                                        <h4 class="header-title">
                                            Total Payment
                                        </h4>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="payment-title">
                                                        Subtotal
                                                    </td>
                                                    <td>$496.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">
                                                        Shipping
                                                    </td>
                                                    <td>
                                                        <ul class="list-unstyled mb-0">
                                                            <li>
                                                                <div class="radio radio-primary">
                                                                    <input type="radio" name="radio" id="radio_1"
                                                                        value="option_1" checked="checked" />
                                                                    <label class="form-label" for="radio_1">Shipping
                                                                        Charge
                                                                        :
                                                                        $5.00</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio radio-primary">
                                                                    <input type="radio" name="radio" id="radio_2"
                                                                        value="option_2" />
                                                                    <label class="form-label" for="radio_2">Express
                                                                        Shipping
                                                                        Charge
                                                                        :
                                                                        $10.00</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <a href class="text-dark"><strong>Change
                                                                        Address</strong></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">
                                                        Promo Code
                                                    </td>
                                                    <td>-$10.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">
                                                        Total
                                                    </td>
                                                    <td class="text-dark">
                                                        <strong>$491.00</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
