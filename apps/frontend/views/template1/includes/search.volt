<div class="search">    
    <div class="container">
        <div class="row search_tab">
            <div class="col-md-12" style="padding:0px">
                <a href="javascript:void(0)" data="1" class="tab_title active">BẤT ĐỘNG SẢN BÁN</a>
                <a href="javascript:void(0)" data="2" class="tab_title">BẤT ĐỘNG SẢN CHO THUÊ</a>
            </div>
        </div>
        <div class="row search_bg search_condition">
            <div class="row search_row">
                <div class="col-md-12 col-sm-12 col-xs-12 no_padding" >
                    <input type="text" name="" placeholder="Nhập địa điểm" class="col-md-12">
                </div>
            </div>            
            <div class="row search_row" >
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding"> 
                    <label class="select_icon">                  
                        <select name="ctg_id" id="ctg_id">
                            <option>Loại bất động sản</option>
                            <option>Nhà cho thuê</option>
                            <option>Căn hộ cho thuê</option>
                            <option>Đất cho thuê</option>
                        </select>
                    </label>
                    <!-- <i class="fa fa-chevron-down"></i> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="m_provin_id">
                            <option value="">Tỉnh/Thành phố</option>
                            {%for item in provincials%}
                                <option value="{{item.m_provin_id}}" >{{item.m_provin_name}}</option>
                            {%endfor%}
                        </select> 
                    </label>                  
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">
                        <select name="m_district_id">
                            <option>Quận/Huyện</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="m_ward_id">
                            <option>Phường/Xã</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="acreage">
                            <option value="">Diện tích</option>
                            <option value="0">Không xác định</option> 
                            <option value="1">&lt;= 30 m2</option> 
                            <option value="2">30-50 m2</option> 
                            <option value="3">50-80 m2</option> 
                            <option value="4">80-100 m2</option> 
                            <option value="5">100-150 m2</option> 
                            <option value="6">150-200 m2</option> 
                            <option value="7">200-250 m2</option> 
                            <option value="8">250-300 m2</option> 
                            <option value="9">300-500 m2</option> 
                            <option value="10">&gt;=500 m2</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="price">
                            <option value="">Mức giá</option>
                            <option value="0">Thỏa thuận</option> 
                            <option value="1">&lt; 500 triệu</option> 
                            <option value="2">500 - 800 triệu</option> 
                            <option value="3">800 - 1 tỷ</option> 
                            <option value="4">1 - 2 tỷ</option> 
                            <option value="5">2 - 3 tỷ</option> 
                            <option value="6">3 - 5 tỷ</option> 
                            <option value="7">5 - 7 tỷ</option> 
                            <option value="8">7 - 10 tỷ</option> 
                            <option value="9">10 - 20 tỷ</option> 
                            <option value="10">20 - 30 tỷ</option> 
                            <option value="11">&gt; 30 tỷ</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row search_row">
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="m_street_id">
                            <option value="">Đường phố</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="room_num">
                            <option value="">Số phòng ngủ</option>
                            <option value="0">Không xác đinh</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                            <option value="5">5+</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select name="m_directional_id">
                            <option value="">Hướng nhà</option>
                            {%for item in directionals%}
                                <option value="{{item.m_directional_id}}" >{{item.m_directional_name}}</option>
                            {%endfor%}
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <label class="select_icon">  
                        <select>
                            <option>Dự án</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 no_padding">
                    <button class="btn_search"><span class="fa fa-search"></span><span style="margin-left:5px;">TÌM KIẾM</span></button>
                </div>
                
            </div>            
        </div>
    </div>
</div>
{{ partial('includes/pho_ajax') }}
<script type="text/javascript">
$(document).ready(function() {
    $(document).off('click','.tab_title');
    $(document).on('click','.tab_title',function(){
        $('.tab_title').removeClass('active');
        $(this).addClass('active');
        change_m_type_id($(this).attr('data'));
    });
    var category_list = Array();
    {%for item in categorys%}
        category_list.push(['{{item.ctg_id}}',"{{item.ctg_name}}",'{{item.parent_id}}']);
    {%endfor%}
    function change_m_type_id(val){
        var option = '<option value="">Loại bất động sản</option>';
        $.each(category_list,function(key,item){
            //console.log(item);
            if(val == item[2]){                    
                option +='<option value="'+item[0]+'">'+item[1]+'</option>';                                     
            }
        });
        $('#ctg_id').empty();
        $('#ctg_id').append(option);
    }
    change_m_type_id(1);
});
</script>