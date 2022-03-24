@extends('layout.default')

@section('body')
@include('layout.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/groups">DANH SÁCH ĐƠN VỊ</a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">IMPORT ĐƠN VỊ</h4>
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
    <form action="{{ route('import.group') }}" method="POST" enctype="multipart/form-data" class="mb-5 mt-4">
      @csrf
      <!-- <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
        <div class="custom-file text-left">
          <input type="file" name="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Chọn file </label>
        </div>
      </div> -->
      <div class="input-group">
        <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button type="submit" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">IMPORT</button>
      </div>
      <!-- <button class="btn btn-primary">Import</button> -->
    </form>
  </div>
</section>

@endsection