<html>
    <head>
        <title>Hangman</title>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta property="og:title" content="Hangman">
        <meta property="og:type" content="game">
        <meta property="og:url" content="https://">
        <meta property="og:image" content="https://">    
        <meta property="og:site_name" content="Hangman">
        <meta property="og:description" content="A word game in which one player selects a word that the other player must guess by supplying each of its letters: for each incorrect guess a part of a stick figure of a hanged man is drawn.">
        
        <meta name="description" content="A word game in which one player selects a word that the other player must guess by supplying each of its letters: for each incorrect guess a part of a stick figure of a hanged man is drawn.">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/roleta.js"></script>
        <script type="text/javascript" src="js/forca.js"></script>
    </head>
    <body>
        <p>
            Meus Pontos: <span id="pontos">0</span>
        </p>
        <p>
            Tentativas: <span id="erros">0</span>
        </p>
        <p>
            Letras Usadas: <span id="letras"></span>
        </p>
        <p>
            <input type="text" id="entrada" size="2" maxlength="1" />
            <button id="enviar">Enviar</button>
            <button id="novo">Novo Jogo</button>
        </p>
        <canvas id="canvas" width="500" height="500"></canvas>
        <button id="girar">Girar Roleta</button>
    </body>
</html>