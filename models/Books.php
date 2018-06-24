<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property int $author_id

 * @property Authors $authors
 */
class Books extends \yii\db\ActiveRecord
{
    //const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

	public static function getAll()
    {
         $data = self::find()->all();
         return $data;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','author_id'], 'required'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    public function validate($attributes=null, $clearErrors=true)
    {
        return true;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'author_id' => 'author_id'
        ];
    }

    public function getAuthors()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
}
