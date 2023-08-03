<?php $title = "Posts"; ?>

<?php ob_start(); ?>

<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <div class="">
        <h3>
            <?= htmlspecialchars($post['titre']) ?>
            <em>le <?= $post['date_creation'] ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['contenu'])) ?>
        </p>
    </div>
</div>

<form class ="add-comment" action="index.php?action=addComment&id=<?=$post['id'] ?>" method="POST">
    <fieldset>
        <legend>Commentaires</legend>
        <div>
            <label for="author">Auteur :</label>
            <input type="text" id="author" name="author"> 
            <br>
        </div>
        <div>
            <input type="text" id="comment" name="comment" class="comment-text" placeholder="Laissez un commentaire...">
            <!--<span class="textarea" role="textbox" contenteditable></span> -->
        </div>
        <div><input type="submit" value="commenter"></div>
    </fieldset>
</form>

<div class="zone-comment">
    <?php
    foreach ($comments as $comment) {
    ?>
    <div class="posted-comment">
        <div class="post-com-auth">
                <span><strong><?= htmlspecialchars($comment['author']) ?></strong></span>
                <span class="date-com"><em><?= $comment['date_creation'] ?></em></span>
        </div>
        <div>
                <span class="post-com-content"><?= nl2br(htmlspecialchars($comment['comment'])) ?></span>
        </div>
    </div>
    <?php } ?>
</div>



<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
