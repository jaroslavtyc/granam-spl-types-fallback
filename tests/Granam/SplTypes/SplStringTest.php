<?php
namespace Granam\SplTypes;

class SplStringTest extends \Granam\Clones\Tests\SplStringTest
{

    /**
     * Overloaded original investigation test because of different place of the exception throwing
     * @see \Granam\Clones\Tests\SplStringTest::array_if_not_strict_cause_array_to_string_notice
     *
     * @test
     */
    public function array_if_not_strict_cause_array_to_string_notice()
    {
        $originalErrorReporting = error_reporting();
        error_reporting(E_ALL ^ E_NOTICE); // notices temporary disabled
        $splString = new \SplString(['foo', 'bar'], false);
        error_reporting($originalErrorReporting); // restoring previous error reporting
        $lastError = error_get_last();
        $this->assertInternalType('array', $lastError);
        $this->assertTrue(!empty($lastError['type']));
        $this->assertSame(E_NOTICE, $lastError['type']);
        $this->assertTrue(!empty($lastError['message']));
        $this->assertSame('Array to string conversion', $lastError['message']);
        $this->assertTrue(!empty($lastError['file']));
        // SplString as native class does not came from a filename and the exception occurs right here, in this __FILE__ - for the other cases the class filename is used
        $splStringReflection = new \ReflectionClass(\SplString::class);
        $this->assertSame($splStringReflection->getFileName(), $lastError['file']);
        $this->assertTrue(!empty($lastError['line']));
        $constructorReflection = $splStringReflection->getMethod('__construct');
        $this->assertGreaterThanOrEqual($constructorReflection->getStartLine(), $lastError['line']);
        $this->assertLessThanOrEqual($constructorReflection->getEndLine(), $lastError['line']);
        $this->assertSame('Array', (string)$splString);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Object of class stdClass could not be converted to string
     */
    public function object_cause_notice_and_throws_exception_if_not_strict()
    {
        $originalErrorReporting = error_reporting();
        error_reporting(E_ALL ^ E_USER_NOTICE); // notices temporary disabled from standard processing
        try {
            new \SplString(new \stdClass(), false);
        } catch (\InvalidArgumentException $exception) {
            $lastError = error_get_last();
            $this->assertInternalType('array', $lastError);
            $this->assertTrue(!empty($lastError['type']));
            $this->assertSame(E_USER_NOTICE, $lastError['type']);
            $this->assertTrue(!empty($lastError['file']));
            $splStringReflection = new \ReflectionClass(\SplString::class);
            $this->assertSame($splStringReflection->getFileName(), $lastError['file']);
            $this->assertTrue(!empty($lastError['line']));
            $checkerReflection = $splStringReflection->getMethod('checkInitialValue');
            $this->assertGreaterThanOrEqual($checkerReflection->getStartLine(), $lastError['line']);
            $this->assertLessThanOrEqual($checkerReflection->getEndLine(), $lastError['line']);
            $this->assertTrue(!empty($lastError['message']));
            $this->assertSame('Object of class stdClass to string conversion', $lastError['message']);
            $this->assertInstanceOf(\InvalidArgumentException::class, $exception);
            throw $exception;
        } finally {
            error_reporting($originalErrorReporting); // restoring previous error reporting
        }
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Object of class Closure could not be converted to string
     */
    public function closure_cause_notice_and_throws_exception_if_not_strict()
    {
        $originalErrorReporting = error_reporting();
        error_reporting(E_ALL ^ E_USER_NOTICE); // notices temporary disabled from standard processing
        try {
            new \SplString(
                function () {
                },
                false
            );
        } catch (\Exception $exception) {
            $lastError = error_get_last();
            $this->assertInternalType('array', $lastError);
            $this->assertTrue(!empty($lastError['type']));
            $this->assertSame(E_USER_NOTICE, $lastError['type']);
            $this->assertTrue(!empty($lastError['file']));
            $splStringReflection = new \ReflectionClass(\SplString::class);
            $this->assertSame($splStringReflection->getFileName(), $lastError['file']);
            $this->assertTrue(!empty($lastError['line']));
            $checkerReflection = $splStringReflection->getMethod('checkInitialValue');
            $this->assertGreaterThanOrEqual($checkerReflection->getStartLine(), $lastError['line']);
            $this->assertLessThanOrEqual($checkerReflection->getEndLine(), $lastError['line']);
            $this->assertTrue(!empty($lastError['message']));
            $this->assertSame('Object of class Closure to string conversion', $lastError['message']);
            throw $exception;
        } finally {
            error_reporting($originalErrorReporting); // restoring previous error reporting
        }
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Object of class stdClass could not be converted to string
     */
    public function object_cause_notice_and_throws_exception_even_not_strict()
    {
        $originalErrorReporting = error_reporting();
        error_reporting(E_ALL ^ E_USER_NOTICE); // notices standard reporting temporary disabled
        try {
            new \SplString(new \stdClass(), false);
        } catch (\Exception $exception) {
            $lastError = error_get_last();
            $this->assertInternalType('array', $lastError);
            $this->assertTrue(!empty($lastError['type']));
            $this->assertSame(E_USER_NOTICE, $lastError['type']);
            $this->assertTrue(!empty($lastError['file']));
            $splStringReflection = new \ReflectionClass(\SplString::class);
            $this->assertSame($splStringReflection->getFileName(), $lastError['file']);
            $checkerReflection = $splStringReflection->getMethod('checkInitialValue');
            $this->assertGreaterThanOrEqual($checkerReflection->getStartLine(), $lastError['line']);
            $this->assertLessThanOrEqual($checkerReflection->getEndLine(), $lastError['line']);
            $this->assertTrue(!empty($lastError['message']));
            $this->assertSame('Object of class stdClass to string conversion', $lastError['message']);
            throw $exception;
        } finally {
            error_reporting($originalErrorReporting); // restoring previous error reporting
        }
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Object of class Closure could not be converted to string
     */
    public function closure_cause_notice_and_throws_exception_even_not_strict()
    {
        $originalErrorReporting = error_reporting();
        error_reporting(E_ALL ^ E_USER_NOTICE); // notices standard reporting temporary disabled
        try {
            new \SplString(
                function () {
                },
                false
            );
        } catch (\Exception $exception) {
            $lastError = error_get_last();
            $this->assertInternalType('array', $lastError);
            $this->assertTrue(!empty($lastError['type']));
            $this->assertSame(E_USER_NOTICE, $lastError['type']);
            $this->assertTrue(!empty($lastError['file']));
            $splStringReflection = new \ReflectionClass(\SplString::class);
            $this->assertSame($splStringReflection->getFileName(), $lastError['file']);
            $this->assertTrue(!empty($lastError['line']));
            $checkerReflection = $splStringReflection->getMethod('checkInitialValue');
            $this->assertGreaterThanOrEqual($checkerReflection->getStartLine(), $lastError['line']);
            $this->assertLessThanOrEqual($checkerReflection->getEndLine(), $lastError['line']);
            $this->assertTrue(!empty($lastError['message']));
            $this->assertSame('Object of class Closure to string conversion', $lastError['message']);
            throw $exception;
        } finally {
            error_reporting($originalErrorReporting); // restoring previous error reporting
        }
    }

    /** @test */
    public function a_string_if_not_strict_is_not_lost_after_serialize()
    {
        $this->markTestSkipped('Serializing of the fallback SplString leads to binary string.');
    }

}
