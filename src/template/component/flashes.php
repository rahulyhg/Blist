<?php /** @var \Blist\Core\View $this */ ?>
<?php foreach (\Blist\Core\View::getFlashes() as $flash): ?>
    <div class="flash <?=$flash[0]?>"><?=$flash[1]?></div>
<?php endforeach; ?>
