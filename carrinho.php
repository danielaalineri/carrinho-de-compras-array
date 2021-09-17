<?php
foreach ($_SESSION['carrinho'] as $key => $value) {
    //Nome do produto
    //Quantidade
    //Preço
    echo'<div class="carrinho-item">';
    echo '<p>Nome: '.$value['nome']. ' | Quantidade:' .$value['quantidade']. ' | Preço: R$' .($value['quantidade'] * $value['preco']).   '</p>';
}
?>
<div class="remover">
<a href="?remover=<?php echo $key ?>">Remover do carrinho</a>
<?php
    if(isset($_GET['remover']))

    {

    	$idProduto = (int) $_GET['remover'];

        if(isset($_SESSION['carrinho']))

        {

            unset($_SESSION['carrinho'][$idProduto]);

        }

    }
    ?>

</div>