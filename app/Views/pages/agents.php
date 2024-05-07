<?php
$apiEndpoint = 'https://valorant-api.com/v1/agents';

// Fetch(ing) the JSON from the endpoint
$jsonData = file_get_contents($apiEndpoint);

if ($jsonData === false) {
    die("Error fetching data from the API.");
}

$data = json_decode($jsonData, true);

if (!isset($data['data'])) {
    die("Invalid data structure.");
}

$agents = $data['data']; // Array of agents
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Valorant Agents</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script>
        // JavaScript function to toggle the visibility of agent details will add in with js file later
        function toggleVisibility(id) {
            var element = document.getElementById(id);
            element.classList.toggle('active');
        }
    </script>
</head>
<body>
    <h1 id="agent-top" >Valorant Agents</h1>

    <?php foreach ($agents as $index => $agent) : ?>
        <?php
            $agentName = isset($agent['displayName']) ? $agent['displayName'] : 'Unknown Agent';
            $agentId = 'agent-' . $index; // Unique ID for each agent
        ?>
        
        <button class="agent-button" onclick="toggleVisibility('<?php echo $agentId; ?>')">
            <?php echo $agentName; ?>
        </button>
        
        <div id="<?php echo $agentId; ?>" class="agent-details">
            <?php
                $agentDescription = isset($agent['description']) ? $agent['description'] : 'No description available';

                $agentFullPortrait = isset($agent['fullPortrait']) ? $agent['fullPortrait'] : null;
                $role = isset($agent['role']) ? $agent['role'] : null;
                $abilities = isset($agent['abilities']) && is_array($agent['abilities']) ? $agent['abilities'] : [];
            ?>
            
            <h2><?php echo $agentName; ?></h2>

            <?php if ($agentFullPortrait): ?>
                <img src="<?php echo $agentFullPortrait; ?>" alt="Full portrait of <?php echo $agentName; ?>">
            <?php endif; ?>
            <p><?php echo $agentDescription; ?></p>

            <?php if ($role && isset($role['displayName'])): ?>
                <h3>Role: <?php echo $role['displayName']; ?></h3>
                <?php if (isset($role['displayIcon'])): ?>
                    <img src="<?php echo $role['displayIcon']; ?>" alt="Role Icon">
                <?php endif; ?>
                <p><?php echo isset($role['description']) ? $role['description'] : 'No role description'; ?></p>
            <?php else: ?>
                <p>Role information unavailable</p>
            <?php endif; ?>
            
            <h3>Abilities:</h3>
            <ul>
                <?php if (is_array($abilities)): ?>
                    <?php foreach ($abilities as $ability): ?>
                        <li>
                            <strong><?php echo isset($ability['displayName']) ? $ability['displayName'] : 'Unknown Ability'; ?></strong>
                            <?php if (isset($ability['displayIcon'])): ?>
                                <img src="<?php echo $ability['displayIcon']; ?>" alt="Icon of <?php echo isset($ability['displayName']) ? $ability['displayName'] : 'Unknown'; ?>">
                            <?php endif; ?>
                            <p><?php echo isset($ability['description']) ? $ability['description'] : 'No description available'; ?></p>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No abilities found.</p>
                <?php endif; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</body>
</html>