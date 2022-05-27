@extends('header')

<h1>Ajout d'une nouvelle donnéee</h1>

<body>

    <br><br>
    <h1>Éléments de la donée</h1>
    <br><br>




    <div class="conteneur contenu">

        <div class="contenu">

            <form class=" box" action="recupAjout" method="post">

                <label>Identifiant</label>
                <input type="text" name="uuid" id="uuid">
                <br><br>

                <label>Sexe</label>
                <input type="text" name="sexe" id="sexe">
                <br><br>

                <label>Titre</label>
                <input type="text" name="titre" id="titre" placeholder="Mr ou Miss par exemple">
                <br><br>

                <label>Prenom</label>
                <input type="text" name="prenom" id="prenom">
                <br><br>

                <label>Nom</label>
                <input type="text" name="nom" id="nom">
                <br><br>

                <label>Date de naissance</label>
                <input type="date" name="naissance" id="naissance">
                <br><br>

                <label>Age</label>
                <input type="number" name="age" id="age" min="13" max="99">
                <br><br>

                <label>Nationalite</label>
                <input type="text" name="nation" id="nation" placeholder="Fr">
                <br><br>

                <label>Telephone fixe</label>
                <input type="tel" name="fixe" id="fixe" placeholder="06-07-08-09-10" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
                <br><br>

                <label>Telephone portable</label>
                <input type="tel" name="portable" id="portable" placeholder="06-07-08-09-10" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
                <br><br>

                <label>Email</label>
                <input type="email" name="email" id="email">
                <br><br>

                <label>Pseudo</label>
                <input type="text" name="pseudo" id="pseudo">
                <br><br>

                <label>Mot de passe</label>
                <input type="password" name="mdp" id="mdp">
                <br><br>

                <label>Liens de votre image (Large)</label>
                <input type="url" name="large" id="large">
                <br><br>

                <label>Liens de votre image (Medium)</label>
                <input type="url" name="moyen" id="moyen">
                <br><br>

                <label>Liens de votre image (Thumbnail)</label>
                <input type="url" name="thumbnail" id="thumbnail">
                <br><br>

                <label>Ville</label>
                <input type="text" name="ville" id="ville" placeholder="Lille">
                <br><br>

                <label>Code postal</label>
                <input type="text" name="code" id="code" placeholder="59300">
                <br><br>

                <label>Nom de votre état</label>
                <input type="text" name="etat" id="etat">
                <br><br>

                <input type="submit" name="ajout" value="valider">

            </form>

        </div>

    </div>

</body>