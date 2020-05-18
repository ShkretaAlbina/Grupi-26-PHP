<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>App Magic</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="scripts/script.js"></script>
    <script src="js/geolocation.js"></script>
    <link rel="manifest" href="/site.manifest">
​
</head>
<body>
</head>
<body>
<!--<p><button onclick="clickCounter()" type="button">ME KLIKO!</button></p>
<div id="result"></div>
<p>Kliko butonin per te shtuar numrin per 1</p>
<p>Mbyll browser (ose tab), dhe provo perseri, dhe numeruesi ristartohet.</p>
-->
<?php  include_once "header.php"?>

    <div class="wrapper row2">
    <div id="container" class="clear">
        <section id="section" class="clear">
            <figure>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46940.16240123476!2d21.12362194138196!3d42.66643785393475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee605110927%3A0x9365bfdf385eb95a!2sPrishtina!5e0!3m2!1sen!2suk!4v1578001313810!5m2!1sen!2suk" width="630" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <figcaption>
                    <h2>Main location</h2>
                    <section class="grid_1">
                       <p>Apple Online Store<br>
        Prishtine, Kosove</br>
        Bregu i Diellit<br>
        PostCode, 10000</p>
        <p>Tel:
        00010 4569000113</p>
        <p>Fax: 
        00020 1092848109</p>
        <p>E-mail: 
         appleonline@gmail.com</p>
                    </section>
                </figcaption>
            </figure>
        </section>
            <section id="section" class="clear">
                <figure>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46940.16240123476!2d21.12362194138196!3d42.66643785393475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee605110927%3A0x9365bfdf385eb95a!2sPrishtina!5e0!3m2!1sen!2suk!4v1578001313810!5m2!1sen!2suk" width="630" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <figcaption>
                        <h2>Second location</h2>
                        <section class="grid_1">
                         <p>Apple Online Store<br>
        Prishtine, Kosove</br>
        Bregu i Diellit<br>
        PostCode, 10000</p>
        <p>Tel:
        00010 4569000113</p>

        <p>E-mail: 
         appleonline@gmail.com</p>
                        </section>
                    </figcaption>
                </figure>
            </section>
    <section class="clear">
            <div class="container">
                <form>

                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                    <input type="submit" value="Submit">

                </form>
            </div>
        </section>

    </div>
</div>
<div class="wrapper row3">
    <footer id="footer" class="clear">
        <div id="result">
        </div>
        <button style="float: right" type="button" onclick="showPosition();">Show Position</button>
        <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    </footer>
</div>
</body>
</html>
