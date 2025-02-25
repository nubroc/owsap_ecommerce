<?php

include_once __DIR__ . '/../models/Article.php';


class ProduitController {
    public function catalogue() {
        include 'views/catalogue.php';
        $catalogue = Article::getAll();
        var_dump($catalogue);
        $this->render('catalogue', ['catalogue' => $catalogue]);
    }

    private function render($view, $data = []) {
        extract($data);
        include __DIR__ . "/../views/{$view}.php";
    }
}
