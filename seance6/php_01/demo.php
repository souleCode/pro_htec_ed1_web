<?php

//function do display br

function displayBr()
{
    echo "<br/>";
}


$dept = "Informatique";
$commune = "KOUROUMA";
$nom = "Souley";
$age = 20;
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
