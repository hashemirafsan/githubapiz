<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/14/19
 * Time: 9:27 PM
 */

namespace HashemiRafsan\GithubApiz\Exceptions;

use Throwable;

class TokenMisMatchException extends \Exception
{
    public function __construct( string $message = "", int $code = 0, Throwable $previous = null )
    {
        parent::__construct($message, $code, $previous);
    }
}
