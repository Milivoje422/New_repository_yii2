<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $lastname
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $timezone
 * @property integer $accept_terms_of_use
 * @property integer $account_type
 * @property string $phone
 * @property string $skype
 * @property string $facebook
 * @property string $twiter
 * @property string $company_name
 * @property string $country
 * @property string $city
 * @property string $address
 * @property integer $can_download
 * @property string $phone_work
 * @property string $phone_home
 * @property integer $bonus_download
 * @property integer $our_photographer
 * @property string $bonus_download_date_from
 * @property string $bonus_download_date_to
 * @property integer $download_dimension_limit
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'accept_terms_of_use', 'account_type', 'can_download', 'bonus_download', 'our_photographer', 'download_dimension_limit'], 'integer'],
            [['bio'], 'string'],
            [['bonus_download_date_from', 'bonus_download_date_to'], 'safe'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website', 'facebook', 'twiter', 'company_name', 'country', 'city', 'address', 'phone_work', 'phone_home'], 'string', 'max' => 255],
            [['lastname'], 'string', 'max' => 50],
            [['gravatar_id'], 'string', 'max' => 32],
            [['timezone'], 'string', 'max' => 40],
            [['phone'], 'string', 'max' => 15],
            [['skype'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'public_email' => Yii::t('app', 'Public Email'),
            'gravatar_email' => Yii::t('app', 'Gravatar Email'),
            'gravatar_id' => Yii::t('app', 'Gravatar ID'),
            'location' => Yii::t('app', 'Location'),
            'website' => Yii::t('app', 'Website'),
            'bio' => Yii::t('app', 'Bio'),
            'timezone' => Yii::t('app', 'Timezone'),
            'accept_terms_of_use' => Yii::t('app', 'Accept Terms Of Use'),
            'account_type' => Yii::t('app', 'Account Type'),
            'phone' => Yii::t('app', 'Phone'),
            'skype' => Yii::t('app', 'Skype'),
            'facebook' => Yii::t('app', 'Facebook'),
            'twiter' => Yii::t('app', 'Twiter'),
            'company_name' => Yii::t('app', 'Company Name'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'address' => Yii::t('app', 'Address'),
            'can_download' => Yii::t('app', 'Can Download'),
            'phone_work' => Yii::t('app', 'Phone Work'),
            'phone_home' => Yii::t('app', 'Phone Home'),
            'bonus_download' => Yii::t('app', 'Bonus Download'),
            'our_photographer' => Yii::t('app', 'Our Photographer'),
            'bonus_download_date_from' => Yii::t('app', 'Bonus Download Date From'),
            'bonus_download_date_to' => Yii::t('app', 'Bonus Download Date To'),
            'download_dimension_limit' => Yii::t('app', 'Download Dimension Limit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
