<!-- index.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nama Mainan</td>
          <td>Stok Mainan</td>
          <td>Harga</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($mainans as $mainan)
        <tr>
            <td>{{$mainan->id}}</td>
            <td>{{$mainan->mainan_name}}</td>
            <td>{{$mainan->mainan_stok}}</td>
            <td>{{$mainan->mainan_price}}</td>
            <td><a href="{{ route('mainans.edit',$mainan->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('mainans.destroy', $mainan->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection