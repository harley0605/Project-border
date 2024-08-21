<?php

    include("database.php");

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez que toutes les données requises sont présentes
    if (isset($_POST['immatriculation']) && !empty($_POST['immatriculation']) && 
        isset($_POST['marque']) && !empty($_POST['marque'])) {
        // Préparer les données
        $immatriculation = $_POST['immatriculation'];
        $marque = $_POST['marque'];
        $nom_proprietaire = $_POST['nom_proprietaire'];
        $prenoms_proprietaire = $_POST['prenoms_proprietaire'];
        $cin_proprietaire = $_POST['cin_proprietaire'];
        $permis_proprietaire = $_POST['permis_proprietaire'];
        $nom_chauffeur = $_POST['nom_chauffeur'];
        $prenoms_chauffeur = $_POST['prenoms_chauffeur'];
        $cin_chauffeur = $_POST['cin_chauffeur'];
        $permis_chauffeur = $_POST['permis_chauffeur'];
        $nombre_passagers = $_POST['nombre_passagers'];
        $provenance = $_POST['provenance'];
        $destination = $_POST['destination'];
        $photo_vehicule = $_FILES['photo_vehicule']['name'];
            

        // Enregistrer la photo
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["photo_vehicule"]["name"]);
        move_uploaded_file($_FILES["photo_vehicule"]["tmp_name"], $target_file);

        

        // SQL pour insérer les données
        $sql = "INSERT INTO vehicule (immatriculation, marque, nom_proprietaire, prenoms_proprietaire, cin_proprietaire, permis_proprietaire, nom_chauffeur, prenoms_chauffeur, cin_chauffeur, permis_chauffeur, nombre_passagers, provenance, destination, photo_vehicule)
        VALUES ('$immatriculation', '$marque', '$nom_proprietaire', '$prenoms_proprietaire', '$cin_proprietaire', '$permis_proprietaire', '$nom_chauffeur', '$prenoms_chauffeur', '$cin_chauffeur', '$permis_chauffeur', '$nombre_passagers', '$provenance', '$destination', '$photo_vehicule')";

        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }

}

    mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement de Véhicule</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#marque').select2({
                placeholder: "Sélectionnez une marque",
                allowClear: true
            });
        });

        $(document).ready(function() {
        $('#provenance').select2({
            placeholder: "Sélectionnez un pays",
            allowClear: true
        });
    });

        $(document).ready(function() {
        $('#destination').select2({
            placeholder: "Sélectionnez un pays",
            allowClear: true
        });
    });
    </script>

    <style type="text/css">
      
    </style>
</head>
<body>
    
        <button type="button" onclick="window.location.href = 'index.php';">Rechercher</button>
        
    <h1>Formulaire</h1>
    <form action="Record.php" method="post" enctype="multipart/form-data">
        <label for="immatriculation">Immatriculation :</label>
        <br>

        <input type="text" id="immatriculation" name="immatriculation" required>
        <br>

        <label for="marque">Marque du véhicule :</label>
        <br>

        <select id="marque" name="marque" required>
            <!-- Liste des marques avec la possibilité de recherche -->
             <option value="">Sélectionnez une marque</option>
            <option value="Acura">Acura</option>
            <option value="Alfa Romeo">Alfa Romeo</option>
            <option value="Aston Martin">Aston Martin</option>
            <option value="Audi">Audi</option>
            <option value="Bentley">Bentley</option>
            <option value="BMW">BMW</option>
            <option value="Bugatti">Bugatti</option>
            <option value="Buick">Buick</option>
            <option value="Cadillac">Cadillac</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Chrysler">Chrysler</option>
            <option value="Citroën">Citroën</option>
            <option value="Dacia">Dacia</option>
            <option value="Daewoo">Daewoo</option>
            <option value="Daihatsu">Daihatsu</option>
            <option value="Dodge">Dodge</option>
            <option value="Ferrari">Ferrari</option>
            <option value="Fiat">Fiat</option>
            <option value="Ford">Ford</option>
            <option value="Genesis">Genesis</option>
            <option value="GMC">GMC</option>
            <option value="Honda">Honda</option>
            <option value="Hummer">Hummer</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Infiniti">Infiniti</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Jaguar">Jaguar</option>
            <option value="Jeep">Jeep</option>
            <option value="Kia">Kia</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="Lancia">Lancia</option>
            <option value="Land Rover">Land Rover</option>
            <option value="Lexus">Lexus</option>
            <option value="Lincoln">Lincoln</option>
            <option value="Lotus">Lotus</option>
            <option value="Maserati">Maserati</option>
            <option value="Mazda">Mazda</option>
            <option value="McLaren">McLaren</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="Mini">Mini</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Nissan">Nissan</option>
            <option value="Opel">Opel</option>
            <option value="Pagani">Pagani</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Porsche">Porsche</option>
            <option value="RAM">RAM</option>
            <option value="Renault">Renault</option>
            <option value="Rolls-Royce">Rolls-Royce</option>
            <option value="Saab">Saab</option>
            <option value="Subaru">Subaru</option>
            <option value="Suzuki">Suzuki</option>
            <option value="Tesla">Tesla</option>
            <option value="Toyota">Toyota</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Volvo">Volvo</option>
            <!-- Marques historiques ou rares -->
            <option value="DeLorean">DeLorean</option>
            <option value="Koenigsegg">Koenigsegg</option>
            <option value="Maybach">Maybach</option>
            <option value="Plymouth">Plymouth</option>
            <option value="Pontiac">Pontiac</option>
            <option value="Rover">Rover</option>
            <option value="SEAT">SEAT</option>
            <option value="Skoda">Skoda</option>
            <option value="Spyker">Spyker</option>
            <option value="Tata">Tata</option>
            <option value="Vauxhall">Vauxhall</option>
            <option value="Wiesmann">Wiesmann</option>
        </select>
        <br>
        <br>

        <label for="nom_proprietaire">Nom du propriétaire :</label>
        <br>
        <input type="text" id="nom_proprietaire" name="nom_proprietaire" required>
        <br>

        <label for="prenoms_proprietaire">Prénoms du propriétaire :</label>
        <br>
        <input type="text" id="prenoms_proprietaire" name="prenoms_proprietaire" required>
        <br>

        <label for="cin_proprietaire">Numéro de carte d'identité du propriétaire :</label>
        <br>
        <input type="text" id="cin_proprietaire" name="cin_proprietaire" required>
        <br>

        <label for="permis_proprietaire">Numéro du permis de conduire du propriétaire :</label>
        <br>
        <input type="text" id="permis_proprietaire" name="permis_proprietaire" required>
        <br>

        <label for="nom_chauffeur">Nom du chauffeur :</label>
        <br>
        <input type="text" id="nom_chauffeur" name="nom_chauffeur" required>
        <br>

        <label for="prenoms_chauffeur">Prénoms du chauffeur :</label>
        <br>
        <input type="text" id="prenoms_chauffeur" name="prenoms_chauffeur" required>
        <br>

        <label for="cin_chauffeur">Numéro de carte d'identité du chauffeur :</label>
        <br>
        <input type="text" id="cin_chauffeur" name="cin_chauffeur" required>
        <br>

        <label for="permis_chauffeur">Numéro du permis de conduire du chauffeur :</label>
        <br>
        <input type="text" id="permis_chauffeur" name="permis_chauffeur" required>
        <br>

        <label for="nombre_passagers">Nombre de passagers à bord :</label>
        <br>
        <input type="number" id="nombre_passagers" name="nombre_passagers" required>
        <br>

        <label for="provenance">Provenance :</label>
        <br>
        <select id="provenance" name="provenance" required>
            <!-- Liste des pays avec la possibilité de recherche -->
            <option value="">Sélectionnez un pays</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Albanie">Albanie</option>
            <option value="Algérie">Algérie</option>
            <option value="Andorre">Andorre</option>
            <option value="Angola">Angola</option>
            <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
            <option value="Argentine">Argentine</option>
            <option value="Arménie">Arménie</option>
            <option value="Australie">Australie</option>
            <option value="Autriche">Autriche</option>
            <option value="Azerbaïdjan">Azerbaïdjan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahreïn">Bahreïn</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbade">Barbade</option>
            <option value="Biélorussie">Biélorussie</option>
            <option value="Belgique">Belgique</option>
            <option value="Belize">Belize</option>
            <option value="Bénin">Bénin</option>
            <option value="Bhoutan">Bhoutan</option>
            <option value="Bolivie">Bolivie</option>
            <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
            <option value="Botswana">Botswana</option>
            <option value="Brésil">Brésil</option>
            <option value="Brunei">Brunei</option>
            <option value="Bulgarie">Bulgarie</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cabo Verde">Cabo Verde</option>
            <option value="Cambodge">Cambodge</option>
            <option value="Cameroun">Cameroun</option>
            <option value="Canada">Canada</option>
            <option value="République centrafricaine">République centrafricaine</option>
            <option value="Tchad">Tchad</option>
            <option value="Chili">Chili</option>
            <option value="Chine">Chine</option>
            <option value="Colombie">Colombie</option>
            <option value="Comores">Comores</option>
            <option value="Congo">Congo</option>
            <option value="République Démocratique du Congo">République Démocratique du Congo</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croatie">Croatie</option>
            <option value="Cuba">Cuba</option>
            <option value="Chypre">Chypre</option>
            <option value="République Tchèque">République Tchèque</option>
            <option value="Danemark">Danemark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominique">Dominique</option>
            <option value="République Dominicaine">République Dominicaine</option>
            <option value="Timor-Leste">Timor-Leste</option>
            <option value="Équateur">Équateur</option>
            <option value="Égypte">Égypte</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Guinée Équatoriale">Guinée Équatoriale</option>
            <option value="Érythrée">Érythrée</option>
            <option value="Estonie">Estonie</option>
            <option value="Eswatini">Eswatini</option>
            <option value="Éthiopie">Éthiopie</option>
            <option value="Fidji">Fidji</option>
            <option value="Finlande">Finlande</option>
            <option value="France">France</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambie">Gambie</option>
            <option value="Géorgie">Géorgie</option>
            <option value="Allemagne">Allemagne</option>
            <option value="Ghana">Ghana</option>
            <option value="Grèce">Grèce</option>
            <option value="Grenade">Grenade</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinée">Guinée</option>
            <option value="Guinée-Bissau">Guinée-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haïti">Haïti</option>
            <option value="Honduras">Honduras</option>
            <option value="Hongrie">Hongrie</option>
            <option value="Islande">Islande</option>
            <option value="Inde">Inde</option>
            <option value="Indonésie">Indonésie</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Irlande">Irlande</option>
            <option value="Israël">Israël</option>
            <option value="Italie">Italie</option>
            <option value="Jamaïque">Jamaïque</option>
            <option value="Japon">Japon</option>
            <option value="Jordanie">Jordanie</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Corée du Nord">Corée du Nord</option>
            <option value="Corée du Sud">Corée du Sud</option>
            <option value="Koweït">Koweït</option>
            <option value="Kirghizistan">Kirghizistan</option>
            <option value="Laos">Laos</option>
            <option value="Lettonie">Lettonie</option>
            <option value="Liban">Liban</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Libéria">Libéria</option>
            <option value="Libye">Libye</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lituanie">Lituanie</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaisie">Malaisie</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malte">Malte</option>
            <option value="Îles Marshall">Îles Marshall</option>
            <option value="Mauritanie">Mauritanie</option>
            <option value="Maurice">Maurice</option>
            <option value="Mexique">Mexique</option>
            <option value="Micronésie">Micronésie</option>
            <option value="Moldavie">Moldavie</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolie">Mongolie</option>
            <option value="Monténégro">Monténégro</option>
            <option value="Maroc">Maroc</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibie">Namibie</option>
            <option value="Nauru">Nauru</option>
            <option value="Népal">Népal</option>
            <option value="Pays-Bas">Pays-Bas</option>
            <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigéria">Nigéria</option>
            <option value="Macédoine du Nord">Macédoine du Nord</option>
            <option value="Norvège">Norvège</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palaos">Palaos</option>
            <option value="Panama">Panama</option>
            <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Pérou">Pérou</option>
            <option value="Philippines">Philippines</option>
            <option value="Pologne">Pologne</option>
            <option value="Portugal">Portugal</option>
            <option value="Qatar">Qatar</option>
            <option value="Roumanie">Roumanie</option>
            <option value="Russie">Russie</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint-Christophe-et-Niévès">Saint-Christophe-et-Niévès</option>
            <option value="Sainte-Lucie">Sainte-Lucie</option>
            <option value="Saint-Vincent-et-les-Grenadines">Saint-Vincent-et-les-Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="Saint-Marin">Saint-Marin</option>
            <option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option>
            <option value="Arabie Saoudite">Arabie Saoudite</option>
            <option value="Sénégal">Sénégal</option>
            <option value="Serbie">Serbie</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapour">Singapour</option>
            <option value="Slovaquie">Slovaquie</option>
            <option value="Slovénie">Slovénie</option>
            <option value="Îles Salomon">Îles Salomon</option>
            <option value="Somalie">Somalie</option>
            <option value="Afrique du Sud">Afrique du Sud</option>
            <option value="Soudan du Sud">Soudan du Sud</option>
            <option value="Espagne">Espagne</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Soudan">Soudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Suède">Suède</option>
            <option value="Suisse">Suisse</option>
            <option value="Syrie">Syrie</option>
            <option value="Taïwan">Taïwan</option>
            <option value="Tadjikistan">Tadjikistan</option>
            <option value="Tanzanie">Tanzanie</option>
            <option value="Thaïlande">Thaïlande</option>
            <option value="Togo">Togo</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinité-et-Tobago">Trinité-et-Tobago</option>
            <option value="Tunisie">Tunisie</option>
            <option value="Turquie">Turquie</option>
            <option value="Turkménistan">Turkménistan</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Ouganda">Ouganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="Émirats Arabes Unis">Émirats Arabes Unis</option>
            <option value="Royaume-Uni">Royaume-Uni</option>
            <option value="États-Unis">États-Unis</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Ouzbékistan">Ouzbékistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Vatican">Vatican</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Yémen">Yémen</option>
            <option value="Zambie">Zambie</option>
            <option value="Zimbabwe">Zimbabwe</option>
        </select>
        <br>
        <br>

        <label for="destination">Destination :</label>
        <br>
        <select id="destination" name="destination" required>
            <!-- Liste des pays avec la possibilité de recherche -->
            <option value="">Sélectionnez un pays</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Albanie">Albanie</option>
            <option value="Algérie">Algérie</option>
            <option value="Andorre">Andorre</option>
            <option value="Angola">Angola</option>
            <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
            <option value="Argentine">Argentine</option>
            <option value="Arménie">Arménie</option>
            <option value="Australie">Australie</option>
            <option value="Autriche">Autriche</option>
            <option value="Azerbaïdjan">Azerbaïdjan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahreïn">Bahreïn</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbade">Barbade</option>
            <option value="Biélorussie">Biélorussie</option>
            <option value="Belgique">Belgique</option>
            <option value="Belize">Belize</option>
            <option value="Bénin">Bénin</option>
            <option value="Bhoutan">Bhoutan</option>
            <option value="Bolivie">Bolivie</option>
            <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
            <option value="Botswana">Botswana</option>
            <option value="Brésil">Brésil</option>
            <option value="Brunei">Brunei</option>
            <option value="Bulgarie">Bulgarie</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cabo Verde">Cabo Verde</option>
            <option value="Cambodge">Cambodge</option>
            <option value="Cameroun">Cameroun</option>
            <option value="Canada">Canada</option>
            <option value="République centrafricaine">République centrafricaine</option>
            <option value="Tchad">Tchad</option>
            <option value="Chili">Chili</option>
            <option value="Chine">Chine</option>
            <option value="Colombie">Colombie</option>
            <option value="Comores">Comores</option>
            <option value="Congo">Congo</option>
            <option value="République Démocratique du Congo">République Démocratique du Congo</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croatie">Croatie</option>
            <option value="Cuba">Cuba</option>
            <option value="Chypre">Chypre</option>
            <option value="République Tchèque">République Tchèque</option>
            <option value="Danemark">Danemark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominique">Dominique</option>
            <option value="République Dominicaine">République Dominicaine</option>
            <option value="Timor-Leste">Timor-Leste</option>
            <option value="Équateur">Équateur</option>
            <option value="Égypte">Égypte</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Guinée Équatoriale">Guinée Équatoriale</option>
            <option value="Érythrée">Érythrée</option>
            <option value="Estonie">Estonie</option>
            <option value="Eswatini">Eswatini</option>
            <option value="Éthiopie">Éthiopie</option>
            <option value="Fidji">Fidji</option>
            <option value="Finlande">Finlande</option>
            <option value="France">France</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambie">Gambie</option>
            <option value="Géorgie">Géorgie</option>
            <option value="Allemagne">Allemagne</option>
            <option value="Ghana">Ghana</option>
            <option value="Grèce">Grèce</option>
            <option value="Grenade">Grenade</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinée">Guinée</option>
            <option value="Guinée-Bissau">Guinée-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haïti">Haïti</option>
            <option value="Honduras">Honduras</option>
            <option value="Hongrie">Hongrie</option>
            <option value="Islande">Islande</option>
            <option value="Inde">Inde</option>
            <option value="Indonésie">Indonésie</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Irlande">Irlande</option>
            <option value="Israël">Israël</option>
            <option value="Italie">Italie</option>
            <option value="Jamaïque">Jamaïque</option>
            <option value="Japon">Japon</option>
            <option value="Jordanie">Jordanie</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Corée du Nord">Corée du Nord</option>
            <option value="Corée du Sud">Corée du Sud</option>
            <option value="Koweït">Koweït</option>
            <option value="Kirghizistan">Kirghizistan</option>
            <option value="Laos">Laos</option>
            <option value="Lettonie">Lettonie</option>
            <option value="Liban">Liban</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Libéria">Libéria</option>
            <option value="Libye">Libye</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lituanie">Lituanie</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaisie">Malaisie</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malte">Malte</option>
            <option value="Îles Marshall">Îles Marshall</option>
            <option value="Mauritanie">Mauritanie</option>
            <option value="Maurice">Maurice</option>
            <option value="Mexique">Mexique</option>
            <option value="Micronésie">Micronésie</option>
            <option value="Moldavie">Moldavie</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolie">Mongolie</option>
            <option value="Monténégro">Monténégro</option>
            <option value="Maroc">Maroc</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibie">Namibie</option>
            <option value="Nauru">Nauru</option>
            <option value="Népal">Népal</option>
            <option value="Pays-Bas">Pays-Bas</option>
            <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigéria">Nigéria</option>
            <option value="Macédoine du Nord">Macédoine du Nord</option>
            <option value="Norvège">Norvège</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palaos">Palaos</option>
            <option value="Panama">Panama</option>
            <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Pérou">Pérou</option>
            <option value="Philippines">Philippines</option>
            <option value="Pologne">Pologne</option>
            <option value="Portugal">Portugal</option>
            <option value="Qatar">Qatar</option>
            <option value="Roumanie">Roumanie</option>
            <option value="Russie">Russie</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint-Christophe-et-Niévès">Saint-Christophe-et-Niévès</option>
            <option value="Sainte-Lucie">Sainte-Lucie</option>
            <option value="Saint-Vincent-et-les-Grenadines">Saint-Vincent-et-les-Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="Saint-Marin">Saint-Marin</option>
            <option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option>
            <option value="Arabie Saoudite">Arabie Saoudite</option>
            <option value="Sénégal">Sénégal</option>
            <option value="Serbie">Serbie</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapour">Singapour</option>
            <option value="Slovaquie">Slovaquie</option>
            <option value="Slovénie">Slovénie</option>
            <option value="Îles Salomon">Îles Salomon</option>
            <option value="Somalie">Somalie</option>
            <option value="Afrique du Sud">Afrique du Sud</option>
            <option value="Soudan du Sud">Soudan du Sud</option>
            <option value="Espagne">Espagne</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Soudan">Soudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Suède">Suède</option>
            <option value="Suisse">Suisse</option>
            <option value="Syrie">Syrie</option>
            <option value="Taïwan">Taïwan</option>
            <option value="Tadjikistan">Tadjikistan</option>
            <option value="Tanzanie">Tanzanie</option>
            <option value="Thaïlande">Thaïlande</option>
            <option value="Togo">Togo</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinité-et-Tobago">Trinité-et-Tobago</option>
            <option value="Tunisie">Tunisie</option>
            <option value="Turquie">Turquie</option>
            <option value="Turkménistan">Turkménistan</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Ouganda">Ouganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="Émirats Arabes Unis">Émirats Arabes Unis</option>
            <option value="Royaume-Uni">Royaume-Uni</option>
            <option value="États-Unis">États-Unis</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Ouzbékistan">Ouzbékistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Vatican">Vatican</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Yémen">Yémen</option>
            <option value="Zambie">Zambie</option>
            <option value="Zimbabwe">Zimbabwe</option>

        </select>
        <br>
        <br>

        <label for="photo_vehicule">Photo du véhicule :</label>
        <br>
        <input type="file" id="photo_vehicule" name="photo_vehicule" accept="image/*" required>
        <br>
        <br>
        <br>

        <button type="submit">Enregistrer</button>
    </form>

    <script>
    function success(){
        alert("Form Submitted Succesfully!")
    }
</script>

</body>
</html>