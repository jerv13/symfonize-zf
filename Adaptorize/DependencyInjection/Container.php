<?php

namespace Adaptorize\DependencyInjection;

/**
 * Class Container
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   moduleNameHere
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
interface Container
{
    const EXCEPTION_ON_INVALID_REFERENCE = 1;
    const NULL_ON_INVALID_REFERENCE = 2;
    const IGNORE_ON_INVALID_REFERENCE = 3;
    const SCOPE_CONTAINER = 'container';
    const SCOPE_PROTOTYPE = 'prototype';

    /**
     * Sets a service.
     *
     * @param string $id      The service identifier
     * @param object $service The service instance
     * @param string $scope   The scope of the service
     *
     * @api
     */
    public function set($id, $service, $scope = self::SCOPE_CONTAINER);

    /**
     * Gets a service.
     *
     * @param string $id              The service identifier
     * @param int    $invalidBehavior The behavior when the service does not exist
     *
     * @return object The associated service
     *
     * @throws ServiceCircularReferenceException When a circular reference is detected
     * @throws ServiceNotFoundException          When the service is not defined
     *
     * @see Reference
     *
     * @api
     */
    public function get($id, $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE);

    /**
     * Returns true if the given service is defined.
     *
     * @param string $id The service identifier
     *
     * @return bool true if the service is defined, false otherwise
     *
     * @api
     */
    public function has($id);

    /**
     * Gets a parameter.
     *
     * @param string $name The parameter name
     *
     * @return mixed The parameter value
     *
     * @throws InvalidArgumentException if the parameter is not defined
     *
     * @api
     */
    public function getParameter($name);

    /**
     * Checks if a parameter exists.
     *
     * @param string $name The parameter name
     *
     * @return bool The presence of parameter in container
     *
     * @api
     */
    public function hasParameter($name);

    /**
     * Sets a parameter.
     *
     * @param string $name  The parameter name
     * @param mixed  $value The parameter value
     *
     * @api
     */
    public function setParameter($name, $value);

    /**
     * Enters the given scope.
     *
     * @param string $name
     *
     * @api
     */
    public function enterScope($name);

    /**
     * Leaves the current scope, and re-enters the parent scope.
     *
     * @param string $name
     *
     * @api
     */
    public function leaveScope($name);

    /**
     * Adds a scope to the container.
     *
     * @param ScopeInterface $scope
     *
     * @api
     */
    public function addScope(ScopeInterface $scope);

    /**
     * Whether this container has the given scope.
     *
     * @param string $name
     *
     * @return bool
     *
     * @api
     */
    public function hasScope($name);

    /**
     * Determines whether the given scope is currently active.
     *
     * It does however not check if the scope actually exists.
     *
     * @param string $name
     *
     * @return bool
     *
     * @api
     */
    public function isScopeActive($name);
}
