@extends('layout.default')

@section('body')
@include('layout.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/ways">DANH SÁCH ĐƯỜNG ĐI</a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">THÊM ĐƯỜNG ĐI</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if ($errors->all())
    <div class="alert alert-danger" role="alert">
      Tạo không thành công
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('ways.store') }}" method="POST" class='row'>
      @csrf
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Điểm bắt đầu</label>
        <select name="start_point_id" class="form-select">
          <option value=""></option>
          @foreach($points as $point)
          <option value="{{$point->id}}" {{$point->id == old('start_point_id') ? 'selected': ''}}>{{$point->name}}</option>
          @endforeach
        </select>
        @if ($errors->first('start_point_id'))
        <div><small class="text-danger">{{ $errors->first('start_point_id') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 col-md-6">
        <label class="form-label">Điểm kết thúc</label>
        <select name="end_point_id" class="form-select">
          <option value=""></option>
          @foreach($points as $point)
          <option value="{{$point->id}}" {{$point->id == old('end_point_id') ? 'selected': ''}}>{{$point->name}}</option>
          @endforeach
        </select>
        @if ($errors->first('end_point_id'))
        <div><small class="text-danger">{{ $errors->first('end_point_id') }}</small></div>
        @endif
      </div>
      <div class="mb-3 col-12 ">
        <label class="form-label">Mô tả đường đi</label>
        <textarea name="introduction" rows="4" class="form-control" value="{{old('introduction')}}" ></textarea>
        @if ($errors->first('introduction'))
        <div><small class="text-danger">{{ $errors->first('introduction') }}</small></div>
        @endif
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">THÊM</button>
      </div>
    </form>
  </div>
</section>

@endsection