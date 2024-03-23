<?php require '../templates/inc.top.html.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <p><a href="/protected/ajouter-adresse.php">Ajouter une nouvelle adresse</a></p>
            <form action="" method="POST">
                <fieldset class="mb-4">
                    <legend>Adresse de facturation</legend>
                    <?php foreach ($addresses as $address) : ?>
                        <div class="form-check">
                            <input class="form-check-input" 
                            type="radio" 
                            name="billing_address" 
                            id="billingAddress<?= $address['id_address'] ?>"
                            value="<?= $address['id_address'] ?>"
                            >
                            <label class="form-check-label" for="billingAddress<?= $address['id_address'] ?>">
                                <?= $address['number'] ?> <?= $address['street'] ?> <?= $address['zip_code'] ?> <?= $address['city'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <?php if(isset($errors) && !empty($errors['billing_address'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['billing_address'] ?>
                        </div>
                    <?php endif; ?>
                </fieldset>

                <fieldset class="mb-4">
                    <legend>Adresse de livraison</legend>
                    <?php foreach ($addresses as $address) : ?>
                        <div class="form-check">
                            <input class="form-check-input" 
                            type="radio" 
                            name="delivery_address" 
                            id="deliveryAddress<?= $address['id_address'] ?>"
                            value="<?= $address['id_address'] ?>"
                            >
                            <label class="form-check-label" for="deliveryAddress<?= $address['id_address'] ?>">
                                <?= $address['number'] ?> <?= $address['street'] ?> <?= $address['zip_code'] ?> <?= $address['city'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <?php if(isset($errors) && !empty($errors['delivery_address'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['delivery_address'] ?>
                        </div>
                    <?php endif; ?>
                </fieldset>

                <input type="submit" class="btn btn-primary" value="Passer la commande">
            </form>

        </div>
    </div>
</div>

<?php require '../templates/inc.bottom.html.php'; ?>