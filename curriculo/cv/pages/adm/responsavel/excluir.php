<?php
  require_once('../../utils/connection.php');

  $getParamId = $_GET["paramId"] ;

  $query = "DELETE from responsavel WHERE id_responsavel = '$getParamId'";

  if (mysqli_query($connection, $query)) {
    header("location: /6bus/pages/responsavel/listar_resp.php");
  }else if (mysqli_error($connection)){
    echo "
      <script>
        alert('O responsável possui dependentes no sistema e não pode ser excluído!');
        setTimeout(() => {
          location.href = 'http://localhost/6bus/pages/responsavel/listar_resp.php';
        }, 1000);
      </script>";
  }

?>