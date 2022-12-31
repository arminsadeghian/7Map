<?php

function getCurrentUrl(): int
{
    return 1;
}

function isPostRequest(): bool
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isAjaxRequest(): bool
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}

function siteUrl(string $uri = ''): string
{
    return BASE_URL . $uri;
}

function redirect(string $url = "")
{
    header("Location: " . BASE_URL . $url);
    exit();
}

function message(string $msg, string $cssClass = 'info')
{
    echo "<div class='$cssClass' style='padding: 20px; width: 80%; margin: 10px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;text-align: center;'>$msg</div>";
}
