<!DOCTYPE html>
<html>
<head>
    <title>T-Shirt produit</title>
    <style>
 body {
            font-family: Arial, sans-serif;
            justify-content: center;
            padding: 1px;
            margin-left :500px;
        }


 
      .top-container {
            display: flex;
            align-items: flex-start; /* aligne le haut du tableau et des images */
            gap: 50px; /* espace entre tableau et images */
        }

    
    table {
    margin: 40px auto 0 auto; /* marge en haut + centrer horizontalement */
    border-collapse: collapse;
    width: 150px;
    text-align: center;
    font-size: 1em;
}

    
         .gallery {
    
    display: grid;
    grid-template-columns: repeat(2, 300px);
    grid-auto-rows: auto;
    gap: 20px;
         }

          .gallery img {
    width: 300px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}

 table {
            margin: 10px;
            border-collapse: collapse;
            width: 150px;
            text-align: center;
            font-size: 1em;
        }
table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

 th {
            background-color: #f2f2f2;
        }



        .old-price {
            text-decoration: line-through;
            color: gray;
            margin-right: 10px;
        }
        .promo-price {
            color: red;
            font-weight: bold;
            font-size: 1.2em;
        }
        .promo {
            background-color: #ffe0e0;
            padding: 5px 10px;
            display: inline-block;
            margin-top: 10px;
            border-radius: 5px;
            font-weight: bold;
            color: #c40000;
        }
    </style>
</head>
<body>

    <h1>Product:T-Shirt blanc</h1>


    <div class="top-container">
        <!-- Tableau à gauche -->
        

    <div class="gallery">

     <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100438_01.jpg" alt="T-Shirt 1" width="300">
    <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100439_02.jpg" alt="T-Shirt 2" width="300">
    <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100440_03.jpg" alt="T-Shirt 2" width="300">
    </div>
    <table>
            <thead>
                <tr>
                    <th>Taille</th>
                    <th>Dispo</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>XS</td><td>✔️</td></tr>
                <tr><td>S</td><td>✔️</td></tr>
                <tr><td>M</td><td>✔️</td></tr>
                <tr><td>L</td><td>✔️</td></tr>
                <tr><td>XL</td><td>✔️</td></tr>
                <tr><td>2XL</td><td>✔️</td></tr>
                <tr><td>3XL</td><td>❌</td></tr>
            </tbody>
        </table>
    </div>
        
    <p><strong>Teddy Yacht Club</strong></p>
<p>Tee Shirt Oversize Large Atelier Paris Blanc Noir</p>

    <p>
        <span class="promo-price">19,99 €</span>

        <span class="old-price">24,99 €</span>
    </p>
    <div class="promo">-20% de réduction</div>

    <br><br>
    <button style="background-color: red; color: white; border: none; padding: 10px 20px; border-radius: 5px;">
    Ajouter au panier </button>


   


</body>
</html>
