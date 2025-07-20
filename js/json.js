    foreach ($archivos as $archivo) {
        $json = file_get_contents($archivo);
        $data = json_decode($json, true);
        if ($data) {
            mostrarArticulo($data);
        }
    }
