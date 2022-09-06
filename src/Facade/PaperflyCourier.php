<?php

namespace Codeboxr\PaperflyCourier\Facade;

use Illuminate\Support\Facades\Facade;
use Codeboxr\PaperflyCourier\Manage\Manage;

/**
 * @method static area()
 * @method static store()
 * @method static order()
 * @see Manage
 */
class PaperflyCourier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'paperfly';
    }
}
