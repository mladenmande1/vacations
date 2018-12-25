<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vacations</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .content {
                padding: 30px;
            }

            .userName {
                font-weight: bold;
            }

            .vacationDate {
                background: orange;
                border-radius: 4px;
                padding: 1px 5px;
                font-size: 13px;
                color: #fff;
                font-weight: bold;
            }

            .approved {
                background: green;
            }

            li {
                list-style-type: none;
            }

        </style>
    </head>
    <body>
        <div class="content">
            <h1>Vacations</h1>
            
            <div style="width: 400px; display: inline-block;">
                <h3>Vacation Requests (New)</h3>
                <ul id="new_requests">
                </ul>
                
            </div>

            <div style="width: 400px; display: inline-block;">
                <h3>Approved Vacation Requests</h3>
                <ul>
                </ul>
                
            </div>
            
            <div style="width: 300px;">
                <h3>Users</h3>
                <ul>
                </ul>
                
            </div>

        </div>

        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
        $.get( "/api/all", )
            .done(function( data ) {
                console.log(data);
            });
    });
  </script>
    </body>
</html>
