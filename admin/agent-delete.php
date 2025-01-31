<?php
require 'config/function.php';

$parResult = checkParamId('id');
if (is_numeric($parResult)) {
    $agentId =  validate($parResult);

    $agent = getById('agent', $agentId);
    if ($agent['status'] == 200) {
        $agentDelete = deleteQuery('agent', $agentId);

        if ($agentDelete) {
            redirect('agent.php', 'agent deleted successfully');
        } else {
            redirect('agent.php', 'Something went wrong!');
        }
    } else {
        redirect('agent.php', $agent('message'));
    }
} else {
    redirect('agent.php', $parResult);
}
