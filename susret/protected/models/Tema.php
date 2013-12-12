<?php

/**
 * This is the model class for table "tema".
 *
 * The followings are the available columns in table 'tema':
 * @property integer $id
 * @property string $naziv
 * @property integer $idPodforum
 * @property integer $idAutor
 * @property integer $brojPregleda
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 * @property Podforum $idPodforum0
 * @property Korisnik $idAutor0
 */
class Tema extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, idPodforum, idAutor, brojPregleda', 'required'),
			array('idPodforum, idAutor, brojPregleda', 'numerical', 'integerOnly'=>true),
			array('naziv', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, naziv, idPodforum, idAutor, brojPregleda', 'safe', 'on'=>'search'),
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
			'posts' => array(self::HAS_MANY, 'Post', 'idTema'),
			'idPodforum0' => array(self::BELONGS_TO, 'Podforum', 'idPodforum'),
			'idAutor0' => array(self::BELONGS_TO, 'Korisnik', 'idAutor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'naziv' => 'Naziv',
			'idPodforum' => 'Id Podforum',
			'idAutor' => 'Id Autor',
			'brojPregleda' => 'Broj Pregleda',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('naziv',$this->naziv,true);
		$criteria->compare('idPodforum',$this->idPodforum);
		$criteria->compare('idAutor',$this->idAutor);
		$criteria->compare('brojPregleda',$this->brojPregleda);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tema the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
