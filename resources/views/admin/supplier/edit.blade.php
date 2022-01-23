@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($supplier,['route'=>['pekerja.update',$supplier['id']], 'files'=>true,'method'=>'PUT']) }}
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
                            {{ Form::label('nama', 'Nama Pekerja') }}
                            {{ Form::text('nama', $supplier['nama'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Pekerja']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('alamat', 'Alamat') }}
                            {{ Form::text('alamat', $supplier['alamat'], ['class'=>'form-control', 'placeholder'=>'Masukkan Alamat Lengkap']) }}
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', $supplier['email'], ['class'=>'form-control', 'placeholder'=>'Masukkan Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('telepon', 'No HP') }}
                            {{ Form::text('telepon', $supplier['telepon'], ['class'=>'form-control', 'placeholder'=>'Masukkan No Handphone']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/pekerja') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
