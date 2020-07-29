<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Employs extends Model
{
        const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
        const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $firstName;
    public $lastName;
    public $middleName;
    public $salary;
    public $email;

    public function scenarios()
    {
        return [
            self::SCENARIO_EMPLOYEE_REGISTER => ['firstName', 'lastName', 'middleName', 'email'], // сценарий для регистрации
            self::SCENARIO_EMPLOYEE_UPDATE => ['firstName', 'lastName', 'middleName'], // сценарий для обновления
        ];
    }

    public function rules() // правила валидации
    {
        return [
        [['firstName', 'lastName', 'email'], 'required'],
        [['firstName'],'string', 'min'=>2],
        [['email'], 'email'],
        [['lastName'], 'string', 'min'=>3],
        [['middleName'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE],
        ];
    }

    public static function find()
    {

        $sql = "SELECT * FROM photos";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}