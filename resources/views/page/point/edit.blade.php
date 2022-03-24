@extends('layout.default')

@section('body')
@include('layout.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/points">DANH SÁCH ĐỊA ĐIỂM</a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">SỬA ĐỊA ĐIỂM</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if ($errors->all())
    <div class="alert alert-danger" role="alert">
      Sửa không thành công
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('points.update', [$point->id]) }}" method="POST" class='row' enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">ID địa điểm</label>
        <input name="point_id" type="text" class="form-control" value="{{$point->point_id}}">
        @if ($errors->first('point_id'))
        <div><small class="text-danger">{{ $errors->first('point_id') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Tên địa điểm</label>
        <input name="name" type="text" class="form-control" value="{{$point->name}}">
        @if ($errors->first('name'))
        <div><small class="text-danger">{{ $errors->first('name') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Ảnh</label>
        <input name="picture" type="file" class="form-control" value="{{$point->picture}}">
        @if ($errors->first('picture'))
        <div><small class="text-danger">{{ $errors->first('picture') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Khối nhà</label>
        <input name="block" type="text" class="form-control" value="{{$point->block}}">
        @if ($errors->first('block'))
        <div><small class="text-danger">{{ $errors->first('block') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Tầng</label>
        <input name="floor" type="text" class="form-control" value="{{$point->floor}}">
        @if ($errors->first('floor'))
        <div><small class="text-danger">{{ $errors->first('floor') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Phòng</label>
        <input name="room" type="text" class="form-control" value="{{$point->room}}">
        @if ($errors->first('room'))
        <div><small class="text-danger">{{ $errors->first('room') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Đơn vị</label>
        <select name="group_id" class="form-select">
          <option value=""></option>
          @foreach($groups as $group)
          <option value="{{$group->id}}" {{$group->id == $point->group_id ? 'selected': ''}}>{{$group->name}}</option>
          @endforeach
        </select>
        @if ($errors->first('group_id'))
        <div><small class="text-danger">{{ $errors->first('group_id') }}</small></div>
        @endif
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
      </div>
    </form>
  </div>
</section>

@endsection