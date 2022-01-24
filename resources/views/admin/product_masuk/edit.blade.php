@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($productin,['route'=>['productin.update',$productin['id']], 'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Data Customer</h3>
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
                            <label >Produk</label>
                                {!! Form::select('product_id', $products, null, ['class' => 'form-control select', 'placeholder' => '-- Choose Category --', 'id' => 'product_id', 'required']) !!}
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label>Customer</label>
                                    {!! Form::select('supplier_id', $suppliers, null, ['class' => 'form-control select', 'placeholder' => '-- Choose Category --', 'id' => 'supplier_id', 'required']) !!}
                                    <span class="help-block with-errors"></span>
                                </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('qty', 'Quantity') }}
                            {{ Form::text('qty', $productin['qty'], ['class'=>'form-control', 'placeholder'=>'Masukkan Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('tanggal', 'Tanggal') }}
                            {{ Form::date('tanggal', $productin['tanggal'], ['class'=>'form-control', 'placeholder'=>'Masukkan Tanggal']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/productin') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
