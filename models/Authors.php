<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name

 * @property Books $books
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }
	
	public static function getAll()
    {
        $data = self::find()->all();
		//$data = self::find()->select('id, name')->all();
        return $data;
    }
	
    public function relations()
    {
        return array(
            'booksCount'=>array(self::STAT, 'Books', 'id'),
        );
    }

    public function validate($attributes=null, $clearErrors=true)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getBook()
    {
        return $this->hasMany(Books::className(), ['author' => 'id']);
    }
	
}
