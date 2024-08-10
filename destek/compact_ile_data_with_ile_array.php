        $with = [
            'sehir'    => $sehir,
            'kelime'   => $kelime,
            'sliders'  => $sliders,
            'services' => $services, 
			'featured_posts' => $featured_posts,
        ];

        return view('pages.nakliye')->with($with);