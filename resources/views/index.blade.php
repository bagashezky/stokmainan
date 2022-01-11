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
          <td>No</td>
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

    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <button class="btn btn-danger" type="submit">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
<div>
@endsection