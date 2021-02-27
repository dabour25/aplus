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
          <li class="breadcrumb-item active">Create New Team Person</li>
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
        <form action="/admin/dynamics/about/create" method="post" style="padding: 20px;" enctype="multipart/form-data">
            @csrf
            <label>Name * </label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            <label>Role * </label>
            <input type="text" name="role" class="form-control" value="{{old('role')}}">
            <label>Face Book</label>
            <input type="text" name="face_book" class="form-control" placeholder="Leave empty to hide" value="{{old('face_book')}}">
            <label>Twitter</label>
            <input type="text" name="twitter" class="form-control" placeholder="Leave empty to hide" value="{{old('twitter')}}">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control" placeholder="Leave empty to hide" value="{{old('instagram')}}">
            <label>Linked In</label>
            <input type="text" name="linked_in" class="form-control" placeholder="Leave empty to hide" value="{{old('linked_in')}}">
            <label>Description *</label>
            <textarea name="description" class="form-control">{{old('description')}}</textarea>
            <label>Image *</label>
            <br>
            <input type="file" name="image">
            <br><br>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
@stop
