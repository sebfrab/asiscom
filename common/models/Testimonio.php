<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;


/**
 * This is the model class for table "testimonio".
 *
 * @property integer $idtestimonio
 * @property string $persona
 * @property string $cargo
 * @property string $testimonio
 * @property integer $estado_idestado
 *
 * @property Estado $estadoIdestado
 */
class Testimonio extends \yii\db\ActiveRecord
{
    
    public $file;
    public $image;
    public $crop_info;
    
    public static function tableName()
    {
        return 'testimonio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona', 'estado_idestado', 'testimonio'], 'required'],
            [['testimonio'], 'string'],
            [['estado_idestado'], 'integer'],
            [['persona'], 'string', 'max' => 120],
            [['cargo'], 'string', 'max' => 45],
            [
                'image', 
                'file', 
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],
                'on' => 'create'
            ],
            ['crop_info', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtestimonio' => 'Idtestimonio',
            'persona' => 'Nombre',
            'cargo' => 'Cargo',
            'testimonio' => 'Testimonio',
            'estado_idestado' => 'Estado Idestado',
            'image' => 'Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoIdestado()
    {
        return $this->hasOne(Estado::className(), ['idestado' => 'estado_idestado']);
    }
    
    public function urlImagen(){
        if(file_exists('../../frontend/web/images/testimonio/'.$this->idtestimonio.'.jpg')){
            return Yii::$app->params['front'].'/images/testimonio/'.$this->idtestimonio.'.jpg';
        }else{
            return Yii::$app->params['front'].'/images/testimonio/default.jpg';
        }
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        
        $cropSettings = [
            [
                'width' => 120,
                'height' => 120,
            ],
        ];
        
        if($this->crop_info != ""){
        
            $image = Image::getImagine()->open($this->image->tempName);

            // rendering information about crop of ONE option 
            $cropInfo = Json::decode($this->crop_info);
            $cropInfo = $cropInfo[0];
            $cropInfo['dw'] = (int)$cropInfo['dw']; //new width image
            $cropInfo['dh'] = (int)$cropInfo['dh']; //new height image
            $cropInfo['x'] = abs($cropInfo['x']); //begin position of frame crop by X
            $cropInfo['y'] = abs($cropInfo['y']); //begin position of frame crop by Y

            $oldImages = FileHelper::findFiles(Yii::getAlias('../../frontend/web/images/testimonio'), [
                'only' => [
                    $this->idtestimonio . '.*',
                    'thumb_' . $this->idtestimonio . '.*',
                ], 
            ]);
            for ($j = 0; $j != count($oldImages); $j++) {
                @unlink($oldImages[$j]);
            }

            //saving thumbnail
            $newSizeThumb = new Box($cropInfo['dw'], $cropInfo['dh']);
            $cropSizeThumb = new Box($cropSettings[0]['width'], $cropSettings[0]['height']); //frame size of crop
            $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
            $pathThumbImage = Yii::getAlias('../../frontend/web/images/testimonio') . '/' . $this->idtestimonio . '.jpg';  

            $image->copy()
                ->resize($newSizeThumb)
                ->crop($cropPointThumb, $cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);
        }    
    }
}
