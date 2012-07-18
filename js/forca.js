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
     * Pontos do jogador
     */
    var pontos = 0;
                
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
            selectedPoint = 0;
            return;
        }
                    
        /**
         * Verifica se o jogador ainda tem chances
         */
        if (chances == 0) {
            alert('Suas chances terminaram. Inicie um novo jogo.');
            selectedPoint = 0;
            return;
        }
                    
        /**
         * Verifica se o roleta foi girada
         */
        if (selectedPoint == 0) {
            alert('Gire a roleta.');
            return;
        }
        
        /**
         * Verifica se perdeu pontos
         */
        if (selectedPoint == 'Perde Tudo') {
            alert('Você perdeu tudo!');
            pontos = 0;
            $("#pontos").text(pontos);
            selectedPoint = 0;
            return;
        } else if (parseInt(selectedPoint) < 0) {
            alert('Você perdeu '+selectedPoint+ ' pontos!');
            pontos += parseInt(selectedPoint);
            $("#pontos").text(pontos);
            selectedPoint = 0;
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
         * Adiciona a letra digitada no array de letras usadas
         * e limpa o input de entrada
         */
        letras_usadas.push(letra);
        $("#letras").text(letras_usadas.join(','));
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
            $("#erros").text(chances);
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
            pontos += parseInt(selectedPoint);
            $("#pontos").text(pontos);
            alert('Parabéns! Você acertou. +' +selectedPoint);
            selectedPoint = 0;
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
        selectedPoint = 0;
        $("#erros").text(chances);
        drawRouletteWheel();
        
        alert(palavra);
    });
                
    /**
     * Gira a roleta
     */
    $("#girar").click(function(){
        spin();
    });
    
    /**
     * Gera a roleta usando canvas do Html5
     */
    drawRouletteWheel();
    
    /**
     * Seta numero de erros e numero de pontos
     */
     $("#pontos").text(pontos);
     $("#erros").text(8 - chances);
});