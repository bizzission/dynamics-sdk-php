<?php

namespace SaintSystems\OData\Query;

use Illuminate\Database\Query\Expression;

interface IGrammar
{
    /**
     * Compile a select query into OData Uri
     *
     * @param Builder $query
     *
     * @return string
     */
    public function compileSelect(Builder $query);

    /**
     * Get the grammar specific operators.
     *
     * @return array
     */
    public function getOperators();

    /**
     * Get the appropriate query parameter place-holder for a value.
     *
     * @param mixed $value
     *
     * @return string
     */
    public function parameter($value);

    /**
     * Determine if the given value is a raw expression.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isExpression($value);

    /**
     * Get the value of a raw expression.
     *
     * @param Expression $expression
     *
     * @return string
     */
    public function getValue($expression);

    /**
     * Convert an array of property names into a delimited string.
     *
     * @param array $properties
     *
     * @return string
     */
    public function columnize(array $properties);
}
