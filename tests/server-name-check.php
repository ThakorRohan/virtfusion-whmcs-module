<?php

// Self-check for lib/ServerName.php: `php tests/server-name-check.php`, exits 1 on failure.
// CLI only: this folder sits under the WHMCS web root.
if (PHP_SAPI !== 'cli') {
    exit;
}

require __DIR__ . '/../lib/ServerName.php';

use WHMCS\Module\Server\VirtFusionDirect\ServerName;

function check(bool $ok, string $what): void
{
    if (! $ok) {
        fwrite(STDERR, "FAIL: {$what}\n");
        exit(1);
    }
}

$adjectives = ServerName::words(ServerName::ADJECTIVES);
$nouns = ServerName::words(ServerName::NOUNS);

foreach (['adjective' => $adjectives, 'noun' => $nouns] as $kind => $list) {
    $bad = preg_grep('/^[a-z]{3,10}$/', $list, PREG_GREP_INVERT);
    check($bad === [], "{$kind}s not 3-10 lowercase letters: " . implode(' ', $bad));
    $dups = array_diff_assoc($list, array_unique($list));
    check($dups === [], "duplicate {$kind}s: " . implode(' ', $dups));
}
$both = array_intersect($adjectives, $nouns);
check($both === [], 'words in both lists: ' . implode(' ', $both));
check(count($adjectives) >= 500 && count($nouns) >= 1200, 'word lists shrank');

for ($i = 0; $i < 1000; $i++) {
    check(preg_match('/^[a-z]{3,10}-[a-z]{3,10}$/', ServerName::random()) === 1, 'random() format');
}

// Taken names are skipped: the first three draws are taken, the fourth comes back.
$drawn = [];
$name = ServerName::generate(function (string $n) use (&$drawn): bool {
    $drawn[] = $n;

    return count($drawn) <= 3;
});
check(count($drawn) === 4 && $name === $drawn[3], 'generate() returns the first free draw');

// Nothing free at all still yields a name.
check(preg_match('/^[a-z]+-[a-z]+-[0-9a-f]{4}$/', ServerName::generate(fn (): bool => true)) === 1, 'hex-suffix fallback');

printf("ok: %d adjectives x %d nouns = %s names\n", count($adjectives), count($nouns), number_format(count($adjectives) * count($nouns)));
