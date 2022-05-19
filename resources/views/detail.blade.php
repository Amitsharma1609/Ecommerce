@extends('master')
@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <img class="img-detail" src="{{ $details['gallery'] }}">
            </div>
            <div class="col-sm-6">
                <h2 class="font-set">Name:{{ $details['name'] }}</h2>
                <h3 class="font-set">Price : {{ $details['price'] }}</h3>
                <h4 class="font-set">Details: {{ $details['description'] }}</h4>
                <br>



                        <form action="/add-to-cart" method="POST">
                            @csrf
                            <div class="center">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-number" data-type="minus"
                                            data-field="quantity">
                                            <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="form-control input-number" value="1" min="1"
                                        max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-number" data-type="plus"
                                            data-field="quantity">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                                <p></p>
                            </div>
                            <input type="hidden" name="product_id" value={{ $details['id'] }}>
                            <button class="btn btn-primary">Add to Cart</button>
                        </form>

                <br><br>
                <a href="/orders/{{ $details['id'] }}">
                    <button type="button" class="btn btn-success">Order Now</button>
                </a>
            @endcannot

        </div>
    </div>
    <a href="/">Go Back</a>
    </div> --}}
    <div class="card mb-3 " style="max-width: 100%; height: 50%; margin-left:50px; margin-top:35px; margin:35px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img class="img-detail" src="{{ $details['gallery'] }}">
            </div>
            @cannot('isAdmin')
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $details['name'] }}</h5>
                        <p class="card-text">{{ $details['description'] }}</p>
                        <p class="card-text">{{ $details['price'] }}$</p>
                    </div>
                    <div class="flexbuttons btn-group" style="margin-top: 90px;">
                        <div class="row">
                            <form action="/add-to-cart" method="POST">
                                @csrf
                                <div class="center">
                                    <div class="input-group" style="margin-bottom: 20px">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-danger btn-number" data-type="minus"
                                                data-field="quantity">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-number" data-type="plus"
                                                data-field="quantity">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <input type="hidden" name="product_id" value={{ $details['id'] }}>
                                    <button class="btn btn-primary" style="margin-bottom: 20px">Add to Cart</button>
                            </form>

                        </div>
                    </div>   <a href="/orders/{{ $details['id'] }}">
                        <button type="button" class="btn btn-success" style="margin-right:550px">Order Now</button>
                    </a>
                </div>
            @endcannot
        </div>
    </div>

    <script>
        < script >
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
    </script>
@endsection
