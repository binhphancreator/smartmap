@extends('layout.default')

@section('body')
@include('layout.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/points/create">
      Thêm địa điểm
    </a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100 mb-4">
      <h4 class="d-flex justify-content-center">DANH SÁCH ĐỊA ĐIỂM</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <table class="table  table-hover">
      <thead>
        <tr>
          <th style="width: 5%" scope="col"></th>
          <th style="width: 20%" scope="col">Tên</th>
          <th style="width: 40%" scope="col">Ảnh</th>
          <th style="width: 10%" scope="col">Đơn vị</th>
          <th style="width: 10%" scope="col">Khối nhà</th>
          <th style="width: 10%" scope="col">Tầng</th>
          <th style="width: 10%" scope="col">Phòng</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($points as $point)
        <tr>
          <th style="vertical-align: middle;" scope="row">{{$loop->index + 1 }}</th>
          <td style="vertical-align: middle;">{{$point->name}}</td>
          <td style="vertical-align: middle; width: 40%;">
            @if($point->picture)
            <img style="width: 100%; height:120px; object-fit: contain;" src="{{$point->picture}}" alt="">
            @endif
          </td>
          <td style="vertical-align: middle;">{{$point->group->name}}</td>
          <td style="vertical-align: middle;">{{$point->block}}</td>
          <td style="vertical-align: middle;">{{$point->floor}}</td>
          <td style="vertical-align: middle;">{{$point->room}}</td>
          <td style="vertical-align: middle;">
            <a href="{{route('points.edit',$point->id)}}" class="btn btn-primary">Sửa</a>

            <button type="button" class="btn btn-danger  ms-3" data-bs-toggle="modal" data-bs-target="#model{{$point->id}}">
              Xóa
            </button>
            <div class="modal fade" id="model{{$point->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Xóa địa điểm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn chắc chắn muốn xóa địa điểm: {{$point->name}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <form action="{{route('points.destroy',[$point->id])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger  ms-3">Xóa</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@endsection