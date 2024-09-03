<?php
class Produto{
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("sqlsrv:Database=VendaVeiculos;server=localhost\SQLEXPRESS", "", "");
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }   
    } 

    public function listAll(){
        $statement = $this->connection->prepare("SELECT * FROM Produto");
        $statement->execute();
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function listOne($IDProduto){
        $statement = $this->connection->prepare("
        SELECT * FROM Produto where IDProduto = :IDProduto");
        $statement->execute(array(":IDProduto"=>$IDProduto));
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    
    }
    public function delete($IDProduto){
        $statement = $this->connection->prepare("
        SELECT * FROM Produto where IDProduto = :IDProduto");
        $statement->execute(array(":IDProduto"=>$IDProduto));
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function addProduto($IDProduto, $Produto, $IDCategoria, $Segmento, $IDSegmento, $ImagemProduto, $Marca, $Preco){
        try {
        $statement = $this->connection->prepare("
        insert into Produto (IDProduto, Produto, IDCategoria, Segmento, IDSegmento, ImagemProduto, Marca, Preco) 
        values(:IDProduto, :Produto, :IDCategoria, :Segmento, :IDSegmento :ImagemProduto, :Marca, :Preco)");

        $statement->execute(
            array(
                ":IDProduto" => $IDProduto,
                ":Produto" => $Produto,
                ":IDCategoria" => $IDCategoria,
                ":Segmento" => $Segmento,
                ":IDSegmento" => $IDSegmento,
                ":ImagemProduto" => $ImagemProduto,
                ":Marca" => $Marca,
                ":Preco" => $Preco
        )); 
        return true;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }        
    }

}