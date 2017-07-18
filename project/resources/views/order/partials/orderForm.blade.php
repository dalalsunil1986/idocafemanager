<div class="panel panel-default" style="margin-top: 10px;">
    <div class="panel-heading">
        <form action="{{ route('make.order') }}" method="POST">
        <div class="row">
            <div class="col-md-4">
                <h4>FORM. ORDER</h4>
            </div>

        </div>
    </div>
    <div class="panel-body">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nama :</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="the name of the table leader... ">
                </div>

                <div class="form-group">
                    <label for="people">Jumlah Orang :</label>
                    <input type="number" name="people" id="people" class="form-control" placeholder="berapa banyak orang?...">
                </div>

                <div class="form-group">
                    <label>Makan dimana??</label>
                    <select name="theOption" id="theOption" class="form-control">
                        <option value="takeHome">Bawa Pulang</option>
                        <option value="eatHere">Makan Disini</option>
                        <option value="eatHereGroup">Makan Disini ( Booking Meja )</option>
                    </select>
                </div>

                <div id="table-number" class="form-group">
                    <label for="radio">Nomor Meja :</label>
                    <div class="row">
                        @foreach($tables->chunk(3) as $tableChunk)
                            <div class="col-md-6">
                                @foreach($tableChunk as $table)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tableNumber" id="tableNumber" value="{{ $table->id }}" @if(($table->status)=='used') disabled @endif>{{ $table->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Makanan :</label>
                        @foreach($foods as $food)
                            <div class="checkbox">
                                <label>
                                    <input class="menus" name="foods[{{ $food->id }}][qty]" type="number"><span style="font-size: 9pt;"> {{ $food->name }} : <b><i>Rp.{{ $food->price }},-</i></b></span>
                                    <input type="hidden" name="foods[{{ $food->id }}][id]" value="{{ $food->id }}">
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Minuman :</label>
                        @foreach($drinks as $drink)
                            <div class="checkbox">
                                <label>
                                    <input class="menus" name="drinks[{{ $drink->id }}][qty]" type="number"><span style="font-size: 9pt;"> {{ $drink->name }} : <b><i>Rp.{{ $drink->price }},-</i></b></span>
                                    <input type="hidden" name="drinks[{{ $drink->id }}][id]" value="{{ $drink->id }}">
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="col-md-12 alert alert-danger">
                            <p>{{ $error }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <hr>
                <button type="submit" class="btn btn-black pull-right">Pesan Order</button>
            </div>
        </div>

        </form>
    </div>
</div>