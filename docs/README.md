>Leonardo Ribeiro de Assis
>1995764

# Simulador de Carrinho de Compras

Projeto desenvolvido para a disciplina de Design Patterns & Clean Code.

### Dupla
* **Nome:** Leonardo Ribeiro de Assis | **RA:** 1995764

### Estrutura do Projeto
O projeto está organizado nas seguintes pastas:
* `/` - Arquivos de configuração e este README.
* `src/` - Contém o código-fonte da classe `Cart` em PHP.
* `docs/` - Documentação adicional, se houver.

### Funcionalidades Implementadas
* Adicionar produto ao carrinho.
* Remover produto do carrinho.
* Listar itens do carrinho (com nome, quantidade e subtotal).
* Calcular o valor total do carrinho.
* Aplicar um desconto fixo de 10% com o cupom `DESCONTO10`.

### Regras de Negócio
* Apenas produtos com estoque suficiente podem ser adicionados ao carrinho.
* Ao remover um item, a quantidade em estoque é restaurada.
* O subtotal de cada item é calculado automaticamente.
* O desconto de 10% é aplicado sobre o valor total final.

### Limitações do Projeto
* Os dados de produtos não são persistidos (usamos arrays fixos).
* Não há interface de usuário (os testes são feitos diretamente no código).
* Não foram utilizados frameworks externos, apenas PHP puro.

---

### Como Executar o Projeto
1.  Certifique-se de que o **XAMPP** está instalado e o Apache está rodando.
2.  Copie a pasta do projeto para o diretório `htdocs` do seu XAMPP.
3.  Abra seu navegador e acesse a URL: `http://localhost/carrinho` (ou o nome da sua pasta).

### Exemplos de Uso (Casos de Teste)

Para testar as funcionalidades, verifique o arquivo que contém a execução do código (geralmente `index.php`). Abaixo estão os testes básicos:

1.  **Adicionar Item Válido:**
    ```php
    // Adiciona 2 camisetas ao carrinho
    echo $carrinho->addCart(1, 2);
    ```

2.  **Adicionar Item sem Estoque:**
    ```php
    // Tenta adicionar 10 tênis (estoque é 3)
    echo $carrinho->addCart(3, 10);
    ```

3.  **Remover Item do Carrinho:**
    ```php
    // Adiciona e depois remove um item
    $carrinho->addCart(2, 1);
    echo $carrinho->removeProduct(2);
    ```

4.  **Aplicar Desconto:**
    ```php
    // Adiciona itens para calcular o total e aplica o desconto de 10%
    $carrinho->addCart(1, 1);
    $carrinho->applyDiscount('DESCONTO10');
    ```
