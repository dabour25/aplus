@extends('admin/master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
          <li class="breadcrumb-item active">Edit Home Page</li>
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
        <form action="/admin/dynamics/home" method="post" style="padding: 20px;">
            @csrf
            <label>Banner Title</label>
            <input type="text" name="home_title" class="form-control" value="{{$home[1]->content}}">
            <label>Form URL</label>
            <input type="text" name="form_url" class="form-control" value="{{$home[0]->content}}">
            <label>Tiny About</label>
            <textarea name="tiny_about" class="form-control">{{$home[6]->content}}</textarea>
            <label>Face Book URL</label>
            <input type="text" name="face_book" class="form-control" value="{{$home[2]->content}}">
            <label>Twitter URL</label>
            <input type="text" name="twitter" class="form-control" value="{{$home[3]->content}}">
            <label>Instagram URL</label>
            <input type="text" name="instagram" class="form-control" value="{{$home[4]->content}}">
            <label>Linked In URL</label>
            <input type="text" name="linked_in" class="form-control" value="{{$home[5]->content}}">
            <label>Main Phone</label>
            <input type="text" name="main_phone" class="form-control" value="{{$home[9]->content}}">
            <label>Main E-Mail</label>
            <input type="text" name="main_email" class="form-control" value="{{$home[10]->content}}">
            <br>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
</div>
@stop
