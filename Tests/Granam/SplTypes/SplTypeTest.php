<?php
namespace Granam\SplTypes;

class SplTypeTest extends \Granam\Clones\Tests\SplTypeTest
{

    /** @test */
    public function with_default_values_is_zero_as_int()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_null_is_zero_as_int_if_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_null_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_false_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_empty_string_is_zer_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_empty_array_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_zero_integer_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_zero_float_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }
}
