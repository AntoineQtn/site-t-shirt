
@include('header')
<div class="advertising">
    <p>TOUJOURS PLUS DE SOLDES!</p>
</div>
<div class="product-card">
    <h1>Titre</h1>
    <img src="{{asset('images/débardeur.jpg')}}" alt="t-shirt-image">
</div>

@include('footer')

<style>
    img {
        width: 10%;
        height:  auto;
    }
    .product-card, h1{
        font-size: 2.5em;
        font-weight: bold;
        font-family: Bebas Neue;
    }
    button{
        background-color: red;
        color: white;
    }

</style>
