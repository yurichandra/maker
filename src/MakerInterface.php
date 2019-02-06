<?php

namespace Maker;

interface MakerInterface
{
    public function generate($length, $amount);
    public function generateSixBase($amount);
    public function generateEightBase($amount);
}
