<?php
require_once __DIR__ . '/env.php';

function getChatkitEnvConfig(): array
{
    $workflowId = getenv('WORKFLOW_ID') ?: '';
    $openAiApiKey = getenv('OPENAI_API_KEY') ?: '';

    $defaultWorkflow = '776d8016-6e3b-451e-bc5f-f5d1d768de73';
    $resolvedWorkflow = $workflowId !== '' ? $workflowId : $defaultWorkflow;

    return [
        'webhookUrl' => "https://palmtreesai.com/n8n/webhook/{$resolvedWorkflow}/chat",
        'openAiApiKey' => $openAiApiKey,
    ];
}
