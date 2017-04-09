@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               
                <div class="panel-body">
                    <h2>{{$cat->name}}</h2>
					@foreach ($books as $one)
					
					<div class = "col-md-3 book">
					
					<a href =# id="good-{{$one->id}}-{{$one->price}}" class="addCart" >Добавить в корзину</a>
					<a href="{{asset('/book/' . $one->id)}}" class = "book_link">
					@if($one->picture != '')
						<img src = "{{asset('/uploads/thumb/'.$one->picture)}}" class = "pic"/>
					@else
						<img src = "{{asset('/media/img/no_photo.jpg')}}" class = "pic"/></a>
					@endif
					</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
