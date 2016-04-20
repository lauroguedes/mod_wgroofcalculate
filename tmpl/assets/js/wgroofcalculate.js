/**
 * @package     mod_wgroofcalculate - WG Roof Calculate
 * @version     1.0
 * @created     Fev 2016
 *
 * @author      Lauro W. Guedes
 * @email       leowgweb@gmail.com
 * @website     http://leowgweb.com
 * @support     Suporte - http://leowgweb.com/contato
 * @copyright   Copyright (C) 2015 Lauro W. Guedes. Todos os Direitos Reservados.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 *
 */

var wgModRequestAjax = (function ($) {

    function sendData (idForm, wgIdContent) {
        $(document).ready(function(){
            var wgidcont = '#'+wgIdContent+' ';
            var idform = $('#'+idForm);

            // REQUISIÇÃO AJAX PARA OBTER O CÁLCULO
            idform.on("submit",function(event){
                event.preventDefault();
                // pega todos inputs
                var value = $(this).serializeArray();
                // objeto de dados para requisição
                request = {
                    'option' : 'com_ajax',
                    'module' : 'wgroofcalculate',
                    'data'   : value,
                    'format' : 'jsonp'
                };
                // requisição ajax
                $.ajax({
                    type: 'POST',
                    data: request,
                    beforeSend: startPreloading(wgidcont)
                }).done(function(data){
                    endPreloading(wgidcont);
                    var data = JSON.parse(data);
                    if (data.response == 0){
                        $(wgidcont+".wg-roof-response").html('<p class="error">'+data.msn+'</p>');
                    }else if(data.response == 1){
                        $(wgidcont+".wg-roof-response").html('<p class="error">'+data.msn+'</p>');
                    }else{
                        $(wgidcont+".wg-roof-response").html('<p class="success">'+data.msn+'</p>');
                        $(wgidcont+".wg-roof-input").val("");
                    }
                    $(wgidcont+".wg-roof-response-content").fadeIn();
                }).fail(function(){
                    endPreloading(wgidcont);
                    $(wgidcont+".wg-roof-response-content").fadeIn();
                    $(wgidcont+".wg-roof-response").html('<p class="error">Falha ao calcular Telha. Confira sua conexão!</p>').delay(5000).fadeOut(500);
                });
            });

            //Fecha as resposta do módulo
            $(wgidcont+"#close-response").on('click', function(){
                $(wgidcont+".wg-roof-response-content").fadeOut();
            });

        });
    }

    function startPreloading(wgidcont){
        $(wgidcont+'.wg-roof-loading-content').fadeIn();
        $(wgidcont+".wg-roof-button").attr("disabled",true);
    }
    function endPreloading(wgidcont){
        $(wgidcont+".wg-roof-loading-content").fadeOut();
        $(wgidcont+".wg-roof-button").attr("disabled",false);
    }

    // retorno da função
    return {
        getId: sendData,
    };

})(jQuery);