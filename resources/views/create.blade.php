<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Tambah Mainan
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
      <form method="post" action="{{ route('mainans.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nama Mainan:</label>
              <input type="text" class="form-control" name="mainan_name"/>
          </div>
          <div class="form-group">
              <label for="price">Jumlah Stok :</label>
              <input type="text" class="form-control" name="mainan_stok"/>
          </div>
          <div class="form-group">
              <label for="quantity">Harga :</label>
              <input type="text" class="form-control" name="mainan_price"/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
  </div>
</div>
@endsection