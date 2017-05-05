<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <script src="/js/app.js"></script>
	    <script src="/js/jquery.cookie.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					
					
                    <!-- Branding Image -->
                    <a class="laravel" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
					<a href="/contacts" class="laravel">Контакты
					</a>
					<a href="/about" class="laravel">О нас
					</a>
					<div id="basket" class="form_cart cart">
<table >
<tbody>
<tr   class="hPb">
<td>Выбрано:</td>
<td><span id="totalGoods">0</span> товаров</td>
</tr>
<tr  class="hPb">
<td>Сумма: &asymp; </td>
<td><span id="totalPrice">0</span> руб.</td>
</tr>

<tr style="display: table-row;" class="hPe">
<td colspan="2">Корзина пуста</td>
</tr>
<tr>
<td><a style="display: none;" id="clearBasket" href="http://laravel:81/home">Очистить</a></td>
<td><a style="display: none;" id="checkOut" href="http://laravel:81/home">Оформить</a></td>
</tr>
</tbody>
</table>
</div>

<style>
#clearBasket, #checkOut {
 display: none;
}
.hPb {
    display: none;
}
</style>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
<div class = 'col-md-2'>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Меню:<b></div>

<div class="panel-body">
@foreach($cats as $one)

<a href="{{asset('catalog/'.$one->id)}}" class="btn btn-default btn-block">{{$one->name}}</a>

@endforeach
</div>
</div>
</div>
<div class = 'col-md-10'>
        @yield('content')
    </div>

    <!-- Scripts -->
	
	
<script type="text/javascript">
$(document).ready(function(){
		msg = new Array();
		var basket = '';
		var totalprice = 0;
		var totalCountGoods = 0;
		if (!$.cookie("basket")) {$.cookie("basket", '', {path: "/"});}
		basket = decodeURI($.cookie("basket"));
		basketArray = basket.split(",");// Находим все товары
		for(var i=0; i<basketArray.length-1;i++) {
			goodsId = basketArray[i].split(":"); // Находим id товара, цену и количество
			totalCountGoods+=parseInt(goodsId[1]);
			totalprice+=parseInt(goodsId[1])*parseInt(goodsId[2]);
		}
		if (totalprice > 0) {
			$('#clearBasket').show();
			$('#checkOut').show();
			$('#gugu').show();
			$('.hPb').show();
			$('.hPe').hide();
		}
		if (!totalprice) {totalprice = 0;}
		$('#totalPrice').text(totalprice);
		$('#totalGoods').text(totalCountGoods);
		$('#gugu').text($.cookie("basket"));
});



$('a.addCart').click(function() {
   data = $(this).attr('id').split('-');
   addCart(data[1], data[2], 1);
   return false;
  });
  
  
  
  function addCart(p1, p2, p3){
    if (!p3 || p3==0) {p3=1;}
    msg.id = p1; 		  // АйДи
    msg.price =  p2; // Цена
    msg.count = parseInt(p3); // Количество
    var check = false;
    var cnt = false;
    var totalCountGoods = 0;
    var totalprice = 0;
    var goodsId = 0;
    var basket = '';
    $('#clearBasket').show();
    $('#checkOut').show();
    $('#gugu').show();
    $('.hPb').show();
    $('.hPe').hide();
    basket = decodeURI($.cookie("basket"));
    if (basket=='null') {basket = '';}
    basketArray = basket.split(",");
    for(var i=0; i<basketArray.length-1;i++) {
        goodsId = basketArray[i].split(":");
	if(goodsId[0]==msg.id)	// ищем, не покупали ли мы этот товар ранее
	{
            check = true;
	    cnt   = goodsId[1];
	    break;
	}
    }
    if(!check) {
        basket+= msg.id + ':' + msg.count + ':' + msg.price + ',';
    } else {
       alert("Уже есть в корзине! Количество товаров можно будет изменить при оформлении заказа");
    }
    if(!check) {
        basketArray = basket.split(",");// Находим все товары
        for(var i=0; i<basketArray.length-1;i++) {
	    goodsId = basketArray[i].split(":"); // Находим id товара, цену и количество
	    totalCountGoods+=parseInt(goodsId[1]);
	    totalprice+=parseInt(goodsId[1])*parseInt(goodsId[2]);
	}
	$('#totalGoods').text(totalCountGoods);
	$('#totalPrice').text(totalprice);
	$.cookie("totalPrice", totalprice, {path: "/"});
	$.cookie("basket", basket, {path: "/"});
	$('#gugu').text($.cookie("basket"));
    }
}

$('#clearBasket').click(function() {
			$.cookie("totalPrice", '', {path: "/"});
			$.cookie("basket", '', {path: "/"});
			$('#totalPrice').text('0');
			$('#totalGoods').text('0');
			$('#gugu').text('0');
			$('.hPb').hide();
			$('.hPe').show();
			$(this).hide();
			$('#checkOut').hide();
			$.jGrowl("Корзина очищена!");
			return false;
		});

</script>

</body>
</html>
