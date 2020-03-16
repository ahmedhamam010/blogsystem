@extends('layouts.app')
@section('content')
<div class="container">
<h1>View Post</h1>       
  <table class="table">
    <thead>
      <tr>
      <th>id</th>
        <th>link</th>
        <th>description</th>
        <th>created_at</th>
        <th>updated_at</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $links->id }}</td>
        <td>{{ $links->link }}</td>
        <td>{{ $links->description }}</td>
        <td>{{ $links->created_at }}</td>
        <td>{{ $links->updated_at }}</td>

      </tr>
     
    </tbody>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registered At</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $links->user->name }}</td>
        <td>{{ $links->user->email }}</td>
        <td>{{ $links->user->created_at }}</td>

      </tr>
     
    </tbody>
  </table>
</div>
@endsection