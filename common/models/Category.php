<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_parent
 *
 * @property Category $categoryParent
 * @property Category[] $categories
 * @property News[] $news
 */
class Category extends \yii\db\ActiveRecord
{
    const NEWSNUM = 10;     //每回加载10条文章

    public function getNews()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasMany(News::className(), ['news_category' => 'category_id']);
    }


    /**
     *  生成导航栏列表
     * @return mixed
     */
    public function getCategory(){
        $sqlParent = 'SELECT category_id,category_name FROM category WHERE category_parent IS NULL';
        $categoryParent = Category::findBySql($sqlParent)->all();

        $parentCategory = array();  //父目录
        $parentId = array();

        foreach($categoryParent as $key => $value){
            $childCategory = array();   //子目录
            $childId = array();

            array_push($parentCategory,$value->category_name);
            array_push($parentId,$value->category_id);

            $sqlChild = 'SELECT category_name,category_id FROM category WHERE category_parent ='.$value->category_id;
            $categoryChild = Category::findBySql($sqlChild)->all();
            if(!empty($categoryChild)){
                foreach($categoryChild as $keyC => $valueC){
                    array_push($childCategory,$valueC->category_name);
                    array_push($childId,$valueC->category_id);
                }
            }

            $categoryName[$value->category_name] = $childCategory;
            $categoryId[$value->category_id] = $childId;

            $category = array(
                'category_name'=>$categoryName,
                'category_id'=>$categoryId,
            );
        }
        return $category;
    }

    /**
     * @param $catelogy_id  根据目录查找最新10篇文章
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getNewsByCategoryId($catelogy_id,$maxId){
        $sql = 'SELECT * FROM news
                WHERE news_category='.$catelogy_id.' AND news_id<'.$maxId.' ORDER BY news_id DESC LIMIT '.self::NEWSNUM;
        $news = News::findBySql($sql)->all();
        return $news;
    }

//    public function getCategoryParent(){
//        $sqlParent = 'SELECT category_id,category_name FROM category WHERE category_parent IS NULL';
//        $categoryParent = Category::findBySql($sqlParent)->all();
//        return $categoryParent;
//    }
//
//    public function getCategoryChild($categoryParentsIds){
//        $categoryChild = array();
//        foreach($categoryParentsIds as $categoryParentId){
//            $sqlChild = 'SELECT category_name FROM category WHERE category_parent ='.$categoryParentId;
//            $result = Category::findBySql($sqlChild)->all();
//            $categoryChild[$categoryParentId] = $result;
//        }
//        return $categoryChild;
//    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_parent'], 'integer'],
            [['category_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_parent' => 'Category Parent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryParent()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['category_parent' => 'category_id']);
    }

}
