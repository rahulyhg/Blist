<?php /** @var \Blist\Core\View $this */ ?>
<?php require_once __DIR__ . '/../header.php'; ?>

    <div class="container">
        <h1>Please log in!</h1>

        <?php require_once __DIR__ . '/../component/flashes.php' ?>

        <form action="<?= $this->url('User', 'loginSubmit') ?>" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required="required">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required="required">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="Submit">
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../footer.php'; ?>