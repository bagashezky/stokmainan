@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Barang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('storage/'.$product['image']) }}"
                                height="200" width="200"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Barang</label>
                                <input id="name" type="text" value="{{ $product['name'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="price">Harga Barang</label>
                                <input id="price" type="text" value="{{ $product['price'] }}" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <input id="category_id" type="text" value="{{ $product->category->name }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="qty">Jumlah Barang</label>
                                <input id="qty" type="text" value="{{ $product['qty'] }}" class="form-control" disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
