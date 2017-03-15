 <?php

namespace app\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $name
 * @property string $img_path
 * @property string $img_path_small
 * @property string $img_path_large
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $img_file;

    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'name', 'img_path', 'img_path_small', 'img_path_large'], 'required'],
            [['post_id'], 'integer'],
	        [['img_file'],'file'],
            [['name', 'img_path', 'img_path_small', 'img_path_large'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_id' => Yii::t('app', 'Post ID'),
            'name' => Yii::t('app', 'Name'),
            'img_path' => Yii::t('app', 'Img Path'),
            'img_path_small' => Yii::t('app', 'Img Path Small'),
            'img_path_large' => Yii::t('app', 'Img Path Large'),
	        'img_file' => Yii::t('app', 'Image'),
        ];
    }

	public function path(){
		$path = 'uploads/';

		if(!is_dir($path))
			$path = mkdir('uploads/');

		return $path;
	}

	public function beforeUpload($live_img2){
		$this->img_file = $live_img2;
		$this->img_path = self::path().$this->name.'.'.$this->img_file->extension;
		$this->img_path_small = self::path().'thumbnail-500x300/'.$this->name.'.'.$this->img_file->extension;
		$this->img_path_large = self::path().'thumbnail-1600x1200/'.$this->name.'.'.$this->img_file->extension;

		$this->image_upload_ip = \Yii::$app->request->userIP;
		$this->img_author = \Yii::$app->user->id;
	}

	public function upload($live_img)
	{
		$this->img_file = $live_img;
		$this->img_file->saveAs(self::path() . $this->name . '.' . $this->img_file->extension);

		Image::thumbnail(self::path() . $this->name . '.' . $this->img_file->extension, 500, 300)->resize(new Box(500,300))
			->save(self::path().'thumbnail-500x300/'.$this->name.'.'.$this->img_file->extension,
				['quality' => 70]);

		Image::thumbnail(self::path() . $this->name . '.' . $this->img_file->extension, 1600, 1200)->resize(new Box(1600,1200))
			->save(self::path().'thumbnail-1600x1200/'.$this->name.'.'.$this->img_file->extension,
				['quality' => 70]);
	}


}
