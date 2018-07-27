Date.prototype.toDatetimeLocal =
	function toDatetimeLocal() {
		const
			date = this,
			ten = function (i) {
				return (i < 10 ? '0' : '') + i;
			},
			YYYY = date.getFullYear(),
			MM = ten(date.getMonth() + 1),
			DD = ten(date.getDate()),
			HH = ten(date.getHours()),
			II = ten(date.getMinutes()),
			SS = ten(date.getSeconds())
		;
		return YYYY + '-' + MM + '-' + DD + 'T' +
			HH + ':' + II + ':' + SS;
	};

$(document).ready(function () {
	$("input:hidden[data-type='datetime']").after(function () {
		let date = new Date($(this).val() * 1000);
		console.log(this.id);
		return `<input type='datetime-local' class="form-control datetime-control" data-for='${this.id}' 
value="${date.toDatetimeLocal()}">`
	});

	$("input[type=datetime-local].datetime-control").each(function () {
		$(this).change(function () {
			let time = Math.round(new Date($(this).val()).getTime() / 1000);
			$(`#${$(this).data('for')}`).val(time);
		})
	})
});