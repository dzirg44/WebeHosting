<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hosting panel</title>
    <link href="css/layout.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <div id='cssmenu' class="inner">
        <ul>
            <li>
                <img src="images/WeBeHosting.png" class="logo">
            </li>
            <li class='kop'>
                <a href='#' class="dashboard active"><img src="images/home.jpg" class="nav-img"><span class="hidden-xs menu-text">Dashboard</span>
                </a>
            </li>
            <li class='kop'>
                <a href='#'><img src="images/.jpg" class="nav-img"><span class="hidden-xs menu-text">Domeinen</span></a>
            </li>
            <li class='kop index-email-kopdown'>
                <a href='#'><img src="images/mail.png" class="nav-img"><span class="hidden-xs menu-text index-email-kopdownn">E-mail</span></a>
                <ul class="index-email-subdown">
                    <li><a href='#' class="subkop">Mail Account</a></li>
                    <li><a href='#' class="subkop">Forward Mail</a></li>
                    <li><a href='pages/email/autoresponders.php' class="subkop">Autoresponders</a></li>
                    <li><a href='#' class="subkop">Aliasses</a></li>
                </ul>
            </li>
            <li class='kop index-databases-kopdown'>
                <a href='#'><img src="images/dedicated.png" class="nav-img"><span class="hidden-xs menu-text index-databases-kopdownn">Databases</span></a>
                <ul class="index-databases-subdown">
                    <li><a href='#' class="subkop">Subkop</a></li>
                </ul>
            </li>
            <li class='kop'>
                <a href='#'><img src="images/cloud.jpg" class="nav-img"><span class="hidden-xs menu-text">Server</span></a>
            </li>
            <li class='kop'>
                <a href='#'><img src="images/account.png" class="nav-img"><span class="hidden-xs menu-text">Mijn account</span></a>
            </li>
            <li class='kop'>
                <a href='#'><img src="images/logout.jpg" class="nav-img"><span class="hidden-xs menu-text">Uitloggen</span></a>
            </li>
        </ul>
    </div>
    <div id="nav" class="inner line-color">
    </div>
    <div class="content">
        <p class="red">
            <img src="images/kruis-red.png" class="red-icon"> CRITICAL EVENTS
        </p>
        <p class="green">
            <img src="images/green-vink.png" class="green-icon"> ACTIVE TICKET
        </p>
        <p class="orange">
            <img src="images/orange-server.png" class="orange-icon"> DEDICATED SERVER
        </p>
        <p class="blue">
            <img src="images/blue-cloud.png" class="blue-icon"> CLOUD SERVER
        </p>
        <table class="t01">
            <tr>
                <th colspan="4" class="left table-padding">OPEN TICKETS</th>
            </tr>
            <tr>
                <td class="table-padding table-numbers hidden-xs">854048</td>
                <td class="table-padding">My server is down</td>
                <td class="center table-padding-icon"><img src="images/instellingen.png" class="icon-table"></i>
                </td>
                <td class="center table-padding-icon"><img src="images/brullenbak.png" class="icon-table"></td>
            </tr>
            <tr>
                <td class="table-padding table-numbers hidden-xs">85438</td>
                <td class="table-padding">My server are up</td>
                <td class="center"><img src="images/instellingen.png" class="icon-table"></td>
                <td class="center"><img src="images/brullenbak.png" class="icon-table"></td>
            </tr>
            <tr>
                <td class="table-padding table-numbers hidden-xs">854648</td>
                <td class="table-padding">My server is down</td>
                <td class="center"><img src="images/instellingen.png" class="icon-table"></td>
                <td class="center"><img src="images/brullenbak.png" class="icon-table"></td>
            </tr>
        </table>
        <table class="t02">
            <tr>
                <th colspan="2" class="left table-padding">ND LABS BLOG</th>
            </tr>
            <tr>
                <td class="table-getal">Interger non lobortis, non mattis odio</td>
                <td class="right">DEC 10</td>
            </tr>
            <tr>
                <td class="table-getal">Ut faucibus mauris et turpis rutrum, quis pretium tresique</td>
                <td class="right">JAN 1</td>
            </tr>
            <tr>
                <td class="table-getal">Cras sed dolor ut lecus laoreet non ea ante</td>
                <td class="right">JAN 15</td>
            </tr>
        </table>
        <table class="t02">
            <tr>
                <th colspan="2" class="left table-padding">RECENT NEWS</th>
            </tr>
            <tr>
                <td class="table-getal">Interger non lobortis, non mattis odio</td>
                <td class="right">DEC 10</td>
            </tr>
            <tr>
                <td class="table-getal">Ut faucibus mauris et turpis rutrum, quis pretium tresique</td>
                <td class="right">JAN 1</td>
            </tr>
            <tr>
                <td class="table-getal">Cras sed dolor ut lecus laoreet non ea ante</td>
                <td class="right">JAN 15</td>
            </tr>
        </table>
        <div class="offer">
            <p class="offer-float">NEW CDN
                <br>SERVICE</p>
            <p class="offer-padding hidden-xs">From
                <br> $0.01/GB</p>
            <p>
                <button class="offer-button button">ORDER NOW</button>
            </p>
        </div>
        <div class="offer">
            <p class="offer-float">NEW CDN
                <br>SERVICE</p>
            <p class="offer-padding hidden-xs">From
                <br> $0.01/GB</p>
            <p>
                <button class="offer-button button">ORDER NOW</button>
            </p>
        </div>
    </div>

</body>

</html>