<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <style>
      
        
        p {
            /* text-align: justify; */
            font-size: 16px;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding-top:30px;padding-bottom:30px ">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="border-collapse: collapse; background-color: #ffffff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin: 20px;">
                    <tr>
                        <td style="padding: 20px; border: 1px solid #ddd;">
                             
                            <p>{{ $msg }} </p>
                            <p><strong>Order No:</strong>{{ $order->order_number; }}</p>
                            {{-- <p><strong>Price:</strong>{{ $order->price; }}</p> --}}
                            
                            <p>Best regards,<br> Twolabs
                            </p>
                        </td>
                    </tr>
                    <!-- Email Footer -->
                    <tr>
                        <td align="center" style="background-color: #f8f8f8; padding: 20px; font-size: 12px; color: #555;">
                            &copy; {{ date('Y') }} Twolabs All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>