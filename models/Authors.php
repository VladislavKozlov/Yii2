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
	
	//count Books for authors
	public static function countBooks($id)
    {
		$dataBooksAuthorId = Books::find()->select('author_id')->all();
		$count = 0;
		foreach ($dataBooksAuthorId as $item)
		{
			if($item->author_id == $id)
			{
				$count++;
			}
   		}
		return $count;
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
            'id' => 'id',
            'name' => 'name',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }
	
}
