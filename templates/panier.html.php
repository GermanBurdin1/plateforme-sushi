<?php require 'templates/inc.top.html.php'; ?>
<div class="container">
    <h1 class="mt-5">Panier</h1>
    <?php if(isset($_SESSION['message'])): ?>
    <div
        class="alert alert-success"
        role="alert"
    >
        <p class="mb-0"><?= $_SESSION['message'] ?></p>
    </div>
    <?php endif; ?>


    <?php if(count($cart) > 0): ?>
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
        <tbody>
            <?php foreach ($cart as $product): ?>
            <tr>
                <td><img src="<?= $product['photo'] ?>" alt="" class="img-fluid" width="100"></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['qty'] ?></td>
                <td><?= $product['price'] ?> €</td>
                <td><?= $product['total'] ?> €</td>
                <td>
                    <form action="/scripts/remove-to-cart.php" method="post">
                        <input type="hidden" name="meal_id" value="<?= $product['meal_id'] ?>">
                        <button type="submit" name="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end"><strong>Total : </strong></td>
                <td><?= number_format($totalCart,2) ?> €</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <div class="text-end">
        <button class="btn btn-primary">Passer la commande</button>
    </div>
    <?php else: ?>
    <div
        class="alert alert-info"
        role="alert"
    >
        Votre panier est vide... Achetez svp..
    </div>
    <?php endif; ?>


</div>
<?php require 'templates/inc.bottom.html.php'; ?>
