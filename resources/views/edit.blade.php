<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Mainan
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('mainans.update', $mainan->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nama Mainan:</label>
              <input type="text" class="form-control" name="mainan_name" value="{{$mainan->mainan_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Jumlah Stok :</label>
              <input type="text" class="form-control" name="mainan_stok" value="{{$mainan->mainan_stok}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Harga :</label>
              <input type="text" class="form-control" name="mainan_price" value="{{$mainan->mainan_price}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Mainan</button>
      </form>
  </div>
</div>
@endsection