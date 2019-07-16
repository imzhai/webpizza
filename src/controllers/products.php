<?php

/*/**
 *  Fonction dédiée à l'affichage des pizzas.
 */

function products_pizzas(){
    
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type"pizza"
    // dump(getPizzas())    
   $productsModel = productsBuilder(getPizzas());
    
    //dump($productsModel);

    // Titre de la page
    $pageTitle = "Nos Pizzas";
    
    // Intégration de la vue "product"
    include_once "../src/views/products/index.php";
}

function products_pasta(){
 
        include_once "../src/models/products.php";
        $productsModel = productsBuilder(getPasta());
    $pageTitle = "Nos Pasta";
      include_once "../src/views/products/index.php";
}

function products_salads(){
 
    include_once "../src/models/products.php";
    $productsModel = productsBuilder(getSalads());
    $pageTitle = "Nos Salades";
    include_once "../src/views/products/index.php";
}


function products_desserts(){
 
    include_once "../src/models/products.php";
    $productsModel = productsBuilder(getDesserts());
    $pageTitle = "Nos Desserts";
    include_once "../src/views/products/index.php";
}

function products_drinks(){
    include_once "../src/models/products.php";
    $productsModel = productsBuilder(getDrinks());
    $pageTitle = "Nos Boissons";
    include_once "../src/views/products/index.php";
}

function products_starters(){
    include_once "../src/models/products.php";
    $productsModel = productsBuilder(getStarters());
    $pageTitle = "Nos Entrées";
    include_once "../src/views/products/index.php";
}

function products_menus(){
 
    include_once "../src/models/products.php";
    $productsModel = productsBuilder(getMenus());
    $pageTitle = "Nos Menus";
    include_once "../src/views/products/index.php";
}



function productsBuilder($products) : Array 
{
    $output = [];

    if (is_array($products))
    {
        foreach ($products as $product)
        {   // On se base sur la clé primaire du produit 
            //(ID dans la bss et identifié sous le nom de "product_id" dans la requête (t1.id AS product_id,))
            // Pour définir le nombre réel de produits dans le tableau $output.
            // 
            // Si l'index "ID du produit" n'existe pas dans le tableau $output,
            // alors on le créé et on lui affecte un tableau vide ($output[2] = []).
            if (!isset($output[$product->product_id]))
            {
                $output [ $product->product_id ] = [];
            }

            // On reprend les propriétés du produit ($product) pour les ajouter à 
            // notre nouveau tableau $output[2] (e.g. : output[2]['name'] = 'Hawaienne') 
            $output [ $product->product_id ] ['id'] = $product->product_id;
            $output [ $product->product_id ] ['name'] = $product->product_name;
            $output [ $product->product_id ] ['description'] = $product->product_description;
            $output [ $product->product_id ] ['price'] = $product->product_price;
            $output [ $product->product_id ] ['illustration'] = $product->product_illustration;

            //Pour la liste d'ingrédients, nous devons définir un tableau 
            //uniquement si celui-ci n'est pas déjà définit
            if (!isset ($output [ $product->product_id ] ['ingredients'] ))
            {
                $output [ $product->product_id ] ['ingredients'] = [];
            }

            // On ajoute les ingrédients dans le tableau
            array_push(
                $output [ $product->product_id ] ['ingredients'],
                [
                    "name" => $product->ingredient_name,
                    "type" => $product->ingredient_type                    
                ]);
            //dump($product->product_id);
            //array_push($output, $product);
        }
    }

    return $output;
}