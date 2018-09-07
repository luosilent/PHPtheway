<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 15:16
 */

namespace App\Models;

use Core\Model;

class Post extends Model
{
    /**
     * Get all the posts as an associative array
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = self::getDB();

            $stmt = $db->query("select id, title,content from posts ORDER  BY created_at");
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $results;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
