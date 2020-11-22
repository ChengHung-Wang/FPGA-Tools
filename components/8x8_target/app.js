let matrix_r; // red
let matrix_g; // green
let color_type = 0; // 0 => red, 1 => green, 2 => orange
let $table;
let rowMajor = false;
let msbendian = false;

$(function () {
	let cache = createArray(8, 8);
	matrix_r = cache;
	matrix_g = JSON.parse(JSON.stringify(cache));
	updateTable();
	initOptions();
	init_restore();
	updateCode();
});
// -- fuck this function
function init_restore() {
	if(localStorage.getItem("matrix_r") != null && localStorage.getItem("matrix_g") != null) {
		matrix_r = JSON.parse(localStorage.getItem("matrix_r"));
		matrix_g = JSON.parse(localStorage.getItem("matrix_g"));
		for(let row_index = 0; row_index < matrix_r.length; row_index ++ ){
			for(let col_index = 0; col_index < matrix_r[0].length; col_index ++) {
				if(matrix_r[col_index][row_index] == 1 && matrix_g[col_index][row_index] == 1)
					$($($("tr")[row_index]).children()[col_index]).addClass("on").addClass("on-orange");
				else if(matrix_r[col_index][row_index] == 1 && matrix_g[col_index][row_index] != 1)
					$($($("tr")[row_index]).children()[col_index]).addClass("on").addClass("on-red");
				else if(matrix_g[col_index][row_index] == 1 && matrix_r[col_index][row_index] != 1)
					$($($("tr")[row_index]).children()[col_index]).addClass("on").addClass("on-green");
			}
		}
	}
}
function updateTable() {
	var width = matrix_r[0].length;
	var height = matrix_r.length;

	$('#_grid').html('');
	$('#_grid').append(populateTable(null, height, width, ""));

	// events
	$table.on("mousedown", "td", toggle);
	$table.on("mouseenter", "td", toggle);
	$table.on("mouseenter", "td", toggle);
	$table.on("mouseup", "td", toggle);
	$table.on("dragstart", function () { return false; });
}

function initOptions() {
	$('#clearButton').click(function () {
		let cache = createArray(8, 8);
		matrix_r = cache;
		matrix_g = JSON.parse(JSON.stringify(cache));
		localStorage.setItem("matrix_r", JSON.stringify(matrix_r));
		localStorage.setItem("matrix_g", JSON.stringify(matrix_g));
		updateTable();
		location.reload();
	});
	$('#generateButton').click(updateCode);

	$('#widthDropDiv li a').click(function () {
		var width = parseInt($(this).html());
		var height = matrix_r.length;
		let cache = createArray(8, 8);
		matrix_r = cache;
		matrix_g = JSON.parse(JSON.stringify(cache));
		updateTable();
		updateSummary();
	});

	$('#heightDropDiv li a').click(function () {
		var width = matrix_r[0].length;
		var height = parseInt($(this).html());
		matrix_r = createArray(height, width);
		matrix_g = matrix_r;
		updateTable();
		updateSummary();
	});

	$('#byteDropDiv li a').click(function () {
		var selection = $(this).html();
		rowMajor = selection.startsWith("Row");
		updateSummary();
	});

	$('#endianDropDiv li a').click(function () {
		var selection = $(this).html();
		msbendian = selection.startsWith("Big");
		updateSummary();
	});

	updateSummary();
}

function updateSummary() {
	var width = matrix_r[0].length;
	var height = matrix_r.length;
	var summary = width + "px by " + height + "px, ";

	if (rowMajor) summary += "row major, ";
	else summary += "column major, ";

	if (msbendian) summary += "big endian.";
	else summary += "little endian.";

	$('#_summary').html(summary);
}

function updateCode() {
	let bytes = generateByteArray_r();
	// console.log(bytes);
	let output = "const uint_8 data[] =\n{\n\t" + bytes + "\n};"
	// $('#_output_r').html(output);
	$('#_output_r').html(bytes);
	$('#_output_r').removeClass('prettyprinted');
	prettyPrint();
	let bytes2 = generateByteArray_g();
	// console.log(bytes2);
	let output2 = "const uint_8 data[] =\n{\n\t" + bytes2 + "\n};"
	// $('#_output_g').html(output2);
	$('#_output_g').html(bytes2);
	$('#_output_g').removeClass('prettyprinted');
	prettyPrint();
}

function generateByteArray_r() {
	var width = matrix_r[0].length;
	var height = matrix_r.length;
	var buffer = new Array(width * height);
	var bytes = new Array((width * height) / 8);

	// Column Major
	var temp;

	// {{ sb version switch }}
	let sb_ver = false;
	localStorage.setItem("matrix_r", JSON.stringify(matrix_r));

	// console.log(matrix_r);
	for (var x = 0; x < width; x++) {
		for (var y = 0; y < height; y++) {
			temp = matrix_r[y][x];
			if (!temp) temp = 0;
			// Row Major or Column Major?
			if (!rowMajor) {
				buffer[x * height + y] = temp;
			}
			else {
				buffer[y * width + x] = temp;
			}

		}
	}
	// console.log(chunk(buffer, width)); // only 1 and 0 no light, 1 => has keypress
	// Read buffer 8-bits at a time
	// and turn it into bytes
	for (var i = 0; i < buffer.length; i += 8) {
		var newByte = 0;
		for (var j = 0; j < 8; j++) {
			if (buffer[i + j]) {
				if (msbendian) {
					newByte |= 1 << (7 - j);
				}
				else {
					newByte |= 1 << j;
				}
			}
		}
		bytes[i / 8] = newByte;
	}
	let formatted = "";
	if(sb_ver) {
		matrix_r.forEach((row, row_index) => {
			row.forEach((col, col_index) => {
				if(col == 1) {
					formatted = `${formatted != "" ? formatted + "\n" : ""}dot_data_r(${col_index})(${row_index}) <= '1';`;
				}
			})
		})
	}else {
		formatted = bytes.map(function (x) {
			x = x + 0xFFFFFFFF + 1;  // twos complement
			x = x.toString(16); // to hex
			x = ("0" + x).substr(-2); // zero-pad to 8-digits
			x = `x"${x}"`;
			return x;
		}).join(', ');
	}

	return formatted;
}
function generateByteArray_g() {
	var width = matrix_g[0].length;
	var height = matrix_g.length;
	var buffer = new Array(width * height);
	var bytes = new Array((width * height) / 8);
	// {{ sb version switch }}
	let sb_ver = false;
	// Column Major
	var temp;
	// console.log(matrix_g);
	localStorage.setItem("matrix_g", JSON.stringify(matrix_g));
	for (var x = 0; x < width; x++) {
		for (var y = 0; y < height; y++) {
			temp = matrix_g[y][x];
			if (!temp) temp = 0;
			// Row Major or Column Major?
			if (!rowMajor) {
				buffer[x * height + y] = temp;
			}
			else {
				buffer[y * width + x] = temp;
			}

		}
	}
	// console.log(chunk(buffer, width)); // only 1 and 0 no light, 1 => has keypress
	// Read buffer 8-bits at a time
	// and turn it into bytes
	for (var i = 0; i < buffer.length; i += 8) {
		var newByte = 0;
		for (var j = 0; j < 8; j++) {
			if (buffer[i + j]) {
				if (msbendian) {
					newByte |= 1 << (7 - j);
				}
				else {
					newByte |= 1 << j;
				}
			}
		}
		bytes[i / 8] = newByte;
	}
	let formatted = "";
	if(sb_ver) {
		matrix_g.forEach((row, row_index) => {
			row.forEach((col, col_index) => {
				if(col == 1) {
					formatted = `${formatted != "" ? formatted + "\n" : ""}dot_data_g(${col_index})(${row_index}) <= '1'`;
				}
			})
		})
	}else {
		formatted = bytes.map(function (x) {
			x = x + 0xFFFFFFFF + 1;  // twos complement
			x = x.toString(16); // to hex
			x = ("0" + x).substr(-2); // zero-pad to 8-digits
			x = `x"${x}"`;
			return x;
		}).join(', ');
	}
	return formatted;
}

// function toggle(e) {
// 	var x = $(this).data('i');
// 	var y = $(this).data('j');
// 	if (e.buttons == 1 && !e.ctrlKey) {
// 		matrix_r[x][y] = 1;
// 		$(this).addClass('on');
// 	}
// 	else if (e.buttons == 2 || (e.buttons == 1 && e.ctrlKey)) {
// 		matrix_r[x][y] = 0;
// 		$(this).removeClass('on');
// 	}

// 	return false;
// }

// by my self fuck function
function toggle(e) {
	if (e.buttons == 1 && !e.ctrlKey) {
		toggleRemove($(this));
		toggleAdd($(this));
		return;
	}
	if (e.buttons == 2 || (e.buttons == 1 && e.ctrlKey)) {
		console.log('double action');
		let hasDraw = !e.ctrlKey && doubleDraw($(this));
		toggleRemove($(this));
		if (hasDraw)
			toggleAdd($(this));
	}
	updateCode();
}

// by my self fuck function
function doubleDraw(this_e) {
	return this_e.hasClass(["on-red", "on-green", "on-orange"][color_type]);
}

// by my self fuck function
function toggleRemove(this_e) {
	let position = [this_e.data('i'), this_e.data("j")];
	this_e.removeClass("on-green");
	this_e.removeClass("on-red");
	this_e.removeClass("on-orange");
	this_e.removeClass("on");
	matrix_r[position[1]][position[0]] = 0;
	matrix_g[position[1]][position[0]] = 0;
}

// by my self fuck function
function toggleAdd(this_e) {
	let position = [this_e.data('i'), this_e.data("j")];
	switch (color_type) {
		case 0:
			matrix_r[position[1]][position[0]] = 1;
			break;
		case 1:
			matrix_g[position[1]][position[0]] = 1;
			break;
		case 2:
			matrix_r[position[1]][position[0]] = 1;
			matrix_g[position[1]][position[0]] = 1;
			break;
	}
	this_e.addClass("on");
	this_e.addClass(["on-red", "on-green", "on-orange"][color_type]);
}

function populateTable(table, rows, cells, content) {
	if (!table) table = document.createElement('table');
	for (var i = 0; i < rows; ++i) {
		var row = document.createElement('tr');
		for (var j = 0; j < cells; ++j) {
			row.appendChild(document.createElement('td'));
			$(row.cells[j]).data('i', i);
			$(row.cells[j]).data('j', j);
		}
		table.appendChild(row);
	}
	$table = $(table);
	return table;
}

// (height, width)
function createArray(length) {
	var arr = new Array(length || 0),
		i = length;

	if (arguments.length > 1) {
		var args = Array.prototype.slice.call(arguments, 1);
		while (i--) arr[length - 1 - i] = createArray.apply(this, args);
	}

	return arr;
}

function chunk(array, size) {
	const chunked_arr = [];
	for (let i = 0; i < array.length; i++) {
		const last = chunked_arr[chunked_arr.length - 1];
		if (!last || last.length === size) {
			chunked_arr.push([array[i]]);
		} else {
			last.push(array[i]);
		}
	}
	return chunked_arr;
}