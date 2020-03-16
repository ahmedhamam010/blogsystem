
@extends('layouts.app')
@section('content')
<div class="container">
<a class="btn btn-success mb-5" href="/posts/create"> Create Post </a> 
&nbsp;&nbsp;
<a class="btn btn-danger mb-5" href="/links/create"> Add Youtube Link </a> 

    <h2> All Posts </h2>
    <div class="row">
      @foreach( $posts as $index => $value )
      <div class="col-md-3 m-4 card" style="width: 18rem;">
        <img src="{{  asset('images/'.$value['image'])  }}" style="height: 200px;width: 100%;" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $value['title'] }}</h5>
          <p class="card-text">{{ $value['description'] }}</p>
          <a class="btn btn-success" href="/posts/{{ $value['id'] }}">view</a>
              <a class="btn btn-primary" href="/posts/{{ $value['id'] }}/edit">edit</a>
              <form style="display: inline;" method="post" action="/posts/{{ $value['id'] }}">
              @csrf
              {{method_field('DELETE')}}
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</button>
              </form>
        </div>
      </div>
      @endforeach
     
    </div>

    <h2 class="mt-5"> All Youtube Links</h2>
    <div class="row">
      @foreach( $links as $index => $value )
      <div class="col-md-3 m-4 card" style="width: 18rem;">
        <div class="card-body">
          <p class="card-title show-video" data-toggle="modal" data-target="#myModal" id='<?php echo str_replace("/watch?v=","/embed/", $value['link'] ) ?>'>{{ $value['link'] }}</p>
          
          <p class="card-text">{{ $value['description'] }}</p>
          <span data-toggle="modal" data-target="#myModal" id='<?php echo str_replace("/watch?v=","/embed/", $value['link'] ) ?>' class="btn btn-success show-video" >play</span>
        <a class="btn btn-primary" href="/links/{{ $value['id'] }}/edit">edit</a>
        <form style="display: inline;" method="post" action="/links/{{ $value['id'] }}">
        @csrf
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</button>
        </form>
        </div>
      </div>
      @endforeach
     
    </div>


</div>


</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <iframe src='' height="400" width="100%"></iframe>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


@endsection


