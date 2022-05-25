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
            <th>Modifier</th>
            <th>Supprimer</th>

        </tr>



    </thead>

    <tbody>
        <?php

        foreach ($datas as $data) {
            echo "<tr>";
            echo "<td>" . $data['Nom'] . "</td>";
            echo "<td>" . $data['Prenom'] . "</td>";
            echo "<td>" . $data['titre'] . "</td>";
            echo "<td>" . $data['sexe'] . "</td>";
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