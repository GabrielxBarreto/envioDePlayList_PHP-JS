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

// Lê todos os arquivos do diretorio
$arquivos = array_diff(scandir($diretorio), ['.', '..']);

$index = 0;

foreach ($arquivos as $arquivo) {
    // Monta URL pública da imagem
    $url = "http://$server_ip/uploads/" . urlencode($arquivo);

    // Verifica se é imagem 
    $ext = pathinfo($arquivo, PATHINFO_EXTENSION);
    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
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
        } else if (i >= nElem) {
            let imgLast = document.getElementById(`${i - 1}`);
            imgLast.classList.remove("ativa");
            i = 0;
        }
    }

    setInterval(funcUpdate, 2000);
</script>
