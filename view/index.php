<?php
$db = new Database();
$notas = $db->get_many('notas');
$options = [
    "pendente",
    "concluido",
    "vistoria"
];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="./view/script.js"></script>

    <link rel="stylesheet" href="./view/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="add">
        <button class="button" href="routes/add.php">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <div class="notas">
        <?php foreach ($notas as $nota): ?>
        <div class="nota with-fade id-<?= $nota['id'] ?>">
            <div class="header">
                <div class="titulo">
                    <input type="text" value="<?= $nota['titulo'] ?>">
                </div>
                <div class="categoria">
                    <select name="categoria" class="categoria">
                        <?php foreach ($options as $option): ?>
                        <option <?php if ($nota['categoria'] == $option) echo "selected" ?> value="<?= $option ?>"><?= $option ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="content">
                <textarea name="conteudo" class="conteudo"><?= $nota['conteudo'] ?></textarea>
                <div class="acoes">
                    <button onclick="edit(<?= $nota['id'] ?>)" type="button" class="salvar">
                        <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                    <button onclick="remove(<?= $nota['id'] ?>)" type="button" class="excluir">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</body>
</html>