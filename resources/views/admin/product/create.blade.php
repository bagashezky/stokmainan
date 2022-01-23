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
                                <label >Category</label>
                                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control select', 'placeholder' => '-- Choose Category --', 'id' => 'category_id', 'required']) !!}
                                    <span class="help-block with-errors"></span>
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
                            <div class="col-md-6">
                                {{ Form::label('qty', 'Jumlah Stok') }}
                                {{ Form::text('qty', '', ['class'=>'form-control', 'placeholder'=>'Masukan Jumlah Stok']) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin/dashboard') }}" class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection
