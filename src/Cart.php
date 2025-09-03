<?php

class Cart {

    private array $products = []; 
    private array $items = [];

    public function __construct() {

        $this->products = [
            1 => ['id' => 1, 'name' => 'Camiseta', 'price' => 59.90, 'stock' => 10],
            2 => ['id' => 2, 'name' => 'Calça Jeans', 'price' => 129.90, 'stock' => 5],
            3 => ['id' => 3, 'name' => 'Tênis', 'price' => 199.90, 'stock' => 3]
        ];
    }


    public function addCart (int $id, int $quantity): string {
        if ($id <= 0) {
            return'<span>Produto inválido</span>';
        }
        if ($quantity <= 0) {
            return'<span>Quantidade inválida</span>';
        } 
        
        if ($quantity > $this->products[$id]['stock']) {
            return '<span>Estoque insuficiente </span>';
        } 

        $this->items[] = ['productId' => $id, 'quantity' => $quantity, 'subtotal' => $this->calcSubTotal($id, $quantity)];

        return "<p>Produto adicionado</p>";
    }
        
        
    public function removeProduct(int $id): string{
    
        if (!isset($this->items[$id])) {
            return "<span>Produto inválido</span>";
        }
        
        $product = $this->products[$id];
        $quantityToRemove = $this->items[$id]['quantity'];
        $product['stock'] += $quantityToRemove;

        unset($this->items[$id]);
        return "<p>Produto {$product['name']} removido</p>";
    }

    public function getCart(){

        foreach ($this->items as $item){
            
            $productId = $item['productId'];

            echo '<p>Nome do produto: ' . $this->products[$productId]['name']. '</p>';
            echo '<p>Quantidade: ' . $item['quantity']. '</p>';
            echo '<p>Preço: ' . $this->products[$productId]['price']. '</p>';
            echo '<p>Subtotal: '. $item['subtotal']. '</p>';
        }
        echo '<p>Total: '. $this->calcTotal(). '</p>';
            
    }
    public function calcSubTotal($id, $quantity){
        
        $price = $this->products[$id]['price']; 
        
        return $price * $quantity; 
    }

    public function calcTotal (){
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['subtotal'];
        }
        return $total;
    }

    
    public function applyDiscount (string $discount){
        
        $discountValue = substr($discount ,-2);
        $discountValueInt = intval($discountValue);
        $total = $this->calcTotal();

        $finalDiscount = $total * ($discountValueInt / 100);
        
        return 'seu total sera de ' . ($total - $finalDiscount);
    }
}

