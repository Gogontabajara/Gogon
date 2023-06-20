<?php
if (isset($_POST['peca'])) {
    $peca = $_POST['peca'];
    if ($peca == 0) {
        $foto = "\sem-foto.jpg";
        echo "<img src='img" . $foto . "' " . "class = 'img-pc d-block mx-lg-auto img-fluid' alt='pc' width='300' height='500' loading='lazy'>";
    } else {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_produto = :peca");
        $stmt->bindParam(':peca', $peca);
        $stmt->execute();
        $peças = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($peças as $peça) {
            $peça['foto'] = $peça['foto'] == null ? "\sem-foto.jpg" : $peça['foto'];
            echo "<img src='img" . $peça['foto'] . "' " . "class = 'img-pc d-block mx-lg-auto img-fluid' alt='pc' width='300' height='500' loading='lazy'>";
        }
    }
}
