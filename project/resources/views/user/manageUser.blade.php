@extends('layouts.master')

@section('title')
    Your - Kelola User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Daftar User</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Id.</th>
                            <th>Username</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->type }}</td>
                                <td><a style="margin-right: 5px;" href="{{ route('user.edit',['id'=>$user->id]) }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a><a href="{{ route('user.delete',['id'=>$user->id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Tambahkan User Baru</h3>
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
                            <label for="username">Username :</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Passsword :</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Tipe :</label><br>
                            <select name="type" class="form-control">
                                <option value="Cashier">Kasir</option>
                                <option value="Kitchen">Dapur</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-black">Tambah User</button>
                            <button type="reset" class="btn btn-black">Reset</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($editUser))
        <div id="editUser" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="{{ route('post.user.edit',['id' => $editUser['0']->username]) }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit User</h4>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username :</label><br>
                                <input type="text" name="username" id="username" value="{{ $editUser['0']->username }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Passsword :</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Type :</label><br>
                                <select name="type" class="form-control">
                                    @if(($editUser['0']->type)=='Cashier')
                                        <option value="Cashier" selected>Cashier</option>
                                        <option value="Kitchen">Kitchen</option>
                                        <option value="Manager">Manager</option>
                                    @elseif(($editUser['0']->type)=='Kitchen')
                                        <option value="Cashier">Cashier</option>
                                        <option value="Kitchen" selected>Kitchen</option>
                                        <option value="Manager">Manager</option>
                                    @elseif(($editUser['0']->type)=='Manager')
                                        <option value="Cashier">Cashier</option>
                                        <option value="Kitchen">Kitchen</option>
                                        <option value="Manager" selected>Manager</option>
                                    @endif

                                </select>
                                <input type="hidden" name="userId" value="{{ $editUser['0']->id }}">
                            </div>
                            {{ csrf_field() }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-black">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif


@endsection

@section('script')

@endsection