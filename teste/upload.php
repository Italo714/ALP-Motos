<?php
// Verifica se o formulário foi enviado
if (isset($_POST["submit"])) {
    // Define o diretório de destino para salvar a imagem
    $diretorioDestino = "uploads/";

    // Gera um nome único para o arquivo usando timestamp
    $nomeArquivo = time() . "_" . basename($_FILES["imagem"]["name"]);

    // Caminho completo do arquivo no diretório de destino
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;

    // Verifica se o arquivo é uma imagem
    $tipoArquivo = pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
    $permitidos = array("jpg", "jpeg", "png", "gif");

    if (in_array(strtolower($tipoArquivo), $permitidos)) {
        // Tenta mover o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {
            echo "O arquivo foi enviado com sucesso.";
        } else {
            echo "Erro ao enviar o arquivo.";
        }
    } else {
        echo "Apenas arquivos de imagem (jpg, jpeg, png, gif) são permitidos.";
    }
}
?>
