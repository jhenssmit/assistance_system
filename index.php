<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome page</title>
    <link rel="stylesheet" href="public/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <h1>welcome, register your attendance</h1>
    <h2 id="date"></h2>
    <div class="container">
        <a class="access" href="vista/login/login.php">Enter the system</a>
        <p class="dni">Enter your DNI</p>
        <form action="">
            <input type="text" placeholder="employee DNI" name="txtDNI">
            <div class="buttons">
                <a class="entry" href="">Entry</a>
                <a class="exit" href="">Exit</a>
            </div>
        </form>
    </div>


    <script>
        setInterval(() => {
            let date = new Date();
            let dateHour=date.toLocaleString();
            document.getElementById("date").textContent=dateHour;
        }, 1000)
    </script>
</body>
</html>