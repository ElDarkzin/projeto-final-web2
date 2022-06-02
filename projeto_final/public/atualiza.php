<?php

use Database\Database;

if (isset($_GET['id_banheiro'])) {
  $idBanheiro = $_GET['id_banheiro'];
} else {
  $idBanheiro = null;
}

require_once "../model/Database.php";

$db = new Database();

$resultDb = $db->select(
  "SELECT * FROM cadastro_banheiro WHERE id_banheiro = $idBanheiro; "
);
?>

<form method="post" action="../data/update.php">
  <h2> Atualização Do Banheiro </h2>
  <h4> Cod Banheiro:</h4>
  <input type="text" name="idBanheiro" value="<?= $resultDb[0]->id_banheiro ?>" readonly />
  <br>

      <label for="local">Local Banheiro</label>
          <input type="text" name="local_banheiro" value="<?= $resultDb[0]->local_banheiro ?>" required>
        </div>

  <h4> Descrição:</h4>
  <input type="text" name="descricao_banheiro" value="<?= $resultDb[0]->descricao_banheiro ?>" />
  <br>

  <h4> Quantidade:</h4>
  <input type="number" name="quantidade_banheiro" value="<?= $resultDb[0]->quantidade_banheiro ?>" min="1" />

  <h4> Acessorios </h4>
  <div class="form-check form-switch"> 
        <input value="Higienie para as mãos" name="acessorios" type="checkbox" <?= ($resultDb[0]->acessorios == "Higienie para as mãos") ?  : ""?>/> Higiene para as mãos 
  </div>
  <div class="form-check form-switch"> 
        <input value="Vaso sanitario" name="acessorios" type="checkbox" <?= ($resultDb[0]->acessorios == "Vaso sanitário") ? : ""?>/> Vaso sanitario 
  </div>
  <div class="form-check form-switch"> 
        <input value="Chuveiro" name="acessorios" type="checkbox" <?= ($resultDb[0]->acessorios == "Chuveiro") ? : ""?>/> Chuveiro 
  </div>

  <h3> Pagamento: </h3>
  <div class="form-check form-check-inline">
    <input type="radio" name="pagamento" value="Dinheiro" <?= ($resultDb[0]->pagamento == "DInheiro") ? "checked" : "" ?>/> Dinheiro
  </div>
  <div class="form-check form-check-inline">
    <input type="radio" name="pagamento" value="Pix" <?= ($resultDb[0]->pagamento == "Pix") ? "checked" : "" ?> /> Pix
  </div>
  <div class="form-check form-check-inline">
    <input type="radio" name="pagamento" value="Cartao" <?= ($resultDb[0]->pagamento == "Cartao") ? "checked" : "" ?> /> Cartão
  </div>

  </div>
  </div>

  <br><br>
  <input type="submit" value="Atualizar pedido" class="btn btn-primary">
  <input type="reset" value="Reiniciar" class="btn btn-secondary">
</form>