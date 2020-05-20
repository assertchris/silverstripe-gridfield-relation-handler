jQuery(function($) {
	$.entwine('ss', function($) {
		$('.grid-field .ss-gridfield-item .col-noedit').entwine({
			onclick: function(e) {
				e.stopPropagation();
				e.stopImmediatePropagation();
			}
		});
		$('.ss-gridfield .ss-gridfield-item .col-noedit input').entwine({
			getState: function () {
				return this.getGridField().getState().GridFieldRelationHandler;
			},
			setState: function(val) {
				this.getGridField().setState('GridFieldRelationHandler', val);
			},
			onchange: function(e) {
				let state = this.getState();
				let input = $(e.target).closest('input');
				let inputVal = parseInt(input.val())
				if (input.hasClass('radio')) {
					state.RelationVal = inputVal;
				} else if (input.hasClass('checkbox')) {
					if (state.RelationVal.indexOf) {
						if (input.is(':checked')) {
							state.RelationVal.push(inputVal);
						} else {
							let index = state.RelationVal.indexOf(inputVal);
							if(index != -1) {
								let left = state.RelationVal.slice(0, index);
								let right = state.RelationVal.slice(index + 1);
								state.RelationVal = left.concat(right);
							}
						}
					} else if (input.is(':checked')) {
						state.RelationVal = [inputVal];
					} else {
						state.RelationVal = [];
					}
				}
				this.setState(state);
			}
		});
	});
});

if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(elt)
	{
		let len = this.length >>> 0;

		let from = Number(arguments[1]) || 0;
		from = (from < 0) ? Math.ceil(from) : Math.floor(from);
		if (from < 0) {
			from += len;
		}

		for (; from < len; from++)
		{
			if (from in this && this[from] === elt) {
				return from;
			}
		}
		return -1;
	};
}
