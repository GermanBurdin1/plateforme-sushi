<?php require 'templates/inc.top.html.php'; ?>

    <div class="container">

        <h1 class="mb-4"><?= $categorie['name'] ?></h1>

        <p><?= $categorie['description'] ?></p>

        <div class="row">
            <?php if(count($meals) > 0): ?>
            <?php foreach($meals as $indice => $meal): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100" 
                    data-aos="fade-down">
                    <img src="<?= $meal['photo'] ?>" class="card-img-top" alt="<?= $meal['name'] ?>">
                    <div class="card-body">
                        <h3><?= $meal['name'] ?></h3>
                        <p><?= $meal['price'] ?> €</p>
                    </div>
                    <div class="card-footer">
                        <a href="/details.php?id=<?= $meal['id_meal'] ?>" class="btn btn-primary">Voir details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="col">
                <div
                    class="alert alert-info"
                    role="alert"
                >
                   <p>Aucun plat à vous proposer pour le momment.. Nous en sommes navrés.</p>
                   <p class="mb-0">Vous pouvez consulter toutefois nos autres spécialités <a href="/categories.php">ici</a></p>
                </div>
                
            </div>
            <?php endif; ?>
        </div>

    </div>
<?php require 'templates/inc.bottom.html.php'; ?>