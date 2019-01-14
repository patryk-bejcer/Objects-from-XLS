<?php

namespace App\Imports;

use App\City;
use App\Object;
use App\Street;
use App\Year;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ObjectsImport implements ToCollection {

	public function collection( Collection $rows ) {
//		var_dump($rows);
		$actualRow = 0;

		foreach ( $rows as $row ) {
			if ( $actualRow !== 0 ) {
				var_dump( $row );
				$year = Year::create( [ 'year' => $row[0] ] );
				$city = City::create( [ 'name' => $row[1] ] );
				$street = Street::create( [ 'name' => $row[2] ] );
				Object::create( [
					'name'      => $row[3],
					'year_id'   => $year->id,
					'city_id'   => $city->id,
					'street_id' => $street->id,
				] );
			}
			$actualRow ++;

		}
	}

//    /**
//    * @param array $row
//    *
//    * @return array
//     */
//    public function model(array $row)
//    {
////    	var_dump($row);
//
//    	$years = new Year([ 'year' => $row[0] ]);
//    	$cities = new City([ 'name' => $row[1] ]);
//    	$streets = new Street([ 'name' => $row[2] ]);
//    	$objects = new Object([
//    			'name' => $row[3] ,
////    			'year_id' => $row[0] ,
////    			'city_id' => $row[1] ,
////    			'street_id' => $row[2] ,
//		    ]);
//
//        return [$years, $cities, $streets, $objects];
//    }
}
