<?php
namespace backend\controllers;
use common\models\Tagnews;
use yii\web\Controller;
use common\models\News;
use common\models\Category;
use common\models\Tag;
use yii\helpers\Json;


class SiteController extends Controller{
	public $layout = 'backend';
	public $enableCsrfValidation = false;
	private $command = 'V5BymarxV5';

	public function actionIndex(){
		return $this->render('index');
	}
	public function actionEditnews()
	{
		if($this->checkMe())
			return $this->render('edit-news');
		else
			return $this->render('error');
	}
	public function actionEditcategory(){
		if($this->checkMe())
			return $this->render('edit-category');
	}
	public function actionEdittag(){
		if($this->checkMe())
			return $this->render('edit-tag');
	}
	public function actionAddnews(){
		if($this->checkMe())
			return $this->render('add-news');
	}

	public function actionCookie(){
		$psw = \YII::$app->request->post('password');
		if($psw==$this->command){
			setcookie('command',$psw,time ()+ 3600*24*30);
			return $this->render('edit-news');
		}else{
			echo "<script type=\"text/javascript\">alert(\"密码错误,请重新输入!\");</script>";
			return $this->render('index');
		}
	}

	/**
	 * 检查权限
	 * @return bool
	 */
	public function checkMe(){
		return $_COOKIE['command']==$this->command;
	}

	public function actionNews(){
		$newsList = new News();
		$newsEdit = $newsList->getNewsEdit();
		$data = array(
			"total"=>count($newsEdit),
			"rows"=>$newsEdit
		);
		echo Json::encode($data);
	}

	public function actionTag(){
		$choose = \YII::$app->request->get('choosetag');
		$tags = new Tag();
		$tag = $tags->getTag();
		if($choose){
			echo Json::encode($tag);
		}
		else{
			$data = array(
				"total"=>count($tag),
				"rows"=>$tag
			);
			echo Json::encode($data);
		}
	}

	public function actionCategory(){
		$categoryList = new Category();
		$category = $categoryList->Category;
		$categoryName = $category['category_name'];

		$data =  array();
		$dataPa =array();

		$order=1;
		foreach($categoryName as $name=>$childName){
			$dataCh =array();
			if(empty($childName)){
				$data['id'] = $order;
				$data['text'] = $name;
				$dataPa[] = $data;
			}else {
				$data['id'] = $order;
				$data['text']= $name;
//				$data['state']="closed";

				for($i=0;$i<count($childName);$i++){
					$dataChild = array();
					$dataChild['id'] = $order.$i+1;
					$dataChild['text'] = $childName[$i];
					$dataCh[]=$dataChild;
				}
				$data['children']=$dataCh;
				$dataPa[] =$data;
			}
			$order++;
		}
		echo Json::encode($dataPa);
	}

	public function actionSave()
	{
		$news = new News();
		//NOT NULL
		$news->news_title = \YII::$app->request->post('news_title');
		$news->news_sump = \YII::$app->request->post('news_sump');
		$news->news_summary = \YII::$app->request->post('news_summary');
		$news->news_pic = \YII::$app->request->post('news_pic');
		$news->news_content = \YII::$app->request->post('news_content');

		$news->news_author = \YII::$app->request->post('news_author');
		$news->news_editor = \YII::$app->request->post('news_editor');

		$news->news_category = \YII::$app->request->post('news_category');

		$news->news_source = \YII::$app->request->post('news_source');
		$news->news_url = \YII::$app->request->post('news_url');
		$news->news_date = date('Y-m-d H:i:s',time());

		if($news->hasErrors()){
			echo 'fail';
			die;
		}else{
			$news->save();

			$tag = new Tag();
			$news_id_curr = $news->getNewsMaxId();			//保存文章标签项
			$news_tags = \YII::$app->request->post('news_tags');
			$tagsArr = explode(',',$news_tags);
			for($index=0;$index<count($tagsArr);$index++){

				$tag_news =new Tagnews();
				$tagId = $tag->getTagId($tagsArr[$index]);
				$tag_news->tag_id = $tagId;
				$tag_news->news_id = $news_id_curr;
				if($tag_news->hasErrors()){
					//echo 'fail';
					//die;
				}else{
					$tag_news->save();
					//echo 'success';
				}

			}

			echo 'success';
		}
	}

	public function actionEdit(){


	}
}