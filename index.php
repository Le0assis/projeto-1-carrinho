<?php

require_once __DIR__ . '/Cart.php';


$carrinho1 = new Cart();

echo $carrinho1->addCart(1, 2);

//echo $carrinho1->addCart(2, 10);


//echo $carrinho1->removeProduct(2);


echo $carrinho1->getCart();

echo $carrinho1->applyDiscount('DESCONTO10');