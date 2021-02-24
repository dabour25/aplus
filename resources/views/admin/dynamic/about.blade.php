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
            <div class="alert alert-{{$a[0]}}" style="width: 40%">
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
    </div>
</div>
@stop
