@extends('index')
@section('content')

    <div class="row title">
        <a href="/" class="btn btn-success">Home</a>
        <h3>Staff</h3>
    </div>
    <hr>
    <div id="treeview"></div>

    <div class="row">

    </div>
    <script>
        var data  = JSON.parse("{!!$tree!!}");
      $('#treeview').treeview({data: data});
    </script>
@stop

