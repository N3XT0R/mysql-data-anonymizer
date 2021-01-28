<?php


namespace N3XT0R\MysqlDataAnonymizer;


interface AnonymizerInterface
{
    public function __construct(array $config);

    public function getConfig(): array;

    public function setConfig(array $config): void;

    public function run(): bool;
}