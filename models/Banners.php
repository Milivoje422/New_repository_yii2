<?php

namespace app\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;
/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $banner_name
 * @property string $banner_position
 * @property string $banner_status
 * @property string $banner_image
 * @property string $banner_url
 * @property string $bann_type
 * @property string $date_start
 * @property string $date_ends
 * @property string $date_created
 * @property string $banner_size
 */
class Banners extends \yii\db\ActiveRecord
{
	public $file;
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'banners';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['banner_name', 'banner_position', 'banner_status', 'banner_image', 'banner_url','date_created'], 'required'],
			[['banner_position', 'banner_status', 'banner_size'], 'string'],
			[['date_start', 'date_ends', 'date_created'], 'safe'],
			[['banner_name'], 'string', 'max' => 45],
			[['banner_url'],'url','defaultScheme' => 'http'],
			[['banner_image', 'banner_url'], 'string', 'max' => 256],
			[['bann_type'], 'string', 'max' => 44],
			[['banner_name'], 'unique'],
			[['file'], 'safe'],
			[['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'Banner ID'),
			'banner_name' => Yii::t('app', 'Banner Name'),
			'banner_position' => Yii::t('app', 'Banner Position'),
			'banner_status' => Yii::t('app', 'Banner Status'),
			'banner_image' => Yii::t('app', 'Banner Image'),
			'banner_url' => Yii::t('app', 'Banner Url'),
			'bann_type' => Yii::t('app', 'Bann Type'),
			'date_start' => Yii::t('app', 'Date Start'),
			'date_ends' => Yii::t('app', 'Date Ends'),
			'date_created' => Yii::t('app', 'Date Created'),
			'banner_size' => Yii::t('app', 'Banner Size'),
			'file' => Yii::t('app', 'Banner image'),
		];
	}


	public function getBannerUrl()
	{
		return  Yii::$app->homeUrl . $this->banner_image;
	}

	public function path()
	{
		$path = 'banners/';

		if (!is_dir($path))
			$path = mkdir('banners/');

		return $path;
	}

	public function getBanerSize()
	{
		if($this->banner_position == "TOP")
			return $this->banner_size = '650x150';
		elseif($this->banner_position == "RIGHT")
			return $this->banner_size = '375x132';
		elseif($this->banner_position == "CENTER")
			return $this->banner_size = '210x100';
		elseif($this->banner_position == "FOOTER")
			return $this->banner_size = '210x100';
	}

	public function beforeUpload()
	{
		$this->banner_image = self::path() . $this->banner_name. '_b_size-' . $this->banner_size .'.'. $this->file->extension;
	}

	public function upload()
	{
		$this->file->saveAs(self::path() . $this->banner_name . '_1b_size-' . $this->banner_size .'.'. $this->file->extension);
		$a_size = explode('x', $this->banner_size);

		Image::thumbnail(self::path() . $this->banner_name . '_1b_size-' . $this->banner_size .'.'. $this->file->extension, $a_size[0], $a_size[1])
			->resize(new Box($a_size[0], $a_size[1]))
			->save(self::path() . $this->banner_name . '_b_size-' . $this->banner_size .'.'. $this->file->extension,
				['quality' => 70]);

		unlink(self::path()  . $this->banner_name . '_1b_size-' . $this->banner_size .'.'. $this->file->extension);
	}
}