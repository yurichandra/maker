<?php

namespace Maker\Test;

use PHPUnit\Framework\TestCase;
use Maker\Maker;
use Maker\Exceptions\NotEvenException;

class MakerTest extends TestCase
{
    /**
     * Testing generate.
     *
     * @return void
     */
    public function testGenerate()
    {
        $maker = new Maker(['type' => 'lowercase']);
        $string = $maker->generate(4, 2);

        var_dump($string);
    }

    /**
     * Testing generate will throw exception.
     *
     * @return void
     */
    public function testGenerateThrowException()
    {
        $this->expectException(NotEvenException::class);
        $maker = new Maker(['type' => 'number']);
        $string = $maker->generate(3, 2);
    }

    /**
     * Testing generate six base string.
     *
     * @return void
     */
    public function testGenerateSixBase()
    {
        $maker = new Maker(['type' => 'lowercase']);
        $strings = $maker->generateSixBase(7);

        print_r($strings);
    }

    /**
     * Testing generate eight base string.
     *
     * @return void
     */
    public function testGenerateEightBase()
    {
        $maker = new Maker([
            'type' => 'uppercase',
            'separator' => '-',
        ]);

        $strings = $maker->generateEightBase(7);

        print_r($strings);
    }

    /**
     * Testing generate with prefix.
     *
     * @return void
     */
    public function testGenerateWithPrefix()
    {
        $maker = new Maker([
            'type' => 'uppercase',
            'prefix' => 'TKP-',
        ]);

        $strings = $maker->generateEightBase(7);
        print_r($strings);
    }

    /**
     * Testing generate with prefix.
     *
     * @return void
     */
    public function testGenerateWithSuffix()
    {
        $maker = new Maker([
            'type' => 'uppercase',
            'suffix' => '-TCP',
        ]);

        $strings = $maker->generateEightBase(7);
        print_r($strings);
    }

    /**
     * Testing generate with prefix.
     *
     * @return void
     */
    public function testGenerateWithSuffixAndPrefix()
    {
        $maker = new Maker([
            'type' => 'number',
            'suffix' => '-TCP',
            'prefix' => 'TKP-'
        ]);

        $strings = $maker->generateEightBase(7);
        print_r($strings);
    }
}
