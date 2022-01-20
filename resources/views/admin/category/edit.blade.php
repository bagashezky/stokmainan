@extends('admin.admin')

@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($category,['route'=>['category.update',$category['id']], 'files'=>true,'method'=>'PUT']) }}
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

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Nama Barang') }}
                            {{ Form::text('name', $category['name'], ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Barang']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/category') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
