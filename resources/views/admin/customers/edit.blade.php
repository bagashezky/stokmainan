@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($customer,['route'=>['customers.update',$customer['id']], 'files'=>true,'method'=>'PUT']) }}
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
                            {{ Form::label('nama', 'Nama Customer') }}
                            {{ Form::text('nama', $customer['nama'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Customer']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('alamat', 'Alamat') }}
                            {{ Form::text('alamat', $customer['alamat'], ['class'=>'form-control', 'placeholder'=>'Masukkan Alamat Lengkap']) }}
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', $customer['email'], ['class'=>'form-control', 'placeholder'=>'Masukkan Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('telepon', 'No HP') }}
                            {{ Form::text('telepon', $customer['telepon'], ['class'=>'form-control', 'placeholder'=>'Masukkan No Handphone']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/customers') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
