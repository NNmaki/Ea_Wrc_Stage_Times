<?php

try {
    require_once "src/dbconnect.php";

    $queryNupli = "SELECT * FROM estonia_nupli ORDER BY time ASC LIMIT 10;";
    $stmtNupli = $pdo->prepare($queryNupli);
    $stmtNupli->execute();
    $resultsNupli = $stmtNupli->fetchAll(PDO::FETCH_ASSOC);

    $queryKoigu = "SELECT * FROM estonia_koigu ORDER BY time ASC LIMIT 10;";
    $stmtKoigu = $pdo->prepare($queryKoigu);
    $stmtKoigu->execute();
    $resultsKoigu = $stmtKoigu->fetchAll(PDO::FETCH_ASSOC);

    $queryVahessare = "SELECT * FROM estonia_vahessare ORDER BY time ASC LIMIT 10;";
    $stmtVahessare = $pdo->prepare($queryVahessare);
    $stmtVahessare->execute();
    $resultsVahessare = $stmtVahessare->fetchAll(PDO::FETCH_ASSOC);
    
    $queryVissi = "SELECT * FROM estonia_vissi ORDER BY time ASC LIMIT 10;";
    $stmtVissi = $pdo->prepare($queryVissi);
    $stmtVissi->execute();
    $resultsVissi = $stmtVissi->fetchAll(PDO::FETCH_ASSOC);
    
    $pdo = null;

} catch (PDOException $error) {
    die("Connection failed: " . $error->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" href="images/favicon.png" type="image/x-icon">
        <meta property="og:image" content="https://nnmaki.com/wrc/images/wrc_og.jpg">
        <meta property="og:image:width" content="1370">
        <meta property="og:image:height" content="890">
        <meta property="og:description" content="EA Wrc Game Stage Times">
        <title>EA Wrc Game Stage Times</title>
    </head>
    
    <body class="rally-estonia">
    <script src="script.js"></script>

    <!------------ PopUp Add Record ------------>
    <div id="popup-addrecord" class="popup">
        <div class="popup-addrecord-content">
            <p id="popup-addrecord-message"></p>
            <h2 id="popup-title">NEW STAGE TIME</h2>
            <h3 id="popup-stage">HONKANEN 10.41km</h3> 
            <h5 id="popup-leg">(PÄIJÄLÄ 1st Leg)</h5>
            <form class="add-record-form" action="src/add_record.php" method="post" >
                <input type="hidden" name="table" id="table">
                <div class="form-group">
                    <label for="driver">DRIVER:</label>
                    <input type="text" name="driver" placeholder="Driver" maxlength="3" required>
                </div>
    
                <div class="form-group">
                    <label for="class">CLASS:</label>
                    <select name="class" required>
                        <option value="" disabled selected>Select Class</option>
                        <option value="WRC" selected>WRC</option>
                        <option value="WRC2">WRC2</option>
                        <option value="JUNIOR WRC">JUNIOR WRC</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="car">CAR:</label>
                    <select name="car" required>
                        <option value="" disabled selected>Select Car</option>
                        <option value="Ford Puma Rally1 HYBRID ‘23">Ford Puma Rally1 HYBRID ‘23</option>
                        <option value="Ford Puma Rally1 HYBRID ‘24">Ford Puma Rally1 HYBRID ‘24</option>
                        <option value="Hyundai i20 N Rally1 HYBRID ‘23">Hyundai i20 N Rally1 HYBRID ‘23</option>
                        <option value="Hyundai i20 N Rally1 HYBRID ‘24">Hyundai i20 N Rally1 HYBRID ‘24</option>
                        <option value="Toyota GR Yaris Rally1 HYBRID ‘23" selected>Toyota GR Yaris Rally1 HYBRID ‘23</option>
                        <option value="Toyota GR Yaris Rally1 HYBRID ‘24">Toyota GR Yaris Rally1 HYBRID ‘24</option>
                        <option value="Citroën C3 Rally2">Citroën C3 Rally2</option>
                        <option value="Ford Fiesta Rally2">Ford Fiesta Rally2</option>
                        <option value="Hyundai i20 N Rally2">Hyundai i20 N Rally2</option>
                        <option value="ŠKODA Fabia Rally2 Evo">ŠKODA Fabia Rally2 Evo</option>
                        <option value="ŠKODA Fabia RS Rally2">ŠKODA Fabia RS Rally2</option>
                        <option value="Toyota GR Yaris Rally2">Toyota GR Yaris Rally2</option>             
                    </select>
                </div>
           
                <div class="form-group">
                    <label for="timeInput">Time (MM'SS"SSS):</label>
                    <div class="time-input-container">
                        <input type="text" id="minutes" name="minutes" placeholder="00" maxlength="2" pattern="\d{2}" title="Minuutit (00-59)" required> 
                        <span>'</span>
                        <input type="text" id="seconds" name="seconds" placeholder="00" maxlength="2" pattern="\d{2}" title="Sekunnit (00-59)" required>
                        <span>"</span>
                        <input type="text" id="milliseconds" name="milliseconds" placeholder="000" maxlength="3" pattern="\d{3}" title="Sadasosat (000-999)" required>
                    </div>
                    <small id="errorMsg" style="color: red; display: none;">Time should be in format MM'SS&quot;SSS</small>
                </div>
                <button class="basic-button" id="close-btn" type="submit" onclick="validateTimeInput(event)">SAVE</button>
                <button class="basic-button" id="close-btn" onclick="closeNewRecord()">CLOSE</button>
            </form>
        </div>
    </div>
    <!------------ PopUp Add Record ------------>

    <!------------ PopUp Success ------------>
    <div id="success-popup" class="success-popup">
        <div class="success-popup-content">
            <h3 id="success-message">Time saved successfully!</h3>
            <button class="basic-button" onclick="closeSuccessPopup()">OK</button>
        </div>
    </div>
    <!------------ PopUp Success ------------>

    <!------------ popup show all times ------------>
    <div id="popup-show-all-times" class="popup-show-all-times">
    <div class="popup-show-all-times-content">
        <h2 id="alltimes-popup-title">ALL STAGE TIMES</h2>
        <h3 id="alltimes-popup-stage"></h3> 
        <h5 id="alltimes-popup-leg"></h5>        
        <div class="popup-stage-container">    
            <table class="time-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DRIVER</th>
                        <th>CLASS</th>
                        <th>CAR</th>
                        <th>TIME</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- JavaScript -->
                </tbody>
            </table>
            <button class="basic-button" id="close-btn" onclick="closeShowAllTimes()">CLOSE</button>
        </div>
    </div>
</div>
    <!------------ popup show all times ------------>

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

    <div id="main-container" class="main-container">
        <div class="overlay">
            <h2>RALLY ESTONIA</h2>

            <div class="stage-container">    
                <h3>NÜPLI 8.60km</h3> 
                <h5>(OTEPÄÄ 1st Leg)</h5>
                <h5>TOP TEN FASTEST TIMES</h5>
                <?php if (empty($resultsNupli)): ?>
                <p>No records at the moment</p>
                <?php else: ?>
                <table class="time-table">
                    <thead>
                        <tr>
                        <th>#</th>   
                        <th>DRIVER</th>
                        <th>CLASS</th>
                        <th>CAR</th>
                        <th>TIME</th>
                        <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $rank = 1;
                        foreach ($resultsNupli as $row): ?>
                        <tr>
                        <td><?= $rank ?></td>
                        <td><?= htmlspecialchars($row["driver"]) ?></td>
                        <td><?= htmlspecialchars($row["class"]) ?></td>
                        <td><?= htmlspecialchars($row["car"]) ?></td>
                        <td><?= htmlspecialchars($row["time"]) ?></td>
                        <td><?= htmlspecialchars($row["created_at"]) ?></td>
                        </tr>
                        <?php 
                        $rank++;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                <?php endif; ?>
                <button class="basic-button" onclick="openNewRecord('estonia_nupli', 'NÜPLI', '8.60km', 'OTEPÄÄ 1st Leg')">ADD NEW</button>
                <button class="basic-button" onclick="showAllTimes('estonia_nupli', 'NÜPLI', '8.60km', 'OTEPÄÄ 1st Leg')">SHOW ALL</button>
            </div>

            <div class="divider-stage">
            </div>

            <div class="stage-container">    
                <h3>KOIGU 8.47km</h3> 
                <h5>(OTEPÄÄ 2nd LEG)</h5>
                <h5>TOP TEN FASTEST TIMES</h5>
                <?php if (empty($resultsKoigu)): ?>
                <p>No records at the moment</p>
                <?php else: ?>
                    <table class="time-table">
                    <thead>
                        <tr>
                        <th>#</th>   
                        <th>DRIVER</th>
                        <th>CLASS</th>
                        <th>CAR</th>
                        <th>TIME</th>
                        <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $rank = 1;
                        foreach ($resultsKoigu as $row): ?>
                        <tr>
                        <td><?= $rank ?></td>
                        <td><?= htmlspecialchars($row["driver"]) ?></td>
                        <td><?= htmlspecialchars($row["class"]) ?></td>
                        <td><?= htmlspecialchars($row["car"]) ?></td>
                        <td><?= htmlspecialchars($row["time"]) ?></td>
                        <td><?= htmlspecialchars($row["created_at"]) ?></td>
                        </tr>
                        <?php 
                        $rank++;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                <?php endif; ?>
                <button class="basic-button" onclick="openNewRecord('estonia_koigu', 'KOIGU', '8.47km', 'OTEPÄÄ 2nd Leg')">ADD NEW</button>
                <button class="basic-button" onclick="showAllTimes('estonia_koigu', 'KOIGU', '8.47km', 'OTEPÄÄ 2nd Leg')">SHOW ALL</button>
            </div>

            <div class="divider-stage">
            </div>

            <div class="stage-container">    
                <h3>VAHESSARE 8.60km</h3> 
                <h5>(ELVA 1ST LEG)</h5>
                <h5>TOP TEN FASTEST TIMES</h5>
                <?php if (empty($resultsVahessare)): ?>
                <p>No records at the moment</p>
                <?php else: ?>
                    <table class="time-table">
                    <thead>
                        <tr>
                        <th>#</th>   
                        <th>DRIVER</th>
                        <th>CLASS</th>
                        <th>CAR</th>
                        <th>TIME</th>
                        <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $rank = 1;
                        foreach ($resultsVahessare as $row): ?>
                        <tr>
                        <td><?= $rank ?></td>
                        <td><?= htmlspecialchars($row["driver"]) ?></td>
                        <td><?= htmlspecialchars($row["class"]) ?></td>
                        <td><?= htmlspecialchars($row["car"]) ?></td>
                        <td><?= htmlspecialchars($row["time"]) ?></td>
                        <td><?= htmlspecialchars($row["created_at"]) ?></td>
                        </tr>
                        <?php 
                        $rank++;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                <?php endif; ?>
                <button class="basic-button" onclick="openNewRecord('estonia_vahessare', 'VAHESSARE', '8.60km', 'ELVA 1st Leg')">ADD NEW</button>
                <button class="basic-button" onclick="showAllTimes('estonia_vahessare', 'VAHESSARE', '8.60km', 'ELVA 1st Leg')">SHOW ALL</button>
            </div>

            <div class="divider-stage">
            </div>

            <div class="stage-container">    
                <h3>VISSI 11.82km</h3> 
                <h5>(ELVA 2nd LEG)</h5>
                <h5>TOP TEN FASTEST TIMES</h5>
                <?php if (empty($resultsVissi)): ?>
                <p>No records at the moment</p>
                <?php else: ?>
                    <table class="time-table">
                    <thead>
                        <tr>
                        <th>#</th>   
                        <th>DRIVER</th>
                        <th>CLASS</th>
                        <th>CAR</th>
                        <th>TIME</th>
                        <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $rank = 1;
                        foreach ($resultsVissi as $row): ?>
                        <tr>
                        <td><?= $rank ?></td>
                        <td><?= htmlspecialchars($row["driver"]) ?></td>
                        <td><?= htmlspecialchars($row["class"]) ?></td>
                        <td><?= htmlspecialchars($row["car"]) ?></td>
                        <td><?= htmlspecialchars($row["time"]) ?></td>
                        <td><?= htmlspecialchars($row["created_at"]) ?></td>
                        </tr>
                        <?php 
                        $rank++;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                <?php endif; ?>
                <button class="basic-button" onclick="openNewRecord('estonia_vissi', 'VISSI', '11.82km', 'ELVA 2nd Leg')">ADD NEW</button>
                <button class="basic-button" onclick="showAllTimes('estonia_vissi', 'VISSI', '11.82km', 'ELVA 2nd Leg')">SHOW ALL</button>
            </div>

            <div class="divider-stage">
            </div>


            <div class="bottom-nav-buttons">
                <button class="basic-button" onclick="document.location='index.php'">MAIN PAGE</button>
                <button class="basic-button" onclick="document.location='#main-container'">BACK TO TOP</button> 
            </div>                

        </div>
    </div>

</body>
</html>