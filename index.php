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
        <script type="text/javascript">
            $(document).ready(function(){
                /**
                 * Lista de palavras do jogo
                 */
                var palavras = ['FACULDADE', 'TRABALHO', 'HABILIDADE', 'VIAGEM'];
                
                /**
                 * Palavra sendo jogada atualmente
                 */
                var palavra = '';
                
                /**
                 * Letras acertadas até o momento
                 */
                var skeleton = [];
                
                /**
                 * Contador de erros
                 */
                var chances = 8;
                
                /**
                 * Letras usadas atualmente
                 */
                var letras_usadas = [];
                
                /**
                 * Verificador de fim de jogo
                 */
                var ganhou = false;
                
                /**
                 * Evento de envio de letra
                 */
                $("#enviar").click(function(){
                    /**
                     * Pega letra e transforma em maiuscula
                     */
                    var letra = $("#entrada").val().toUpperCase();
                    
                    /**
                     * Verifica se o jogo já foi ganho
                     */
                    if (ganhou) {
                        alert('Você já ganhou esse jogo. Inicie um novo.');
                        return;
                    }
                    
                    /**
                     * Verifica se a letra já foi utilizada
                     */
                    if ($.inArray(letra, letras_usadas) != -1) {
                        alert('Letra já utilizada!');
                        return;
                    }
                    
                    /**
                     * Verifica se o jogador ainda tem chances
                     */
                    if (chances == 0) {
                        alert('Suas chances terminaram. Inicie um novo jogo.');
                        return;
                    }
                    
                    /**
                     * Adiciona a letra digitada no array de letras usadas
                     * e limpa o input de entrada
                     */
                    letras_usadas.push(letra);
                    $("#entrada").val('');
                    
                    /**
                     * Localiza a posição da letra na palavra
                     */
                    var pos = palavra.indexOf(letra);
                    
                    /**
                     * Se não for encontrada a letra na palvra, diminui a chances
                     */
                    if (pos == -1) {
                        alert('A letra "'+letra+'"não faz parte da palavra.');
                        chances--;
                        return;
                    }
                    
                    /**
                     * Coloca a letra na possição encontrada
                     */
                    skeleton[pos] = letra;
                    
                    /**
                     * Procura mais ocorrências da letra e coloca na posição encontrada
                     */
                    while(pos > -1) {
                        pos = palavra.indexOf(letra, pos+1);
                        skeleton[pos] = letra;
                    }
                    
                    /**
                     * Verifica se a palvra foi montada e finaliza o jogo
                     */
                    if (skeleton.join('') == palavra) {
                        ganhou = true;
                        alert('Parabéns! Você acertou');
                    }
                });
                
                $("#novo").click(function(){
                    /**
                     * Gera um número randômico para escolher palavra
                     */
                    var len = Math.floor(Math.random() * palavras.length);
                    
                    /**
                     * Seta as variavéis de ambiente do jogo
                     */
                    palavra = palavras[len];
                    chances = 8;
                    letras_usadas = [];
                    skeleton = [];
                    ganhou = false;
                    alert(palavra);
                });
            });
        </script>
    </head>
    <body>
        <input type="text" id="entrada" size="2" maxlength="1" />
        <button id="enviar">Enviar</button>
        <button id="novo">Novo Jogo</button>
    </body>
</html>