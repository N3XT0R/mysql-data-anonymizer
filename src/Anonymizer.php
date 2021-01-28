<?php


namespace N3XT0R\MysqlDataAnonymizer;


use function Amp\Mysql\pool;
use Amp\Sql\Pool as ConnectionPoolInterface;
use \Amp\Sql\Common\ConnectionPool;
use Amp\Mysql\ConnectionConfig;
use Amp\Loop;


class Anonymizer implements AnonymizerInterface
{
    protected array $config = [];
    protected ConnectionPoolInterface $connectionPool;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    /**
     * @return ConnectionPoolInterface
     */
    public function getConnectionPool(): ConnectionPoolInterface
    {
        return $this->connectionPool;
    }

    /**
     * @param ConnectionPoolInterface $connectionPool
     */
    public function setConnectionPool(ConnectionPoolInterface $connectionPool): void
    {
        $this->connectionPool = $connectionPool;
    }


    protected function init(): void
    {
        $config = $this->getConfig();
        $connectionPool = pool(
            ConnectionConfig::fromString("host=" . ($config['DB_HOST'] ?? 'localhost') . ";user=" . ($config['DB_USER'] ?? 'root') . ";pass=" . ($config['DB_PASSWORD'] ?? '') . ";db=" . ($config['DB_NAME'] ?? '')),
            $config['NB_MAX_MYSQL_CLIENT'] ?? 150
        );
        $this->setConnectionPool($connectionPool);
    }


    public function run(): bool
    {
        $this->init();
    }
}