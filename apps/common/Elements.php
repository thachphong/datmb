<?php
use Phalcon\Mvc\Url;
use Phalcon\Mvc\User\Component;
use Multiple\Models\Message;
use Multiple\Models\Menu;
/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{
	
    private $_adminMenu = array(
        'navbar-left' => array(
            'index' => array(
                'caption' => 'Home',
                'action' => 'index'
            ),
           /* 'invoices' => array(
                'caption' => 'Invoices',
                'action' => 'index'
            ),
            'about' => array(
                'caption' => 'About',
                'action' => 'index'
            ),
            'contact' => array(
                'caption' => 'Contact',
                'action' => 'index'
            */
            'approval' => array(
                'caption' => 'Duyệt bài',
                'action' => ''
            ),
            'download' => array(
                'caption' => 'Download',
                'action' => 'index'
            ),
        ),
        'navbar-right' => array(
            'useradm' => array(
                'caption' => 'Log In/Sign Up',
                'action' => 'login'
            ),
        )
    );

    private $_tabs = array(
        'Invoices' => array(
            'controller' => 'invoices',
            'action' => 'index',
            'any' => false
        ),
        'Companies' => array(
            'controller' => 'companies',
            'action' => 'index',
            'any' => true
        ),
        'Products' => array(
            'controller' => 'products',
            'action' => 'index',
            'any' => true
        ),
        'Product Types' => array(
            'controller' => 'producttypes',
            'action' => 'index',
            'any' => true
        ),
        'Your Profile' => array(
            'controller' => 'invoices',
            'action' => 'profile',
            'any' => false
        )
    );
	public function get_message($screen){
		$db= new Message();
		$msg_lang =$db->get_all('LOGIN');
		return $msg_lang;
	}
    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {
    	$cacheKey = 'menu.cache';
		$menu_data  = $this->dataCache->get($cacheKey);
		if ($menu_data === null) {
			$menu_data ='';
            $db = new Menu();
		    $list_menu = $db->get_menus();
            $url = new Url();
            $url->setBaseUri(BASE_URL_NAME);            
	        $base_url = $url->get('');
            foreach($list_menu as $item){
                if($item['child_flg'] > 0){
	                $menu_data .='<li>';
                    $href = $base_url;
                    
                    if(strlen($item['link'])>0){                        
                        if($item['page_flg']==1){
                            $href .= 'trang/';
                        }else if($item['page_flg']==2){
                            $href .= 'danhmuc/';
                        }else if($item['page_flg']==3){
                            $href .= 'tintuc/';
                        }
                         $href .=$item['link'];
                    }else{
                        $href ='#';
                    }
                    $menu_data .='<a href="'.$href.'">'.$item['menu_name'].'</a><ul>';
                            
                    foreach($item['child'] as $sub1){                              
                        if($sub1['child_flg'] > 0){                               
                            $menu_data .='<li>';
                            $href = $base_url;
                            
                            if(strlen($sub1['link'])>0) {                       
                                if($sub1['page_flg']==1){
                                    $href .= 'p/';
                                }else if($sub1['page_flg']==2){
                                    $href .= 'danhmuc/';
                                }else if ($sub1['page_flg']==3){
                                    $href .= 'tintuc/';
                                }
                                 $href .=$sub1['link'];
                            }else{
                               // $href ='#';
                            }
                            $menu_data .='<a href="'.$href.'">'.$sub1['menu_name'].'</a><ul>';
                            foreach($sub1['child'] as $sub2){                            
                                $href = $base_url;                    
                                if(strlen($sub2['link'])>0) {                       
                                    if( $sub2['page_flg']==1){
                                        $href .= 'p/';
                                    }else if( $sub2['page_flg']==2){
                                        $href .= 'danhmuc/';
                                    }else if ($sub2['page_flg']==3){
                                        $href .= 'tintuc/';
                                    }
                                     $href .=$sub2['link'];
                                }else{
                                    //$href ='#';
                                }                
                                $menu_data .='<li><a href="'.$href.'">'.$sub2['menu_name'].'</a></li>';
                            }                   
                            $menu_data .='</ul></li>';
                        }else{                      
                            $href = $base_url;                    
                            if(strlen($sub1['link'])>0) {                       
                                if( $sub1['page_flg']==1){
                                    $href .= 'p/';
                                }else if( $sub1['page_flg']==2){
                                    $href .= 'danhmuc/';
                                }else if ($sub1['page_flg']==3){
                                    $href .= 'tintuc/';
                                }
                                 $href .=$sub1['link'];
                            }else{
                                //$href ='#';
                            }                
                            $menu_data .='<li><a href="'.$href.'">'.$sub1['menu_name'].'</a></li>';
                        }              
                    }               
                    $menu_data .='</ul></li>';
                }else{
                    $href = $base_url;                    
                    if(strlen($item['link'])>0){                        
                        if( $item['page_flg']==1){
                            $href .= 'p/';
                        }else if( $item['page_flg']==2){
                            $href .= 'danhmuc/';
                        }else if ($item['page_flg']==3){
                            $href .= 'tintuc/';
                        }
                         $href .=$item['link'];
                    }else{
                        //$href ='#';
                    }                
                    $menu_data .='<li><a href="'.$href.'">'.$item['menu_name'].'</a></li>';
                }        
	        }
		    // Store it in the cache
		    $this->dataCache->save($cacheKey, $menu_data);
		    
		}
		echo $menu_data;

    }
    public function getuser(){
        return $this->session->get('auth');
    }
	public function getAdminMenu(){
		
        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_adminMenu['navbar-right']['useradm'] = array(
                'caption' => 'Log Out',
                'action' => 'logout' 
            );
        } else {
            unset($this->_adminMenu['navbar-left']['invoices']);
        }
        $controllerName = $this->view->getControllerName();
        echo '<div class="collapse navbar-collapse">';
        echo '<div class="navbar-header">    <a class="navbar-brand" href="#">Admin</a>    </div>';
        foreach ($this->_adminMenu as $position => $menu) {            
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if($option['action']=='logout'){
                    echo '<li class="dropdown">';
                    echo '<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Xin Chào '.$auth['name'].'<span class="caret"></span>
</a>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li>'.$this->tag->linkTo( 'useradm/edit' , 'Thông tin cá nhân').'</li>';    
                    echo '<li>'.$this->tag->linkTo('useradm/logout', 'Thoát').'</li>';                       
                    echo '</ul></li>';
                }else{
                    if ($controllerName == $controller) {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                    echo '</li>';
                }
            }
            echo '</ul>';
        }
        echo '</div>';
        /*echo '<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';*/
	}
    /**
     * Returns menu tabs
     */
    public function getNewPost()
    {
    	/*$db = new Posts();
    	$data = $db->get_new(6);*/
    	$cacheKey = 'newpost.cache';
		$html  = $this->dataCache->get($cacheKey);
		if ($html === null) {
	    	$data = $this->db->fetchAll("SELECT t.* from posts t where status=1 order by id desc limit 6 ", Phalcon\Db::FETCH_ASSOC);
	    	$html = '';
	    	foreach($data as $key=>$post){
				$html .= '<li>';
			    $html .= '<span class="number">'.($key+1).'</span>';                	
			    $html .= '<a class="bold" href="'.$this->url->get('n/'.$post['id'].'/'.$post['caption_url']).'" title="'.$post['caption'].'">'.$post['caption'].'</a>';
			    $html .= '</li>';
			}
			// Store it in the cache
		    $this->dataCache->save($cacheKey, $html);
		}
		echo $html;
    }
    public function getTopPost()
    {
    	/*$db = new Posts();
    	$data = $db->get_new(6);*/
    	$cacheKey = 'toppost.cache';
		$html  = $this->dataCache->get($cacheKey);
		if ($html === null) {
	    	$data = $this->db->fetchAll("SELECT t.* from posts t where status=1 order by total_view desc limit 6 ", Phalcon\Db::FETCH_ASSOC);
	    	$html = '';
	    	foreach($data as $key=>$post){
				$html .= '<li>';
			    $html .= '<span class="number">'.($key+1).'</span>';                	
			    $html .= '<a class="bold" href="'.$this->url->get('n/'.$post['id'].'/'.$post['caption_url']).'" title="'.$post['caption'].'">'.$post['caption'].'</a>';
			    $html .= '</li>';
			}
			// Store it in the cache
		    $this->dataCache->save($cacheKey, $html);
		}
		echo $html;
    }
    public function getMidlePost()
    {
    	/*$db = new Posts();
    	$data = $db->get_new(6);*/
    	$cacheKey = 'midlepost.cache';
		$html  = $this->dataCache->get($cacheKey);
		if ($html === null) {
	    	$data = $this->db->fetchAll("SELECT t.* from posts t where status=1 and menu_id=3 order by id desc limit 6 ", Phalcon\Db::FETCH_ASSOC);
	    	$html = '';
	    	foreach($data as $key=>$post){
				$html .= '<li>';
				$html .='<a class="bold" href="'.$this->url->get('n/'.$post['id'].'/'.$post['caption_url']).'" title="'.$post['caption'].'">';
                $html .='<img width="247" height="158" src="'.$this->url->get('images/'.$post['filename']).'" class="attachment-thumb_247x158 wp-post-image" alt="'.$post['caption'].'"/>'.$post['caption'].'</a>';
			    $html .= '</li>';
			}
			// Store it in the cache
		    $this->dataCache->save($cacheKey, $html);
		}
		echo $html;
    }
    public function getRightPost()
    {
    	/*$db = new Posts();
    	$data = $db->get_new(6);*/
    	$cacheKey = 'rightepost.cache';
		$html  = $this->dataCache->get($cacheKey);
		if ($html === null) {
	    	$data = $this->db->fetchAll("SELECT t.* from posts t where status=1 and menu_id=4 order by id desc limit 6 ", Phalcon\Db::FETCH_ASSOC);
	    	$html = '';
	    	foreach($data as $key=>$post){
	    		$html .= '<li>';
	    		if($key==0){
					$html .='<a class="bold" href="'.$this->url->get('n/'.$post['id'].'/'.$post['caption_url']).'" title="'.$post['caption'].'">'.$post['caption'];                                                    
                    $html .='<img width="650" height="480" src="'.$this->url->get('images/'.$post['filename']).'" class="attachment-thumb_301x216 wp-post-image" alt="'.$post['caption'].'"/></a>';
                    $html .='<p>'.$post['des'].'</p>';
				}else{
					$html .='<a class="bold" href="'.$this->url->get('n/'.$post['id'].'/'.$post['caption_url']).'" title="'.$post['caption'].'"> '.$post['caption'].'</a>'; 
				}
				
			}
			// Store it in the cache
		    $this->dataCache->save($cacheKey, $html);
		}
		echo $html;
    }
    public function getNewsfeed()
    {
    	/*$db = new Posts();
    	$data = $db->get_new(6);*/
    	$cacheKey = 'Newsfeed.cache';
		$html  = $this->dataCache->get($cacheKey);
		if ($html === null) {
	    	$data = $this->db->fetchAll("SELECT t.* from posts t where status=1 order by id desc limit 10 ", Phalcon\Db::FETCH_ASSOC);
	    	$html = '';
	    	foreach($data as $key=>$post){
				$html .= '<div class="item">';
				$html .='<a href="'.$this->url->get('n/'.$post['id'].'/'.$post['caption_url']).'" title="'.$post['caption'].'">'.$post['caption'].'</a>';
               
			    $html .= '</div>';
			}
			// Store it in the cache
		    $this->dataCache->save($cacheKey, $html);
		}
		echo $html;
    }
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '</li>';
        }
        echo '</ul>';
    }
    public function formatdate($date,$time=''){
    	$source = $date.' '.$time;
		$date = new DateTime($source);
		echo $date->format('d/m/Y H:i'); 
		//return date_format($date.' '.$time,'d/m/Y H:i');
	}
	function to_slug($str) {
	    $str = trim(mb_strtolower($str));
	    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
	    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
	    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
	    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
	    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
	    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
	    $str = preg_replace('/(đ)/', 'd', $str);
	    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
	    $str = preg_replace('/([\s]+)/', '-', $str);
	    $str = str_replace(array('"',':'), '', $str);
	    return $str;
	}
}
