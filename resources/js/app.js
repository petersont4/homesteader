const laidBySelect = document.getElementById('laid_by');
const eggColorInput = document.getElementById('egg_color');

if (laidBySelect && eggColorInput) {
	laidBySelect.addEventListener('change', function () {
		const selectedOption = laidBySelect.options[laidBySelect.selectedIndex];
		const eggColor = selectedOption.getAttribute('data-egg-color');
		eggColorInput.value = eggColor;
	});
}
