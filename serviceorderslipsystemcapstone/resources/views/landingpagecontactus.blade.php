@include('layouts.landingpagenavigation')
<x-guest-layout style="background-color:#E51818;">

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head style="background-color:#E51818;">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Service Order Slip System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
           *{
              font-family:"Century Gothic";
           } 
            body {
                margin: 0;
                padding: 0;
            }

            .button1 {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .button2{
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family:"Century Gothic";
                background-color: #E51818;
            }

            .links {
                margin-top: 20px;
                display: flex;
                gap: 20px;
            }

            .nav-link {
                text-decoration: none;
                color: #fff;
                font-weight: bold;
                font-size: 18px;
                background-color: blue;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .nav-link2 {
                text-decoration: none;
                color: #fff;
                font-weight: bold;
                font-size: 18px;
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .content {
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #E51818;
                font-family:"Century Gothic";
                font-weight: bold;  
            }

            .logo {
                margin-bottom: 20px;
            }

            .link-box {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
                background-color: #E51818;
                color: black;
                border-radius: 8px;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .link-box:hover {
                background-color: #e0e0e0;
            }

            .h-16 {
                height: 4rem;
            }

            
            table {
                width: 50%;
                height: 50%; /* Adjust the value as needed */
                margin: 0 auto; /* Center the table horizontally */
                border-collapse: collapse; /* Optional: collapse borders between cells */
                padding-left: 50px;
                padding-right: 50px;
               
            }

            td {
              
                padding-left: 50px;
                padding-right: 50px;
            }



            tr {
                padding-left: 50px;
                padding-right: 50px;
                background-color: #cbd6e4;
                color:black;
            }

            /* Increase the padding */

        </style>
    </head>

    <body>
        <div class="content">
            <h2 style="font-weight:bold;font-size:35px;color:white">ABOUT US</h2>
            <table>
                <tr>
                    <td>
                        <br>
                        <br>
                        <img src="https://mapio.net/images-p/23492636.jpg" alt="Description of the image" style="max-width: 100%; height: auto;">
                        <p>
                            IF YOU WANT TO CONTACT US, YOU MAY CONTACT US VIA EMAIL OR CONTACT NUMBER, OR YOU MAY HAVE TO GO TO OUR STORE HERE IN CAGAYAN DE ORO CITY, SPECIFICALLY IN PABAYO COR. JR BORJA STREET. YOU MAY APPROACH MR. PEDRO PAILAGAO FOR THIS.
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</x-guest-layout>
