@extends('layouts.master')

@section('title')
	Your Cafe - Kelola Menu
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Daftar Menu</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Id.</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->price }}</td>
                                <td>{{ $menu->category }}</td>
                                <td><a style="margin-right: 5px;" href="{{ route('menu.edit',['id'=>$menu->id]) }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a><a href="{{ route('menu.delete',['id'=>$menu->id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Tambah Menu Baru</h3>
                </div>

                <div class="panel-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Nama :</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price">Harga (Rp.) :</label><br>
                            <input type="number" name="price" id="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="category">Kateogori :</label><br>
                            <select name="category" class="form-control">
                                <option value="foods">Makanan</option>
                                <option value="drinks">Minuman</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-black">Tambah Menu</button>
                            <button type="reset" class="btn btn-black">Reset</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($editMenu))
        <div id="editMenu" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="{{ route('post.menu.edit') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Menu</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama :</label><br>
                                <input type="text" name="name" id="name" value="{{ $editMenu['0']->name }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price">Harga :</label><br>
                                <input type="text" name="price" id="price" value="{{ $editMenu['0']->price }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Kategori :</label><br>
                                <select name="category" class="form-control">
                                    @if(($editMenu['0']->category)=='foods')
                                        <option value="foods" selected>Makanan</option>
                                        <option value="drinks">Drinks</option>
                                    @elseif(($editMenu['0']->category)=='drinks')
                                        <option value="foods">Minuman</option>
                                    @endif
                                </select>
                                <input type="hidden" name="menuId" value="{{ $editMenu['0']->id }}">
                            </div>
                            {{ csrf_field() }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-black" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @include('partials.script')
    @endif


@endsection



