@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 class="panel-heading">{{$book->name}}</h1>

                <div class="panel-body">
				<a href="{{asset('/uploads/'.$book->picture)}}" target="_blank">
					@if($book->picture != '')
						<img src = "{{asset('/uploads/thumb/'.$book->picture)}}" class = "pics"/>
					@else
						<img src = "{{asset('/media/img/no_photo.jpg')}}" class = "pics"/></a>
					@endif
					</a>
					<div class="poka">
					Автор: {!!$book->author!!}<br>
					Издательство: {!!$book->publisher!!}<br>
					Год издания:{!!$book->year!!}<br>
					Цена: {!!$book->price!!} руб.<br>
					</div>
					<br style="clear:both" /> 
                    {!!$book->body!!}
					<a href="{!!$book->url!!}" target="_blank"> Отзывы </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
