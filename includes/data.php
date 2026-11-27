<?php
/**
 * Complete site and product data ported from src/data/site.js and src/data/products.js.
 */

$NAV = [
    ['to' => '/', 'label' => 'Home', 'end' => true],
    ['to' => '/the-company/about-us', 'label' => 'About Us'],
    ['to' => '/products', 'label' => 'Products', 'mega' => true],
    ['to' => '/applications', 'label' => 'Applications'],
    ['to' => '/infrastructure', 'label' => 'Infrastructure'],
    ['to' => '/downloads', 'label' => 'Downloads'],
    ['to' => '/contact', 'label' => 'Contact Us'],
];

$CONTACT = [
    'company' => 'Primetech Industries',
    'units' => [
        [
            'name' => 'Unit 1',
            'lines' => ['Plot No. 4716 & 4717, Phase 4,', 'Opp. Water Tank, GIDC Vatva,', 'Ahmedabad - 382 445.', 'Gujarat, India.'],
        ],
        [
            'name' => 'Unit 2',
            'lines' => ['3/2 & 3/3, Panchratna Industrial Estate,', 'Nr. Baroda Express Highway, Ramol Over Bridge, Vatva,', 'Ahmedabad - 382 445.', 'Gujarat, India.'],
        ],
    ],
    'phones' => ['+91-9081000745', '+91-9687000743'],
    'emails' => ['siddharth@primetechmixer.com', 'naren@primetechmixer.com'],
    'marketingEmail' => 'marketing-3@primetechmixer.com',
    'whatsapp' => '+91 90810 00746',
    'whatsappLink' => 'https://api.whatsapp.com/send?phone=919081000746&text=Hello%20Primetech%20Industries,%20I%20am%20interested%20in%20your%20machinery%20products.',
    'callLink' => 'tel:+919081000746',
    'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1544.469076003627!2d72.64516811309103!3d22.972783960275645!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa70a8008496edb51!2sPrimetech+Industries!5e0!3m2!1sen!2sus!4v1516262954578',
    'social' => [
        ['name' => 'LinkedIn', 'url' => 'https://www.linkedin.com/company/primetech-industry/'],
        ['name' => 'YouTube', 'url' => 'https://www.youtube.com/@PRIMETECHINDUSTRIES-w9n'],
        ['name' => 'Instagram', 'url' => 'https://www.instagram.com/primetech_industries?stkn=ZmFmcDg0dGJlNW9l'],
    ],
];

$ABOUT_INTRO = [
    'PRIMETECH laid its foundation in 1991 with a strong vision of becoming a world-class leader by delivering products of exceptional quality to customers across the globe.',
    "Primetech has come a long way to it's present establishment status as the leading producer of plastic processing equipments in India and have also started to make their presence felt in the global market.",
    'Primetech maintains a cutting-edge by efficient R & D division to meet specialized technological challenges.',
    'Total quality management systems relentlessly work towards achieving zero defect and failure free performance, leading to superior quality at remarkable competitive rates.',
    'We make our know-how in mixing technology, material handling and transfer systems and size reduction technology available to the customer with the help of goal oriented dynamic employees and close co-operation with customer specialists. Thus allowing us to develop leading edge technology.',
];

$ABOUT_PROFILE = [
    'PRIMETECH, an ISO 9001:2015 certified enterprise, laid its foundation in 1991 with a strong vision of becoming a world-class leader by engineering and delivering ultimate quality plastic processing machinery across the globe.',
    'Primetech has evolved to its present premier establishment status as a leading manufacturer of advanced plastic processing equipment in India, while continuously expanding its footprint across international markets. Our modern manufacturing facility in Ahmedabad, Gujarat, is equipped with high-precision fabrication, assembly, and testing infrastructure.',
    'We maintain an agile edge through our dedicated Research & Development (R&D) division, meeting specialized technological challenges with cutting-edge engineering solutions. Total Quality Management (TQM) systems relentlessly drive towards zero-defect and failure-free performance, delivering superior machinery at remarkably competitive investment costs.',
    'With deep technical know-how in high-speed industrial mixing technology, automated bulk material handling and conveying systems, and precision size reduction technology, our dynamic engineers work in close collaboration with client specialists to customize solutions that define industry standards for tomorrow.',
];

$PILLARS = [
    ['k' => 'Philosophy', 'v' => "A relentless drive for excellence has driven the company's remarkable growth. Enthusiasm, engineering integrity, and passion form the foundation of our commitment to every client."],
    ['k' => 'Vision', 'v' => 'Customer satisfaction is our prime motto. We aspire to build enduring global client relationships benchmarked on trust, technology leadership, and prompt support.'],
    ['k' => 'The Mission', 'v' => 'To deliver uncompromising quality by paying utmost attention to small details, continuous innovation, manufacturing accuracy, safety, and lifelong service dependability.'],
];

$OFFER = [
    ['Reputed Global Components', 'All bought-out components from internationally renowned, trusted brands.'],
    ['Extended Tool Life', 'Promising tool longevity with minimal wear rate, even under intense filler loadings.'],
    ['Proven Pneuma-Seal', 'Extended bearing life backed by our proprietary Pneuma-seal technology.'],
    ['Centralized Lubrication', 'Convenient lubrication ports for effortless maintenance and servicing.'],
    ['Heavy & Robust Construction', 'Sturdy structural frames with integrated intelligent safety parameters.'],
    ['In-House Manufacturing', 'Complete in-house fabrication of key parts under strict quality control.'],
    ['Stress-Free Components', 'Highly finished, precision-machined parts utilizing modern manufacturing methods.'],
];

$ADVANTAGES = [
    ['High Throughput Rates', 'Maximum output capacity with continuous operational reliability.'],
    ['Lowest Power Consumption', 'Energy-efficient design minimizing overall kilowatt per ton costs.'],
    ['Consistent Powder Quality', 'Highly reproducible, homogeneous blend minimizing extrusion scrap.'],
    ['Robust Working Life', 'Heavy-duty industrial build designed for multi-shift continuous duty.'],
    ['Easy Installation', 'Quick plug-and-operate setup with comprehensive operational documentation.'],
    ['Safe & User-Friendly', 'Intuitive operator controls and fail-safe safety interlocks.'],
    ['Quick & Smart Service', 'Fast technical response with proactive troubleshooting solutions.'],
    ['Tailored Engineering', 'Customized design configurations engineered for specific client processes.'],
];

$QUALITY = [
    'QUALITY has always been of prime importance since the inception of the company. Comprehensive resources and dedicated technical talents have been committed to manufacturing state-of-the-art machinery. Our equipment is dependable, robust, energy-efficient, and engineered using premium certified components.',
    'Through unwavering quality consciousness and constant technological advancements, Primetech has earned an impeccable reputation as a trusted OEM machinery partner to industry leaders across India and abroad.',
];

$AWARDS_TEXT = 'Reflecting our rigorous manufacturing discipline and zero-defect philosophy, Primetech has been repeatedly honoured by industry giants including M/s. Windsor Machines Ltd. and M/s. Rollepaal Engineering India Limited with their prestigious QUALITY EXCELLENCE AWARDS for outstanding workmanship and supply excellence.';

$OEM_PARTNERS = [
    ['windsor-logo.jpg', 'Windsor Machines Ltd.'],
    ['rollepaal-logo.jpg', 'Rollepaal Engineering India Pvt. Ltd.'],
    ['prasad-group-logo.jpg', 'Prasad Group Of Companies'],
    ['pharmalab-logo.jpg', 'Pharmalab Engineering India Ltd.'],
    ['rajoo-bausano.jpg', 'Rajoo Bausano Extrusion Pvt. Ltd.'],
    ['milacron.jpg', 'Milacron India Ltd.'],
];

$CERTS = [
    ['ISO-certificate.jpg', 'ISO Certificate'],
    ['db-certificate.jpg', 'D & B Certificate'],
    ['rollepaal-certificate.jpg', 'Rollepaal Certificate'],
    ['windsor-certificate.jpg', 'Windsor Certificate'],
    ['sintex-certificate.jpg', 'Sintex Certificate'],
    ['kipper-certificate.jpg', 'Skipper Certificate'],
];

$STATS = [
    ['n' => 36, 'suffix' => '+', 'label' => 'Years of Manufacturing Experience', 'note' => 'Since 1991 • ISO 9001:2015', 'format' => null, 'unit' => null],
    ['n' => 3, 'suffix' => '', 'label' => 'Manufacturing Units in India', 'note' => 'Infrastructure', 'format' => null, 'unit' => null],
    ['n' => 100000, 'suffix' => '', 'format' => 'indian', 'unit' => 'Sq. Ft.', 'label' => 'Total Area for Manufacturing', 'note' => 'Floor Area'],
    ['n' => 3500, 'suffix' => '+', 'label' => 'Mixing Plant Installations Worldwide', 'note' => 'Global Benchmark', 'format' => null, 'unit' => null],
    ['n' => 400, 'suffix' => '+', 'label' => 'Equipments Production Capacity', 'note' => 'Annually', 'format' => null, 'unit' => null],
    ['n' => 1400, 'suffix' => '+', 'label' => 'Pulverizing System Installations', 'note' => 'Worldwide', 'format' => null, 'unit' => null],
    ['n' => 25, 'suffix' => '+', 'label' => 'Countries Served in Exports', 'note' => 'International Markets', 'format' => null, 'unit' => null],
];

$FOOTPRINT_COPY = [
    'heritage' => 'Pioneering world-class plastic processing machinery, custom turnkey mixing plants, and high-precision size reduction systems with ISO 9001:2015 certified quality.',
    'units' => 'Advanced production facilities equipped with heavy CNC machining, precision fabrication, dynamic balancing, and rigorous quality inspection bays.',
    'area' => 'Expansive facility footprint purpose-built for heavy machinery assembly, high-volume production, and comprehensive testing.',
    'mixing' => 'Our flagship high-speed mixing, cooling, and automated compounding systems power top PVC pipes, profiles, cables, masterbatches, and polymer compounding processors across the globe.',
    'capacity' => 'High production throughput delivering customized machinery promptly without compromising build quality.',
    'pulverizing' => 'Engineered for fine mesh powdering, high output efficiency, and minimal energy consumption across diverse materials.',
    'countries' => 'Recognized and trusted by international processors across Asia, Africa, Middle East, Europe & the Americas.',
];

$EXPORTS_TEXT = 'With an ever-expanding international customer base, Primetech exports high-performance machinery across Asia, the Middle East, Africa, and beyond.';

$CLIENTS_FEATURED = array_map(
    fn($item) => ['src' => '/assets/clients/' . $item[0], 'name' => $item[1]],
    [
        ['astral.jpg', 'Astral'], ['birlanu.png', 'BirlaNu / HIL'], ['captain.png', 'Captain'], ['centuryply.png', 'CENTURYPLY'],
        ['duke.jpg', 'Duke'], ['greenply.svg', 'GREENPLY'], ['indowud.webp', 'INDOWUD'], ['kkalpana.jpg', 'KALPANA'],
        ['lapp.svg', 'LAPP'], ['ori-plast.png', 'Ori-Plast'], ['patton.jpg', 'Patton'], ['polycab.jpg', 'Polycab'],
        ['prince.png', 'Prince Piping Systems'], ['roca.svg', 'ROCA'], ['sintex.png', 'SINTEX'], ['sudharkar.jpg', 'Sudhakar Pipes & Fittings'],
        ['supreme.png', 'SUPREME'], ['ultratech.png', 'ULTRATECH CEMENT'],
    ]
);

$CLIENTS_MORE = array_map(
    fn($item) => ['src' => '/assets/clients/' . $item[0], 'name' => $item[1]],
    [
        ['alok.jpg', 'Alok Industries'], ['alstone.jpg', 'ALSTONE'], ['anchor.jpg', 'Anchor by Panasonic'], ['basil.jpg', 'BASIL'],
        ['deep-masterbatches.jpg', 'Deep Masterbatches'], ['doms.jpg', 'DOMS'], ['extrusion-technik.jpg', 'EXTRUSION TECHNIK USA INC.'],
        ['falcon.jpg', 'Falcon'], ['fusion.png', 'Fusion'], ['kelvin.gif', 'Kelvin'], ['kemron.jpg', 'KEMRON'], ['kisan.jpg', 'Kisan'],
        ['lifeline.jpg', 'LIFELINE'], ['marvel.png', 'Marvel'], ['meet-marketing.jpg', 'MEET MARKETING'], ['milacron.jpg', 'Milacron'],
        ['miraj.png', 'Miraj'], ['padmavati.jpg', 'Padmavati'], ['patkar-extrusions.jpg', 'PATKAR EXTRUSIONS LTD.'],
        ['poly-colouraid.png', 'Poly-Colouraid'], ['rajiv.jpg', 'Rajiv'], ['rajoo-bausano.jpg', 'Rajoo Bausano'], ['ramco-gropu.gif', 'RAMCO GROUP'],
        ['realplast.webp', 'REALPLAST'], ['rfl.svg', 'RFL'], ['rollepaal-logo.jpg', 'Rollepaal'], ['royal-group.jpg', 'Royal Group'],
        ['shakti.png', 'Shakti'], ['shyam-plastic.png', 'Shyam Plastic Industries'], ['kipper.jpg', 'Skipper Pipes'], ['spl.jpg', 'SPL'],
        ['steer.jpg', 'Steer'], ['v-guard.png', 'V-Guard'], ['vishal-plastocab.jpg', 'Vishal Plastocab'], ['welmon.jpg', 'Welmon'],
        ['windsor-logo.jpg', 'Windsor'],
    ]
);

$INFRA_INTRO = [
    'PRIMETECH INDUSTRIES operates across three dedicated, high-capacity manufacturing units with a total footprint of over 1,00,000 sq. ft. in the prime industrial zones of Vatva, Ahmedabad, Gujarat.',
    'Our facilities are engineered with state-of-the-art heavy machine tools, multi-ton E.O.T. overhead cranes, precision CNC lathes, horizontal boring mills, and dynamic rotor balancing centers to deliver robust and flawless compounding and size-reduction machinery worldwide.',
];

$INFRA_HIGHLIGHTS = [
    '3 Specialized Manufacturing Units',
    '1,00,000 Sq. Ft. Total Facility Area',
    'Heavy CNC & Machining Centers',
    'Heavy Duty E.O.T. Cranes for Large Projects',
    'ISO 9001:2015 Quality Benchmarked',
];

$UNITS = [
    [
        'id' => 'unit-1',
        'tab' => 'Unit 1: Main Campus & Heavy Assembly',
        'label' => 'Flagship Campus',
        'title' => 'Unit 1: Heavy Machining, Vessel Fabrication & Final Assembly',
        'address' => 'Plot No. 4716 & 4717, Phase 4, Opp. Water Tank, GIDC Vatva, Ahmedabad - 382 445, Gujarat, India.',
        'feature' => [
            'src' => '/assets/gallery/unit1-main.jpg',
            'title' => 'Primary Assembly & Heavy Engineering Complex',
            'text' => 'Equipped with overhead E.O.T. cranes, heavy vessel assembly jigs, automated plasma cutting, and trial run test benches.',
        ],
        'photos' => [
            ['/assets/gallery/unit1-01.jpg', 'Fabrication Bay & Material Intake'],
            ['/assets/gallery/unit1-02.jpg', 'Assembly Line & Testing Floors'],
            ['/assets/gallery/unit1-03.jpg', 'Heavy Crane Section & Stockyard'],
        ],
        'where' => 'Unit 1 - GIDC Vatva',
    ],
    [
        'id' => 'unit-2',
        'tab' => 'Unit 2: Precision CNC & Fabrication',
        'label' => 'Precision Machining Division',
        'title' => 'Unit 2: Precision CNC Machining, Fabrication & Dynamic Balancing',
        'address' => '3/2 & 3/3, Panchratna Industrial Estate, Nr. Baroda Express Highway, Ramol Over Bridge, Vatva, Ahmedabad - 382 445, Gujarat, India.',
        'feature' => null,
        'photos' => [
            ['/assets/gallery/unit2-01.jpg', 'Precision CNC Center'],
            ['/assets/gallery/unit2-02.jpg', 'Heavy Lathe & Turning Shop'],
            ['/assets/gallery/unit2-03.jpg', 'Horizontal Boring Operations'],
            ['/assets/gallery/unit2-04.jpg', 'Vessel Rolling & Forming'],
            ['/assets/gallery/unit2-05.jpg', 'Dynamic Rotor Balancing Bay'],
            ['/assets/gallery/unit2-06.jpg', 'Precision Component Machining'],
            ['/assets/gallery/unit2-07.jpg', 'Heavy Structural Fabrication'],
            ['/assets/gallery/unit2-08.jpg', 'Surface Finishing & Polishing'],
            ['/assets/gallery/unit2-09.jpg', 'Quality & Dimensional Inspection'],
            ['/assets/gallery/unit2-10.jpg', 'Sub-Assembly & Drive Fitting'],
            ['/assets/gallery/unit2-11.jpg', 'Raw Material Inventory & Storage'],
            ['/assets/gallery/unit2-12.jpg', 'Pre-Dispatch Inspection Bay'],
        ],
        'where' => 'Unit 2 - Panchratna',
    ],
    [
        'id' => 'unit-3',
        'tab' => 'Unit 3: Systems & Testing Wing',
        'label' => 'Automation & Systems Facility',
        'title' => 'Unit 3: Automated Conveying, Screening & Turnkey Plant Integration',
        'address' => 'Dedicated Systems & Controls Engineering Complex, Industrial Area, Vatva, Ahmedabad, Gujarat.',
        'feature' => null,
        'photos' => [
            ['/assets/gallery/unit3-01.jpg', 'Systems Integration, Spiral Conveyors & Plant Automation Wing'],
        ],
        'where' => 'Unit 3 - Specialized Conveying & Control Assembly Complex',
    ],
];

$INDUSTRIES = [
    'Plastics and Polymers',
    'Food and Flour Industry',
    'Minerals and Metals',
    'Pharmaceuticals and Herbal',
    'Spices Industry',
    'Refractories and Abrasives',
    'Ceramics Industry',
    'Starch and Glucose',
    'Dairy Industry',
    'Pesticides and Insecticides',
    'Soaps and Detergents',
    'Wood Processing Industry',
    'Waste Processing Industry',
    'Paper Processing Industry',
    'Rubber Processing Industry',
    'Chemical Industry',
];

$APPLICATION_IMAGES = array_map(
    fn($n) => "/assets/application/{$n}.jpg",
    ['001', '002', '003', '004', '005', '006', '007', '008']
);

$APPLICATION_ICONS = [
    ['icon' => 'cable', 'label' => 'Wires & Cables'],
    ['icon' => 'layers', 'label' => 'WPC Profiles'],
    ['icon' => 'boxes', 'label' => 'Masterbatch Pellets'],
    ['icon' => 'sparkles', 'label' => 'Polymer Powders'],
    ['icon' => 'circle-dot', 'label' => 'Flexible Hoses'],
    ['icon' => 'shield-check', 'label' => 'Braided Tubing'],
    ['icon' => 'palette', 'label' => 'Pigments & Color'],
    ['icon' => 'cylinder', 'label' => 'PVC Pipes & Fittings'],
];

$DOWNLOADS = [
    ['title' => 'High Speed Heater Cooler Mixer', 'note' => 'Corporate Brochure', 'thumb' => '/assets/products/heater-cooler-mixer-thumb1.png', 'file' => '/assets/pdf/corporate.pdf'],
    ['title' => 'High Speed Mixer', 'note' => 'Corporate Brochure', 'thumb' => '/assets/products/high-speed-mixer-thumb.png', 'file' => '/assets/pdf/corporate.pdf'],
    ['title' => 'Horizontal Cooler', 'note' => null, 'thumb' => '/assets/products/horizontal-cooler.png', 'file' => '/assets/pdf/horizontal-cooler.pdf'],
    ['title' => 'Lab Mixer', 'note' => null, 'thumb' => '/assets/products/laboratory-mixer-thumb.png', 'file' => '/assets/pdf/laboratory-mixer.pdf'],
    ['title' => 'Pulverizer', 'note' => null, 'thumb' => '/assets/products/pulverizer-thumb.png', 'file' => '/assets/pdf/pulverizer.pdf'],
    ['title' => 'Spiral Conveyor', 'note' => null, 'thumb' => '/assets/products/spiral-vacume-conveyor-thumb.png', 'file' => '/assets/pdf/spiral-conveyor.pdf'],
    ['title' => 'Screw Conveyor', 'note' => null, 'thumb' => '/assets/products/screw-conveyor-thumb.png', 'file' => '/assets/pdf/screw-conveyor.pdf'],
    ['title' => 'Rotary Air Lock Valve', 'note' => null, 'thumb' => '/assets/products/rotary-airlock-valve-thumb.png', 'file' => '/assets/pdf/rotary-air-lock-valve.pdf'],
    ['title' => 'Gyro Vibrating Screen', 'note' => null, 'thumb' => '/assets/products/gyro-vibrating-sieve-thumb.png', 'file' => '/assets/pdf/gyro-vibrating-sieve.pdf'],
    ['title' => 'Granulator Size Reduction & Reutilization', 'note' => null, 'thumb' => '/assets/products/granulator-thumb.png', 'file' => '/assets/pdf/granulator.pdf'],
    ['title' => 'Heavy Duty Shredder', 'note' => null, 'thumb' => '/assets/products/shredder-thumb.png', 'file' => '/assets/pdf/shredder.pdf'],
    ['title' => 'Corporate Catalogue', 'note' => null, 'thumb' => '/assets/products/corporate-thumb.png', 'file' => '/assets/pdf/corporate.pdf'],
];

$HERO_SLIDES = [
    ['slug' => 'high-speed-heater-cooler-mixer', 'lines' => ['Where precision', 'meets performance.'], 'accent' => 1, 'sub' => 'For high throughputs, reduce cycle times and consistent product quality.', 'img' => '/assets/products/heater-cooler-mixers-new.png'],
    ['slug' => 'pulverizer', 'lines' => ['The finer the grind,', 'the higher the value.'], 'accent' => 1, 'sub' => 'Fine And Uniform Grains For Better Productivity.', 'img' => '/assets/products/pulverizer-new.png'],
    ['slug' => 'shredder', 'lines' => ['Strength that never', 'backs down.'], 'accent' => 1, 'sub' => 'Consistent Output, Even Under Extreme Load Conditions.', 'img' => '/assets/products/shredder-new.png'],
    ['slug' => 'granulators', 'lines' => ['Turning waste', 'into value.'], 'accent' => 1, 'sub' => 'Maximum Recovery, Minimum Material Loss.', 'img' => '/assets/products/granulator-new.png'],
];

$COUNTRIES = [
    'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antigua & Barbuda',
    'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh',
    'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia & Herzegovina',
    'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada',
    'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros',
    'Congo - Brazzaville', 'Congo - Kinshasa', 'Cook Islands', 'Costa Rica', "Côte d'Ivoire", 'Croatia', 'Cuba',
    'Curaçao', 'Cyprus', 'Czechia', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt',
    'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Falkland Islands',
    'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'Gabon', 'Gambia',
    'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam',
    'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hong Kong SAR China', 'Hungary',
    'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica',
    'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon',
    'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macao SAR China', 'Madagascar',
    'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius',
    'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco',
    'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Caledonia', 'New Zealand',
    'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'North Korea', 'North Macedonia', 'Norway', 'Oman', 'Pakistan',
    'Palau', 'Palestinian Territories', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland',
    'Portugal', 'Puerto Rico', 'Qatar', 'Réunion', 'Romania', 'Russia', 'Rwanda', 'Samoa', 'San Marino',
    'São Tomé & Príncipe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore',
    'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Korea', 'South Sudan', 'Spain',
    'Sri Lanka', 'St. Kitts & Nevis', 'St. Lucia', 'St. Vincent & Grenadines', 'Sudan', 'Suriname', 'Sweden',
    'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga',
    'Trinidad & Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks & Caicos Islands', 'Tuvalu', 'Uganda',
    'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu',
    'Vatican City', 'Venezuela', 'Vietnam', 'British Virgin Islands', 'U.S. Virgin Islands', 'Yemen', 'Zambia',
    'Zimbabwe',
];

$CATEGORIES = [
    [
        'id' => 'mixing',
        'name' => 'Mixing Solutions',
        'short' => 'Mixing',
        'blurb' => 'High-speed compounding, rapid thermal cooling, homogenization, and laboratory testing mixers.',
        'image' => '/assets/products/heater-cooler-mixers-new.png',
    ],
    [
        'id' => 'size-reduction',
        'name' => 'Size Reduction',
        'short' => 'Size Reduction',
        'blurb' => 'Ultrafine pulverizing, scrap granulating, and high-torque shredding machinery.',
        'image' => '/assets/products/pulverizer-new.png',
    ],
    [
        'id' => 'conveying',
        'name' => 'Conveying and Automation',
        'short' => 'Conveying',
        'blurb' => 'Automated bulk powder transfer, dust-free conveying, precision screening, and complete turnkey mixing plant automation.',
        'image' => '/assets/products/spiral-conveyor-new.png',
    ],
];

$PRODUCTS = [
    [
        'slug' => 'high-speed-heater-cooler-mixer',
        'name' => 'High Speed Heater Cooler Mixer',
        'category' => 'mixing',
        'code' => 'HCM',
        'tag' => 'Heating & Cooling',
        'tagline' => 'Your Reliable Partner for MIXING TECHNOLOGY',
        'slogan' => 'Where Precision Meets Performance',
        'short' => 'High-speed frictional heating and intensive cooling unit designed for rigid and plasticized PVC dry blends.',
        'image' => '/assets/products/heater-cooler-mixers-new.png',
        'gallery' => ['/assets/products/heater-cooler-mixer.png', '/assets/products/heater-cooler-mixer-thumb1.png', '/assets/hero/hero-1.jpg'],
        'brochure' => ['file' => '/assets/pdf/corporate.pdf', 'title' => 'High Speed Heater Cooler Mixer (Corporate Brochure)'],
        'overview' => [
            'In 1991, PRIMETECH started as a small structured family-owned enterprise and over the last 28 years have established themselves as renowned, well reputed and leading manufacturer of PVC dry-blend and WPC mixing plants on the world market. The key for our rapidly growing success is closely linked to our leadership in innovation, continuous technical improvements and developments, reliability, highest efficiency as well as our efficient after-sales service.',
            'We are constantly aiming for quality and service improvement with the necessary and strong resources dedicated to our engineering and manufacturing divisions.',
            'With more than 140 mixing plants delivered worldwide every year, PRIMETECH is the world leading manufacturer of PVC mixing units.',
            'Today there are more than 1800 PRIMETECH mixing plants in operation worldwide.',
        ],
        'lists' => [
            [
                'title' => 'We Specialise in Designing and Manufacturing of machinery for mixing of:',
                'items' => [
                    'Bulk plastic materials (PVC, WPC, PE, PP, ABS etc.)',
                    'Technical plastic materials (PA, PC, TPE etc.)',
                    'Special materials (WPC, PTFE etc.)',
                    'Powder coating stuffs (including bonding)',
                    'Additives',
                    'Colour pigments and colour concentrates',
                    'Foodstuff',
                ],
            ],
            [
                'title' => 'Our Manufacturing Range comprises the following:',
                'items' => [
                    'PVC and WPC mixing plants',
                    'Mixers for pre-mix masterbatches, WPC, pigments and powders in general',
                    'Mixing plants for powder coating',
                ],
            ],
        ],
        'featuresTitle' => 'List of Advantages of the PRIMETECH plants',
        'features' => [
            'All important plant components (mixing vessels, mixing tools, electrical cabinets etc.) are manufactured in house, thus giving us a very tight control over the quality of our products.',
            'Only first-class electrical, electronic and pneumatic components, motors and gearboxes of reputed international brands are used in our products.',
            'More than 10% of our workforce is dedicated for designing and engineering of our products.',
            'Our mixing tool production offers tailor-made mixing tool designs for different applications on PRIMETECH mixers as well as for other mixer brands.',
            'Our mixing tools are coated with wear-resistant material thus ensuring an extended lifetime.',
            'All our mixing vessels are mirror-polished using automatic polishing machines.',
            'Prompt and efficient after-sales service.',
        ],
        'performance' => [
            'High heat transfer co-efficient.',
            'Short cooling cycle.',
            'Excellent dispersion with efficient cooling.',
            'Robust, easily serviceable and maintainable construction.',
            'Corrosion and abrasion resistant.',
            'Easy and perfect cleaning.',
            'Self cleaning, easy fitting and removal.',
            'Twin jacket for cooling with forced circulation of cooling water.',
            'Intensive cooling of mixed material.',
            'Long life and low noise level.',
        ],
        'applicationGroups' => [
            ['title' => 'Rigid PVC Dry Blend', 'items' => ['Pipes & Profiles', 'Fittings']],
            ['title' => 'Flexible PVC Dry blend', 'items' => ['Wires & Cables', 'Pipes & Profile']],
            ['title' => 'WPC Dry Blend', 'items' => ['Boards & Profile']],
        ],
    ],
    [
        'slug' => 'horizontal-cooler',
        'name' => 'Horizontal Cooler',
        'category' => 'mixing',
        'code' => 'PHC',
        'tag' => 'Rapid Cooling',
        'tagline' => 'Your Reliable Partner for MIXING TECHNOLOGY',
        'short' => 'Jacketed horizontal trough providing gentle handling, maximum cooling surface contact, and zero dead zones.',
        'image' => '/assets/products/horizontal-cooler.png',
        'gallery' => [],
        'brochure' => ['file' => '/assets/pdf/horizontal-cooler.pdf', 'title' => 'Horizontal Cooler'],
        'overviewTitle' => 'Efficient Cooling',
        'overview' => [
            'Primetech Horizontal Cooler "PHC" works effectively in combination with upstream high intensity.',
            'The Primetech Horizontal Cooler "PHC" is for subsequently cooling of hot mixture in order to keep it in free flow condition; suitable for storage, transportation and subsequent processes.',
            'For application in high quality mixture, homogenization of bulk material is important. Primetech Horizontal Cooler "PHC" promises good heat transfer co-efficient which is most necessary for obtaining short cooling times for throughput capacities.',
            'Mixing and dispersing process and also de-agglomeration are equally important as factors concerning the handling of the machine.',
        ],
        'featuresTitle' => 'Product Key Attributes',
        'features' => [
            'All important plant components (mixing vessels, mixing tools, electrical cabinets etc.) are manufactured in-house, thus giving us a very tight control over the quality of our products.',
            'Robust construction.',
            'Only first-class electrical, electronic and pneumatic components, motors and gearboxes of reputed international brands are used in our products.',
            'Ideal mixing batch timings.',
            'Shorter cooling cycle.',
            'User friendly operation.',
            'Prompt and efficient after-sales service.',
        ],
        'construction' => [
            ['k' => 'Horizontal Cooling Vessel', 'v' => ['Built entirely of stainless steel as regards the parts in contact with the material, features a double or triple jacket for circulation of cooling water']],
            ['k' => 'Mixing Tool', 'v' => ['Made of stainless steel With axial and radial mixing effect, designed to optimize distribution of the hot material on the cooling surfaces']],
            ['k' => 'Temperature Control', 'v' => ['By means of thermocouple located at the side on the lateral wall of the cooling vessel.']],
            [
                'k' => 'Lid',
                'v' => [
                    'Opens along the entire length of the cooling unit, equipped with double jacket for water circulation. Intrinsic safety opening system with automatic actuator.',
                    'Safety device only allowing the lid to be opened after the mixer has stopped moving.',
                    'Safety limit switch that shuts down the motor on lid opening.',
                ],
            ],
        ],
        'performance' => [
            'Corrosion and abrasion resistance',
            'Easy and perfect cleaning',
            'Self cleaning, easy fitting and removal',
            'Intensive cooling of mixed material',
            'Long life and low noise level',
            'High heat transfer co-efficient',
            'Short cooling cycle',
            'Excellent dispersion with efficient cooling',
            'Twin jacket for cooling with forced circulation of cooling water',
            'Robust, easily serviceable and maintained construction',
        ],
        'applications' => ['Additives and Powder'],
    ],
    [
        'slug' => 'high-speed-mixer',
        'name' => 'High Speed Mixer',
        'category' => 'mixing',
        'code' => 'PHM',
        'tag' => 'Intensive Compounding',
        'tagline' => 'Your Reliable Partner for MIXING TECHNOLOGY',
        'short' => 'Aerodynamic shear tool profile delivering rapid frictional temperature rise and uniform dispersion of additives.',
        'image' => '/assets/products/high-speed-mixer.png',
        'gallery' => ['/assets/products/high-speed-mixer-thumb.png'],
        'brochure' => ['file' => '/assets/pdf/corporate.pdf', 'title' => 'High Speed Mixer (Corporate Brochure)'],
        'overviewTitle' => 'Better Mixing',
        'overview' => [
            'PRIMETECH with its indigenous design and development holds a great name for outstanding mixing technology and high standard of homogenization with its design optimization.',
            'PRIMETECH High intensity Mixers "PHM" are used for all bulk material applications like: mixing solid, liquid and pasty components and where friction heat generation is required with shortest possible cycle time. Also, the way in which the friction is induced in to the product along with the finest material dispersion is of greater importance.',
            'The unique design of mixing bowl with large bottom radius and fluidizing blades make PRIMETECH mixers a high performance machine and ideal solution for good quality material combined with high hourly output.',
        ],
        'featuresTitle' => 'Product Key Attributes',
        'features' => [
            'All important plant components (mixing vessels, mixing tools, electrical cabinets etc.) are manufactured in house, thus giving us a very tight control over the quality of our products.',
            'Robust construction.',
            'Ideal mixing batch timings.',
            'Only first-class electrical, electronic and pneumatic components, motors and gearboxes of reputed international brands are used in our products.',
            'User friendly operation.',
            'Prompt and efficient after-sales service.',
        ],
        'performance' => [
            'Heater mixer with good heating performance',
            'Suitable for plastic, minerals, chemical and colorant',
            'Short heating times',
            'Heat induced by friction',
            'Excellent dispersion and optimum adaptability to each type and size of mixing batch homogenizing in minimum of time',
            'Robust, easily serviceable and maintained construction of mixing container and tool',
            'Twin jacketed mixing vessel',
            'Fast and complete discharge of mixed material',
            'Improved tool life',
            'Long service life and less noise level',
        ],
        'applications' => ['Plastics', 'Masterbatch', 'Compounding', 'Powder Coating'],
    ],
    [
        'slug' => 'lab-mixer',
        'name' => 'Laboratory Mixer',
        'category' => 'mixing',
        'code' => 'LAB',
        'tag' => 'R&D & Pilot Testing',
        'tagline' => 'Your Reliable Partner for MIXING TECHNOLOGY',
        'short' => 'Precision pilot scale mixing unit engineered for formulation development, color matching, and quality control labs.',
        'image' => '/assets/products/laboratory-mixer-new.png',
        'gallery' => ['/assets/products/laboratory-mixer.png', '/assets/products/laboratory-mixer-thumb.png'],
        'brochure' => ['file' => '/assets/pdf/laboratory-mixer.pdf', 'title' => 'Lab Mixer'],
        'overviewTitle' => 'Excellence in Mixing Technology',
        'overviewList' => [
            '3 Tier tool for intensive mixing',
            'Pneuma-seal for motor safety',
            'Tool speed control with VFD',
            'Hinge type easily openable discharge valve for faster cleaning',
        ],
        'featuresTitle' => 'Product Key Attributes',
        'features' => [
            'All important plant components (mixing vessels, mixing tools, electrical cabinets etc.) are manufactured in house, thus giving us a very tight control over the quality of our products.',
            'Robust construction.',
            'Only first-class electrical, electronic and pneumatic components, motors and gearboxes of reputed international brands are used in our products.',
            'Ideal mixing batch timings.',
            'User friendly operation.',
            'Prompt and efficient after-sales service.',
        ],
        'performance' => [
            'Jacketed Container of 15 Litre Vessel Capacity.',
            'Pneuma-seal technology to prevent powder Leakage.',
            'SS 304 supporting structure.',
            'Inbuilt electrical panel with plug and run system.',
            'Maintenance free machine.',
            'Superior aesthetics.',
            'Vessel inner surface, lid, valve plunger are made of SS 316 and are mirror polished.',
            'The mixing tool is driven by high torque AC motor controlled by AC variable frequency drive.',
            'Pneumatically operated discharge valve.',
            'Frictional heat efficiently prepares the best quality of dry blend.',
            'Optimum degree of dispersion.',
            'The control panel consists of programmable controls for optimum adaptability to the process requirements.',
        ],
        'specs' => [
            'columns' => ['Parameter', 'Value'],
            'rows' => [
                ['Vessel capacity', '15 Litre (jacketed container)'],
                ['Supporting structure', 'SS 304'],
                ['Vessel inner surface, lid, valve plunger', 'SS 316, mirror polished'],
                ['Drive', 'High torque AC motor with AC variable frequency drive'],
                ['Discharge valve', 'Pneumatically operated, hinge type'],
            ],
        ],
        'applications' => ['R & D in plastic powders and additives'],
    ],
    [
        'slug' => 'pulverizer',
        'name' => 'High Speed Pulverizer',
        'category' => 'size-reduction',
        'code' => 'PP',
        'tag' => 'Ultrafine Milling',
        'tagline' => 'Your Reliable Partner for PLASTIC SIZE REDUCTION',
        'slogan' => 'The Finer The Grind, The Higher The Value',
        'short' => 'High-throughput disk pulverizer for rigid PVC, LLDPE, HDPE, and masterbatch with precision micron control.',
        'image' => '/assets/products/pulverizer-new.png',
        'gallery' => ['/assets/products/pulverizer.png', '/assets/products/pulverizer-thumb.png', '/assets/hero/hero-2.jpg'],
        'brochure' => ['file' => '/assets/pdf/pulverizer.pdf', 'title' => 'Pulverizer'],
        'overviewTitle' => 'High Speed Precision Pulverizers',
        'overview' => [
            'The Primetech PP-series of disc pulverizers are high speed, precision grinders suitable for processing of medium hard, impact resistant and brittle materials.',
            'Typical applications are; pulverizing of granules to powder for rotomoulding, masterbatch compounding, wood, PVC, WPC industry, etc.',
            'The material to be pulverized is introduced through the center of a vertical fixed grinding disc which is mounted concentrically with an identical high speed rotating disc. Centrifugal force carries the material through the grinding area and the resultant powder is collected with a blower and cyclone system. The Primetech PP series pulverizers have several technical advantages which ensure ideal performance and operation.',
        ],
        'featuresTitle' => 'Product Key Attributes',
        'features' => [
            'Low power consumption with high throughput',
            'Economical production cost with consistent output and quality',
            'Low maintenance',
            'Minimum man power requirement',
            'Grinding discs made from German high grade alloy steel',
            'Cooling provision for stationery disc, mill body, duct line, bearings and housing',
            'Monitoring of main motor load and control system',
            'Monitoring of powder temperature and control system (optional)',
            'Microprocessor based machine control panel with digital display (optional)',
            'Exact and easy grinding gap adjustment',
            'Housing design for optimized water-cooling',
            'Easy to clean',
            'Broad application field',
            'Economical and cost effective',
            'Robust in design',
            'Quality of powder according to specifications',
        ],
        'lists' => [
            [
                'title' => 'We Offer',
                'items' => [
                    'One-piece grinding disc made from German high grade alloy steel',
                    'Superior grinding disc surface treatment to boost up its wear life',
                    'Advance bearing technology',
                    'Easy adjustments of disc gap',
                    'Unique design of housing',
                    'High efficiency blower and vibro-screen',
                    'Powerful dual cooling with water and air',
                ],
            ],
            [
                'title' => 'Your Advantage',
                'items' => [
                    'Pulverizing without using liquid nitrogen',
                    'Excellent flow rate and mixing possibility of the powder',
                    'Compact construction, minimum space requirement',
                    'Most economical and cost effective',
                    'Narrow particle size distribution with low fines content',
                    'Automatic load and temperature controller',
                    'Fully automatic continuous operation',
                    'Safety interlock system',
                ],
            ],
        ],
        'applications' => [
            'Lldpe powder for rotomoulding',
            'Recycling of extrusion scrap waste',
            'PVC pipes and profiles',
            'CPVC pipes',
            'WPC boards and profiles',
            'PU',
            'UHMW',
            'Masterbatching application and various thermoplastic material',
        ],
    ],
    [
        'slug' => 'granulators',
        'name' => 'Plastic Granulators',
        'category' => 'size-reduction',
        'code' => 'PG',
        'tag' => 'Scrap Recycling',
        'tagline' => 'Your Reliable Partner for PLASTIC SIZE REDUCTION',
        'slogan' => 'Turning Waste Into Value',
        'short' => 'Heavy-duty rotor knife cutting action for efficient size reduction of plastic profiles, pipes, sheets, and lumps.',
        'image' => '/assets/products/granulator-new.png',
        'gallery' => ['/assets/products/granulator.png', '/assets/products/granulator-thumb.png', '/assets/hero/hero-4.jpg'],
        'brochure' => ['file' => '/assets/pdf/granulator.pdf', 'title' => 'Granulator Size Reduction & Reutilization'],
        'overview' => [
            'The material is fed into the cutting chamber via a wide feeding chute. The size reduction takes place between the blades of the fast rotating rotor and the stationary housing blades. The particle size of the reduced material is determined by mesh size of the easily exchangeable screen installed at the bottom of the housing. Vertical bottom discharge.',
        ],
        'featuresTitle' => 'Advantages and Features',
        'features' => [
            'Reliable, compact, efficient and robust design',
            'Low feeding height, large feed opening',
            'Slant cut rotors for highest efficiency',
            'Different sizes available',
            'Pre-adjusted all-steel rotor knives',
            'Easy accessibility of the cutting chamber allows easy and intensive cleaning and quick screen change',
            'Easy changing of knives',
            'Easy handling',
            'High throughput rates with low power requirements',
        ],
        'specsTitle' => 'Product Range',
        'specs' => [
            'columns' => ['Model', 'Motor (kw)', 'Output Capacity (kgs/hr)'],
            'rows' => [
                ['PG-0542', '3.7-5.5', '50-100'],
                ['PG-1035', '7.5-11', '100-150'],
                ['PG-2550', '18-22', '200-300'],
                ['PG-4060', '30-37', '300-500'],
                ['PG-7570', '55-75', '600-1000'],
            ],
        ],
        'applications' => ['Plastic profiles', 'Pipes', 'Sheets', 'Lumps'],
    ],
    [
        'slug' => 'shredder',
        'name' => 'Heavy Duty Shredder',
        'category' => 'size-reduction',
        'code' => 'PS',
        'tag' => 'High-Torque Shredding',
        'tagline' => 'Your Reliable Partner for PLASTIC SIZE REDUCTION',
        'slogan' => 'Strength That Never Backs Down',
        'short' => 'Single shaft industrial shredder engineered for high-volume solid polymer purgings, lumps, and bulky materials.',
        'image' => '/assets/products/shredder-new.png',
        'gallery' => ['/assets/products/shredder01.png', '/assets/products/shredder-thumb.png', '/assets/hero/hero-3.jpg'],
        'brochure' => ['file' => '/assets/pdf/shredder.pdf', 'title' => 'Heavy Duty Shredder'],
        'overviewTitle' => 'Single Shaft Shredders',
        'overview' => [
            'The Primetech PS series single shaft shredders are universal design shredders for size reduction, suitable for processing of medium hard, impact resistant and brittle materials.',
            'Typical applications are in plastic processing industry, wood processing industry, food processing industry, paper processing industry, rubber processing industry, etc.',
            'The material to be shredded is introduced through the shredding compartment of high speed rotating blades. The Primetech PS series shredders have several technical advantages which ensure ideal performance and operation.',
        ],
        'featuresTitle' => 'Product Key Attributes',
        'features' => [
            'Intuitive operation through to PLC control',
            'Precise cut with high throughput with profiled V rotor',
            'Safe material feed with load-controlled ram',
            'No material bridges due to free-cutting hopper design',
            'Durable rotor bearings with offset design',
            'Homogeneous shredding results through flexible, interchangeable screen',
            'Optimally protected hydraulics installed in the machine frame',
            'Clean discharge of material',
            'Efficiently absorbs vibrations with stable rubber feet',
            'Powerful drive with gearboxes',
        ],
        'performance' => [
            'Precise cut with high throughput with profiled V rotor',
            'Intuitive operation thanks to PLC control',
            'No material bridges due to free-cutting hopper design',
            'Safe material feed with load-controlled ram',
            'Homogeneous shredding results thanks to flexible, interchangeable screen',
            'Durable rotor bearings thanks to offset design',
            'Clean discharge of material by suction, screw or conveyor belt',
            'Efficiently absorbs vibrations with stable rubber feet',
        ],
        'applications' => [
            'Plastic Processing Industry',
            'Wood Processing Industry',
            'Waste Processing Industry',
            'Food Processing Industry',
            'Paper Processing Industry',
            'Rubber Processing Industry',
            'And more...',
        ],
    ],
    [
        'slug' => 'spiral-conveyor',
        'name' => 'Flexible Spiral Conveyor',
        'category' => 'conveying',
        'code' => 'FSC',
        'tag' => 'Bulk Material Transfer',
        'tagline' => 'Better MIXING TECHNOLOGY with MIXING SENSE',
        'short' => 'Coreless flexible screw transport providing dust-tight, hygienic conveying of plastic powders, granules, and flakes.',
        'image' => '/assets/products/spiral-conveyor-new.png',
        'gallery' => ['/assets/products/spiral-vacume-conveyor.png', '/assets/products/spiral-vacume-conveyor-thumb.png'],
        'brochure' => ['file' => '/assets/pdf/spiral-conveyor.pdf', 'title' => 'Spiral Conveyor'],
        'overview' => [
            "PRIMETECH designs and manufactures transfer equipment by flexible mechanical feeders with mild steel or stainless steel spirals. These flexible spiral conveyor hopper loaders allow to transfer the conveyance of all kinds of bulk materials, granulates, any kind of plastic raw materials as well as powders and can be applied to various industrial fields.",
            "A flexible spiral, made from mild steel or from stainless steel alternatively, driven by a three phase-motor, transports the material through a flexible tube from conveyor's intake to the outlet. The spiral is simple to install. Also, shortening of conveyor is possible in a few minutes without any difficulty; so it can simply be fitted at customer's locations. Thanks to the flexibility. Obstacles can be passed too.",
            "For different output ranges from 0.1 to 15 m³/h and different materials, several type of Spiral Conveyors are available, which are different in outer tube's and spiral's diameters.",
            'The spiral Conveyor is equipped with an intake which can be flanged under hopper, silo etc. It enables transfer of blends of different bulk goods with different bulk weights without any segregation. Its serviceability as well as the low energy demand make the Spiral Conveyor a very important and a must device in many factories in various industrial fields.',
        ],
        'specsTitle' => 'Models & Output',
        'specs' => [
            'columns' => ['Sr. No.', 'Model', 'Conveying tube in mm', 'Minimum radius in mm', 'Motor', 'Maximum output (dependent on material and bulk density)'],
            'rows' => [
                ['1', 'FSC30', '40', '1500', '0.37-1.1 KW', '0.3 m³/h'],
                ['2', 'FSC40', '50', '1500', '1.1-1.5 KW', '0.6 m³/h'],
                ['3', 'FSC50', '63', '1800', '1.5-2.2 KW', '2.5 m³/h'],
                ['4', 'FSC70', '75', '2300', '2.2-3.7 KW', '5.0 m³/h'],
                ['5', 'FSC80', '90', '2500', '3.7-5.5 KW', '8.0 m³/h'],
                ['6', 'FSC100', '110', '3500', '5.5-7.5 KW', '15.0 m³/h'],
            ],
        ],
        'applications' => ['Plastic Processing', 'Foodstuffs Industry', 'Chemical Industry', 'Pharmaceutical Industry'],
    ],
    [
        'slug' => 'screw-conveyor',
        'name' => 'Screw Conveyor',
        'category' => 'conveying',
        'code' => 'PSC',
        'tag' => 'Continuous Metered Feed',
        'short' => 'Enclosed tubular and U-trough industrial screw conveyor ensuring steady volumetric feeding and dust control.',
        'image' => '/assets/products/screw-conveyor-new.png',
        'gallery' => ['/assets/products/screw-conveyor-thumb.png'],
        'brochure' => ['file' => '/assets/pdf/screw-conveyor.pdf', 'title' => 'Screw Conveyor'],
        'overview' => [
            'A Screw Conveyor or Auger Conveyor is a mechanism that uses a rotating helical screw blade called "flight", usually within a tube to move liquid or granular material.',
            'The reliable, yet simple and low maintenance Screw Conveyor uses a single moving part to effectively transfer dry material from one point to another.',
            'The Screw Conveyor is being used in the dry processing industry for decades.',
        ],
        'featuresTitle' => 'Performance Features',
        'features' => [
            'Engineered for batch, intermittent and continuous conveying of free and non-free-flowing bulk materials.',
            'An economical solution for conveying powders, crystals, pellets, friable material, flakes, granules and much more.',
            'Convey horizontally or vertically. The flexible outer tubing and auger allow for easy maneuvering into elevated hoppers and bending around other equipment and obstacles.',
            'Simple, yet rugged construction keeps costs low, reliability high - A helicoid screw rotates inside a fixed tube.',
            'Fewer components minimize maintenance.',
            "The conveyor's standard stainless steel construction stands up to a continuous flow of abrasive materials.",
            'Convey materials over distances up to 80ft (24.4m) and discharge heights up to 40ft (12.2 m).',
            'Easy to clean - disassemble conveyor in 5 minutes for thorough wash downs.',
        ],
        'specs' => [
            'columns' => ['Parameter', 'Value'],
            'rows' => [
                ['Conveying distance', 'Up to 80ft (24.4m)'],
                ['Discharge height', 'Up to 40ft (12.2 m)'],
                ['Material of construction', 'Mild Steel / Stainless Steel'],
            ],
        ],
        'applications' => [
            'Plastics and polymers',
            'Food and flour industry',
            'Minerals and metals',
            'Pharmaceuticals and Herbals',
            'Spices industry',
            'Refractories and abrasives',
            'Ceramics industry',
            'Starch and glucose',
            'Dairy industry',
            'Pesticides and insecticides',
            'Soaps and detergents',
        ],
    ],
    [
        'slug' => 'gyro-vibrating-screen',
        'name' => 'Gyro Vibrating Screen',
        'category' => 'conveying',
        'code' => 'GVS',
        'tag' => 'Particle Classification & Sieving',
        'short' => 'High-efficiency circular multi-deck gyratory vibro-screen for continuous grading, scalping, and dust separation of plastic powders, masterbatches, and chemical compounds.',
        'image' => '/assets/products/gyro-vibrating-sieve.png',
        'gallery' => ['/assets/products/gyro-vibrating-sieve-thumb.png'],
        'brochure' => ['file' => '/assets/pdf/gyro-vibrating-sieve.pdf', 'title' => 'Gyro Vibrating Screen'],
        'overviewTitle' => 'Excellence in Sieving',
        'overview' => [
            'These self-contained compact Gyro Vibrating Sieve separators make precise material separations according to particle size through efficient use of multi plane inertial vibration technique. These acts as most efficient screening machine for any dry and wet sieving application and are designed and built to solve the most difficult classifying and separating problems. Further, the 3 dimensional inertial vibration of this Gyro Vibratory Sieve separator is essentially based on a principle in which motor rotation induces vibration to an entire screen assembly in both vertical and horizontal planes.',
        ],
        'featuresTitle' => 'Performance Features',
        'features' => [
            'Speedy material separation with higher screening accuracy',
            'Fracture resistant structure against vibrations',
            'Specially designed motor for gyro motion',
            'Adjustable unbalanced load with marking for lead angle setting',
            'Available in single deck end multi deck',
            'Best in aesthetics.',
            'Also available in corrosion resistant stainless steel structure for food and pharma industry.',
            'Available in 8 mesh to 100 mesh.',
        ],
        'specs' => [
            'columns' => ['Parameter', 'Value'],
            'rows' => [
                ['Mesh range', '8 mesh to 100 mesh'],
                ['Deck', 'Single deck and multi deck'],
                ['Material of construction', 'Mild Steel / Stainless Steel'],
            ],
        ],
        'applications' => [
            'Plastics and Polymers',
            'Food and Flour Industry',
            'Minerals and Metals',
            'Pharmaceuticals and Herbal',
            'Spices Industry',
            'Refractories and Abrasives',
        ],
    ],
];

function getProduct(?string $slug): ?array
{
    global $PRODUCTS;
    if (!$slug) return null;
    foreach ($PRODUCTS as $p) {
        if ($p['slug'] === $slug) return $p;
    }
    return null;
}

function getProductIndex(string $slug): int
{
    global $PRODUCTS;
    foreach ($PRODUCTS as $i => $p) {
        if ($p['slug'] === $slug) return $i;
    }
    return 0;
}

function byCategory(string $id): array
{
    global $PRODUCTS;
    return array_values(array_filter($PRODUCTS, fn($p) => $p['category'] === $id));
}

function categoryName(string $id): string
{
    global $CATEGORIES;
    foreach ($CATEGORIES as $c) {
        if ($c['id'] === $id) return $c['name'];
    }
    return '';
}
