<?php require 'templates/inc.top.html.php'; ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <h1>Connexion</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= isset($errors) && !empty($errors['email']) ? 'is-invalid' : '' ?>" name="email" id="email" aria-describedby="emailHelp" required placeholder="ex: john.doe@email.fr">
                    <?php if(isset($errors) && !empty($errors['email'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control <?= isset($errors) && !empty($errors['password']) ? 'is-invalid' : '' ?>" name="password" id="password" aria-describedby="passwordHelp" minlength="16" required>
                    <?php if(isset($errors) && !empty($errors['password'])): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['password'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" name="login_form_submit">Se connecter</button>
            </form>
        </div>
    </div>
</div>
<?php require 'templates/inc.bottom.html.php'; ?>