<?php /** @var \Blist\Core\View $this */ ?>
<div class="container">
    <hr>
    <div>
        <a class="btn" href="<?= $this->rootUrl() ?>"><?=$this->trans['footer.home']?></a>
        <a class="btn" href="<?= $this->url('List', 'index') ?>"><?=$this->trans['footer.app']?></a>
        <?php if (!$this->getUser()): ?>
            <a class="btn" href="<?= $this->url('User', 'login') ?>"><?=$this->trans['footer.login']?></a>
        <?php else: ?>
            <a class="btn" href="<?= $this->url('User', 'logout') ?>"><?=$this->trans['footer.logout']?></a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>