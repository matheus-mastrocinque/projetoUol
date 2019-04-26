<?php 

$retorno = new StdClass(); //função anônima

$retorno->acao = true;

$json = file_get_contents('https://jsonplaceholder.typicode.com/todos'); //para importar uma string

$obj = json_decode($json); //json_decode transforma uma string json em um objeto

$retorno->html = "<table class ='flat-table' border='1'>";
$retorno->html .= "<tr>";
$retorno->html .= "<td>ID Usuário</td>";
$retorno->html .= "<td>ID</td>";
$retorno->html .= "<td>Título</td>";
$retorno->html .= "<td>Status</td>";
$retorno->html .= "</tr>";

foreach($obj as $dados) 
{
    if($dados->userId == $_POST["idCliente"])
    {
        $retorno->html .= "<tr>"; // . concatenação em php e para outra linha .=
        $retorno->html .= "<td>".$dados->userId."</td>";
        $retorno->html .= "<td>".$dados->id."</td>";
        $retorno->html .= "<td>".$dados->title."</td>";

        if($dados->completed == true)
        {
            $retorno->html .= "<td>Completo</td>";
        }
        else
        {
            $retorno->html .= "<td>Não completo</td>";
        }
    }
    $retorno->html .= "</tr>";
}
$retorno->html .= "</table>";

echo json_encode($retorno);

?>