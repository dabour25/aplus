@extends('admin/master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
          <li class="breadcrumb-item active">Edit About Page</li>
      </ol>
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
            <div class="alert alert-{{$a[0]}}">
                {{$a[1]}}
            </div>
        @endif
        <form action="/admin/dynamics/about" method="post" style="padding: 20px;">
            @csrf
            <label>Mission</label>
            <textarea name="mission" class="form-control">{{$about[7]->content}}</textarea>
            <label>Vision</label>
            <textarea name="vision" class="form-control">{{$about[8]->content}}</textarea>
            <br>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
        <hr>
        <a class="btn btn-outline-info" href="/admin/dynamics/about/create">Create New Team Person</a>
        <h4>Registered Team:</h4>
        @if(count($team)>0)
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Tools</th>
                </tr>
                </thead>
                <tbody>
                @foreach($team as $k=>$t)
                    <tr>
                        <th scope="row">{{$k+1}}</th>
                        <td>{{$t->name}}</td>
                        <td>{{$t->role}}</td>
                        <td>
                            <a href="/admin/dynamics/about/{{$t->id}}/edit" style="padding-right: 10px;">
                                <i class="fa fa-pen-alt"></i>
                            </a>
                            <a href="#" id="removet{{$t->id}}">
                                <i class="fa fa-trash" style="color: red"></i>
                            </a>
                        </td>
                        <form action="/admin/dynamics/about/{{$t->id}}" method="post" id="remove{{$t->id}}">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                        <script>
                            $('#removet{{$t->id}}').click(function () {
                                $('#remove{{$t->id}}').submit();
                            });
                        </script>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3>No Team Added Yet</h3>
        @endif
    </div>
</div>
@stop
