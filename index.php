<?php include "parts/head.php"; ?>
<body>
    <?php include "parts/header.php"; ?>
    <main class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Música</th>
                    <th>Banda</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pathDb = "musicas.sqlite";
                $connection = new PDO("sqlite:".$pathDb);
                $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $prepare = $connection->query("select * from musicas");
                $musicas = $prepare->fetchAll();
                foreach($musicas as $m):
                ?>
                    <tr>
                        <td><?= $m->id; ?></td>
                        <td><?= $m->nome; ?></td>
                        <td><?= $m->banda; ?></td>
                        <td>
                            <a href="form_update.php?id=<?=$m->id?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="ws/delete.php?id=<?=$m->id?>" class="btn btn-danger">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>