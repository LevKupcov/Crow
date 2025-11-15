<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('FASTonline');

$staticDir = __DIR__ . '/docs/';
$defaultPage = 'index.html';

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$sitePrefix = '/www/site1';

if (str_starts_with($requestPath, $sitePrefix)) {
    $relativePath = substr($requestPath, strlen($sitePrefix));
} else {
    $relativePath = $requestPath;
}

$relativePath = trim($relativePath, "/ \t\n\r\0\x0B");
$relativePath = preg_replace('~[^a-z0-9/_-]~i', '', $relativePath);
$pathKey = rtrim($relativePath, '/');

$staticMap = [
    '' => 'index.html',
    'index.php' => 'index.html',
    'products' => 'catalog.html',
    'services' => 'services.html',
    'reviews' => 'reviews.html',
    'contacts' => 'contacts.html',
    'faq' => 'faq.html',
    'howitwork' => 'howitwork.html',
    'about-service' => 'about-service.html',
    'catalog' => 'catalog.html',
];

if (isset($staticMap[$pathKey])) {
    $target = $staticMap[$pathKey];
} elseif (preg_match('~^products/\d+$~', $pathKey)) {
    $target = 'catalog-detail.html';
} elseif (preg_match('~^products/category~', $pathKey)) {
    $target = 'catalog-category.html';
} elseif (preg_match('~^services/\d+$~', $pathKey)) {
    $target = 'services-detail.html';
} elseif ($pathKey !== '' && is_file($staticDir . $pathKey . '.html')) {
    $target = $pathKey . '.html';
} else {
    $target = $defaultPage;
    if ($pathKey !== '') {
        http_response_code(404);
    }
}

$staticFile = realpath($staticDir . $target);
$content = ($staticFile && str_starts_with($staticFile, realpath($staticDir)))
    ? file_get_contents($staticFile)
    : null;

if ($content === false || $content === null) {
    echo '<p>Не удалось загрузить статический контент.</p>';
} else {
    $content = preg_replace('~^.*?<body[^>]*>~is', '', $content);
    $content = preg_replace('~</body>.*$~is', '', $content);
    echo $content;
}

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';

?>

