@extends('layouts.app')
@section('content')
<div class="container">
  <form method="post" action="/links/{{$postId}}" enctype="multipart/form-data">
  @csrf
  {{method_field('PUT')}}  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row">
    <div class="col-md-7">
        <div class="form-group">
        <label for="link">link:</label>
        <input type="text"  value="{{ $idDetails->link }}" class="form-control" id="link" placeholder="Enter link" name="link">
        </div>
        <div class="form-group">
        <label for="description">description:</label>
        <input type="text" value="{{ $idDetails->description }}" class="form-control" id="description" placeholder="Enter description" name="description">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
  </form>
</div>
@endsection