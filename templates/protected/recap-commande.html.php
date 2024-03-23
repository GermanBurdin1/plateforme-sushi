<?php require '../templates/inc.top.html.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
        <h1>Commande Numéro<?=$order['id_order']?> du <?=date_format(date_create($order['date_order']), 'd/m/Y') ?> </h1>
        
        <div class="row">
            <div class="col-12 col md-6"></div>
        </div>
        <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix unitaire</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        </div>
    </div>
</div>
<?php require '../templates/inc.bottom.html.php'; ?>