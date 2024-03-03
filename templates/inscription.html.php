<?php require 'templates/inc.top.html.php'; ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <h1>Inscription</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['lastname']) ? 'is-invalid' : '' ?>" name="lastname" id="lastname" required placeholder="ex: DOE">
                    <?php if(isset($errors) && !empty($errors['lastname'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['lastname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control <?= isset($errors) && !empty($errors['firstname']) ? 'is-invalid' : '' ?>" name="firstname" id="firstname" required placeholder="ex: John">
                    <?php if(isset($errors) && !empty($errors['firstname'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['firstname'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= isset($errors) && !empty($errors['email']) ? 'is-invalid' : '' ?>" name="email" id="email" aria-describedby="emailHelp" required placeholder="ex: john.doe@email.fr">
                    <div id="emailHelp" class="form-text">Votre email restera secret.</div>
                    <?php if(isset($errors) && !empty($errors['email'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control <?= isset($errors) && !empty($errors['password']) ? 'is-invalid' : '' ?>" name="password" id="password" aria-describedby="passwordHelp" minlength="16" required>
                    <div id="passwordHelp" class="form-text">Doit contenir au moins une lettre Majuscule et un caractère spécial (!,@,$,€,*,^,§,%,&).</div>
                    <?php if(isset($errors) && !empty($errors['password'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['password'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input  <?= isset($errors) && !empty($errors['cgu']) ? 'is-invalid' : '' ?>" id="cgu" name="cgu" required>
                    <label class="form-check-label" for="cgu">J'accepte les <a href="#">conditions générales d'utilisation</a>.</label>
                    <?php if(isset($errors) && !empty($errors['cgu'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['cgu'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" name="registering_form_submit">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
<?php require 'templates/inc.bottom.html.php'; ?>