<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }
</style>

<body>
    <div style="text-align: center;">
        <h1>7J SIGN & PRINTING SERVICE</h1>
        <h3>174 National Highway Brgy.Paciano Rizal, Calamba City Laguna 4027</h3>
        <p>Infront of Rizal Village / Near University of Perpetual School, 711 Paciano and Dali Grocery Paciano</p>
        <h3>Landline No. : 545-3227 Mobile No.: 0926 240 3100</h3>
    </div>

    <div style="display: flex; justify-content: space-around;">
        <h1>JOB ORDER RECEIPT</h1>
        <h3>NO.</h3>
    </div>

    <div>
        <h2>NAME: <u>{{ $order->user->name }}</u></h2>
        <h2>MOBILE NO.:_________________________________________________________</h2>
        <h2>ADDRESS NO.:_________________________________________________________</h2>
        <h2>DATE:_________________________________________________________</h2>
    </div>
    <table style="border-collapse: collapse; width: 600px;">
        <thead>
            <tr>
                <td style="text-align: center; border: 1px solid black; width:60px;">
                    <strong style="font-size: 30px; margin:30px">QTY.</strong>
                </td>
                <td style="text-align: center; border: 1px solid black; width:60px;">
                    <strong style="font-size: 30px; margin:30px">UNIT</strong>
                </td>
                <td style="text-align: center; border: 1px solid black; width:250px;">
                    <strong style="font-size: 30px; margin:30px">ARTICLES</strong>
                </td>
                <td style="text-align: center; border: 1px solid black; width:60px;">
                    <strong style="font-size: 30px; margin:30px">PRICE</strong>
                </td>
                <td style="text-align: center; border: 1px solid black; width:60px;">
                    <strong style="font-size: 30px; margin:30px">AMOUNT</strong>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td
                    style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                    <strong style="font-size:20px">{{ $order->quantity }}</strong>
                </td>
                <td
                    style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                    <strong style="font-size:20px">{{ $order->product->product_name }}</strong>
                </td>
                <td
                    style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                    <strong style="font-size:20px">{{ $order->product->product_description }}</strong>
                </td>
                <td
                    style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                    <strong style="font-size:20px">{{ $order->product->price }}</strong>
                </td>
                @php
                    $amount = intval($order->quantity) * intval($order->product->price);
                @endphp
                <td
                    style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                    <strong style="font-size:20px">{{ number_format($amount, 2) }}</strong>
                </td>
            </tr>
        </tbody>
    </table>

    <table style=" border-collapse: collapse; border: 1px solid black; margin-left:550px">
        <thead>
            <tr>
                <td style="border: 1px solid black; padding: 10px;">
                    <h2>DEPOSIT</h2>
                </td>
                <td style="border: 1px solid black; padding: 10px;">

                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 10px;">
                    <h2>BALANCE</h2>
                </td>
                <td style="border: 1px solid black; padding: 10px;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 10px;">
                    <h2>TOTAL</h2>
                </td>
                <td style="border: 1px solid black; padding: 10px;"></td>
            </tr>
        </thead>
    </table>


    <div>
        <h3><u>Mode of Payment</u></h3>
        <h3>Gcash</h3>
    </div>
    <h3>No.</h3>

    <label for="" style="margin-left:200px">_________________________</label>
    <label for="" style="margin-left:100px">_________________________</label>
    <h3 for="" style="margin-left:250px">Approved By. <label for="" style="margin-left:200px">Received
            By.</label></h3>
</body>

</html>
