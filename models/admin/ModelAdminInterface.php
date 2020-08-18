<?php 

namespace app\models\admin;

/**
 * 
 * Описывает все основные методы для работы с пользователями, постами и изображениями в админ панели 
 */

interface ModelAdminInterface
{
    /**
     * Undocumented function
     *
     * @return void
     * 
     * Создание записи
     */
    public function editObt($file);

    /**
     * 
     * Обновление записи
     */

    public function updateObt($id, $file);

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     * 
     * Удаление записи
     */
    public static function deleteObt($id);

}