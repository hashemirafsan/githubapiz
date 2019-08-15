<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/15/19
 * Time: 5:35 PM
 */

namespace HashemiRafsan\GithubApiz\Exceptions;

use Throwable;

class NullableValueException extends \Exception
{
    public function __construct( string $message = "", int $code = 0, Throwable $previous = null )
    {
        parent::__construct($message, $code, $previous);
    }
}
