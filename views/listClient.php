<?php
require "../controllers/clientC.php";
require "../models/client.php";

$clientC = new ClientC();
$client = NULL;
if(isset($_POST)&&!(empty($_POST))){
$client = new Client($_POST["firstName"], $_POST["lastName"], $_POST["address"], new \DateTime($_POST["dob"]));
$clientC->addClient($client);
}
$list = $clientC->listClients();
// var_dump($list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .deleteButton{
            background-color:red;
            color: white;
        }
        </style>
</head>
<body>
    <h1>Ajouter un client:</h1>
    <form method="POST" action="listClient.php">
    lastName:<input type="text" name="lastName" placeholder="write your lastName here ..." id=""><br/><br/>
    firstName:<input type="text" name="firstName" placeholder="write your firstName here ..." id=""><br/><br/>
    address:<input type="text" name="address" placeholder="write your address here ..." id=""><br/><br/>
    dob:<input type="date" name="dob" id=""><br/><br/>
    <input type="submit" value="Ajouter client"/>
    </form>
    <br/>
    <h1>liste des clients:</h1>
    <?php
    echo '<table border="1">
    <thead>
    <th>id</th>
    <th>lastName</th>
    <th>firstName</th>
    <th>address</th>
    <th>dob</th>
    <th>Actions</th>
    </thead>
    <tbody>';
    for($i =0 ;$i<count($list); $i++){
        echo '<tr>
        <td>'.$list[$i]["idClient"].'</td>
        <td>'.$list[$i]["lastName"].'</td>
        <td>'.$list[$i]["firstName"].'</td>
        <td>'.$list[$i]["address"].'</td>
        <td>'.$list[$i]["dob"].'</td>
        <td><button class="deleteButton" onclick="deleteClient('.$list[$i]["idClient"].')">supprimer</button></td>
        </tr>';
    }
    echo '</tbody>
    </table>';
    ?>
    <script>
        const deleteClient = (idclient) => {
            location.href = `http://localhost/atelier_CRUD_php_2A30/views/deleteClient.php?idClient=${idclient}`;
        }
    </script>
</body>
</html>