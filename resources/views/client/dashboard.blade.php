@extends('client.layouts.app')
@section('title', 'Dashboard')

@section('navbar')
@include('client.layouts.includes.navbar')
@endsection

@section('sidebar')
@include('client.layouts.includes.sidebar')
@endsection

@section('content')
<div class="row layout-top-spacing">
    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-one">
            <div class="widget-heading">
                <h6 >Branches</h6>
            </div>
            <div class="w-chart">
                <div class="w-chart-section">
                    <div class="w-detail">
                        <p class="w-title">Total Visits</p>
                        <p class="w-stats">423,964</p>
                    </div>
                    <div class="w-chart-render-one">
                        <div id="total-users"></div>
                    </div>
                </div>

                <div class="w-chart-section">
                    <div class="w-detail">
                        <p class="w-title">Paid Visits</p>
                        <p class="w-stats">7,929</p>
                    </div>
                    <div class="w-chart-render-one">
                        <div id="paid-visits"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">$ 45,141</h6>
                        <p >Members</p>
                    </div>
                    <div >
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                        style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">$ 45,141</h6>
                        <p >Kingdom Workers</p>
                    </div>
                    <div >
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                        style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">$ 45,141</h6>
                        <p >Pastors</p>
                    </div>
                    <div >
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                        style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h5 >Revenue</h5>
                <ul class="tabs tab-pills">
                    <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                </ul>
            </div>

            <div class="widget-content">
                <div class="tabs tab-content">
                    <div id="content_1" class="tabcontent">
                        <div id="revenueMonthly"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-two">
            <div class="widget-heading">
                <h5 >Attendance by Category</h5>
            </div>
            <div class="widget-content">
                <div id="chart-2" ></div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <div class="w-content">
                        <span class="w-value">Daily sales</span>
                        <span class="w-numeric-title">Go to columns for details.</span>
                    </div>
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-dollar-sign">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-chart">
                    <div id="daily-sales"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-three">
            <div class="widget-heading">
                <h5 >Summary</h5>
            </div>
            <div class="widget-content">

                <div class="order-summary">

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-shopping-bag">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Income</h6>
                                <p class="summary-count">$92,600</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                        style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-tag">
                                <path
                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                </path>
                                <line x1="7" y1="7" x2="7" y2="7"></line>
                            </svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Profit</h6>
                                <p class="summary-count">$37,515</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-success" role="progressbar"
                                        style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-credit-card">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Expenses</h6>
                                <p class="summary-count">$55,085</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar"
                                        style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-one">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                            </path>
                        </svg>
                    </div>
                    <div class="w-content">
                        <span class="w-value">3,192</span>
                        <span class="w-numeric-title">Total Orders</span>
                    </div>
                </div>
                <div class="w-chart">
                    <div id="total-orders"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">

            <div class="widget-heading">
                <h5 >Upcoming Birthday's</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">Customer</div>
                                </th>
                                <th>
                                    <div class="th-content">Product</div>
                                </th>
                                <th>
                                    <div class="th-content">Invoice</div>
                                </th>
                                <th>
                                    <div class="th-content th-heading">Price</div>
                                </th>
                                <th>
                                    <div class="th-content">Status</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-7.jpg" alt="avatar">Andy King</div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Nike Sport</div>
                                </td>
                                <td>
                                    <div class="td-content">#76894</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$88.00</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-primary">Shipped</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-4.jpg" alt="avatar">Irene Collins
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Speakers</div>
                                </td>
                                <td>
                                    <div class="td-content">#75844</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$84.00</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-success">Paid</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-10.jpg" alt="avatar">Laurie Fox
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Camera</div>
                                </td>
                                <td>
                                    <div class="td-content">#66894</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$126.04</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-danger">Pending</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-13.jpg" alt="avatar">Luke Ivory
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Headphone</div>
                                </td>
                                <td>
                                    <div class="td-content">#46894</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$56.07</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-success">Paid</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-5.jpg" alt="avatar">Ryan Collins
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Sport</div>
                                </td>
                                <td>
                                    <div class="td-content">#89891</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$108.09</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-primary">Shipped</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-6.jpg" alt="avatar">Nia Hillyer
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Sunglasses</div>
                                </td>
                                <td>
                                    <div class="td-content">#26974</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$168.09</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-primary">Shipped</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img
                                            src="assets/img/profile-11.jpg" alt="avatar">Sonia Shaw
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content product-brand">Watch</div>
                                </td>
                                <td>
                                    <div class="td-content">#76844</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span >$110.00</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="badge outline-badge-success">Paid</span></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 >Wedding Anniversaries</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">Product</div>
                                </th>
                                <th>
                                    <div class="th-content th-heading">Price</div>
                                </th>
                                <th>
                                    <div class="th-content th-heading">Discount</div>
                                </th>
                                <th>
                                    <div class="th-content">Sold</div>
                                </th>
                                <th>
                                    <div class="th-content">Source</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img
                                            src="assets/img/speaker.jpg" alt="product">Speakers</div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$84.00</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$10.00</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">240</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Direct</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img
                                            src="assets/img/sunglass.jpg" alt="product">Sunglasses</div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$56.07</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$5.07</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">190</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Google</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img src="assets/img/watch.jpg"
                                            alt="product">Watch</div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$88.00</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$20.00</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">66</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Ads</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img
                                            src="assets/img/laptop.jpg" alt="product">Laptop</div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$110.00</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$33.00</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">35</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Email</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img
                                            src="assets/img/camera.jpg" alt="product">Camera</div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$126.04</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$26.04</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">30</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Referral</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img src="assets/img/shoes.jpg"
                                            alt="product">Shoes</div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$108.09</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$47.09</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">130</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Google</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img
                                            src="assets/img/headphones.jpg" alt="product">Headphone
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="pricing">$168.09</span></div>
                                </td>
                                <td>
                                    <div class="td-content"><span class="discount-pricing">$60.09</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">170</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            >Ads</a></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer')
@endsection