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
                padding-top: 50px; /* Adjust the value as needed */
                padding-left: 100px;
                padding-right: 40px;
                padding-bottom: 20px;
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
        width: 80%;
        height: 150%; /* Adjust the value as needed */
        margin: 0 auto; /* Center the table horizontally */
        border-collapse: collapse; /* Optional: collapse borders between cells */
    }

    td {
        padding-top: 50px; /* Adjust the value as needed */
        padding-bottom: 20px;
        padding-left: 30px;
        padding-right: 30px;
    }

    td:nth-child(1) {
        width: 100%;
    }

    td:nth-child(2) {
        width: 100%;
    }

    tr {
        padding-top: 50px; /* Adjust the value as needed */
        padding-bottom: 20px;
        padding-left: 30px;
        padding-right: 30px;
        background-color: #cbd6e4;
        color:black;
    }

    /* Increase the padding */

        </style>
    </head>

    <body>

            <div class="content">
                
                        <h2 style = "font-weight:bold;font-size:35px;color:white">CompuSource Computer Center</h2>
               
                        <table>
            <tr> 
                <td>
                Our Commitment to Excellence
<br>
<br>
We deliver strong and consistent service towards customer where communication is the key for good communication and will be used as a driving point for the purpose of making sure it is complete.
                </td>
                <td>
                <img src="https://bestdiplomats.org/wp-content/uploads/2023/04/teamwork-power-successful-business-meeting-workplace-concept.jpg" alt="Description of the image">
                </td>
            </tr>
            <tr>
                <td>
                Open to Feedback
                <br>
                <br>
Whatever the company has been doing during single services, feedback is required to boost things for improvements such as management of time frame and the execution of the service. We are open to listen to the customers what complaints they had and what should we do to make the process better.
                </td>
                <td>
                    <img src="https://bestdiplomats.org/wp-content/uploads/2023/04/teamwork-power-successful-business-meeting-workplace-concept.jpg" alt="Description of the image">
                </td>
            </tr>
            <tr>
                <td>
                Careful Processing of the Service
                <br>
                <br>
During the process of the service, we carefully process it by making sure that the problem is already been validated to avoid damage to the customer's unit through careful observation and proper usage of the tools that we had in fixing a certain problem.
                </td>
                <td>
                <img src="https://bestdiplomats.org/wp-content/uploads/2023/04/teamwork-power-successful-business-meeting-workplace-concept.jpg" alt="Description of the image">
                </td>
            </tr>
        </table>
                    </div>
            </div>
        </div>
    </body>
    </x-guest-layout>
