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
    
    

   <table style="border-collapse: collapse; width: 600px;">
    <thead>
        <!-- Header Row -->
        <tr>
            <td style="text-align: center; border: 1px solid black; width:60px;">
                <strong style="font-size: 30px; margin:30px">QTY.</strong>
            </td>
            <td style="text-align: center; border: 1px solid black; width:60px;">
                <strong style="font-size: 30px; margin:30px">AMOUNT</strong>
            </td>
            <td style="text-align: center; border: 1px solid black; width:250px;">
                <strong style="font-size: 30px; margin:30px">DESCRIPTION</strong>
            </td>
            <td style="text-align: center; border: 1px solid black; width:60px;">
                <strong style="font-size: 30px; margin:30px">PAYMENT</strong>
            </td>
            </td>
            <td style="text-align: center; border: 1px solid black; width:60px;">
                <strong style="font-size: 30px; margin:30px">SALES</strong>
            </td>
           
        </tr>
    </thead>
    <tbody>
        <!-- Data Rows -->
        @foreach ($relatedSalesDates as $relatedSalesDate)
            @foreach ($relatedSalesDate->salesReports as $salesReport)
                <tr>
                    <!-- Quantity -->
                    <td style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                        <strong style="font-size:20px">{{ $salesReport->quantity }}</strong>
                    </td>
                    <!-- Amount -->
                    <td style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                        <strong style="font-size:20px">{{ $salesReport->amount }}</strong>
                    </td>
                    <!-- Articles (Description) -->
                    <td style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                        <strong style="font-size:20px">{{ $salesReport->description }}</strong>
                    </td>
                    <!-- Down Payment -->
                    <td style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                        <strong style="font-size:20px">{{ $salesReport->down_payment }}</strong>
                    </td>
                    <!-- Sales Date ID -->
                    <td style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                        <strong style="font-size:20px">{{ $salesReport->salesDate->date }}</strong>
                    </td>
                    
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

</body>

</html>
