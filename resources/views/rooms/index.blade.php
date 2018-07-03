<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/lib/html5shiv.js"></script>
<script type="text/javascript" src="/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>宿舍列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 行政部门 <span class="c-gray en">&gt;</span> 宿舍列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
	 <span class="select-box inline">
		<select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select>
		</span> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜宿舍</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加宿舍" onclick="room_add('添加宿舍','{{route('rooms.create')}}','800','500')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加宿舍</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th ><input type="checkbox" name="" value=""></th>
					<th >ID</th>
					<th >楼盘名</th>
					<th >房号</th>
					<th >所属公司</th>
					<th >可容纳人数</th>
					<th >已入住人数</th>
					<th >房租到期时间</th>
					<th >水电到期时间</th>
					<th >宽带到期时间</th>
					<th >操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($rooms as $room)
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>{{$room->id}}</td>
					<td>{{$room->property}}</td>
					<td>{{$room->num}}</td>
					<td>{{$room->attribution}}</td>
					<td>{{$room->accommodate}}</td>
					<td>{{$room->in}}</td>
					<td>{{$room->rent}}</td>
					<td>{{$room->hydropower}}</td>
					<td>{{$room->internet}}</td>
					<td class="f-14 td-manage"> <a style="text-decoration:none" class="ml-5" onClick="room_edit('宿舍编辑','{{route('rooms.edit',['room'=>$room])}}','800','500')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="room_del(this,'{{$room->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
	]
});

/*宿舍-增加*/
function room_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*宿舍-添加*/
// function article_add(title,url,w,h){
// 	var index = layer.open({
// 		type: 2,
// 		title: title,
// 		content: url
// 	});
// 	layer.full(index);
// }
/*宿舍-编辑*/
function room_edit(title,url,w,h){
    layer_show(title,url,w,h);
}
/*宿舍-删除*/
function room_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/rooms/'+id,
			dataType: 'json',
            data: "_token={{ csrf_token() }}",
			success: function(result){
                console.log(result);
                if (result.code == 1) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }

			},
			error:function(result) {
				console.log(result.msg);
			},
		});		
	});
}
</script> 
</body>
</html>