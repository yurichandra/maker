# Maker

A voucher generator that works for PHP.

# Features

 - Generate with length specified.
 - Generate with four base string. ex: kmol
 - Generate with eight base string. ex: kqolemdc
 - Generate with prefix and/or suffix
 - Different type of character base.

### How to use

```php
$maker = new Maker(['type' => 'lowercase']);
```
You can define which type of character that you want to use to generate voucher string.

### Types available
- lowercase ex: qmndbtkq
- uppercase ex: QMNDBTKQ
- number ex: 98109182
- mixed ex: ik12ERkd

```php
//Prefix
$maker = new Maker([
    'type' => 'lowercase'
    'prefix' => 'TKP-'
]);

// Suffix
$maker = new Maker([
    'type' => 'lowercase'
    'prefix' => '-CTP'
]);
```
You also can define the prefix or suffix in Maker constructor.

```php
//Generate method
$vouchers = $maker->generate($length_of_character, $amount_of_vouchers)

//Generate six base method
$vouchers = $maker->generateSixBase($amount_of_vouchers)

//Generate method
$vouchers = $maker->generateEightBase($amount_of_vouchers)
```

Thank you.
