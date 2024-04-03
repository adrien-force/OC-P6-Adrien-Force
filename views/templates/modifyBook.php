<?php /* Cette page permet à l'utilisateur de modifier les informations d'un livre */ ?>

<div class="modifyBookPage">

    <div class="bgOverflow">


        <div class="breadcrumb"> <h5> <i class="fa-solid fa-arrow-left"></i> retour</h5></div>

        <div class="title"><h1> Modifier les informations </h1></div>
        <div class="modifyBookContent">

            <div class="photoSide">
                <h4> Photo </h4>
                <img src="ressources/assets/bookTest.png">
                <span class="modifyPicLink"> <a class=""> Modifier la photo </a></span>

            </div>

            <div class="modifyBook modifyCard">
                <div class="myAccountFormBox">
                    <h4>
                        Titre
                    </h4>
                    <input type="text" value="The Kinkfolk Table">
                </div>
                <div class="myAccountFormBox">
                    <h4>
                        Auteur
                    </h4>
                    <input type="text" value="Nathan Williams">
                </div>
                <div class="myAccountFormBox">
                    <h4>
                        Description
                    </h4>
                    <textarea class="form" rows="20">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.

Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.

Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.

'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.</textarea>
                </div>
                <div class="myAccountFormBox">
                    <h4>
                        Disponibilité
                    </h4>
                    <select class="form selectorPadding" name="availability">
                        <option value="disponible">Disponible</option>
                        <option value="indisponible">Non Disponible</option>
                    </select>
                </div>
                <a class="mainButton">
                    Enregistrer
                </a>

            </div>

        </div>

    </div>

</div>