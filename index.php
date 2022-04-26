<?php 
require 'includes/header.php';
?>
<div class="container mt-3">
    <div class="row">
        <form action="order.php" method="POST">
            <div class="col-md">

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required>
                <div id="emailHelp" class="form-text">Use your e-mail when retrieving your sandwich.</div>
            </div>

            <div class="mb-3">
                <label for="sandwich" class="form-label">Your sandwich</label>
                <select class="form-select" name="type" required>
                    <option value="">Select your sandwiche</option>
                    <option value="4.5">Smos (€4.50)</option>
                    <option value="5">Martino (€5)</option>
                    <option value="6">Vegan (€6)</option>
                </select>
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" name="topping[]"> Mayo (€1)
                <input class="form-check-input" type="checkbox" value="2" name="topping[]"> Cocktail (€2)
                <input class="form-check-input" type="checkbox" value="3" name="topping[]"> Salad (€3)
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Order</button>
            </div>

            </div>
            <div class="col-md"></div>
        </form>
    </div>
</div>



<?php
require 'includes/footer.php';
?>