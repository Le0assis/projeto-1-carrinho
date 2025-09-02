<?php

class Cart {

    private array $products = [];   
    private array $cart = [];

    public function __construct() {

        $this->products =[
            1 => ['id' => 1, 'nome' => 'Camiseta', 'preco' => 59.90, 'estoque' => 10],
            2 => ['id' => 2, 'nome' => 'Calça Jeans', 'preco' => 129.90, 'estoque' => 5],
            3 => ['id' => 3, 'nome' => 'Tênis', 'preco' => 199.90, 'estoque' => 3]
        ];
    }

    //  $this->cart =
    //         ['id_produto' => 1, 'quantidade' => '10', 'subtotal' => ''],
    //         ['id_produto' => 2, 'quantidade' => '6', 'subtotal' => ''],
    //         ['id_produto' => 3, 'quantidade' => '2', 'subtotal' => ''],
    //     ];

    public function addCart (int $id, int $quantity): void {
        if ($id <= 0){
            throw new Exception('<span>Produto inválido</span>');
        }
        if ($quantity <= 0){
            throw new Exception('<span>Quantidade inválida</span>');
        }        
        if (isset($this->cart[$id])) {
            $this->cart[$id]['estoque'] += $quantity;
        }
        if ($quantity > $this->products[$id]['estoque']) {
            throw new Exception('<span>Estoque insuficiente </span>');
        }

        $this->cart[] = ['id_product'=> $id, 'quantity'=> $quantity, 'subtotal'=> $this->calcSubTotal($id, $quantity)];

        echo "<p> Produto adicionado </p>";
    }
       
    public function removeProduct(int $id){
        
        $found = false;

        foreach ($this->cart as $key => $orderProducts){
            if ($orderProducts['id_product'] == $id){
                unset($this->cart[$key]);
                echo "<p> Produto $id removido </p>";
                $found = true;
            }
        }
        if (!$found){
            throw new Exception("<span>Produto invalido </span>");
        }

    }
    public function getCart(){

        foreach ($this->cart as $orderProducts){
            
            $product = $orderProducts['id_product'];


            echo '<p>Nome do produto: ' . $this->products[$product]['nome']. '</p>';
            echo '<p>Quantidade: ' . $orderProducts['quantity']. '</p>';
            echo '<p>Preço: ' . $this->products[$product]['preco']. '</p>';
            echo '<p>Subtotal: '. $orderProducts['subtotal']. '</p>';
        }
        echo '<p>Total: '. $this->calcTotal(). '</p>';
            
    }
    public function calcSubTotal($id, $quantity){
        
        $preco = $this->products[$id]['preco'];
        
        return $preco * $quantity; 
    }

    public function calcTotal (){
        $total = 0;
        foreach ($this->cart as $products) {
            $total += $products['subtotal'];
        }
        return $total;
    }


    
    public function applyDiscount ($discount){
        
        $discount_value = substr($discount ,-2);
        $discount_value_int = intval($discount_value);
        $total = $this->calcTotal();

        $final_discount = $total *($discount_value_int /100);
        

        echo 'seu total sera de ' .  $total - $final_discount;
    }
}


?></php>