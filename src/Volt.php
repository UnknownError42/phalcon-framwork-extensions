<?php
/**
 * @desc volt模板引擎扩展
 */
namespace PhalconExtensions;

class Volt
{

    /**
     * Triggered before trying to compile any function call in a template
     */
    public function compileFunction($name, $arguments)
    {
        if (function_exists($name)) {
            return $name . '(' . $arguments . ')';
        }
    }

    /**
     * Triggered before trying to compile any filter call in a template
     */
    public function compileFilter($name, $arguments)
    {
        if (function_exists($name)) {
            return $name . '(' . $arguments . ')';
        }
    }

    /**
     * Triggered before trying to compile any expression. This allows the developer to override operators
     */
    public function resolveExpression($arguments)
    {}

    /**
     * Triggered before trying to compile any expression. This allows the developer to override any statement
     */
    public function compileStatement($arguments)
    {}
}