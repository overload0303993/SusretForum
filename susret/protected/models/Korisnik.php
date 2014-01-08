<?php

/**
 * This is the model class for table "korisnik".
 *
 * The followings are the available columns in table 'korisnik':
 * @property integer $id
 * @property string $userName
 * @property string $password
 * @property string $avatar
 * @property string $spol
 * @property integer $starost
 * @property string $datumReg
 * @property integer $brojPostova
 * @property integer $rang
 * @property string $potpis
 * @property integer $rola
 * @property string $vrijemeOdjave
 * @property integer $idPodforum
 *
 * The followings are the available model relations:
 * @property Ban[] $bans
 * @property Podforum $idPodforum0
 * @property Role $rola0
 * @property Post[] $posts
 * @property Privatnaporuka[] $privatnaporukas
 * @property Privatnaporuka[] $privatnaporukas1
 * @property Tema[] $temas
 */

class Korisnik extends CActiveRecord
{

	public $drugaLozinka;
	
	public function setPass($pass) {
		$this->drugaLozinka = $pass;
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'korisnik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		   return array(
			array('userName, password, datumReg, brojPostova, rang', 'required'),
			array('drugaLozinka', 'required'),
			array('brojPostova, idPodforum', 'numerical', 'integerOnly'=>true),
            array('userName', 'length', 'max'=>30),
            array('password', 'length', 'max'=>32),
			array('drugaLozinka', 'length', 'max'=>32),
			array('avatar', 'length', 'max'=>255, 'on'=>'insert,update'),
			array('avatar', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
            array('spol', 'length', 'max'=>1),
			array('datumRodjenja, potpis, vrijemePrijave, vrijemeOdjave, rola', 'safe'),
//            // The following rule is used by search().
//            // @todo Please remove those attributes that should not be searched.
            array('id, userName, password, avatar, spol, datumRodjenja, datumReg, brojPostova, rang, potpis, rola, vrijemePrijave, vrijemeOdjave, idPodforum', 'safe', 'on'=>'search'),
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
            'bans' => array(self::HAS_MANY, 'Ban', 'idKorisnik'),
            'rola0' => array(self::BELONGS_TO, 'Role', 'rola'),
            'idPodforum0' => array(self::BELONGS_TO, 'Podforum', 'idPodforum'),
            'posts' => array(self::HAS_MANY, 'Post', 'idAutor'),
            'privatnaporukas' => array(self::HAS_MANY, 'Privatnaporuka', 'idPosiljatelj'),
            'privatnaporukas1' => array(self::HAS_MANY, 'Privatnaporuka', 'idPrimatelj'),
            'temas' => array(self::HAS_MANY, 'Tema', 'idAutor'),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'userName' => 'Korisničko ime',
            'password' => 'Lozinka',
            'avatar' => 'Avatar',
            'spol' => 'Spol',
            'datumRodjenja' => 'Datum rođenja',
            'datumReg' => 'Datum registracije',
            'brojPostova' => 'Broj postova',
            'rang' => 'Rang',
            'potpis' => 'Potpis',
            'rola' => 'Uloga',
            'vrijemePrijave' => 'Vrijeme Prijave',
            'vrijemeOdjave' => 'Vrijeme Odjave',
            'idPodforum' => 'Id Podforum',
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
        $criteria->compare('userName',$this->userName,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('avatar',$this->avatar,true);
        $criteria->compare('spol',$this->spol,true);
        $criteria->compare('datumRodjenja',$this->datumRodjenja,true);
        $criteria->compare('datumReg',$this->datumReg,true);
        $criteria->compare('brojPostova',$this->brojPostova);
        $criteria->compare('rang',$this->rang,true);
        $criteria->compare('potpis',$this->potpis,true);
        $criteria->compare('rola',$this->rola);
        $criteria->compare('vrijemePrijave',$this->vrijemePrijave,true);
        $criteria->compare('vrijemeOdjave',$this->vrijemeOdjave,true);
        $criteria->compare('idPodforum',$this->idPodforum);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Korisnik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
