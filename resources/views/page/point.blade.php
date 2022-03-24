@extends('layout.default')

@section('body')
<style>
  body {
    background-color: #151AA6;
    color: white;
    line-height: 1.5;
    text-shadow: 0.5px 0.5px 1px #ffffff;
  }
</style>

<div class="p-3 pb-5 container m-auto">
  <div>
    <h4 class="text-center">Bạn đang ở {{$start_point->name}}</h4>
    <h5 class="text-center">Đơn vị: {{$start_point->group->name}}</h5>
    <img width="100%" src="{{$start_point->picture}}" alt="">
  </div>

  <div class="border-bottom my-4"></div>

  <h6 class=" text-center">Chọn đơn vị</h6>
  <select name="" id="select-group" class="form-control">
    <option value=""></option>
    @foreach($groups as $group)
    <option value="{{$group->id}}">{{$group->name}}</option>
    @endforeach
  </select>

  <h6 class="mt-4 text-center">Chọn điểm đến</h6>
  <select name="" id="select-point" class="form-control"></select>
  <div id="end-point">
  </div>
</div>

@endsection

@section('js')
<script defer>
  var groups = <?php echo json_encode($groups); ?>;
  var points = <?php echo json_encode($points); ?>;
  var start_point = points.find(p => p.point_id == window.location.search.split("point=")[1])
  $("#select-group").change(function() {
    var group_id = $(this).val();
    var pointsArr = points.filter(p => p.group_id == group_id);
    let options = `<option value=""></option>`
    pointsArr.forEach((p) => {
      if (start_point.id != p.id)
        options += `<option value="${p.point_id}">${p.name}</option>`
    })
    $("#select-point").html(options)
  })

  $("#select-point").change(function() {
    var end_point = points.find(p => p.point_id == $(this).val());

    $.ajax({
      type: "GET",
      url: "{{url('get-way')}}/" + start_point.id + "/" + end_point.id,
      success: function(data) {

        $("#end-point").html(`
          <h4 class="text-center mt-4 mb-3">Điểm đến ${end_point.name}</h4>
          <h5>Khối nhà: ${end_point.block}</h5>
          <h5>Tầng: ${end_point.floor}</h5>
          <h5>Phòng: ${end_point.room}</h5>
          <img width="100%" src="${end_point.picture}" class="my-3" alt="">
          <h5>Đường đi: ${data.introduction || ""}</h5>
        `)
      }
    })
  })
</script>
@endsection