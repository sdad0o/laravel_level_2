<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create a new product ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $product = Product::updateOrCreate(
            ['name'=>'comand product'],
            ['price'=>300],
            
        );
        if($product) dump('Product created !');
    }
}
