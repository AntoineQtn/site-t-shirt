@extends('layouts.frontoffice')


@include('components.header')



    <h1>Product:T-Shirt blanc</h1>


    <div class="top-container">



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
    <button>
    Ajouter au panier </button>




 @include('components.footer')




