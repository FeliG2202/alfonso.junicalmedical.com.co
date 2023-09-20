function newElement(type) {
	return document.createElement(type);
}

function getInput(id) {
	return document.getElementById(id);
}

function addEvent(ids, type, method) {
	ids.forEach(id => getInput(id).addEventListener(type, method));
}

function objectSelect(url, id, value, textContent) {
	return {
		id: id,
		value: value,
		url: url,
		textContent: textContent
	};
};

function uploadSelect(rows) {
	rows.forEach(({ url, id, value, textContent }) => {
		const select = getInput(id);

		axios.get(host + url).then(({ data }) => {
			// console.log(data);

			if (!data.status) {
				data.forEach(row => {
					const option = newElement('OPTION');
					option.value = row[value];
					option.textContent = textContent.map(value => row[value]).join(" ");
					select.appendChild(option);
				});
			}
		}).catch(err => {
			console.log(err);
		});
	});
}

function addCardFood({ id, row, title}) {
	const fields = [];

	const createCol = () => {
		const div = newElement('DIV');
		div.classList.add('col-12', 'col-md-6', 'p-2');
		return div;
	};

	const createForm = () => {
		const form = newElement('FORM');
		form.method = 'POST';
		form.addEventListener('submit', (event) => {
			event.preventDefault();

			const items = [];

			fields.forEach(field => {
				if (field.checked) {
					items.push(field.value);
				}
			});

			const formD = new FormData();
			formD.append('selected_list', items);
			console.log(items)
		});

		return form;
	};

	const createCard = () => {
		const divCard = newElement('DIV');
		divCard.classList.add('card');

		const divCardBody = newElement('DIV');
		divCardBody.classList.add('card-body');

		const h5 = newElement('H5');
		h5.classList.add('card-title');
		h5.textContent = title;

		const hr = newElement('HR');

		const divCheckBoxGroup = newElement('DIV');
		divCheckBoxGroup.classList.add('checkbox-group');

		const divButton = newElement('DIV');
		divButton.classList.add('p-2');

		const button = newElement('BUTTON');
		button.classList.add('btn', 'btn-success', 'w-100');
		button.type = 'submit';
		button.textContent = 'Seleccionar';

		Object.entries(row).forEach(obj => {
			const divFormCheck = newElement('DIV');
			divFormCheck.classList.add('form-check', 'checkbox-container');

			const inputCheck = newElement('INPUT');
			inputCheck.type = 'checkbox';
			inputCheck.name = 'selected_list[]';
			inputCheck.classList.add('form-check-input');
			inputCheck.value = obj[1];
			handleCheckboxClick(inputCheck);

			const label = newElement('LABEL');
			label.textContent = row[obj[0]];
			label.classList.add('form-check-label');

			divFormCheck.appendChild(inputCheck);
			divFormCheck.appendChild(label);
			divCheckBoxGroup.appendChild(divFormCheck);
			fields.push(inputCheck);
		});

		divCardBody.appendChild(h5);
		divCardBody.appendChild(hr);
		divCardBody.appendChild(divCheckBoxGroup);
		divButton.appendChild(button);
		divCardBody.appendChild(divButton);
		divCard.appendChild(divCardBody);
		return divCard;
	};

	const form = createForm();
	form.appendChild(createCard());

	const col = createCol();
	col.appendChild(form);

	getInput(id).appendChild(col);
}