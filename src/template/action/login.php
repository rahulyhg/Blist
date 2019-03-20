<?php /** @var \Blist\Core\View $this */ ?>
<?php require_once __DIR__ . '/../header.php'; ?>

    <div class="container">
        <h1>Please log in!</h1>

        <?php require_once __DIR__ . '/../component/flashes.php' ?>

        <form action="<?= $this->url('User', 'loginSubmit') ?>" method="post">
            <div class="group">
                <label for="username" class="label">Username:</label>
                <input type="text" id="username" name="username" required="required" class="input">
            </div>
            <div class="group">
                <label for="password" class="label">Password:</label>
                <input type="password" id="password" name="password" required="required" class="input">
            </div>
            <div class="group">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn">
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../footer.php'; ?>