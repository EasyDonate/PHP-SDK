<?php

/**
 * Пример кода.
 * Создает платеж и перенаправляет на страницу оплаты.
 *
 * @link https://api.easydonate.ru/methods/payment-create
 */

require_once __DIR__ . '/vendor/autoload.php';

$sdk = new L4dno\Sdk('12aeb1f345h5gdrf5fj6ds869h33f8fe');
$payment = $sdk->payment()
               ->setCustomer('DontFollow')
               ->setServerId(1435)
               ->setProducts([14256 => 1])
               ->create(true);
