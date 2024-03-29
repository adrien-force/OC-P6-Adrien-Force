<?php
/** Page affichant le detail d'une livre */
?>
<div class="detailBookPage">
    <div class="breadcrumb"> Nos livres > <?= $book->getTitle() ?> </div>
    <div class="bgOverflow">
    <div class="detailBookContent">
        <div class="photoSide">
            <img src="ressources/assets/book1.png">
        </div>
        <div class="detailBook">
            <h2> The Kinkfolk Table </h2>
            <h4> par Nathan Williams </h4>
            <div class="separationLine"></div>
            <h3> DESCRIPTION </h3>
            <p> J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre
                captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager
                des moments authentiques autour de la table. <br>

                Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans
                un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de
                la convivialité. <br>

                Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres
                chers. <br>

                'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain
                que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres
                inspirantes. </p>
            <div class="owner">
                <h3> Propriétaire </h3>
            <div class="ownerBubble">
                <img src="ressources/assets/hamza.png">
                <h5> Hamza </h5>
            </div>
            </div>
            <a class="mainButton">Envoyer un message</a>
        </div>
    </div>
    </div>
</div>