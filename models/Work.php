<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "work".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $date_creation
 * @property string $article
 * @property string $image
 */
class Work extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'article'], 'required'],
            [['date_creation'], 'safe'],
            [['article'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 256],
            [['image'], 'string', 'max' => 1024],
            [['title'], 'unique'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'title' => 'Заголовок',
            'author' => 'Автор',
            'date_creation' => 'Дата Создания',
            'article' => 'Статья',
            'image' => 'Адрес изображения',
        ];
    }

    /**
     * @inheritdoc
     * @return WorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkQuery(get_called_class());
    }

}
