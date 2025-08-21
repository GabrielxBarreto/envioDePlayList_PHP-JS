<style>
    * {
        margin: 0;
        padding: 0;
    }

    img {
        display: none;
    }

    .ativa {
        display: block;
        width: 100vw;
        height: 100vh;
    }
</style>

<?php 
// IP do servidor
$server_ip = '192.168.100.3';

// Diretório de para onde as imagens vão
$diretorio = __DIR__ . "/uploads/";

// Verifica se diretório existe
if (!is_dir($diretorio)) {
    mkdir($diretorio, 0777, true);
}

// Processa novo arquivo se for upload
$arquivo = $_FILES['arquivos'] ?? null;

if ($arquivo && isset($arquivo['name'])) {
    // Limpeza
    $antigos = array_diff(scandir($diretorio), ['.', '..']);
    foreach ($antigos as $file) {
        $caminho = $diretorio . '/' . $file;
        if (is_file($caminho)) {
            unlink($caminho);
        }
    }

    // Salvar os aqv
    foreach ($arquivo['name'] as $indice => $nome) {
        $destino = $diretorio . basename($arquivo['name'][$indice]);
        move_uploaded_file($arquivo['tmp_name'][$indice], $destino);
    }
}

// Lê todos os arquivos do diretorio
$arquivos = array_diff(scandir($diretorio), ['.', '..']);
$index = 0;

foreach ($arquivos as $arquivo) {
    $ext = pathinfo($arquivo, PATHINFO_EXTENSION);
    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $url = "http://$server_ip/uploads/" . urlencode($arquivo);
        echo "<img class='elem' id='{$index}' src='{$url}' alt=''>";
        $index++;
    }
}
?>

<script>
    let i = 0;
    let nElem = 0;

    document.addEventListener("DOMContentLoaded", function () {
        nElem = document.querySelectorAll('.elem').length;
    });

    function funcUpdate() {
        if (nElem === 0) return;

        let img = document.getElementById(`${i}`);
        if (i < nElem) {
            if (i != 0) {
                let imgAnterior = document.getElementById(`${i - 1}`);
                imgAnterior.classList.remove("ativa");
            }
            img.classList.add("ativa");
            i++;
        } else {
            let imgLast = document.getElementById(`${i - 1}`);
            imgLast.classList.remove("ativa");
            i = 0;
        }
    }

    setInterval(funcUpdate, 2000);
</script>
