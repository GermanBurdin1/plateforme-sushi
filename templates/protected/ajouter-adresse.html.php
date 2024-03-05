<?php require '../templates/inc.top.html.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <h1>Ajout d'une nouvelle adresse</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="number" class="form-label">Numéro de rue</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['number']) ? 'is-invalid' : '' ?>" name="address[requireds][number]" id="number" required placeholder="ex: 86">
                    <?php if(isset($errors) && !empty($errors['number'])): ?>
                        <div class="invalid-feedback d-block">
                        <?= $errors['number'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="street" class="form-label">Libellé de la voie</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['street']) ? 'is-invalid' : '' ?>" name="address[requireds][street]" id="street" required placeholder="ex: rue des sushis">
                    <?php if(isset($errors) && !empty($errors['street'])): ?>
                        <div class="invalid-feedback d-block">
                        <?= $errors['street'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="zip_code" class="form-label">Code postal</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['zip_code']) ? 'is-invalid' : '' ?>" name="address[requireds][zip_code]" id="zip_code" required placeholder="ex: 57000">
                    <?php if(isset($errors) && !empty($errors['zip_code'])): ?>
                        <div class="invalid-feedback d-block">
                        <?= $errors['zip_code'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Ville</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['city']) ? 'is-invalid' : '' ?>" name="address[requireds][city]" id="city" required placeholder="ex: METZ">
                    <?php if(isset($errors) && !empty($errors['city'])): ?>
                        <div class="invalid-feedback d-block">
                        <?= $errors['city'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary" name="address_form_submit">Enregistrer l'adresse</button>

            </form>
        </div>
    </div>
</div>
<?php require '../templates/inc.bottom.html.php'; ?>
