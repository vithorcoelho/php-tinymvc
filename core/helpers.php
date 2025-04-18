<?php
use Illuminate\Support\Collection;

// Função recursiva para converter arrays em objetos
function arrayToObject($item) {
    if (is_array($item)) {
        return (object) array_map('arrayToObject', $item);
    }
    return $item;
}

function view($name, $data = [])
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            // Converte arrays em objetos recursivamente e depois em Collection
            $data[$key] = new Collection(array_map('arrayToObject', $value));
        }
    }
    extract($data);
    require __DIR__ . '/../App/Views/' . $name . '.php';
}

function render($template, $data = []) {
    // Garante acesso à instância global do Twig
    global $twig;
    if (!$twig) {
        // Caso não exista, inclui o bootstrap para inicializar o Twig
        require_once __DIR__ . '/bootstrap.php';
        global $twig;
    }
    echo $twig->render($template . '.twig', $data);
}

function render404()
{
    http_response_code(404);
    render('404');
}