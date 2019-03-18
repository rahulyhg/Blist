<?php /** @var \Blist\Core\View $this */ ?>
<?php require_once __DIR__ . '/../header.php'; ?>

    <div class="container">
        <h1>Hello, World</h1>
        <a href="<?= $this->url('App', 'post') ?>">Test Url!</a>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque delectus deserunt nemo tempora voluptatibus.
            Deserunt dicta ducimus fugit harum labore odio omnis quod repellat unde voluptatibus. Cumque eum laborum
            vero.</p>

        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>isActive</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var \Blist\Entity\UserEntity $user */ ?>
            <?php foreach ($this->params->users as $user): ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getUsername() ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?php if ($user->isActive()): ?>Active<?php else: ?>Disabled<?php endif; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../footer.php'; ?>