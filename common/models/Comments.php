<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property string $comment_id
 * @property string $comment_news_id
 * @property string $comment_author
 * @property string $comment_date
 * @property string $comment_content
 * @property string $comment_approved
 * @property string $comment_parent
 * @property string $user_id
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_news_id', 'comment_parent', 'user_id'], 'integer'],
            [['comment_author', 'comment_content'], 'string'],
            [['comment_date'], 'safe'],
            [['comment_approved'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_news_id' => 'Comment News ID',
            'comment_author' => 'Comment Author',
            'comment_date' => 'Comment Date',
            'comment_content' => 'Comment Content',
            'comment_approved' => 'Comment Approved',
            'comment_parent' => 'Comment Parent',
            'user_id' => 'User ID',
        ];
    }
}
