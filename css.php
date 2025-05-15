<?php
header("Content-type: text/css");
?>

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 20px;
    padding: 10px;
}
/* Reset some default styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Container for all product cards */
.products-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

/* Individual card style */
.card {
    width: 220px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: #fff;
    transition: transform 0.2s;
}

.card:hover {
    transform: scale(1.03);
}

/* Product image */
.card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
}

/* Card body content */
.card-body {
    padding: 15px;
    text-align: center;
}

/* Item name */
.card-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 8px;
}

/* Price */
.card-text {
    font-size: 16px;
    color: #333;
    margin-bottom: 12px;
}

/* Quantity input box */
.card-body input[type="number"] {
    width: 60px;
    padding: 5px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
