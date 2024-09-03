<?php



class IndexProduto{

    public function __construct(){

    }
}


if(isset($_POST["opcao"]) && !empty($_POST["opcao"])){

        if($_POST["opcao"] == "inserir"){
            include("../model/Produto.php");
            $conn = new Produto();//model
            if(isset($_POST["IDProduto"]) && isset($_POST["Produto"]) && isset($_POST["IDCategoria"]) && isset($_POST["Segmento"]) && isset($_POST["IDSegmento"]) && isset($_POST["Marca"]) && isset($_POST["Preco"]) && !empty($_POST["IDProduto"]) && !empty($_POST["Produto"]) && !empty($_POST["IDCategoria"]) && !empty($_POST["Segmento"]) && !empty($_POST["IDSegmento"]) && !empty($_POST["Marca"]) && !empty($_POST["Preco"])){
                $inserir = $conn->addProduto($_POST["IDProduto"], $_POST["Produto"], $_POST["IDCategoria"], $_POST["Segmento"], $_POST["IDSegmento"], $_POST["Marca"], $_POST["Preco"]);    
            if($inserir) 
                header("location: ../view/formularioCadastroProduto.php?mensagem=sucesso");
            else 
                header("location: ../view/formularioCadastroProduto.php?mensagem=erro");
        }}
    }elseif(isset($_GET["opcao"]) && !empty($_GET["opcao"])){
        if($_GET["opcao"] == "inserir"){
            include("./view/ListarProduto.php");
            $Produto = new ListarProduto();//view  
            $inserir = $Produto->cadastrarProduto();          
        }elseif($_GET["opcao"]=="listAll"){
            include("./model/Produto.php");
            $conn = new Produto();//model  
            $users = $conn->listAll();
            
            include("./view/ListarProduto.php");
            $Produto = new ListarProduto();//view  
            $Produto->ListarTodos($users);   

        }elseif(($_GET["opcao"] == "listOne") && isset($_GET["IDProduto"]) && !empty($_GET["IDProduto"])){
            include("./model/Produto.php");
            $conn = new Produto();//model  
            $user = $conn->listOne($_GET["IDProduto"]);
            //$Produto = new ListarProduto();
            include("./view/ListarProduto.php");
            $Produto = new ListarProduto();
            $Produto->ListarUm($user);
        }
    }
     //   echo "Campo(s) obrigatório(s) não preenchido(s). Retorne e preencha todos os campos";
    //}

