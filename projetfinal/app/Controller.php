<?php

require_once 'Model.php';

class Controller {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function home() {
        echo "Bienvenue sur la page d'accueil";
    }

    public function products() {
        $products = $this->model->getProducts();
        echo "<h1>Liste des produits</h1>";
        foreach ($products as $product) {
            echo "<h2>{$product['name']}</h2>";
            echo "<p>Prix : {$product['price']}€</p>";
            echo "<a href='/product/{$product['id']}'>Voir le produit</a> | ";
            echo "<a href='/add-to-cart/{$product['id']}'>Ajouter au panier</a><br>";
        }
    }

    public function product($id) {
        if (is_numeric($id)) {
            $product = $this->model->getProductById($id);
            if ($product) {
                echo "<h2>{$product['name']}</h2>";
                echo "<p>{$product['description']}</p>";
                echo "<p>Prix : {$product['price']}€</p>";
            } else {
                echo "Produit non trouvé.";
            }
        } else {
            echo "Erreur : identifiant produit invalide.";
        }
    }
    

    public function addToCart($id) {
        if (is_numeric($id)) {
            session_start();
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            $_SESSION['cart'][] = $id;
    
            echo "Produit ajouté au panier ! <br>";
            echo "<a href='/cart'>Voir le panier</a>";
        } else {
            echo "Erreur : identifiant produit invalide.";
        }
    }
    

    public function cart() {
        session_start();
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Votre panier est vide.";
            return;
        }

        $products = $this->model->getProducts();
        echo "<h1>Panier</h1>";
        foreach ($_SESSION['cart'] as $productId) {
            $product = $this->model->getProductById($productId);
            echo "<h2>{$product['name']}</h2>";
            echo "<p>Prix : {$product['price']}€</p>";
        }

        echo "<a href='/checkout'>Finaliser la commande</a>";
    }

    public function checkout() {
        echo "Commande validée ! Merci pour votre achat.";
        session_start();
        $_SESSION['cart'] = [];
    }
}
