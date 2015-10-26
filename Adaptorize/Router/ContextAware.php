<?php

namespace Adaptorize\Router;

use Adaptorize\Http\Request;
use Adaptorize\Http\RequestContext;

/**
 * interface ContextAware
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   Adaptorize\Router
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
interface ContextAware
{
    /**
     * Sets the request context.
     *
     * @param RequestContext $context The context
     *
     * @api
     */
    public function setContext(RequestContext $context);

    /**
     * Gets the request context.
     *
     * @return RequestContext The context
     *
     * @api
     */
    public function getContext();
}
