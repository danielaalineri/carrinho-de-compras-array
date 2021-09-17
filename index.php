<?php
session_start(); //ultilizar sessões quandoestamos trabalhando com informações persistentes
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2 class="title">Sistema de carrinho com PHP </h2>
<div class="carrinho-container">

<?php
$itens = array(['nome' => 'TV', 'imagem' => 'item1.jpg', 'preco' => 400],
[ 'nome' => 'Celular', 'imagem' => 'item2.jpg', 'preco' => 100],
[ 'nome' => 'SmartWatch','imagem' => 'item3.jpg', 'preco' => 300]
);

foreach ($itens as $key => $value) {
?>

<div class="produto">
    <img src="<?php echo $value['imagem'] ?>" alt="">
    <a href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho</a>
    
</div>

<?php
}
?>
</div>

<?php 
if(isset($_GET['adicionar'])) {
    //vamos adicionar ao carrinho
    $idProduto = (int) $_GET['adicionar']; //id produto faz referência a este código aqui 'cast'
    if(isset($itens[$idProduto])) {
        if(isset($_SESSION['carrinho'][$idProduto])) {
            $_SESSION['carrinho'][$idProduto]['quantidade']++; //ataulizar session id produto
        }else{
            $_SESSION['carrinho'][$idProduto] = array('quantidade' => 1, 'nome' => $itens[$idProduto]['nome'], 'preco'=> $itens[$idProduto]['preco']); //caso ainda não exista
        }
        echo '<script> alert("O produto foi adicionado ao carrinho!")</script>';
    }else{
        die('Você não pode adicionar um ítem que não existe.');
    }
}

?>

<h2 class="title">Carrinho:</h2>

<?php
include("carrinho.php");
?>
    
</body>
</html>

