<?php

namespace frontend\controllers;
use common\models\News;
use common\models\Category;
use common\models\Tag;

use yii\helpers\Json;
use yii\web\Controller;

class SiteController extends Controller
{
	public $layout = 'common';
    public $enableCsrfValidation = false;

    /**
     * 获取当期最大文章id
     */
    public function MaxNewsId(){
        $newsList = new News();
        return $newsList->getNewsMaxId()+1;
    }

    /**
     * 读取模板数据：导航栏目录，热览新闻，热评新闻
     */
    public function actionLayouts()
    {
        $newsList = new News();
        $newsHotView = $newsList->getHotView();
        $newsHotComment = $newsList->HotComment;
        $newsRands = $newsList->getRands();
        $categoryList = new Category();
        $category = $categoryList->Category;


        $view = \Yii::$app->view;
        $view->params['hotView']= $newsHotView;
        $view->params['hotComment']= $newsHotComment;
        $view->params['rands']= $newsRands;
        $view->params['category']= $category;
    }

    /***
     * 网站入口页面
     * @return string
     */
    public function actionIndex(){
        $this->actionLayouts();
        $categoryId = \YII::$app->request->get('category_id');
        $tagName = \YII::$app->request->get('tagName');
        $tag = new Tag();
        $tagId = $tag->getTagId($tagName);
        $newsList = new News();

        //目录入口
        if($categoryId){
            $category = new Category();
            $newsMain = $category->getNewsByCategoryId($categoryId,$this->MaxNewsId());
        }

        //标签入口
        if($tagId){
            $newsMain = $tag->getNewsByTagId($tagId,$this->MaxNewsId());
        }
        if(!$categoryId&&!$tagId){
            $newsMain = $newsList->getNewsIndex();      //门户入口
        }

        $change =  Json::encode($newsMain);
        $data = Json::decode($change);
        $newsDetail = array();
        foreach($data as $news){
            $newsId = $news['news_id'];
            $newsTags = $newsList->getTag($newsId);
            $tmp = Json::encode($newsTags);
            $newTag = Json::decode($tmp);
            $news['news_tag'] = $newTag;
            array_push ( $newsDetail,$news);
        }

        $view = \Yii::$app->view;
        $view->params['newsMain']= $newsDetail;
        $view->params['categoryId'] = $categoryId;
        $view->params['tagId'] = $tagId;
        $view->title = '剑指零壹';
        $view->keywords = '编程|计算机|软件|代码|网络';
        $view->description = '沉寂于0和1的世界中,探索0与1之外的真理';
        $view->params['isMobile'] = $this->checkMobile();
        return $this->render('index');
    }

    /**
     * Ajax 加载数据
     */
    public function actionMore()
    {
        if (\YII::$app->request->getIsAjax()) {
            $lastId = \YII::$app->request->get('lastId');
            $categoryId = \YII::$app->request->get('categoryId');
            $tagId = \YII::$app->request->get('tagId');
            $newsList = new News();

            //目录页面
            if ($categoryId) {
                $category = new Category();
                $newsMain = $category->getNewsByCategoryId($categoryId, $lastId);
            }
            //标签页面
            if ($tagId) {
                $tag = new Tag();
                $newsMain = $tag->getNewsByTagId($tagId, $lastId);
            }
            //index页面
            if (!$categoryId && !$tagId) {
                //读取最近十篇文章
                $newsMain = $newsList->getNews($lastId);
            }

            $change = Json::encode($newsMain);
            $data = Json::decode($change);
            $newsDetail = array();
            foreach ($data as $news) {
                $newsId = $news['news_id'];
                $newsTags = $newsList->getTag($newsId);
                $tmp = Json::encode($newsTags);
                $newTag = Json::decode($tmp);
                $news['news_tag'] = $newTag;
                array_push($newsDetail, $news);
            }

            echo Json::encode($newsDetail);
        }
    }

    /***
     * 文章页面
     * @return string
     */
    public function actionContent(){
        $this->actionLayouts();
        $data=array();
        $newsList = new News();
        $id = \YII::$app->request->get("news_id");
        $newsContent = $newsList->getNewsContent($id);
        $data['content']=$newsContent;
        $view = \Yii::$app->view;
        $view->title = $newsContent[0]['news_title'];
        return $this->render('content',$data);
    }

    /***
     * 文章浏览数自增
     */
    public function actionView()
    {
        if (\YII::$app->request->getIsAjax()) {
            $newsId = \YII::$app->request->get('newsId');
            if(null!=$newsId){
                $news = News::findOne($newsId);
                $news->browse_count += 1;
                $news->update();  // 等同于 $customer->update();
            }
        }
    }

    /***
     * 文章评论数校验，调外部接口
     */
    public function actionComment(){    //TODO add comment count to mysql
        ;
    }

    public function actionAbout(){
        $this->actionLayouts();
        return $this->render('about');
    }

    public function checkMobile(){
        global $_G;
        $mobile = array();
        //各个触控浏览器中$_SERVER['HTTP_USER_AGENT']所包含的字符串数组
        static $touchbrowser_list =array('iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi', 'opera mini',
            'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod', 'nokia', 'samsung',
            'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma', 'docomo', 'up.browser',
            'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos', 'techfaith', 'palmsource',
            'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem', 'wellcom', 'bunjalloo', 'maui', 'smartphone',
            'iemobile', 'spice', 'bird', 'zte-', 'longcos', 'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop',
            'benq', 'haier', '^lct', '320x320', '240x320', '176x220');

        //window手机浏览器数组
        static $mobilebrowser_list =array('windows phone');
        //wap浏览器中$_SERVER['HTTP_USER_AGENT']所包含的字符串数组
        static $wmlbrowser_list = array('cect', 'compal', 'ctl', 'lg', 'nec', 'tcl', 'alcatel', 'ericsson', 'bird', 'daxian', 'dbtel', 'eastcom',
            'pantech', 'dopod', 'philips', 'haier', 'konka', 'kejian', 'lenovo', 'benq', 'mot', 'soutec', 'nokia', 'sagem', 'sgh',
            'sed', 'capitel', 'panasonic', 'sonyericsson', 'sharp', 'amoi', 'panda', 'zte');
        $pad_list = array('pad', 'gt-p1000');
        $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if($this->dstrpos($useragent, $pad_list)) {
            return false;
        }
        if(($v = $this->dstrpos($useragent, $mobilebrowser_list, true))){
            $_G['mobile'] = $v;
            return true;
        }
        if(($v = $this->dstrpos($useragent, $touchbrowser_list, true))){
            $_G['mobile'] = $v;
            return true;
        }
        if(($v = $this->dstrpos($useragent, $wmlbrowser_list))) {
            $_G['mobile'] = $v;
            return true;
        }
        $brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
        if($this->dstrpos($useragent, $brower))
            return false;
        $_G['mobile'] = 'unknown';
        //对于未知类型的浏览器，通过$_GET['mobile']参数来决定是否是手机浏览器
        if(isset($_G['mobiletpl'][$_GET['mobile']])) {
            return true;
        } else {
            return false;
        }
    }

    private function dstrpos($string, $arr, $returnvalue = false) {
        if(empty($string)) return false;
        foreach((array)$arr as $v) {
            if(strpos($string, $v) !== false) {
                $return = $returnvalue ? $v : true;
                return $return;
            }
        }
        return false;
    }

}
