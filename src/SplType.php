<?php

/**
 * Behaviour of this class is cloned from detail investigation, @link https://github.com/jaroslavtyc/granam-native-spl-type-behaviour-investigation
 * There is one assumption - this class is not autoloaded, when spl_types PHP extension is loaded, because of native SplType class global availability.
 *
 * Class SplType
 */
abstract class SplType
{
    const __default = null;

    protected $initial_value;
    protected $strict;

    /**
     * @param mixed $initial_value
     * @param bool $strict
     */
    public function __construct($initial_value = self::__default, $strict = false)
    {
        $this->checkInitialValue($initial_value, $strict);
        $this->initial_value = $this->sanitizeInitialValue($initial_value);
        $this->strict = $strict;
    }

    /**
     * @param mixed $initial_value
     * @param bool $strict
     */
    private function checkInitialValue($initial_value, $strict)
    {
        if ($initial_value === true) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if ($initial_value === false && $strict) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if (is_string($initial_value) && ($strict || strlen($initial_value) > 0)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if (is_int($initial_value) && ($strict || $initial_value !== 0)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if (is_float($initial_value) && ($strict || $initial_value !== 0.0)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if (is_array($initial_value) && ($strict || sizeof($initial_value) > 0)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if (is_object($initial_value)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
        if (is_resource($initial_value)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }
    }

    /**
     * @param mixed $initial_value
     * @return mixed
     */
    private function sanitizeInitialValue($initial_value)
    {
        if (is_array($initial_value) && sizeof($initial_value) === 0) {
            /** @see \Granam\Clones\Tests\SplTypeTest::with_empty_array_is_empty_string_as_string */
            return '';
        }
        if ($initial_value === 0) {
            return '';
        }
        if ($initial_value === 0.0) {
            return '';
        }
        return $initial_value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->initial_value;
    }
}
