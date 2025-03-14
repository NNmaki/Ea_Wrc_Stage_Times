<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <meta property="og:image" content="https://nnmaki.com/wrc/images/wrc_og.jpg">
    <meta property="og:image:width" content="1370">
    <meta property="og:image:height" content="890">
    <meta property="og:description" content="EA Wrc Game Stage Times">
    <title>EA Wrc Game Stage Times</title>
</head>
<body>
    
<header class="sticky-header">
        <a href="index.php"><div class="header-content-1"><p>EA WRC STAGE TIMES</p></div></a>
        <div class="header-content-2">
            <p>© NikoNmaki 2025</p>
            <select id="pageSelect" onchange="navigateToPage(this)">
                <option value="">CHOOSE RALLY:</option>
                <option value="index.php">MAIN PAGE</option>
                <option value="rally_montecarlo.php">RALLY MONTECARLO</option>
                <option value="rally_sweden.php">RALLY SWEDEN</option>
                <option value="rally_mexico.php">RALLY MEXICO</option>
                <option value="rally_croatia.php">RALLY CROATIA</option>
                <option value="rally_portugal.php">RALLY PORTUGAL</option>
                <option value="rally_sardegna.php">RALLY SARDEGNA</option>
                <option value="rally_kenya.php">RALLY KENYA</option>
                <option value="rally_estonia.php">RALLY ESTONIA</option>
                <option value="rally_finland.php">RALLY FINLAND</option>
                <option value="rally_greece.php">RALLY GREECE</option>
                <option value="rally_japan.php">RALLY JAPAN</option>
                <option value="rally_european.php">RALLY CENTRAL EUROPEAN</option>
            </select>
        </div>
        <a href="locations.php">
            <div class="header-content-3">
                <p>LOCATIONS</p>    
            </div>       
        </a>
</header>


<div class="main-container">

    <div class="overlay-frontpage">
        <div class="frontpage-titles">
            <h2 id="main-title">EA WRC STAGE TIMES</h2>
            <h3>CHOOSE RALLY:</h3>
        </div>

        <div class="frontpage-links">
           
            <div class="frontpage-links-container">
                <a href="rally_montecarlo.php">
                    <div class="image-wrapper">
                        <img src="images/rally_montecarlo_tn_300x300.jpg">
                        <div class="image-description">RALLYE MONTE CARLO
                        </div>
                    </div>
                </a>

                <a href="rally_sweden.php">
                <div class="image-wrapper">
                    <img src="images/rally_sweden_tn_300x300.jpg">
                    <div class="image-description">RALLY SWEDEN
                    </div>
                </div>
                </a>
    
                <a href="rally_mexico.php">
                <div class="image-wrapper">
                    <img src="images/rally_mexico_tn_300x300.jpg">
                    <div class="image-description">RALLY MEXICO
                    </div>
                </div>
                </a>

            <div class="frontpage-links-container">

                <a href="rally_croatia.php">
                <div class="image-wrapper">
                    <img src="images/rally_croatia_tn_300x300.jpg">
                    <div class="image-description">RALLY CROATIA
                    </div>
                </div>
                </a>

                <a href="rally_portugal.php">
                <div class="image-wrapper">
                    <img src="images/rally_portugal_tn_300x300.jpg">
                    <div class="image-description">RALLY PORTUGAL
                    </div>
                </div>
                </a>

                <a href="rally_sardegna.php">
                <div class="image-wrapper">
                    <img src="images/rally_sardegna_tn_300x300.jpg">
                    <div class="image-description">RALLY SARDEGNA
                    </div>
                </div>
                </a>

            </div>

            <div class="frontpage-links-container">

                <a href="rally_kenya.php">
                <div class="image-wrapper">
                    <img src="images/rally_kenya_tn_300x300.jpg">
                    <div class="image-description">RALLY KENYA
                    </div>
                </div>
                </a>

                <a href="rally_estonia.php">
                <div class="image-wrapper">
                    <img src="images/rally_estonia_tn_300x300.jpg">
                    <div class="image-description">RALLY ESTONIA   
                    </div>
                </div>
                </a>

                <a href="rally_finland.php">
                <div class="image-wrapper">
                    <img src="images/rally_finland_tn_300x300.jpg">
                    <div class="image-description">RALLY FINLAND
                    </div>
                </div>
                </a>

            </div>

            <div class="frontpage-links-container">
                <a href="rally_greece.php">
                <div class="image-wrapper">
                    <img src="images/rally_greece_tn_300x300.jpg">
                    <div class="image-description">RALLY GREECE
                    </div>
                </div>
                </a>

                <a href="rally_europe.php">
                <div class="image-wrapper">
                    <img src="images/rally_europe_tn_300x300.jpg">
                    <div class="image-description">RALLY CENTRAL EUROPEAN
                    </div>
                </div>
                </a>

                <a href="rally_japan.php">
                <div class="image-wrapper">
                    <img src="images/rally_japan_tn_300x300.jpg">
                    <div class="image-description">RALLY JAPAN
                    </div>
                </div>
                </a>
            </div>
                
            </div>

        </div>

    </div>

</div>

<script src="script.js"></script>
</body>
</html>