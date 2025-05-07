<?php
class Menu {

    private $menuItems;

    public function __construct($menuItems = []) {
        if (empty($menuItems)) {
            $menuItems = [
                ['label' => 'Home', 'link' => 'index.php'],
                ['label' => 'About', 'link' => 'about.php'],
                ['label' => 'Shop', 'link' => 'shop.php'],
                ['label' => 'Contact', 'link' => 'contact.php'],
                ['label' => 'Login', 'link' => 'login.php'],
                ['label' => 'Register', 'link' => 'register.php'],
            ];
        }
        $this->menuItems = $menuItems;
    }

    public function index() {
        return $this->menuItems;
    }
}
?>
