<?php
/**
 * Default Config for merged-prs
 * @var array
 */
return [
    'git' => [
        'tag_prefix' => 'prod-'
    ],
    'github' => [
        'api_host'         => 'https://api.github.com',
        'api_issues_path'  => 'issues',
        'api_request_base' => 'repos',
        'organization'     => null,
        'user_agent'       => null,
        'user_api_key'     => null,
        'web_host'         => 'https://github.com',
        'web_pr_path'      => 'pull'
    ],
    'jira' => [
        'base_url' => null
    ],
    'slack' => [
        'active' => false,
        'channels' => [],
        'icon_emoji' => null,
        'username' => null,
        'user_map' => [],
        'webhook_url' => null
    ]
];
