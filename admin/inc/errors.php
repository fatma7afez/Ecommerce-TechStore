<?php if ($session->has("errors")) : ?>
    <div class="alert alert-danger">
        <?php foreach ($session->get("errors") as $error) : ?>
            <p class="text-danger mb-0">
                <?= $error; ?>
            </p>
        <?php endforeach; ?>
    </div>
<?php endif;
$session->remove("errors"); ?>