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
            <a href="/admin/branches">Branches Control</a>
        </li>
          <li class="breadcrumb-item active">Edit {{$branch->title}} Branch</li>
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
        <form action="/admin/branches/{{$branch->slug}}" method="post" style="padding: 20px;">
            @csrf
            {{method_field('put')}}
            <label>Branch Title * </label>
            <input type="text" name="title" class="form-control" value="{{$branch->title}}">
            <label>Branch Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Leave empty to hide" value="{{$branch->phone}}">
            <label>Branch Email</label>
            <input type="text" name="email" class="form-control" placeholder="Leave empty to hide" value="{{$branch->email}}">
            <label>Branch Address</label>
            <textarea name="address" class="form-control">{{$branch->address}}</textarea>
            <br>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
</div>
@stop
