<?php

/**
 * This is the model class for table "lunch".
 *
 * The followings are the available columns in table 'lunch':
 * @property string $id
 * @property string $shop_name
 * @property string $latlng
 * @property string $menu
 * @property string $image_url
 * @property string $nearest
 * @property string $price
 * @property string $visited_at
 * @property string $created_at
 * @property string $updated_at
 */
class LunchBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lunch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shop_name, latlng, menu, image_url, nearest, price, visited_at, created_at, updated_at', 'required'),
			array('shop_name, menu, image_url, nearest', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shop_name, latlng, menu, image_url, nearest, price, visited_at, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'shop_name' => '店名',
			'latlng' => '緯度経度',
			'menu' => 'メニュー',
			'image_url' => '画像URL',
			'nearest' => '最寄り駅',
			'price' => '価格',
			'visited_at' => '訪問日',
			'created_at' => '作成日時',
			'updated_at' => '更新日時',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('shop_name',$this->shop_name,true);
		$criteria->compare('latlng',$this->latlng,true);
		$criteria->compare('menu',$this->menu,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('nearest',$this->nearest,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('visited_at',$this->visited_at,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LunchBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
