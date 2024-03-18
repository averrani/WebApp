<?php
// myapache2 start
$myPDO = new PDO('sqlite:../bda_form');
$result = "SELECT Nom FROM Utilisateur";
$statement = $myPDO->prepare($result); 
$exec = $statement->execute(); 
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
    {
        print $row['Nom'] . "\n"; 
    }
    

// // Vérifiez si la méthode de requête est POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Récupérez le champ 'login' à partir des données POST et nettoyez-le pour éviter les injections SQL
//     $login = isset($_POST['login']) ? $_POST['login'] : '';

//     // Créer une nouvelle connexion PDO à une base de données SQLite
//     $myPDO = new PDO('sqlite:../bda_form');

//     // Utilisez des requêtes préparées pour éviter les injections SQL
//     $stmt = $myPDO->prepare("SELECT Nom FROM Utilisateur WHERE Nom = :login");
//     $stmt->bindValue(':login', $login, PDO::PARAM_STR);

//     // Exécutez la requête préparée
//     $stmt->execute();

//     // Récupérez tous les résultats correspondants
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Vérifiez si des résultats ont été trouvés
//     if ($results) {
//         // Itérez sur chaque ligne de résultat et imprimez le 'Nom'
//         foreach ($results as $row) {
//             print $row['Nom'] . "\n";
//         }   
//     } else {
//         echo "Aucun utilisateur trouvé avec ce login.\n";
//     }
// } else {
//     echo "Cette script doit être utilisé avec la méthode POST.\n";
// }
