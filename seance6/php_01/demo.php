<?php
session_start();
require('fonctions.php');

$_SESSION['username'] = "souley";

$dept = "Informatique";
$commune = "KOUROUMA";
$nom = "Souley";
$age = 10;
$email = 'solo.2026@gmail.com';

print("Le departement est " . $dept);
displayBr();
print("La commune est " . $commune);
displayBr();
echo "Le nom est " . $nom;
displayBr();
echo "L'age est " . $age;
displayBr();
echo "L'email est " . $email;
displayBr();

//Les conditions en PHP if()-->else()
if ($age == 22) {
    echo "Le nom est " . $nom;
} else {
    echo "Utilisateur inconnu";
}

displayBr();
displayBr();
// Conditions en PHP switch()==> lorsque les cas sont discrêts (sont comptable)
$val = "Lundi";
switch ($val) {
    case "Lundi":
        echo "Hummm nous sommes lundi encore";
        break; // le break arrete l'execution et sort carrement du switch()
    case "Mardi":
        echo "Hummm nous sommes mardi encore";
        break;
    case "Mercredi":
        echo "Hummm nous sommes mercredi encore";
        break;
    case "Jeudi":
        echo "Hummm nous sommes jeudi, pres ce que le weekend...youpyyyy";
        break;
    case "Vendredi":
        echo "Yaaaaaa les derniers en entreprise, on va s'amuser!";
        break;

    case "Samedi":
        echo "Je dois aller payasser en ville";
        break;
    case "Dimanche":
        echo "Hummm le weekend est vite passé heinn!! ";
        break;

    default:
        echo "Djo tu fumes quoi meme!";
}
displayBr();
displayBr();
echo "=====================================Seance7========================";

// les formes terniaires.== $var=(condition)? $var : $var3;

$nom = ($age <= 20) ? 'Souley' : 'Inconnu';
displayBr();
echo $nom;
displayBr();
// Les boucles en PHP
while ($age <= 20) {
    echo "============Bonjour " . $nom . "====================";
    displayBr();
    $age = $age + 2; // age=10//age->10+2==> age+=2
}
displayBr();
// for
// for ($i = 0; $i < 10; $i++) {
//     echo $i;
//     displayBr();
// }
displayBr();
// foreach key=>value
$user1 = array(
    "nom" => "Souley",
    'age' => 22,
    "Filiere" => 'GIIA',
    'ville' => 'Meknes',
);

$user2 = array(
    "nom" => "Wahab",
    'age' => 18,
    "Filiere" => 'MIP',
    'ville' => 'Tanger',
);
echo "L'age de user1 est " . $user1['age'];
displayBr();
echo "La filiere de user1 est " . $user1['Filiere'];
displayBr();
displayBr();
displayBr();
echo "L'age de user2 est " . $user2['age'];
displayBr();
echo "La filiere de user2 est " . $user2['Filiere'];
displayBr();
displayBr();
echo '<h1> La partir pour afficher le contenu du tableau avec foreach de user1</h1>';
//Foreach sur les tables ass
foreach ($user1 as $user_info) {
    echo "L'information extraite est " . $user_info;
    displayBr();
}

displayBr();
echo '<h1> La partir pour afficher le contenu du tableau avec foreach de user2</h1>';
//Foreach sur les tables ass
foreach ($user2 as $user_info) {
    echo "L'information extraite est " . $user_info;
    displayBr();
}
// foreach sur les tables avec keys
displayBr();
displayBr();
foreach ($user2 as $keys => $values) {
    echo "Les infos sont " . $keys . "=> " . $values;
    displayBr();
}
displayBr();
displayBr();
echo '<h3>Les tableau a 2D </h3>';
$membres = array(
    array('Souley', 22, 'solo@gmail.com'),
    array('Pierre', 24, 'piere@gmail.com'),
    array('Dieudonne', 25, 'dieudne@gmail.com'),
);
echo $membres[1][2];
displayBr();
echo $membres[2][0];
