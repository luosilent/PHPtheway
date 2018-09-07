<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 16:43
 */

namespace Core;

use App\Config;

class Error
{
    /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException
     *
     * @param int    $level   Error level
     * @param string $message Error Message
     * @param string $file    File name the error was raised in
     * @param string $line    Line number in the file
     *
     * @throws \ErrorException
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        // to keep the @ operator working
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception Handler
     *
     * @param \Exception $exception
     */
    public static function exceptionHandler(\Exception $exception)
    {
        // Code is 404 (not found) or 500 (general error)
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if (Config::SHOW_ERRORS) {
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);

            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= " with message '" . $exception->getMessage() . "'";
            $message .= "\nStack trace: " . $exception->getTraceAsString();
            $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

            error_log($message);
//            if ($code == 404) {
//                echo "<h1>Page not found</h1>";
//            } else {
//                echo "<h1>An error occurred</h1>";
//            }
            View::renderTemplate("$code.html");
        }
    }
}
