<?php require 'templates/inc.top.html.php'; ?>

    <div class="container">

        <h1 class="mb-4">Plats</h1>

        <?php if(isset($resultCount)): ?>
        <h2 class="mb-4"><?= $resultCount; ?> résultats correspondants à votre recherche "<?= $search ?>".</h2>
        <?php endif; ?>

        <div class="row">
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
        </div>

        <div class="">
            <nav aria-label="Page navigation ">
                <ul
                    class="pagination justify-content-center"
                >
                    <li class="page-item <?= $currentPage - 1 <= 0 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $currentPage - 1 : '/?page=' . $currentPage - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php for($i=1;$i<=$nbPages;$i++) :?>
                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $i : '/?page=' . $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>

                    <li class="page-item <?= $currentPage + 1 > $nbPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $currentPage + 1 : '/?page=' . $currentPage + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        

    </div>
<?php require 'templates/inc.bottom.html.php'; ?>