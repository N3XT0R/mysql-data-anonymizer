<?php


namespace N3XT0R\MysqlDataAnonymizer;


class Anonymizer
{
    protected array $config = [];

    public function __construct(array $config)
    {
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


}