<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 15:47
 */
class Connection
{
    private static $dsn = "mysql:host=127.0.0.1;dbName=spider;port=3306;charset=UTF8";

    private static $username = "root";

    private static $password = "root";

    /**
     * @var \PDO
     */
    private static $instance;

    /**
     * Connection constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return \PDO
     */
    public static function getInstance()
    {

        if (is_null(self::$instance)) {
            self::$instance = new \PDO(self::$dsn, self::$username, self::$password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}
