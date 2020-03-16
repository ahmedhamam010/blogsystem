
@extends('layouts.app')
@section('content')
<div class="container">
<form method="post" action="/posts" enctype="multipart/form-data">

@csrf

@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  <div class="form-group">
    <label for="title">title:</label>
    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
  </div>
  <div class="form-group">
    <label for="content">description:</label>
    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
  </div>

  <div class="form-group">
    <label for="content">image:</label>
    <input type="file" class="form-control-file" id="image"  name="image">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection