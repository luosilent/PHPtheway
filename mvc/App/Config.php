<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 16:34
 */

namespace App;

/**
 * Application Configuration
 * Class Config
 *
 * @package App
 */
class Config
{
    /**
     * Database host
     *
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     *
     * @var string
     */
    const DB_NAME = 'mvc';

    /**
     * Database user
     *
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     *
     * @var string
     */
    const DB_PASSWORD = 'mysql';

    /**
     * Show or hide error messages on screen
     *
     * @var boolean
     */
    const SHOW_ERRORS = false;
}
