@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($product,['route'=>['product.update',$product['id']], 'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Data Barang</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('storage/'.$product['image'])}}" width="100%" height="200">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Nama Barang') }}
                            {{ Form::text('name', $product['name'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('price', 'Harga Barang') }}
                            {{ Form::text('price', $product['price'], ['class'=>'form-control', 'placeholder'=>'Masukkan Harga Barang']) }}
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            {{ Form::hidden('imagePath',$product['image'])}}
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('imageFile', ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', $product['description'], ['class'=>'form-control', 'placeholder'=>'Enter description', 'rows'=>5]) }}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/product') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
