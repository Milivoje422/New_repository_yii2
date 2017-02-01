<?php

namespace app\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $img_name
 * @property string $img_description
 * @property string $img_path
 * @property integer $created_at
 * @property integer $updated_at
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

	public $file;

    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img_name', 'img_description', 'img_path','created_at','image_upload_ip', 'img_author', 'img_taken_timedate','head_title'], 'required'],
            [['img_name'], 'string', 'max' => 44],
            [['img_description','image_upload_ip', 'img_path_small', 'img_path_large','head_title'], 'string', 'max' => 255],
            [['image_status', 'image_group'], 'string'],
            [['img_path'], 'string', 'max' => 1025],
            [['img_author'],'integer'],
	        [['img_name'],'unique'],
	        [['file'], 'safe'],
	        [['file'], 'file','skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img_name' => Yii::t('app', 'Image Name'),
            'img_description' => Yii::t('app', 'Image Description'),
            'img_path' => Yii::t('app', 'Image Path'),
            'head_title' => Yii::t('app','Image title'),
            'created_at' => Yii::t('app', 'Created At'),
            'image_status' => Yii::t('app','Image status'),
            'image_group' => Yii::t('app','Image group'),
            'img_taken_timedate' => Yii::t('app','Time Frame'),
            'updated_at' => Yii::t('app', 'Updated At'),
	        'file' => Yii::t('app','Image'),
        ];
    }

	public function getGallery()
	{
		return $this->hasMany(Gallery::className(),['post_id' => 'id']);
	}


    public function path(){
        $path = 'uploads/';

        if(!is_dir($path))
            $path = mkdir('uploads/');

        return $path;
    }

    public function beforeUpload($live_img2){
        $this->file = $live_img2;
        $this->img_path = self::path().$this->img_name.'.'.$this->file->extension;
	    $this->img_path_small = self::path().'thumbnail-500x300/'.$this->img_name.'.'.$this->file->extension;
	    $this->img_path_large = self::path().'thumbnail-1600x1200/'.$this->img_name.'.'.$this->file->extension;

        $this->image_upload_ip = \Yii::$app->request->userIP;
        $this->img_author = \Yii::$app->user->id;
    }

    public function upload($live_img)
    {
        $this->file = $live_img;
	    $this->file->saveAs(self::path() . $this->img_name . '.' . $this->file->extension);

 	    Image::thumbnail(self::path() . $this->img_name . '.' . $this->file->extension, 500, 300)->resize(new Box(500,300))
                ->save(self::path().'thumbnail-500x300/'.$this->img_name.'.'.$this->file->extension,
                    ['quality' => 70]);

	    Image::thumbnail(self::path() . $this->img_name . '.' . $this->file->extension, 1600, 1200)->resize(new Box(1600,1200))
		    ->save(self::path().'thumbnail-1600x1200/'.$this->img_name.'.'.$this->file->extension,
			    ['quality' => 70]);
    }
}


