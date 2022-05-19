<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

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
        height: 180px;
        width: 305px;
    }

    .detail-img {
        height: 200px;
    }

    .search {
        width: 400px !important
    }

    .cart-list-devider {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }

    .form {
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

    .table {
        width: 100%;
        height: 50px;
    }

    .search-image {
        height: 150px;
        width: 200px;
    }

    .w-5 {
        display: none;
    }

    .center {
        width: 150px;
        margin: 0px auto;
        margin-left: 0;

    }

    .invoice {
        width: 200px;
        height: 50px;
        margin-left: 90px;
    }

    .add-review {
        width: 200px;
        height: 50px;
        margin-left: 90px;
    }

    .images {
        width: 136px;
        height: 118px;
        margin-bottom: 20px;
    }

    .flexbuttons {
        display: flex;
        justify-content: space-between;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>

</html>
