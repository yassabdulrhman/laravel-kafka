<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\ConsumedMessage;

class ConsumeKafkaMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:kafka-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume messages from Kafka';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Kafka::createConsumer()
            ->subscribe(['test-topic'])
            ->withHandler(function (ConsumedMessage $message) {
                $this->info("Received message: " . $message->getBody()['message']);
            })
            ->build()
            ->consume();

        return 0;
    }
}