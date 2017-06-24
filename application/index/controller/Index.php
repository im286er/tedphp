<?php

class Index extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function test()
	{
		//获取文章总数
		$model = new Model();

		require 'vendor/Page/Page.php';
		// $sql = "SELECT id,title FROM core_article WHERE title LIKE ?";
		// $res = $model->query($sql,["%电脑%"]);
		$mysql = new Mysql();
		$sql = "SELECT id,title FROM core_article WHERE id = ?";
		$stmt = $mysql->dbh->prepare($sql);
		$stmt->execute([208]);
		p($stmt->fetchAll());

		$model = new Model();
		$sql = "SELECT id,title FROM core_article WHERE id = 209";
		$res = $model->query($sql);
		p($res);

		$model = new Model();
		$sql = "SELECT id,title FROM core_article WHERE title LIKE ?";
		$res = $model->query($sql,['%1%']);
		p($res);

		// $res = $model->query($sql,[209]);

		// $_POST['user_nick'] = '222';
		// //验证
		// $validate = new Validate([
		//     'user_nick' => 'require',
		//     'user_tel' => 'require'
		// ],[
		// 	'user_nick.require' => '昵称不能为空!',
		//     'user_tel.require' => '电话号码不能为空!'
		// ]);
		// if (!$validate->check($_POST)) {
		//     p($validate->getError() );
		//     exit();
		// }
	}

	
	public function index(){
		//获取文章总数
		$model = new Model();
		$sql = "SELECT count(*) as num FROM __article__ WHERE article_status='1'";
		$res = $model->query($sql);
		$count = $res[0]['num'];
		
		//导入分页类,生成单页数据
		require 'vendor/Page/Page.php';
		$Page = new \page\Page($count,10);
		$sql = "SELECT * FROM __article__ WHERE article_status='1' ORDER BY post_time DESC LIMIT ".$Page->limit;
		//echo $sql;
		$res = $model->query($sql);
		
		$this->assign('category_name','忧零猎手的Blog');


		//生成分页
		$show = $Page->show();
		
		$this->assign("article", $res);
		$this->assign('page', $show);
		
		$this->assign('category',$this->getCategory());
		$this->display();
	}

	public function article(){
		$id = Input::get('id');
		intval($id) >= 0 ? $id = intval($id) : 0;
	
		$model = new Model();
		$sql = "SELECT * FROM __article__ WHERE id='$id'";
		$res = $model->query($sql);
		if(count($res) !== 1){
			return $this->error("文章已经删除,或者不存在",url("index/index/index"));
		}

		$cat = "select * from core_category where id=".$res[0]['category'];
		$cat = $model->query($cat);
		$res[0]['cat'] = $cat[0];

		$this->assign('article', $res[0]);
		$this->assign('category',$this->getCategory());
		$this->display();
	}
	
	public function getCategory(){
		$model = new Model();
		$sql = "select * from core_category ORDER BY category_order ASC";
		$res = $model->query($sql);

		foreach ($res as $key => $value) {
			# code...
			$sql = "select count(*) as num from __article__ where category=".$value['id'];
			$new_arr = $model->query($sql);			
			$res[$key]['num'] = $new_arr[0]['num'];
		}
		// p($res);die();
		return $res;
	}


	public function category(){
		$id = Input::get('id');
		intval($id) >= 0 ? $id = intval($id) : 0;
	
		$model = new Model();

		$sql = "SELECT * FROM __category__ WHERE id='$id'";
		$res = $model->query($sql);
		//p($res);die();
		$this->assign('category_name',$res[0]['name']);

		$sql= "SELECT count(*) as num FROM __article__ WHERE category='$id' AND article_status='1'";
		$res = $model->query($sql);
		$count = $res[0]['num'];
		require 'vendor/Page/Page.php';
		$Page = new \page\Page($count,10);
		$sql= "SELECT * FROM __article__ WHERE category='$id' AND article_status='1' order by post_time DESC LIMIT ".$Page->limit;
		$res = $model->query($sql);
		$this->assign('article', $res);	
		$show = $Page->show();
		$this->assign('page', $show);

		//p($this->getCategory());die();

		$this->assign('category',$this->getCategory());
		$this->display('index');
	}


	public function search(){
		$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
		if($keyword==''){
			return $this->error("没有关键词!",url('index/index/index'));
		}

		//获取文章总数
		$model = new Model();
		$sql = "SELECT count(*) as num FROM __article__ WHERE article_status='1' AND title LIKE ?";
		$res = $model->query($sql,["%$keyword%"]);
		$count = $res[0]['num'];
		
		//导入分页类,生成单页数据
		require 'vendor/Page/Page.php';
		$Page = new \page\Page($count,10);
		$sql = "SELECT * FROM __article__ WHERE article_status='1'  AND title LIKE ? ORDER BY post_time DESC LIMIT ".$Page->limit;
		$res = $model->query($sql,["%$keyword%"]);

		$this->assign("article", $res);
		$this->assign('page', $Page->show());
		
		$this->assign('category',$this->getCategory());
		$this->assign('category_name','首页 - 宠爱有家');
		
		return $this->display();
	}






}