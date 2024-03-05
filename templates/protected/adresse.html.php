<?php require '../templates/inc.top.html.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="" method="POST">
                <fieldset>
                    <legend>Adresse de facturation</legend>
                    <?php foreach ($addresses as $address) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="billing_address" id="billingAddress<?= $address['id_address'] ?>">
                            <label class="form-check-label" for="billingAddress<?= $address['id_address'] ?>">
                                <?= $address['number'] ?> <?= $address['street'] ?> <?= $address['zip_code'] ?> <?= $address['city'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </fieldset>

                <fieldset>
                    <legend>Adresse de livraison</legend>
                    <?php foreach ($addresses as $address) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery_address" id="deliveryAddress<?= $address['id_address'] ?>">
                            <label class="form-check-label" for="deliveryAddress<?= $address['id_address'] ?>">
                                <?= $address['number'] ?> <?= $address['street'] ?> <?= $address['zip_code'] ?> <?= $address['city'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </fieldset>
            </form>

            <p><a href="/protected/ajouter-adresse.php">Ajouter une nouvelle adresse</a></p>
        </div>
    </div>
</div>

<?php require '../templates/inc.bottom.html.php'; ?>