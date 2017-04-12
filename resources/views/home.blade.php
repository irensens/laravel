@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Личный кабинет</div>
				                <div class="panel-body">
								<form class="form-horizontal" action="/order" method="POST">
				<table width=100% class="table table-bordered table-stripted">
				<tr>
				 <th>Изображение</th>
				 <th>Название</th>
				 <th>Цена, руб</th>
				 <th>Количество</th>
				 <th>Сумма</th>
				 <th>Действия</th>
				</tr>
				<? $itogo = 0;?>
				@foreach($books as $key=>$value)
				<? $summa=$value->price*$couts[$value->id]?>
				<?$itogo+=$summa?>
				<tr>
				 <td>@if($value->picture != '')
						<img src = "{{asset('/uploads/thumb/'.$value->picture)}}" class = "pics"/>
					@else
						<img src = "{{asset('/media/img/no_photo.jpg')}}" class = "pics"/></a>
					@endif</td>
				 <td><h2>{{$value->name}}</h2></td>
				 <td>{{$value->price}}</td>
				 <td><input type='number' value='{{$couts[$value->id]}}' name="{{$value->id}}" class="count"></td>
				 <td>{{$summa}}</td>
				 <td>Действия</td>
				</tr>
					
				@endforeach
				<tr><td align="right" colspan=5>Общая сумма заказа: {{$itogo}}</td><td>&nbsp;</td></tr>
				</table>
				
				


				  <div class="control-group">
					<label class="control-label" for="inputName">Имя</label>
					<div class="controls">
					  <input type="text" id="inputName" placeholder="Name">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputNumber">Телефон</label>
					<div class="controls">
					  <input type="text" id="inputNumber" placeholder="Number">
					</div>
					 <div class="control-group">
					<label class="control-label" for="inputAdress">Адрес</label>
					<div class="controls">
					  <input type="text" id="inputAdress" placeholder="Adress">
					</div>
				  </div>
				 <br>
					
					  	<button type="button" class="button_" data-toggle="collapse" data-target="#app-navbar-collapse">Подтвердить</button>
				
				  
				
				</div>
				</form>
            </div>
        </div>
    </div>
@endsection
