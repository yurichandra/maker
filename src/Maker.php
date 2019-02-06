<?php

namespace Maker;

use Maker\Exceptions\NotEvenException;
use Maker\Exceptions\InvalidTypeException;

class Maker implements MakerInterface
{
    /**
     * Vouchers attribute.
     *
     * @var array
     */
    protected $vouchers = [];

    /**
     * Length of vouchers.
     *
     * @var int
     */
    protected $length;

    /**
     * Prefix attributes.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Suffix attributes.
     *
     * @var string
     */
    protected $suffix;

    /**
     * Separator attributes.
     *
     * @var string
     */
    protected $separator;

    /**
     * Collection of uppercase
     *
     * @var string
     */
    const UPPER_CASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Collection of lowercase
     *
     * @var string
     */
    const LOWER_CASE = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * Collection of numbers
     *
     * @var string
     */
    const NUMBER = '0123456789';

    /**
     * Collection of numbers, lowercase and uppercase.
     *
     * @var string
     */
    const MIXED = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    /**
     * Type attributes.
     *
     * @var string
     */
    protected $type;

    /**
     * Construct the class.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->prefix = $this->isKeyExist('prefix', $options);
        $this->suffix = $this->isKeyExist('suffix', $options);
        $this->operator = $this->isKeyExist('separator', $options);
        $this->type = $this->getType($options);
    }

    /**
     * Generate vouchers based on length specified by user.
     *
     * @param int $length
     * @param int $amount
     * @return void
     */
    public function generate($length, $amount)
    {
        if ($length % 2 !== 0) {
            throw new NotEvenException();
        }

        for ($i = 0; $i < $amount; $i++) {
            array_push($this->vouchers, $this->generateBase($length));
        }

        return $this->vouchers;
    }

    /**
     * Generate six base string voucher.
     *
     * @param int $amount
     * @return void
     */
    public function generateSixBase($amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            array_push($this->vouchers, $this->generateBase(6));
        }

        return $this->vouchers;
    }

    /**
     * Generate eight base string voucher.
     *
     * @param string $amount
     * @return void
     */
    public function generateEightBase($amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            array_push($this->vouchers, $this->generateBase(8));
        }

        return $this->vouchers;
    }

    /**
     * Method to check whether array key exist.
     *
     * @param string $key
     * @param array $options
     * @return boolean
     */
    protected function isKeyExist($key, array $options)
    {
        return array_key_exists($key, $options) ? $options[$key] : null;
    }

    /**
     * Generate string base
     *
     * @param int $length
     * @return void
     */
    protected function generateBase($length)
    {
        $voucher = '';

        for ($i = 0; $i < $length; $i++) {
            $voucher .= $this->type[rand(0, strlen($this->type) - 1)];
        }

        if ($this->prefix !== null && $this->suffix !== null) {
            return $this->prefix . $voucher . $this->suffix;
        } elseif ($this->suffix !== null) {
            return $voucher . $this->suffix;
        } elseif ($this->prefix !== null) {
            return $this->prefix . $voucher;
        }

        return $voucher;
    }

    /**
     * Get type of characters that will use for generating.
     *
     * @param array $options
     * @return void
     */
    protected function getType(array $options)
    {
        switch ($options['type']) {
            case 'mixed':
                return self::MIXED;
                break;

            case 'number':
                return self::NUMBER;
                break;

            case 'uppercase':
                return self::UPPER_CASE;
                break;

            case 'lowercase':
                return self::LOWER_CASE;
                break;
            
            default:
                throw new InvalidTypeException();
                break;
        }
    }
}
