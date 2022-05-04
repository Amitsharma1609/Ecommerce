<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home page</title>
</head>


<body>
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>
<style>
    .custom-login {
        display: block;
        width: 50%;
        margin: 0 auto;
        margin-left: 500px;
    }

    .custom-product {
        height: 600px;
    }

    img.slider-img {
        height: 400px !important
    }

    .slider-text {
        background-color: #35443585 !important;
    }

    .trending-img {
        height: 100px;
    }

    .trending-item {
        float: left;
        width: 20%;
    }

    .trending {
        margin: 20px;
    }

    .img-detail {
        height: 400px;
        width: 400px;
        margin-top: 15px;
    }

    .font-set {
        margin-top: 15px;
        font-style: normal;
        font-size: 25px;
        font-weight: 100;
        font-family: "Trirong", serif;
    }

    .trending-wrapper {
        margin: 30px;
    }

    .trending-image {
        height: 100px;
    }

    .detail-img {
        height: 200px;
    }

    .search {
        width: 500px !important
    }

    .cart-list-devider {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }
    .form{
        margin-left: 280px;
        margin-top: 50px;
        padding: 20px;
        border: 2px solid white;
    }
    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #D6EEEE;
    }
    .table{
        width: 100%;
        height: 50px;
    }
</style>

</html>
