<div class="form-group row">
    <table>
      <tr>
      {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
        <td>
            {!! Form::text('name' ,'', ['class' => 'form-control', 'placeholder' => '商品名、産地から検索'] ) !!}
        </td>
        <td>
            {!! Form::submit('検索', ['class' => 'btn btn-success btn-block']) !!}
        </td>
      {!! Form::close() !!}
      </tr>
    </table>
</div>