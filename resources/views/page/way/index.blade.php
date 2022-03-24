@extends('layout.default')

@section('body')
@include('layout.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/ways/create">
      Thêm đường đi
    </a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100 mb-4">
      <h4 class="d-flex justify-content-center">DANH SÁCH ĐƯỜNG ĐI</h4>
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
          <th style="width: 20%" scope="col">Điểm bắt đầu</th>
          <th style="width: 20%" scope="col">Điểm kết thúc</th>
          <th style="width: 55%" scope="col">Mô tả</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ways as $way)
        <tr>
          <th style="vertical-align: middle;" scope="row">{{$loop->index + 1 }}</th>
          <td style="vertical-align: middle;">{{$way->startPoint->name}}</td>
          <td style="vertical-align: middle;">{{$way->endPoint->name}}</td>
          <td style="vertical-align: middle;">{{$way->introduction}}</td>
          <td style="vertical-align: middle;">
            <a href="{{route('ways.edit',$way->id)}}" class="btn btn-primary">Sửa</a>

            <button type="button" class="btn btn-danger  ms-3" data-bs-toggle="modal" data-bs-target="#model{{$way->id}}">
              Xóa
            </button>
            <div class="modal fade" id="model{{$way->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Xóa đường đi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn chắc chắn muốn xóa đường đi: {{$way->name}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <form action="{{route('ways.destroy',[$way->id])}}" method="POST">
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