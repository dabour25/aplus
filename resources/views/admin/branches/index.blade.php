@extends('admin/master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Branches Control</li>
      </ol>
        <a class="btn btn-info" href="/admin/branches/create">Create New Branch</a>
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
        <br>
        <h4>Registered Branches:</h4>
        @if(count($branches)>0)
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Branch Title</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Tools</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $k=>$branch)
                <tr>
                    <th scope="row">{{$k+1}}</th>
                    <td>{{$branch->title}}</td>
                    <td>{{$branch->phone==''?'--':$branch->phone}}</td>
                    <td>{{$branch->email==''?'--':$branch->email}}</td>
                    <td>
                        <a href="/admin/branches/{{$branch->slug}}/edit" style="padding-right: 10px;">
                            <i class="fa fa-pen-alt"></i>
                        </a>
                        <a href="#" id="removeb{{$branch->slug}}">
                            <i class="fa fa-trash" style="color: red"></i>
                        </a>
                    </td>
                    <form action="/admin/branches/{{$branch->slug}}" method="post" id="remove{{$branch->slug}}">
                        @csrf
                        {{method_field('DELETE')}}
                    </form>
                    <script>
                        $('#removeb{{$branch->slug}}').click(function () {
                            $('#remove{{$branch->slug}}').submit();
                        });
                    </script>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h3>No Branches Available Yet</h3>
        @endif
    </div>
</div>
@stop
