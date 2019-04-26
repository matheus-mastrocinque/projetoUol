$(document).ready(function()
{
    setInterval(function(){ buscaDadosCliente() }, 60000);
})

function buscaDadosCliente()
{
    if($("#idUser").val() != "") //pega o que o usuário digitou e verifica se é diferente de "vazio"
    {
        $.ajax({

            dataType: 'json', //o que irá retornar para o ajax é um json
            type: "POST", //metodo que é enviado o idcliente para o Ajax
            url: "ajaxBuscaDados.php", //forma que o ajax do jquery linka o arquivo
            data: {  //dado que é enviado para ajax ("coloca todas as variáveis que serão tratadas")
                idCliente: $("#idUser").val()
            },
            success: function(retorno){
                if(retorno.acao)
                {
                    $("#dadosUsuario").html(retorno.html);
                }
                else 
                {
                    alert(retorno.mensagem)
                }
            },
            error: function(error){
                alert('Ocorreu um erro interno, entre em contato com o setor de TI.');
            }
        });
    }
}