$.getJSON('data.json', function (data) {
	main(data)
});

const intFormat = int => {
	let charArray = Math.round(int).toString().split('');
	for (let i = charArray.length - 3; i >= 0; i -= 3) {
		charArray[i] = ' ' + charArray[i]
	}

	return charArray.join('')
};

const getSettings = calculator => {
	if (calculator === undefined)
		calculator = $("#calculator");

	const sectionsCountInput = $(calculator.find('input[name=\'count\']:checked')[0]);

	const sectionsCount = +sectionsCountInput.val();
	let sectionsTypesArray = [];
	if (sectionsCount < 3) {

		const sectionsTypesJQArray = sectionsCountInput
			.nextAll('.sections__item-types')
			.find('.dropdown-toggle')
			.map((_, element) => +$(element).data('value'));

		for (item of sectionsTypesJQArray) {
			sectionsTypesArray.push(item)
		}

		// sectionsTypesArray.filter((_,index) => typeof index === 'number')
	}
	else {
		sectionsTypesArray = [0, 2, 0]
	}

	return {
		"sectionsCount": sectionsCount,
		"sectionsTypesArray": sectionsTypesArray,
		"width": +(calculator.find('#width').val() || 0),
		"height": +(calculator.find('#height').val() || 0),
		"firmId": +calculator.find('input[name=\'firm\']:checked').val(),
		"profileTypeId": +calculator.find('#profile').data('value')
	}
};

const getPrice = (calculator, settings, data) => {
	let heightWidthTable;

	const options = settings.sectionsTypesArray;
	let newOption = null;
	if (settings.sectionsCount === 2 && options[0] === 1 && options[1] !== 2) {
		newOption = 2;
	}
	else if (settings.sectionsCount === 2 && options[0] === 0 && options[1] === 2) {
		newOption = 0;
	}
	if (newOption !== null) {
		settings.sectionsTypesArray[1] = newOption;

		setDropdownToggle(
			'sc2n2',
			newOption,
			data.sectionsTypes.filter(type => type.id === newOption)[0].name
		);
	}


	heightWidthTable = data
		.windows
		.filter(item => item.sectionsCount === +settings.sectionsCount)[0]
		.variants
		.filter((variant) => variant.types.join(';') === settings.sectionsTypesArray.join(';'))[0]
		.heightWidth;


	let widthPriceList = [];
	let heightList = [], widthList = [];
	for (let height in heightWidthTable) {
		if (settings.height <= +height) {
			widthPriceList = heightWidthTable[height];
			break;
		}
		heightList.push(+height)
	}
	if (widthPriceList.length === 0) {
		widthPriceList = heightWidthTable[Math.min(...heightList).toString()]
	}

	let price = null;

	for (let width in widthPriceList) {
		if (settings.width <= +width) {
			price = widthPriceList[width];
			break
		}
		widthList.push(+width)
	}
	if (price === null) {
		price = widthPriceList[Math.min(...widthList).toString()]
	}

	const firmK = data.firms.filter(firm => firm.id === settings.firmId)[0].k;

	const profileTypeK = data.profileTypes.filter(profileType => profileType.id === settings.profileTypeId)[0].k;

	return price * firmK * profileTypeK;

};

const setPrice = (calculator, price, data) => {
	const priceStr = intFormat(price);

	const priceSpan = $(calculator.find('#price-value')),
		mskPriceSpan = $(calculator.find('#moscow-mid-price-value'));

	const mskPrice = price * data.otherPricesMultiplier,
		mskPriceStr = intFormat(mskPrice);

	priceSpan.text(priceStr);
	mskPriceSpan.text(mskPriceStr)
};

const updatePrice = (calculator, data) => {
	const settings = getSettings(calculator);

	const price = getPrice(calculator, settings, data);

	setPrice(calculator, price, data)
};

const setDropdownToggle = (buttonId, optionId, optionText) => {
	const button = $('#' + buttonId);
	button
		.data('value', optionId)
		.text(optionText);
};

const onDropdownChange = e => {
	const item = $(e.target);
	const buttonId = item.parent('.dropdown-menu').attr('aria-labelledby');

	setDropdownToggle(buttonId, item.data('value'), item.text());

	updatePrice(e.data.calculator, e.data.data);
};

const setProfileTypes = (calculator, typesArray, data) => {
	const dropdownBtn = $(calculator.find('#profile'));

	dropdownBtn.data('value', typesArray[0].id).text(typesArray[0].name);

	const dropdownMenu = dropdownBtn.next('.dropdown-menu');

	let optionsList = '';

	typesArray.forEach(profileType => {
		optionsList +=
			`<a class="dropdown-item" href="javascript:void(0)" data-value="${profileType.id}">${profileType.name}</a>`
	});

	dropdownMenu.html(optionsList);

	dropdownMenu.find('.dropdown-item').click({"calculator": calculator, "data": data}, onDropdownChange);
};

const onFirmChange = e => {
	const firmId = +$(e.target).val();

	const profilesTypes = e.data.data.profileTypes.filter(profileType => profileType.firmId === firmId);
	setProfileTypes(e.data.calculator, profilesTypes, e.data.data);
};

const onCountChange = e => {
	const count = +$(e.data.calculator.find('input[name=count]:checked')).val();
	setSizeLimits(e.data.calculator, count, e.data.data)
};

const setSizeLimits = (calculator, sectionsCount, data) => {
	const sectionsItem = data.windows.filter(item => item.sectionsCount === sectionsCount)[0];
	const minWidth = sectionsItem.minWidth;
	const maxWidth = sectionsItem.maxWidth;
	const minHeight = sectionsItem.minHeight;
	const maxHeight = sectionsItem.maxHeight;

	calculator.find('#width').attr('min', minWidth).attr('max', maxWidth);
	calculator.find('#height').attr('min', minHeight).attr('max', maxHeight);
};

const main = (data) => {
	const calculator = $("#calculator");

	// для дропдаунов
	$(calculator.find('.dropdown-item')).click({"calculator": calculator, "data": data}, onDropdownChange);

	// метяем типы профилей на смену производителя
	$(calculator.find('input[name=firm]:not(:checked)')).change({"calculator": calculator, "data": data}, onFirmChange);

	// ставим минимум максимум у размеров
	$(calculator.find('input[name=count]:not(:checked)')).change({
		"calculator": calculator,
		"data": data
	}, onCountChange);

	// обновляем цену на изменение инпутов
	$(calculator.find('input')).on('change', () => {
		updatePrice(calculator, data)
	});

};