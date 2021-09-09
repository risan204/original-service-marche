<div class="row">
        <div class="col-sm-4">
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::text('name' ,'', ['class' => 'form-control', 'placeholder' => '商品名、産地から検索'] ) !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}
        </div>
        </div>