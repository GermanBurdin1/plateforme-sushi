<?php require '../templates/inc.top.html.php'; ?>
<div class="container">
    <h1>Commande N°<?= $order['id_order'] ?> du <?= date_format(date_create($order['date_order']), 'd/m/Y') ?></h1>

    <div class="row">
        <div class="col-12 col-md-6">
            <strong>Adresse de facturation</strong>
            <p><?= $addresses['billing']['number'] ?> <?= $addresses['billing']['street'] ?> <?= $addresses['billing']['zip_code'] ?> <?= $addresses['billing']['city'] ?></p>
        </div>
        <div class="col-12 col-md-6">
            <strong>Adresse de livraison</strong>
            <p><?= $addresses['delivery']['number'] ?> <?= $addresses['delivery']['street'] ?> <?= $addresses['delivery']['zip_code'] ?> <?= $addresses['delivery']['city'] ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <?php if (count($meals) > 0) : ?>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix unitaire</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($meals as $product) : ?>
                            <tr>
                                <td><img src="/<?= $product['photo'] ?>" alt="" class="img-fluid" width="100"></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['qty'] ?></td>
                                <td><?= $product['price'] ?> €</td>
                                <td><?= $product['price'] * $product['qty'] ?> €</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total : </strong></td>
                            <td><?= number_format($orderTotal, 2) ?> €</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            <?php endif; ?>

            <div class="text-end">
                <button type="button" class="btn btn-lg btn-primary">Payer la commande</button>
            </div>
        </div>
    </div>
</div>
<?php require '../templates/inc.bottom.html.php'; ?>