<?php

class cart {

    private array $products = [];   
    private array $cart = [];

    public function __construct() {

        $this->products =[
            ['id' => 1, 'nome' => 'Camiseta', 'preco' => 59.90, 'estoque' => 10],
            ['id' => 2, 'nome' => 'Calça Jeans', 'preco' => 129.90, 'estoque' => 5],
            ['id' => 3, 'nome' => 'Tênis', 'preco' => 199.90, 'estoque' => 3]
        ];
    }

    //  $this->cart =
    //         ['id_produto' => 1, 'quantidade' => '10', 'subtotal' => ''],
    //         ['id_produto' => 2, 'quantidade' => '6', 'subtotal' => ''],
    //         ['id_produto' => 3, 'quantidade' => '2', 'subtotal' => ''],
    //     ];

    public function addCart (int $id, int $quantity): void {
        if ($id <= 0){
            throw new Exception('Produto inválido');
        }
        if ($quantity <= 0){
            throw new Exception('Quantidade inválida');
        }        
        if (isset($this->cart[$id])) {
            $this->cart[$id] += $quantity;
        }
        if ($id > $this->products[$id]['estoque']) {
            throw new Exception('Estoque inválido');
        }

        $this->cart[] = ['id_product'=> $id, 'quantity'=> $quantity, 'subtotal'=> calcTotal($id)];
    }
       
    public function removeProduct(int $id){
        
        if (!isset($this->cart[$id])){
            throw new Exception("Produto invalido");
        }

        foreach ($this->cart as $products){
            if ($products['id_product'] == $id){
                unset($this->cart[$id]);
            }
        }
    }

    public function calcTotal($id){
        
    }


}

?></php>