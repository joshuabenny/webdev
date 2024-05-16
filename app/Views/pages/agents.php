<div class="container">
        <h1>Valorant Agents</h1>
        <div class="agent-buttons">
            <?php
            // Grbbing the cool api :p
            $agents_json = file_get_contents('https://valorant-api.com/v1/agents');
            $agents_data = json_decode($agents_json);

            if ($agents_data && isset($agents_data->data)) {
                foreach ($agents_data->data as $agent) {
                    echo '<button class="agent-button" data-id="' . $agent->uuid . '">' . $agent->displayName . '</button>';
                }
            } else {
                echo '<p>Failed to fetch agent data.</p>';
            }
            ?>
        </div>
        <div class="agent-info-container">
            <?php
            if ($agents_data && isset($agents_data->data)) {
                foreach ($agents_data->data as $agent) {
                    echo '<div class="agent-info" id="' . $agent->uuid . '">';
                    echo '<h2>' . $agent->displayName . '</h2>';
                    echo '<p><strong>Description:</strong> ' . $agent->description . '</p>';
                    if (is_object($agent->role) && isset($agent->role->displayName)) {
                        echo '<p><strong>Role:</strong> ' . $agent->role->displayName . '</p>';
                    } else {
                        echo '<p><strong>Role:</strong> Not available</p>';
                    }
                    echo '<p><strong>Abilities:</strong></p>';
                    echo '<ul>';
                    foreach ($agent->abilities as $ability) {
                        echo '<li>' . $ability->displayName . ' - ' . $ability->description . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>

<script>
    const agentButtons = document.querySelectorAll('.agent-button');
    agentButtons.forEach(button => {
    button.addEventListener('click', () => {
        const agentId = button.getAttribute('data-id');
        const agentInfo = document.getElementById(agentId);
        const allAgentInfo = document.querySelectorAll('.agent-info');
        allAgentInfo.forEach(info => {
            if (info !== agentInfo) {
                info.style.display = 'none';
            }
        });
        agentInfo.style.display = (agentInfo.style.display === 'block') ? 'none' : 'block';
    });
    });
</script>