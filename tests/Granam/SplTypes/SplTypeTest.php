<?php
namespace Granam\SplTypes;

use Granam\Clones\Tests\SplTypeChild;

class SplTypeTest extends \Granam\Clones\Tests\SplTypeTest
{

    /** @test */
    public function with_default_values_is_zero_as_int()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_default_values_is_zero_as_string_int()
    {
        $splType = new SplTypeChild();
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_null_is_zero_as_int_if_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_null_is_zero_as_string_int_if_strict()
    {
        $splType = new SplTypeChild(null, true);
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_null_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_null_is_zero_as_string_int_if_not_strict()
    {
        $splType = new SplTypeChild(null, false);
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_false_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_false_is_zero_as_string_int_if_not_strict()
    {
        $splType = new SplTypeChild(false, false);
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_empty_string_is_zer_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_empty_string_is_zero_as_string_int_if_not_strict()
    {
        $splType = new SplTypeChild('', false);
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_empty_array_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_empty_array_is_zero_as_string_int_if_not_strict()
    {
        $splType = new SplTypeChild([], false);
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_zero_integer_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_zero_integer_is_zero_as_string_int_if_not_strict()
    {
        $splType = new SplTypeChild(0, false);
        $this->assertSame(0, (int)(string)$splType);
    }

    /** @test */
    public function with_zero_float_is_zero_as_int_if_not_strict()
    {
        $this->markTestSkipped('Can not cast an object into integer.');
    }

    /** @test */
    public function with_zero_float_is_zero_as_string_int_if_not_strict()
    {
        $splType = new SplTypeChild(0.0, false);
        $this->assertSame(0, (int)(string)$splType);
    }
}
