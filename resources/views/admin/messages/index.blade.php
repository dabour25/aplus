@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
      </ol>

    <!-- Page Content -->
    @if(count($errors)>0)
    <br>
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('m'))
      <?php $a=[]; $a=session()->pull('m'); ?>
      <div class="alert alert-{{$a[0]}}" style="width: 40%">
        {{$a[1]}}
      </div>
    @endif
    <!-- Page Content -->
        <div class="container">
          <div class="card-body">
                <div class="list-group">
                  @foreach($newmes as $m)
                <a style="cursor: pointer" data-toggle="collapse" data-target="#mes{{$m->id}}" class="list-group-item"><b>New Message from : {{$m->name}} ({{$m->email}}) with subject : {{$m->subject}}</b>/ {{$m->created_at}} <button class="btn btn-danger" id="removem{{$m->id}}">Delete</button> </a>
                <div id="mes{{$m->id}}" class="collapse">
                {{$m->message}}
                </div>
                <form action="/admin/messages/{{$m->id}}" method="post" id="remove{{$m->id}}">
                    @csrf
                    {{method_field('DELETE')}}
                </form>
                <script>
                    $('#removem{{$m->id}}').click(function () {
                        $('#remove{{$m->id}}').submit();
                    });
                </script>
                @endforeach
                @foreach($oldmes as $m)
                <a style="cursor: pointer" data-toggle="collapse" data-target="#mes{{$m->id}}" class="list-group-item">Message from : {{$m->name}} ({{$m->email}}) with subject : {{$m->subject}}/ {{$m->created_at}} <button class="btn btn-danger" id="removem{{$m->id}}">Delete</button></a>
                <div id="mes{{$m->id}}" class="collapse">
                {{$m->message}}
                </div>
                  <form action="/admin/messages/{{$m->id}}" method="post" id="remove{{$m->id}}">
                      @csrf
                      {{method_field('DELETE')}}
                  </form>
                  <script>
                      $('#removem{{$m->id}}').click(function () {
                          $('#remove{{$m->id}}').submit();
                      });
                  </script>
                @endforeach
                </div>
            </div>
          </div>
          </div>
        </div>
  </div>
  <!-- /.content-wrapper -->

</div>
@stop
