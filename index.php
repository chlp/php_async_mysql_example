<?php
declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

Amp\Loop::run(function() {
    $config = Amp\Mysql\ConnectionConfig::fromString("host=127.0.0.1 user=root password=pass db=public");
    $pool = Amp\Mysql\pool($config);
    
    $startTime = microtime(true);
    $i=0;

    $statement = yield $pool->prepare("select :id as id, sleep(:sleep) as sleep, rand()");

    echo '1 ' . microtime(true) - $startTime . "\n";

    $executions = yield [
        $statement->execute(['id' => ++$i, 'sleep' => 1]),
        $statement->execute(['id' => ++$i, 'sleep' => 4]),
        $statement->execute(['id' => ++$i, 'sleep' => 2]),
    ];

    echo '2 ' . microtime(true) - $startTime . "\n";

    $result = [];
    foreach ($executions as $execution) {
        yield $execution->advance();
        $result[] = $execution->getCurrent();
        echo '|-' . microtime(true) - $startTime . "\n";
    }

    echo '4 ' . microtime(true) - $startTime . "\n\n";

    var_dump($result);
});