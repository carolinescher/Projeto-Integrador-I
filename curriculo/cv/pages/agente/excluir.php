<?php
  require_once('../../utils/connection.php');

  $getParamId = $_GET["paramId"];

  $query = "DELETE from agente WHERE id_agente = '$getParamId'";

  if (mysqli_query($connection, $query)) {
    header("location: /6bus/pages/agente/listar_agente.php");
  }

?>