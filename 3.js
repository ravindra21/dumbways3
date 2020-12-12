function printPattern(column) {
	column = column%2 == 0 ? column : column+1;
	let blank = new Array(column).fill(' ');
	let star =  new Array(column).fill('*');
	let startEndRow = blank.join('').replace(/\s$/,'*');
	let row = column/2;
	let i = 1;
	const center = 'DUMBWAYSID';

	console.log(startEndRow);
	do {
		blank.push('*');
		blank.shift();
		blank.push('*');
		blank.shift();
		console.log(blank.join(''));
		i++
	} while(i <= row)
	
	if(column >= 10) console.log(center);
	
	do{
		console.log(star.join(''));
		star.unshift(' ');
		star.pop();
		star.unshift(' ');
		star.pop();
		i--
	} while(i > 1)
	console.log(startEndRow);
}

printPattern(10);