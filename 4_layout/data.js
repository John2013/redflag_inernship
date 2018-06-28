const data = {
	"firms": [
	{
		"id": 0,
		"name": "KBE",
		"k": 1.0
	},
	{
		"id": 1,
		"name": "REHAU",
		"k": 1.4
	},
	{
		"id": 2,
		"name": "MONTBLANK",
		"k": 1.5
	}
],
	"profileTypes": [
	{
		"id": 0,
		"name": "KBE Engine",
		"firmId": 0,
		"k": 1
	},
	{
		"id": 1,
		"name": "KBE Expert",
		"firmId": 0,
		"k": 1.4
	},
	{
		"id": 2,
		"name": "REHAU Engine",
		"firmId": 1,
		"k": 1
	},
	{
		"id": 3,
		"name": "REHAU Expert",
		"firmId": 1,
		"k": 1.5
	},
	{
		"id": 4,
		"name": "MONTBLANK Engine",
		"firmId": 2,
		"k": 1
	},
	{
		"id": 5,
		"name": "MONTBLANK Expert",
		"firmId": 2,
		"k": 1.4
	}
],
	"sectionsTypes": [
	{
		"id": 0,
		"name": "глухая"
	},
	{
		"id": 1,
		"name": "поворотная"
	},
	{
		"id": 2,
		"name": "поворотно-откидная"
	}
],
	"windows": [
	{
		"sectionsCount": 1,
		"minWidth":800,
		"maxWidth":1200,
		"minHeight":1000,
		"maxHeight":1500,
		"variants": [
			{
				"id": 0,
				"types": [
					0
				],
				"heightWidth": {
					"1000": {"800": 2194, "900": 2414, "1000": 2636, "1100": 2857, "1200": 3078},
					"1200": {"800": 2424, "900": 2666, "1000": 2910, "1100": 3153, "1200": 3096},
					"1300": {"800": 2654, "900": 2918, "1000": 3184, "1100": 3449, "1200": 3714},
					"1400": {"800": 2884, "900": 3170, "1000": 3458, "1100": 3745, "1200": 4062},
					"1500": {"800": 3113, "900": 3421, "1000": 3731, "1100": 4040, "1200": 4350}
				}
			},
			{
				"id": 1,
				"types": [
					1
				],
				"heightWidth": {
					"1000": {"800": 4195, "900": 4650, "1000": 4914, "1100": 5179, "1200": 5442},
					"1200": {"800": 4488, "900": 4964, "1000": 5250, "1100": 5537, "1200": 5822},
					"1300": {"800": 4780, "900": 5278, "1000": 5586, "1100": 5895, "1200": 6202},
					"1400": {"800": 5072, "900": 5592, "1000": 5922, "1100": 6253, "1200": 6582},
					"1500": {"800": 5364, "900": 5906, "1000": 6258, "1100": 6611, "1200": 6962}
				}
			}
		],
		"img": "imgs/0.png"
	},
	{
		"sectionsCount": 2,
		"minWidth":1100,
		"maxWidth":1600,
		"minHeight":1100,
		"maxHeight":1600,
		"variants": [
			{
				"id": 2,
				"types": [
					0,
					0
				],
				"heightWidth": {
					"1100": {"1100": 3498, "1200": 3737, "1300": 3974, "1400": 4212, "1500": 4450, "1600": 4688},
					"1200": {"1100": 3757, "1200": 4014, "1300": 4269, "1400": 4524, "1500": 4779, "1600": 5035},
					"1300": {"1100": 4016, "1200": 4291, "1300": 4564, "1400": 4836, "1500": 5108, "1600": 5382},
					"1400": {"1100": 4275, "1200": 4568, "1300": 4859, "1400": 5148, "1500": 5437, "1600": 5729},
					"1500": {"1100": 4534, "1200": 4845, "1300": 5154, "1400": 5460, "1500": 5766, "1600": 6067},
					"1600": {"1100": 4793, "1200": 5122, "1300": 5447, "1400": 5771, "1500": 6096, "1600": 6422}
				}
			},
			{
				"id": 3,
				"types": [
					0,
					1
				],
				"heightWidth": {
					"1100": {"1100": 5196, "1200": 5463, "1300": 5713, "1400": 5914, "1500": 6459, "1600": 6906},
					"1200": {"1100": 5531, "1200": 5814, "1300": 6034, "1400": 6314, "1500": 6854, "1600": 7319},
					"1300": {"1100": 5866, "1200": 6165, "1300": 6355, "1400": 6714, "1500": 7249, "1600": 7732},
					"1400": {"1100": 6201, "1200": 6516, "1300": 6676, "1400": 7114, "1500": 7644, "1600": 8145},
					"1500": {"1100": 6536, "1200": 6867, "1300": 6997, "1400": 7514, "1500": 8039, "1600": 8558},
					"1600": {"1100": 6872, "1200": 7220, "1300": 7318, "1400": 7912, "1500": 8435, "1600": 8971}
				}
			},
			{
				"id": 4,
				"types": [
					1,
					2
				],
				"heightWidth": {
					"1100": {"1100": 7355, "1200": 7654, "1300": 7951, "1400": 8019, "1500": 8692, "1600": 9349},
					"1200": {"1100": 7755, "1200": 8068, "1300": 8379, "1400": 8495, "1500": 9163, "1600": 9839},
					"1300": {"1100": 8155, "1200": 8482, "1300": 8807, "1400": 8971, "1500": 9634, "1600": 10329},
					"1400": {"1100": 8555, "1200": 8896, "1300": 9235, "1400": 9447, "1500": 10105, "1600": 10819},
					"1500": {"1100": 8955, "1200": 9310, "1300": 9963, "1400": 9923, "1500": 10576, "1600": 11309},
					"1600": {"1100": 9355, "1200": 9726, "1300": 10093, "1400": 10397, "1500": 11047, "1600": 11794}
				},
				"img": "imgs/4.png"
			}
		],
		"img": "imgs/1.png"
	},
	{
		"sectionsCount": 3,
		"minWidth":1700,
		"maxWidth":2200,
		"minHeight":1500,
		"maxHeight":1800,
		"variants": [
			{
				"id": 5,
				"types": [
					0,
					2,
					0
				],
				"heightWidth": {
					"1500": {"1700": 9265, "1800": 9587, "1900": 9907, "2000": 10230, "2100": 10510, "2200": 10935},
					"1600": {"1700": 9789, "1800": 10129, "1900": 10467, "2000": 10808, "2100": 11104, "2200": 11541},
					"1700": {"1700": 10313, "1800": 10671, "1900": 11027, "2000": 11386, "2100": 11698, "2200": 12147},
					"1800": {"1700": 10836, "1800": 11211, "1900": 11588, "2000": 11963, "2100": 12291, "2200": 12754}
				}
			}
		],
		"img": "imgs/2.png"
	}
]
	,
	"otherPricesMultiplier": 1.2
};