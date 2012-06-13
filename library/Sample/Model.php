<?php
class Sample_Model
{
    private $db;
    private $logger;
    private $additionalValue;

    public function __construct(Sample_Db $db, Sample_Logger $logger, $additionalValue)
    {
        $this->db = $db;
        $this->logger = $logger;
        $this->additionalValue = $additionalValue;
    }
}