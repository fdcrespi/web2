<?php
    /* Incluyo la base de datos */
    include ("model/db.php"); 

    function showPayments(){
        include ("view/header.php");
        $payments = getPayments();
        echo '<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Deudores</th>
            <th scope="col">Cuota</th>
            <th scope="col">Cuota Capital</th>
            <th scope="col">Fecha Pago</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($payments as $payment) {
          echo "<tr>
                  <th scope='row'>$payment->id</th>
                  <td>$payment->deudor</td>
                  <td>$payment->cuota</td>
                  <td>$payment->cuota_capital</td>
                  <td>$payment->fecha_pago</td>
               </tr>";
        }
        include ("view/footer.php");
    }

    function getFormAdd(){
      include("view/header.php");
      include("view/formAdd.php");
      include("view/footer.php");
    }

    function addPayments($name, $share, $money, $date){
      if (count(searchPayments($name, $share)) > 0){
        echo "Ya existe el pago ingresado";
      } else {
        $id = agreePayments($name, $share, $money, $date);
        echo "Pago agregado";
      }
      //header("Location: " . BASE_URL);
    }