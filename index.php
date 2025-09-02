<?php

require_once __DIR__ . '/carrinho.php';


$carrinho1 = new Cart();

$carrinho1->addCart(1, 2);

// $carrinho1->addCart(2, 10);


// $carrinho1->removeProduct(2);


$carrinho1->getCart();

$carrinho1->applyDiscount('DESCONTO10');