@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Личный кабинет</div>

                <div class="panel-body">
				<form class="form-horizontal">
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
				
				  
				</form>
				</div>
            </div>
        </div>
    </div>
@endsection
