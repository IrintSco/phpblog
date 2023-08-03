<?php $title = "Modification de commentaire"; ?>

<?php ob_start(); ?>

<form class ="form-comment" action="index.php?action=updateComment" method="POST">
    <input type="hidden" name="idPost" value="<?= $comment->idPost ?>">
    <input type="hidden" name="idComment" value="<?= $comment->id?>">
    
    <fieldset>
        <legend>Commentaires</legend>
        <div>
            <label for="author">Auteur : <?= $comment->author ?></label>
            <br>
        </div>
        <div>
            <input type="text" id="comment" name="comment" class="comment-text" placeholder="Laissez un commentaire..." value="<?= htmlspecialchars($comment->comment )?>">
            <!--<span class="textarea" role="textbox" contenteditable></span> -->
        </div>
        <div><input type="submit" value="Modifier"></div>
    </fieldset>
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>

