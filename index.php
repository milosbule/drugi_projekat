<?php

require_once "App/Shop/Product.php";
require_once "App/Shop/Cart.php";
require_once "App/Shop/CartItem.php";
require_once "App/Utilities/Printing.php";
require_once "App/Clients/Customer.php";
require_once "App/Clients/Registered.php";
require_once "App/Clients/Guest.php";
require_once "App/Shop/Euro.php";
require_once "App/Shop/Shop.php";

use App\Shop\Product;
use App\Shop\Cart;
use App\Shop\Euro;
use App\Shop\CartItem;

//INSTANCIRANJE VALUTE
$eur = new Euro;

//INSTANCIRANJE SHOP-a
$shop1 = new Shop("Mobile d.o.o.", "Zivka Davidovica 8, Zvezdara");

//INSTANCIRANJE PRODUCT (PROIZVODA)
$product1 = new Product(1, "Samsung Galaxy Note 20", 840, $eur, 5);
$product2 = new Product(2, "Samsung Galaxy Note 10+ Dual", 570, $eur, 4);
$product3 = new Product(3, "Samsung Galaxy S20 Ultra", 730, $eur, 6);
$product4 = new Product(4, "Samsung Galaxy S20", 430, $eur, 3);
$product5 = new Product(5, "Samsung Galaxy M21", 180, $eur, 7);
$product6 = new Product(6, "Xiaomi 12T Pro", 723, $eur, 5);
$product7 = new Product(7, "Xiaomi Redmi Note 11 Pro", 220, $eur, 10);
$product8 = new Product(8, "Xiaomi Black Shark 5 Pro", 800, $eur, 1);
$product9 = new Product(9, "Iphone 14 Plus", 930, $eur, 5);
// $product10 = new Product(10, "Iphone 13", 740, $eur, 9);

echo "<b>Stampa Product-a u obliku __toString metoda:</b> " . "<br>";
echo $product1 . "<br>";
echo "<br>";
echo "<br>";

//INSTANCIRANJE REGISTERED KORISNIKA
$registered1 = new Registered(1, "Katarina", "Milenkovic", 3000);
$registered2 = new Registered(2, "Danilo", "Milenkovic", 5100);

//INSTANCIRANJE GUEST KORISNIKA
$guest1 = new Guest(1, "Todor", "Mihajlovic", 5000);
$guest2 = new Guest(2, "Bogdan", "Petrovic", 3800);

//INSTANCIRANJE KORPE
$cart1 = new Cart();
$cart2 = new Cart();

// $product1->addToCart($cart1, 6); // ne moze se dodati kolicina veca od availableQuantity-a

//DODAVANJE Product-a u Cart
$product1->addToCart($cart1, 3);
$product2->addToCart($cart1, 2);

$product3->addToCart($cart2, 3);
$product4->addToCart($cart2, 2);
$product5->addToCart($cart2, 3);

echo "<b>PRINTANJE PROIZVODA IZ KORPE:</b> " . "<br>";
echo "<br>";
echo "<b>Korpa 1:</b> "  . "<br>";
$cart1->printing();
echo "<b>Korpa 2:</b> "  . "<br>";
$cart2->printing();
echo "<br>";
echo "<br>";

//UKLANJANJE Product-a iz Cart
$product5->removeFromCart($cart2);
echo "<b>Korpa 2 nakon uklonjenog product5:</b> "  . "<br>";
$cart2->printing();
echo "<br>";
echo "<br>";

//PROIZVODI IZ KORPE
$cartItem1 = new CartItem($product1, 5);
$cartItem2 = new CartItem($product3, 6);
echo "<b>Dodavanje i smanjivanje kolicine (granicni slucajevi): </b> "  . "<br>";
echo $cartItem1->decreaseQuantity(5) . "<br>";
echo $cartItem2->increaseQuantity(6) . "<br>";
echo "<br>";
echo "<br>";

//DODAVANJE PROIZVODA PREKO CART-a
$cart1->addProduct($product6, 2);
$cart2->addProduct($product7, 5);
$cart1->addProduct($product8, 1);
$cart2->addProduct($product9, 1);

echo "<b>PRINTANJE PROIZVODA IZ KORPE nakon dodavanja product6, product7, product8, product9:</b> " . "<br>";
echo "<br>";
echo "<b>Korpa 1:</b> "  . "<br>";
$cart1->printing();
echo "<b>Korpa 2:</b> "  . "<br>";
$cart2->printing();
echo "<br>";
echo "<br>";

//UKLANJANJE PROIZVODA PREKO CART-a
$cart1->removeProduct($product8);
$cart2->removeProduct($product9);
echo "<b>PRINTANJE PROIZVODA IZ KORPE nakon uklanjanja product8, product9:</b> " . "<br>";
echo "<br>";
echo "<b>Korpa 1:</b> "  . "<br>";
$cart1->printing();
echo "<b>Korpa 2:</b> "  . "<br>";
$cart2->printing();
echo "<br>";
echo "<br>";

//UKUPNA KOLICINA PROIZVODA PO KORPAMA
echo "<b>PRINTANJE UKUPNE KOLICINE PROIZVODA IZ KORPE 1: </b> " . "<br>";
echo $cart1->getTotalQuantity() . "<br>";
echo "<b>PRINTANJE UKUPNE KOLICINE PROIZVODA IZ KORPE 2: </b> " . "<br>";
echo $cart2->getTotalQuantity() . "<br>";
echo "<br>";
echo "<br>";

//UKUPNA SUMA PO KORPAMA
echo "<b>PRINTANJE UKUPNE SUME IZ KORPE 1: </b> " . "<br>";
echo $cart1->getTotalSum() . "<br>";
echo "<b>PRINTANJE UKUPNE SUME IZ KORPE 2: </b> " . "<br>";
echo $cart2->getTotalSum()  . "<br>";
echo "<br>";
echo "<br>";

//KUPOVINA KORPE1 - Registered1
$registered1->buy($cart1); //nedovoljno sredstva na racunu
echo "<br>";
echo "<br>";
//KUPOVINA KORPE1 - Registered2
$registered2->buy($cart1);
echo "<br>";
echo "<br>";
//KUPOVINA KORPE1 - Guest1
$guest1->buy($cart1);
echo "<br>";
echo "<br>";
//KUPOVINA KORPE2 - Guest2
$guest2->buy($cart2);
echo "<br>";
echo "<br>";

Shop::printCustomerCount() . "<br>"; //ukupan broj korisnika lanca
echo "<br>";
echo "<br>";
