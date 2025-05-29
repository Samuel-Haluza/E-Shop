<?php

class AssetsManager {
    private $pageName;
    private $scripts = [];
    private $styles = [];

    public function __construct() {
        $this->pageName = basename($_SERVER["SCRIPT_NAME"], ".php");
    }

    public function defineScripts() {
        $this->scripts = [
            'assets/js/jquery-1.11.0.min.js',
            'assets/js/jquery-migrate-1.2.1.min.js',
            'assets/js/bootstrap.bundle.min.js',
            'assets/js/templatemo.js',
            'assets/js/custom.js',
            'assets/js/menu.js',
        ];
    }

    public function defineStyles() {
        $this->styles = [
            'assets/css/style.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
            'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap',
            'assets/css/fontawesome.min.css',
            'assets/css/bootstrap.min.css',
            'assets/css/templatemo.css',
            'assets/css/custom.css',
            'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css',
        ];

        switch ($this->pageName) {
            case "index":
                $this->styles[] = 'assets/css/slider.css';
                break;
            case "portfolio":
                $this->styles[] = 'assets/css/portfolio.css';
                break;
            case "qna":
                $this->styles[] = 'assets/css/accordion.css';
                break;
            case "kontakt":
                $this->styles[] = 'assets/css/form.css';
                break;
        }
    }

    public function getScripts() {
        return $this->scripts;
    }

    public function getStyles() {
        return $this->styles;
    }
}
?>