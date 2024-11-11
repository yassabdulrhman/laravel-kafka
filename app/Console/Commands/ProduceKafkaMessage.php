<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;


class ProduceKafkaMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'produce:kafka-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a message to Kafka';

    /**
     * Execute the console command.
     *
     * @return int
     */
    
    

    public function handle()
    {
        $producer = Kafka::publishOn('test-topic')
            ->withBodyKey('message', 'Hello Kafka!')
            ->send();

        $this->info("Message sent to Kafka!");
    }
}
