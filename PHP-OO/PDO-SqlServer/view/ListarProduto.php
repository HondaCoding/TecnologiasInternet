<style>
        /*body {
            display: flex;
            justify-content: center;
            align-items: center;
        }*/
        table, th, tr, td {
            padding: 10px;
            font-size: 25px;
            border-collapse: collapse;
        }
        table, th {
            width: 80%;
            border: 2px solid #FF760C;
            background-color: #8392a7;
            color: white;
        }
        td {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
        a{
            text-decoration: none;
        }
    </style>
<?php

class ListarProduto{
    public function cadastrarProduto(){
        ?>
        <form action="controler/indexProdtuo.php" method="POST">
            ID Produto <input type="text" name="IDProduto"><br><br>
            Produto <input type="text" name="Produto"><br><br>
            ID Categoria <input type="text" name="IDCategoria"><br><br>
            Segmento <input type="text" name="Segmento"><br><br>
            IDSegmento <input type="text" name="IDSegmento"><br><br>
            ImagemProduto <input type="text" name="ImagemProduto"><br><br>
            Marca <input type="text" name="Marca"><br><br>
            Preco <input type="text" name="Preco"><br><br>
            
            <input type="hidden" name="opcao" value="inserir">
            <input type="submit" value="CADASTRAR">
        </form>
    <?php
    }
    public function ListarTodos($produtos){
    ?>
        <a href="index.php?pagina=Produto&opcao=inserir"><img src="./view/registro.png" width="30px">Cadastrar novo produto</a><br>
        <table>
        <thead>
            <tr>
                <th>ID Produto</th>
                <th>Produto</th>
                <th>IDCategoria</th>
                <th>Segmento</th>
                <th>IDSegmento</th>
                <th>ImagemProduto</th>
                <th>Marca</th>
                <th>Preco</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($produtos as $produto): ?>
        <tr>
            <td><?php echo $produto['IDProduto'] ?></td>
            <td><?php echo $produto['Produto'] ?></td>
            <td><?php echo $produto['IDCategoria'] ?></td>
            <td><?php echo $produto['Segmento'] ?></td>
            <td><?php echo $produto['IDSegmento'] ?></td>
            <td><?php echo $produto['ImagemProduto'] ?></td>
            <td><?php echo $produto['Marca'] ?></td>
            <td><?php echo $produto['Preco'] ?></td>
            <td>
                <a href="index.php?pagina=Produto&opcao=editar&IDProduto=<?=$produto['IDProduto'];?>">
                    <img src="./view/botao-editar.png" width="30px">
                </a>
                <a href="index.php?pagina=Produto&opcao=listOne&IDProduto=<?=$produto['IDProduto'];?>">
                    <img src="./view/listarUm.png" width="30px">
                </a>
                <a href="index.php?pagina=Produto&opcao=excluir&IDProduto=<?=$produto['IDProduto'];?>">
                    <img src="./view/excluir.png" width="30px">
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php
    }

    public function ListarUm($produto){
        // echo "<pre>";
        //     print_r($produto["Produto"]);
        // echo "</pre>";
        
        ?>
        <link href="view/style.css" rel="stylesheet"> 
        <?php
        echo $produto[0]["Produto"];

        foreach ($produto as $produt): ?>
            <p><?=$produt['Produto'];?></p>
            <img src="<?=$produt['ImagemProduto'];?>" >
        <?php endforeach;
    }
}