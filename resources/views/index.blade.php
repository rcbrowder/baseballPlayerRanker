<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Fantasy Baseball Player Ranker</title>
        <!-- Adds Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


        <style>
            .container-fluid {
                /* display: flex;
                height: 100%; */
            }
            #batterCol {
                background-color: blue;
                /* height: 100% !important; */
            }
            #pitcherCol {
                background-color: red;
                /* height: 100% !important; */

            }
            .row {
                /* height: 100%; */
            }
            .col {
                /* flex-grow: 1 1; */
            }

            body {
                /* height: 100vh !important; */
            }

        </style>
    </head>

    <body class="container-fluid">

        <div class="row flex-fill">

            <div id="batterCol" class="col-sm h-100">
                <p>Batter</p>
            </div>

            <div id="pitcherCol" class="col-sm h-100">
                <p>Pitcher</p>
            </div>
        </div>

    </body>

</html>
