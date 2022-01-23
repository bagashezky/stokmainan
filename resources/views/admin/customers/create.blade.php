@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'customers.store','files'=>true]) }}
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
                                    {{ Form::label('nama', 'Nama Customer') }}
                                    {{ Form::text('nama', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Customer']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('alamat', 'Alamat Lengkap') }}
                                    {{ Form::text('alamat', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Alamat Lengkap']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Email']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('telepon', 'No Handphone') }}
                                    {{ Form::text('telepon', '', ['class'=>'form-control', 'placeholder'=>'Masukkan No HP']) }}
                                </div>
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
