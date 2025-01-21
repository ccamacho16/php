<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Menu Options */
        \App\Models\Option::factory()->create(['number' => '1',
                                               'name' => 'Dashboard',
                                               'url' => '/dashboard',
                                               'icon' => '/ico/outline/chart-pie.svg',
                                               'order' => '-1']);

        \App\Models\Option::factory()->create(['number' => '2',
                                               'name' => 'Parameters',
                                               'url' => '#',
                                               'icon' => '/ico/outline/cog-8-tooth.svg',
                                               'order' => '-1',]);                                               
        \App\Models\Option::factory()->create(['number' => '3',
                                               'name' => 'Entites',
                                               'url' => '#',
                                               'icon' => '/ico/outline/cube.svg',
                                               'order' => '0']);                                               
                \App\Models\Option::factory()->create(['number' => '3',
                                                       'name' => 'Branches',
                                                       'url' => 'branch.index',
                                                       'icon' => '',
                                                       'order' => '1']);                                               
                \App\Models\Option::factory()->create(['number' => '3',
                                                       'name' => 'Clients',
                                                       'url' => 'client.index',
                                                       'icon' => '',
                                                       'order' => '2']);
                \App\Models\Option::factory()->create(['number' => '3',
                                                       'name' => 'Suppliers',
                                                       'url' => 'supplier.index',
                                                       'icon' => '',
                                                       'order' => '3']);
                \App\Models\Option::factory()->create(['number' => '3',
                                                       'name' => 'Categories',
                                                       'url' => 'category.index',
                                                       'icon' => '',
                                                       'order' => '4']);
                \App\Models\Option::factory()->create(['number' => '3',
                                                       'name' => 'Products',
                                                       'url' => 'product.index',
                                                       'icon' => '',
                                                       'order' => '5']);                                                                                                                                                                                                                            
                                                                                                                                                                                                                          
        \App\Models\Option::factory()->create(['number' => '4',
                                               'name' => 'Transactions',
                                               'url' => '#',
                                               'icon' => '/ico/outline/table-cells.svg',
                                               'order' => '0']);
                \App\Models\Option::factory()->create(['number' => '4',
                                                       'name' => 'Locker Control',
                                                       'url' => 'locker.index',
                                                       'icon' => '',
                                                       'order' => '1']);                                               
        \App\Models\Option::factory()->create(['number' => '5',
                                               'name' => 'Reports',
                                               'url' => '#',
                                               'icon' => '/ico/outline/document-text.svg',
                                               'order' => '0']);
                \App\Models\Option::factory()->create(['number' => '5',
                                                       'name' => 'Products',
                                                       'url' => 'product.index',
                                                       'icon' => '',
                                                       'order' => '1']);                                               
        \App\Models\Option::factory()->create(['number' => '6',
                                               'name' => 'Abouts',
                                               'url' => '#',
                                               'icon' => '/ico/outline/information-circle.svg',
                                               'order' => '-1']);                                                                                                                                             

        /* End of Menu Options */

        /* System Parameters */        
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Santa Cruz']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'La Guardia']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'El Torno']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Warnes']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Montero']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Mineros']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Yapacani']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Buena Vista']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'Pailon']);
        \App\Models\Master::factory()->create(['entity' => 'city','parameter' => 'system','value' => 'San Juian']);

        \App\Models\Master::factory()->create(['entity' => 'job','parameter' => 'system','value' => 'Colegio']);
        \App\Models\Master::factory()->create(['entity' => 'job','parameter' => 'system','value' => 'Universidad']);
        \App\Models\Master::factory()->create(['entity' => 'job','parameter' => 'system','value' => 'Insituto']);
        \App\Models\Master::factory()->create(['entity' => 'job','parameter' => 'system','value' => 'Profesional']);

        \App\Models\Master::factory()->create(['entity' => 'country','parameter' => 'system','value' => 'Bolivia']);
        \App\Models\Master::factory()->create(['entity' => 'country','parameter' => 'system','value' => 'Argentina']);

        \App\Models\Master::factory()->create(['entity' => 'lockers','parameter' => 'system','value' => '50']);
        /* End of System Parameters */
        
        \App\Models\Branch::factory(2)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\Client::factory(50)->create();
        \App\Models\Supplier::factory(15)->create();
        \App\Models\Category::factory(7)->create();
        \App\Models\Product::factory(15)->create();
//        \App\Models\Locker::factory(50)->create();

        $numlockers = \App\Models\Master::where('entity','lockers')->where('parameter','system')->value('value');
        for ($i=1; $i <= intval($numlockers); $i++) { 
            \App\Models\Locker::factory()->create(['number' => $i,'name' => '','description' => '','user_id'=>1]);
        }

    }
}
