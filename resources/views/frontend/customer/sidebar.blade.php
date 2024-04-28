<style>
    .customer_char {
	background: #4385f5;
	width: fit-content;
	padding: 11px 25px 0 25px;
	font-size: 91px;
	color: #ffff;
	border-radius: 5px;
}
</style>
<div class="usefull_link_wrapper">
    <h2 class="customer_char">{{substr(auth()->user('customer')->first_name,0, 1)}}</h2>
    <ul>
        <li>
            <a href="{{ route('fr.customer.dashboard') }}">
                <i class="fa fa-home" aria-hidden="true"></i> Home
            </a>
        </li>
        <li>
            <a href="{{route('fr.customer.myOrders')}}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Orders
            </a>
        </li>
        <li>
            <a href="#" onclick="document.getElementById('logout_form').submit();">
                <i class="fa fa-user" aria-hidden="true"></i> Logout
            </a>
        </li>
    </ul>
</div>

<form action="{{route('fr.customer.customer.logout')}}" method="post" id="logout_form">@csrf</form>
