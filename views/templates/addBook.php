<?php /* Cette page permet à l'utilisateur de modifier les informations d'un livre */ ?>
<div class="modifyBookPage addBookPage">
    <div class="bgOverflow">
        <div class="breadcrumb"> <h5> <a href="?action=myAccount"><i class="fa-solid fa-arrow-left"></i> retour</h5></a></div>
        <div class="title"><h1> Ajouter un livre </h1></div>
        <div class="modifyBookContent">
            <form action="?action=addBook" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="">
                <div class="modifyBook modifyCard">
                    <div class="myAccountFormBox">
                        <h4>Titre</h4>
                        <input class="modifyInput" type="text" name="title" value="">
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Auteur</h4>
                        <input class="modifyInput" type="text" name="author" value="">
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Description</h4>
                        <textarea class="form" name="description" rows="20"></textarea>
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Disponibilité</h4>
                        <select class="form selectorPadding" name="availability">
                            <option value="disponible">Disponible</option>
                            <option value="non dispo.">Non Disponible</option>
                        </select>
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Photo</h4>
                        <label class="uploadLabel" for="file-upload">Importer une photo</label>
                        <input id="file-upload" type="file" name="cover">
                    </div>
                    <button type="submit" class="mainButton">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
