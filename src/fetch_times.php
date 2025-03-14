<?php
require_once "dbconnect.php";

if (isset($_GET['table'])) {
    $allowedTables = [
        'finland_honkanen', 
        'finland_vehmas', 
        'finland_saakoski', 
        'finland_painaa', 
        'estonia_nupli', 
        'estonia_koigu', 
        'estonia_vahessare', 
        'estonia_vissi', 
        'montecarlo_labollene', 
        'montecarlo_lamairis', 
        'montecarlo_moissiere', 
        'montecarlo_ravindecoste', 
        'sweden_spikbrenna', 
        'sweden_aslia', 
        'sweden_algsjon', 
        'sweden_storajangen', 
        'mexico_ortega', 
        'mexico_ibarrilla', 
        'mexico_alfaro',
        'portugal_fridao', 
        'portugal_touca', 
        'portugal_carrazedo',
        'sardegna_littichedda', 
        'sardegna_bortigiadas', 
        'sardegna_montemuvri',
        'kenya_moinorth', 
        'kenya_wileli',
        'kenya_sugunoi', 
        'kenya_kanyawa',
        'europe_vitova', 
        'europe_libosvary', 
        'europe_osicko',
        'greece_mariolata', 
        'greece_viniani',
        'greece_parnassos', 
        'greece_drosochori',
        'japan_oninotaira', 
        'japan_habudam', 
        'japan_higashino', 
        'japan_nenouehighlands', 
        'croatia_stojdraga',
        'croatia_hartje',
        'croatia_krasic'
    ];
    $table = $_GET['table'];

    if (in_array($table, $allowedTables)) {
        $query = "SELECT * FROM $table ORDER BY time ASC;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($results);
    } else {
        echo json_encode(["error" => "Invalid table"]);
    }
} else {
    echo json_encode(["error" => "No table specified"]);
}

