
@extends('layouts.app')
@section('content')
<div class="container">
<form method="post" action="/links" enctype="multipart/form-data">

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
    <label for="link">link:</label>
    <input type="text" class="form-control" id="link" placeholder="Enter link" name="link">
  </div>
  <div class="form-group">
    <label for="description">description:</label>
    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection