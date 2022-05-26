@extends('header')

<h1 style="text-align:center">Tableau de données</h1>

<br>

<button style="margin-left:90%" onclick="ajout()">Ajout de donnée</button>

<table class=" table table-hover">
    <thead>
        <tr>

            <th>Nom</th>
            <th>Prenom</th>
            <th>Titre</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>age</th>
            <th>nationalite</th>
            <th>email</th>
            <th>Modifier</th>
            <th>Supprimer</th>

        </tr>



    </thead>

    <tbody>
        <?php

        foreach ($datas as $data) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['prenom'] . "</td>";
            echo "<td>" . $data['titre'] . "</td>";
            echo "<td>" . $data['sexe'] . "</td>";
            echo "<td>" . $data['date_de_naissance'] . "</td>";
            echo "<td>" . $data['age'] . "</td>";
            echo "<td>" . $data['nationalite'] . "</td>";
            echo "<td>" . $data['email'] . "</td>";
            echo "</tr>";
        }

        ?>
    </tbody>

</table>

<script>
    function ajout() {
           
            window.location="/ajout";
        
    }
</script>