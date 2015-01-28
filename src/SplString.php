<?php

/**
 * This is a fallback for systems without PHP PECL spl_types extension, which includes the SplString class from very first version (v0.1).
 * @slink http://php.net/manual/en/class.splstring.php
 * The extension is not a standard part of PHP, nor Linux repositories, but can be build easily.
 * In all other cases, this class is for use.
 *
 * There is one assumption - this class is not autoloaded, when spl_types PHP extension is loaded, because of native SplString class global availability.
 *
 * Class SplString
 */
class SplString extends SplType
{

    const __default = '';

    /**
     * @param $initial_value
     * @param $strict
     * @param bool $strict
     */
    public function __construct($initial_value = self::__default, $strict = true)
    {
        // following sequence is important to mirror behaviour of the native SPL string
        $this->checkInitialValue($initial_value, $strict);
        parent::__construct((string)$initial_value, $strict);
    }

    /**
     * @param mixed $initial_value
     * @param bool $strict
     */
    private function checkInitialValue($initial_value, $strict)
    {
        if ($strict) {
            if (!is_string($initial_value)) {
                throw new \UnexpectedValueException('Value not a string');
            }
        } else {
            if (is_object($initial_value)) {
                trigger_error('Object of class ' . get_class($initial_value) . ' to string conversion', E_USER_NOTICE);
                throw new \InvalidArgumentException('Object of class ' . get_class($initial_value) . ' could not be converted to string');
            }
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->initial_value;
    }
}
