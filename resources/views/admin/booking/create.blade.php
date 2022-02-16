@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'booking.store','files'=>true]) }}
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
                                    {{ Form::label('nama', 'Nama Pemesan') }}
                                    {{ Form::text('nama', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Pemesan']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('jammulai', 'Jam Mulai') }}
                                    {{ Form::time('jammulai', '', ['class'=>'form-control', 'placeholder'=>'Pilih Jam Mulai']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('jamselesai', 'Jam Selesai') }}
                                    {{ Form::time('jamselesai', '', ['class'=>'form-control', 'placeholder'=>'Pilih Jam Selesai']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        {{ Form::label('lapangan', 'Pilih Lapangan') }}
                                        {{ Form::text('lapangan', '', ['class'=>'form-control', 'placeholder'=>'Pilih Lapangan']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tgl', 'Pilih Tanggal') }}
                                    {{ Form::date('tgl', '', ['class'=>'form-control', 'placeholder'=>'Pilih Tanggal Main']) }}
                            </div>
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
