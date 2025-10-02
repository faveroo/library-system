<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .container {
            text-align: center;
        }
        h1 { font-size: 3em; margin: 0; }
        p { font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Sistema Funcionando!</h1>
        <p><?= $title ?></p>
        <p>Projeto: <?= Config::APP_NAME ?></p>
        <p>URL Base: <?= Config::BASE_URL ?></p>
    </div>
</body>
</html>