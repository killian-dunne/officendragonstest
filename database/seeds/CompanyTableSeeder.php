<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new \App\Company([
            'name' => 'Amazon',
            'description' => 'Amazon the largest online store in the world with over 600,000 employees. It is the owner of the API provider and cloud computing service AWS.'
        ]);
        $company->save();

        $company = new \App\Company([
            'name' => 'Google',
            'description' => 'Google is the owner of the most popular browser in the world: Google Chrome. It has a suite of tools including Google docs, Gmail, Google Drive and countless others. It is also the owner of YouTube.'
        ]);
        $company->save();

        $company = new \App\Company([
            'name' => 'Facebook',
            'description' => 'Facebook is the most popular social network in the world. It has over 2 billion users and is the owner of a related photo sharing site, Instagram.'
        ]);
        $company->save();

        $company = new \App\Company([
            'name' => 'Apple',
            'description' => 'Apple provides smartphones, laptops and technological accessories. It provides the an app store for mobile development and Apple Music. '
        ]);
        $company->save();
    }
}
