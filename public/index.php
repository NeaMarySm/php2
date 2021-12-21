<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <style type='text/css'>
        a {
            text-decoration: none;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .catalog_item {
            border: 1px solid black;
            padding: 15px;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .btn {

            height: 20px;
            width: 100px;
            margin: -20px -50px;
            position: relative;
            top: 50%;
            left: 50%;

        }
    </style>
    <script>
        function getData(start_num) {  
            fetch(`index2.php?page=${start_num}`)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: ' +
                            response.status);
                        return;
                    }
                    return response.json();        
                })
                .then(data => {
                    console.log(data); // Как отсюда вытащить объект, чтобы обработать через php
                });  
        }
        window.onload = getData(0);
    </script>
</head>

<body>

    <div class='container'>

        <?php 
    // foreach($products as $product){

    //     echo "<div class='catalog_item'> <p>Product:".$product['title']."</p>";
    //     echo "<p>Price:".$product['price']."</p>";
    //     echo "<p>Description: Somthing about product</p></div>";
    // }
    ?>
    </div>
    <button id='getData' onclick="getData()" class='btn'>load more</button>


</body>

</html>