<?php require __DIR__ . '/../cabecalho-html.php'; ?>

<a href="/novo-curso" class="btn btn-primary mb-2">
	Novo Curso
</a>
<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item">
            <?= $curso->getDescricao(); ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../rodape-html.php'; ?>