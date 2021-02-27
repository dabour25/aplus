@extends('admin/master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/admin/dynamics/about">Edit About Page</a>
        </li>
          <li class="breadcrumb-item active">Update Team Person : {{$team->name}}</li>
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
        <form action="/admin/dynamics/about/{{$team->id}}" method="post" style="padding: 20px;" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <label>Name * </label>
            <input type="text" name="name" class="form-control" value="{{$team->name}}">
            <label>Role * </label>
            <input type="text" name="role" class="form-control" value="{{$team->role}}">
            <label>Face Book</label>
            <input type="text" name="face_book" class="form-control" placeholder="Leave empty to hide" value="{{$team->face_book}}">
            <label>Twitter</label>
            <input type="text" name="twitter" class="form-control" placeholder="Leave empty to hide" value="{{$team->twitter}}">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control" placeholder="Leave empty to hide" value="{{$team->instagram}}">
            <label>Linked In</label>
            <input type="text" name="linked_in" class="form-control" placeholder="Leave empty to hide" value="{{$team->linked_in}}">
            <label>Description *</label>
            <textarea name="description" class="form-control">{{$team->description}}</textarea>
            <label>Image *</label>
            <br>
            <input type="file" name="image">
            <br><br>
            <img src="{{asset('/images/team').'/'.$team->image}}" width="100px">
            <br><br>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
</div>
@stop
