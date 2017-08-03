<div class="row">
	<div class="container">
		{{ partial('includes/post_left') }}
		<div class="col-md-9 col-sm-12 col-xs-12">
			<div class="pn_posts">
				<div class="pn_title">
					<span class="bg_icon"><i class="fa post-pencil"></i></span>
					<h1>ĐĂNG TIN RAO BÁN, CHO THUÊ NHÀ ĐẤT</h1>
				</div>				
				<div class="pn_content">
					<div>
						<h3>Thông tin cơ bản</h3>
					</div>
					<form>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Loại tin <span class="lab_red">(*)</span>:</label>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control control-radio">
							        BĐS Bán
							        <input type="radio" name="m_type_id" checked="checked" value="1" class="m_type_id" />
							        <div class="control_indicator"></div>
							    </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">							
								<label class="control control-radio">
							        BĐS Cho thuê
							        <input type="radio" name="m_type_id" value="2" class="m_type_id"/>
							        <div class="control_indicator"></div>
							    </label>
							</div>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Loại nhà đất <span class="lab_red">(*)</span>:</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="select_icon">
									<select name="ctg_id" id="ctg_id">
										<option>--Chọn loại bất động sản--</option>
									</select>
								</label>
							</div>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Vị trí <span class="lab_red">(*)</span>:</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="select_icon">
									<select id="m_provin_id" name="m_provin_id">
										<option value="">--Chọn Tỉnh/Thành phố--</option>
										{%for item in provincials%}
											<option value="{{item.m_provin_id}}">{{item.m_provin_name}}</option>
										{%endfor%}
									</select>
								</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="select_icon">
									<select id="m_district_id" name="m_district_id">
										<option>--Chọn Quận/HUyện--</option>
									</select>
								</label>
							</div>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col"></label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="select_icon">
									<select name="m_ward_id" id="m_ward_id">
										<option>--Chọn Phường/Xã--</option>
									</select>
								</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="select_icon">
									<select class="m_street_id" name="m_street_id">
										<option>--Chọn Đường/Phố--</option>
									</select>
								</label>
							</div>
						</div>
						<!-- <div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col"></label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="select_icon">
									<select>
										<option>--Chọn Dự án--</option>
									</select>
								</label>
							</div>							
						</div> -->
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Giá</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" name="price">
							</div>
							<label class="col-md-1 col-sm-1 col-xs-12 title_col">Đơn vị</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<label class="select_icon">
									<select name="m_unit_id">
										<option>--Chọn đơn vị--</option>
										{%for item in units%}
											<option value="{{item.m_unit_id}}">{{item.m_unit_name}}</option>
										{%endfor%}
									</select>
								</label>
							</div>							
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Diện tích</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" name="acreage">
							</div>
							<label class="col-md-1 col-sm-1 col-xs-12 title_col">m2</label>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Địa điểm<span class="lab_red">(*)</span>:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="address">
							</div>							
						</div>
						<hr/>
						<div>
							<h3>Thông tin khác</h3>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Mặt tiền</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" name="">
							</div>	
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Đường trước nhà</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" name="street_width">
							</div>						
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Số tầng</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="" name="floor_num">
							</div>	
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Số phòng</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" name="room_num">
							</div>						
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Hướng BĐS</label>
							<div class="col-md-3 col-sm-3 col-xs-12">								
								<label class="select_icon">
									<select name="m_directional_id" id="m_directional_id">
										<option>--Chọn hướng nhà--</option>
										{%for item in directionals%}
											<option value="{{item.m_directional_id}}">{{item.m_directional_name}}</option>
										{%endfor%}
									</select>
								</label>
							</div>	
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Số toilet</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" name="toilet_num">
							</div>						
						</div>
						<hr/>
						<div>
							<h3>Mô tả chi tiết</h3>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Tiêu đề <span class="lab_red">(*)</span>:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="post_name">
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Nội dung mô tả <span class="lab_red">(*)</span>:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea style="height:100px" name="content"></textarea> 
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Cập nhật hình ảnh</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<!-- <div class="col-md-2 col-sm-2 col-xs-4"> -->
								<div class="div_img">									
									<img src="{{url.get('images/post/1777196_81_z.jpg')}}">
									<a href="javascript:void(0)" class="delete_img">X</a>
								</div>
								<div class="div_img">									
									<img src="{{url.get('images/post/1777196_81_z.jpg')}}">
									<a href="javascript:void(0)" class="delete_img">X</a>
								</div>
								<div class="div_img">									
									<img src="{{url.get('images/post/1777196_81_z.jpg')}}">
									<a href="javascript:void(0)" class="delete_img">X</a>
								</div>
								<div class="div_img">									
									<img src="{{url.get('images/post/1777196_81_z.jpg')}}">
									<a href="javascript:void(0)" class="delete_img">X</a>
								</div>
								<div class="div_img">									
									<img src="{{url.get('images/post/1777196_81_z.jpg')}}">
									<a href="javascript:void(0)" class="delete_img">X</a>
								</div>
								<div class="div_img">									
									<img src="{{url.get('images/post/1777196_81_z.jpg')}}">
									<a href="javascript:void(0)" class="delete_img">X</a>
								</div>
								<!-- </div> -->
								<!-- <div class="col-md-2 col-sm-2 col-xs-4"> -->
								<div class="div_img">
									<button class="btn_upload" id="btn_upload"><i class="fa fa-cloud-upload"></i><br/>Upload Ảnh</button>
									<input type="file" name="" style="display:none" id="upload_file">
								</div>
							</div>												
						</div>
						<hr/>
						<div>
							<h3>Thông tin liên hệ</h3>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Họ tên <span class="lab_red">(*)</span>:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="">
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Địa chỉ:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="">
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Điện thoại:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="">
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Di động <span class="lab_red">(*)</span>:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="">
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Email:</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="">
							</div>												
						</div>
						<hr/>
						<div>
							<h3>Loại tin và lịch đăng tin:</h3>
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Loại tin rao</label>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control control-radio">
							        Tin siêu vip
							        <input type="radio" name="laoitinrao" checked="checked" />
							        <div class="control_indicator"></div>
							    </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control control-radio">
							        Tin vip
							        <input type="radio" name="laoitinrao"/>
							        <div class="control_indicator"></div>
							    </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control control-radio">
							        Tin hot
							        <input type="radio" name="laoitinrao"/>
							        <div class="control_indicator"></div>
							    </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control control-radio">
							        Tin thường
							        <input type="radio" name="laoitinrao"/>
							        <div class="control_indicator"></div>
							    </label>
							</div>												
						</div>
						<div class="row row-margin-bottom">
							<label class="col-md-2 col-sm-2 col-xs-12 title_col">Thời gian đăng từ :</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="" name="" class="datetimepicker">
							</div>	
							<label class="col-md-1 col-sm-1 col-xs-12 title_col">Đến :</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="" name="" class="datetimepicker">
							</div>						
						</div>
						<div class="row row-margin-bottom" style="margin-top:20px">
							<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
								<button class="btn_dangtin btn_red"><i class="fa fa-times"></i>Hủy bỏ</button>
								<button class="btn_dangtin" style="width:110px;"><i class="fa fa-eye"></i>Xem trước</button>
								<button class="btn_dangtin" ><i class="fa fa-check-square-o"></i>Đăng tin</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
{{ stylesheet_link('template1/css/jquery.datetimepicker.css') }}
{{ javascript_include('template1/js/jquery.datetimepicker.full.min.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		var district_list = Array();
		var ward_list = Array();
		var street_list = Array();
		var category_list = Array();
		{%for item in categorys%}
			category_list.push(['{{item.ctg_id}}',"{{item.ctg_name}}",'{{item.m_type_id}}']);
		{%endfor%}

		{%for item in districts%}
			district_list.push(['{{item.m_district_id}}',"{{item.m_district_name}}",'{{item.m_provin_id}}']);
		{%endfor%}

		{%for item in wards%}
			ward_list.push(['{{item.m_ward_id}}',"{{item.m_ward_name}}",'{{item.m_district_id}}']);
		{%endfor%}
		{%for item in streets%}
			street_list.push(['{{item.m_street_id}}',"{{item.m_street_name}}",'{{item.m_ward_id}}']);
		{%endfor%}

		$('.datetimepicker').datetimepicker({
          //format:'Y/m/d H:i',
          format:'d/m/Y',
          inline:false,
          timepicker:false,
          lang:'ru'
    	});
		//console.log(district_list);
		$(document).off('change','#m_provin_id');
		$(document).on('change','#m_provin_id',function(){
			var val = $(this).val();
			var option = '<option value="">--Chọn Quận/HUyện--</option>';
			$.each(district_list,function(key,item){
				//console.log(item);
				if(val == item[2]){
					option +='<option value="'+item[0]+'">'+item[1]+'</option>';
				}
			});
			$('#m_district_id').empty();
			$('#m_district_id').append(option);
		});
		$(document).off('change','#m_district_id');
		$(document).on('change','#m_district_id',function(){
			var val = $(this).val();
			var option = '<option>--Chọn Phường/Xã--</option>';
			$.each(ward_list,function(key,item){
				//console.log(item);
				if(val == item[2]){
					option +='<option value="'+item[0]+'">'+item[1]+'</option>';
				}
			});
			$('#m_ward_id').empty();
			$('#m_ward_id').append(option);
		});
		$(document).off('change','#m_ward_id');
		$(document).on('change','#m_ward_id',function(){
			var val = $(this).val();
			var option = '<option>--Chọn Đường/Phố--</option>';
			$.each(ward_list,function(key,item){
				//console.log(item);
				if(val == item[2]){
					option +='<option value="'+item[0]+'">'+item[1]+'</option>';
				}
			});
			$('#m_street_id').empty();
			$('#m_street_id').append(option);
		});
		change_m_type_id($("input[name='m_type_id']:checked").val());
		$(document).off('change','.m_type_id');
		$(document).on('change','.m_type_id',function(){
			var val = $("input[name='m_type_id']:checked").val();
			change_m_type_id(val);
		});
		function change_m_type_id(val){
			var option = '<option>--Chọn loại bất động sản--</option>';
			$.each(category_list,function(key,item){
				//console.log(item);
				if(val == item[2]){
					option +='<option value="'+item[0]+'">'+item[1]+'</option>';
				}
			});
			$('#ctg_id').empty();
			$('#ctg_id').append(option);
		}
		//upload file
		$(document).off('click','#btn_upload'); 
        $(document).on('click','#btn_upload',function(event){
        	$('#upload_file').click();
        });
		$(document).off('change','#upload_file'); 
        $(document).on('change','#upload_file',function(event){
        	
        	var file_data=$(this).prop("files");
        	//console.log(file_data);	
        	if(file_data.length == 0){
        		return;
        	}
        	var form_data=new FormData(this);
        	for(var i=0;i<file_data.length;i++){
        		form_data.append(i,file_data[i]);
        	}        	
            
            var base_url= "{{url.get('')}}";
            //console.log(form_data);	
        	Pho_upload("{{url.get('posts/upload')}}" ,form_data,function(datas){
				if(datas.status =="OK"){
					//console.log(datas);					
                   // var cnt_add = $("#list_file").find('.add_img').length;  			
					for(var i=0;i<datas.link.length;i++){
		        		//form_data.append(i,file_data[i]);
		        		cnt_add++;
		        		var html_tr= '<tr id="tr_add_'+cnt_add+'"><td><img class="img-rounded" height="60" src="'+datas.link[i]+'" id="img_add_'+cnt_add+'"></td><td><a class="btn btn-danger btn-xs btn_del_img" id="del_add_'+cnt_add+'">Xóa hình</a></td><td><label><input type="radio" name="chk" value="1" id="radio_add_'+cnt_add+'">Chọn làm ảnh đại diện </label><input type="hidden" name="img_add['+cnt_add+']" value="'+datas.link[i]+'"></td></tr>';
		        		$("#list_file").append(html_tr);		        		
		        	}
		        	if(get_avata_id()==""){
		        		$("#radio_add_1").prop('checked',true);	
		        	}
					//var file_name = datas.link.replace(base_url,"");	
					//$('#img_path').val(file_name);				
				}else{
					Pho_message_box_error("Lỗi",datas.msg);
				}
                
            });
        });
	});
</script>