@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добро пожаловать на сайт</div>

                <div class="panel-body">
                    <h2>Новые поступления!</h2>
					@foreach ($books as $one)
					<div class = "col-md-3 book">
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
</div>
@endsection
