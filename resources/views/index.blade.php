<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>

        <meta charset="utf-8">
        <title>Fantasy Baseball Player Ranker</title>
        <!-- Adds Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <style>
            .grow:hover
            {
            -webkit-transform: scale(1.3);
            -ms-transform: scale(1.3);
            transform: scale(1.3);
            transition-duration: .3s;
            }

            .outerdiv {
                overflow: hidden;
                min-width: 400px !important;
            }

            #batterBG {
                width: 100%;
                height: 100%;
                background-image: url(https://cdn-images-1.medium.com/max/1280/1*luSmy-qRh-0Ij5XfMhFjsw.jpeg);
                background-size: cover;
                background-position: 20%;
                transition: all 1s ease;
            }

            #pitcherBG {
                width: 100%;
                height: 100%;
                background-image: url(https://cdn-s3.si.com/styles/marquee_large_2x/s3/images/GettyImages-866042018.jpg?itok=yNdOvOWi);
                background-size: cover;
                background-position: center;
                transition: all 1s ease;
            }


        </style>

    </head>

    <body class="container-fluid h-100 p-0">

        <div class="d-flex flex-wrap h-100">

            <div id="batterCol" class="flex-fill outerdiv">
                <div id="batterBG" class="grow">
                </div>
            </div>

            <div id="pitcherCol" class="flex-fill outerdiv">
                <div id="pitcherBG" class="grow">
                </div>
            </div>
        </div>

    </body>

</html>
