<?php if (!$_SESSION['Cod_Autenticacao']) { header("Location: login"); }?>
<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
<div class="container-fluid py-5 h-100">
<?php
    //Codigo para verificar e colocar na tela caso aconteça um erro no sistema
    if(isset($_SESSION["Info"]) || isset($_SESSION["Erro"])){?>
    <div class="alert alert-<?php echo @$_SESSION['Type'];?> alert-dismissible fade show" role="alert">
        <strong><?php echo @$_SESSION["Info"];?></strong> <?php echo @$_SESSION["Erro"]; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php unset($_SESSION["Info"]); unset($_SESSION["Erro"]); unset($_SESSION['Type']);}?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="row mb-4 justify-content-between">
    <a type="button" class="btn-info btn-sm ml-3 d-none d-md-block" href="cadastrarProduto">Novo Produto</a>
    <a type="button" class="btn-info btn-sm ml-3 d-block d-sm-none" href="cadastrarProduto">+</a>
</div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ação</th>
                        
                    </tr>
                </thead>
                <tbody>
                   <?php 
                    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                    $query = $sql->query("SELECT * FROM tb_produtosclientepj WHERE cod_cliente_pj = '{$_SESSION['Cod_cliente']}' order by cod_produtosClientePj desc ");
                    $results = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($results as $result) {
                         $cod_produtosCientePj = $result['cod_produtosClientePj'];
                         $cod_pecas = $result['cod_pecas'];

                         $query_pecas = $sql->query("SELECT * FROM tb_pecas where cod_produto = $cod_pecas");
                         $result_pecas = $query_pecas->fetchAll(PDO::FETCH_ASSOC);
                         $nome = $result_pecas[0]['nome'];
                         $cod_categoria = $result_pecas[0]['cod_categorias'];
                        
                         $query_quantidade = $sql->query("SELECT * FROM tb_categorias where cod_categoria = $cod_categoria");
                         $result_quantidade = $query_quantidade->fetchAll(PDO::FETCH_ASSOC);
                         $categoria = $result_quantidade[0]['nome'];
     
                         $quantidade = $result['quantidade'];
                         $preco = $result['valor'];
                      ?>
                      <tr>
                        <td><?php echo $cod_produtosCientePj ?></td>
                        <td><?php echo @$categoria ?></td>
                        <td><?php echo @$nome?></td>
                        <td><?php echo @$quantidade?></td>
                        <td><?php echo @$preco?></td>

                        <td class="d-flex justify-content-center">
                         <a href="editarProduto?cod=<?= $cod_produtosCientePj ?>" class='text-primary mr-1' title='Editar Dados'><i class="far fa-edit"></i></a>
                         <a href="php\apagarProduto.php?cod=<?= $cod_produtosCientePj ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                     </td>
                 </tr>
             <?php } ?>
         </tbody>
     </table>
 </div>
</div>
</div>
</div>
</session>