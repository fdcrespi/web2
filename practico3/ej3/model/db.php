<?php
    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_deudas;charset=utf8', 'root', '');
        return $db;
    }

    function getPayments(){
        $db = connect();
        $query = $db->prepare("SELECT * FROM pagos");
        $query->execute();
        $payments = $query->fetchAll(PDO::FETCH_OBJ);
        return $payments;
    }

    function agreePayments($name, $share, $money, $date){
        $db = connect();
        $query = $db->prepare('INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago) values (?,?,?,?)');
        $query->execute([$name, $share, $money, $date]);
        return $db->lastInsertId(); //retorna el ultimo id ingresado (es buena practica)
    }

    function searchPayments($name, $share){
        $db = connect();
        $query = $db->prepare('SELECT * FROM pagos WHERE deudor = ? and cuota = ?');
        $query->execute([$name, $share]);
        $payments = $query->fetchAll(PDO::FETCH_OBJ);
        return $payments;
    }