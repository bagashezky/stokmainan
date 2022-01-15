@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'product.store','files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('name', 'Nama Barang') }}
                                    {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Harga Barang') }}
                                    {{ Form::text('price', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Harga Barang']) }}
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-group">
                                    {{ Form::label('image', 'Gambar Barang') }}
                                    {{ Form::file('imageFile', ['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>'Enter description', 'rows'=>5]) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin') }}" class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection
