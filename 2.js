function sumFindWord(text,word) {
	let wordRegex = new RegExp(word,'g');
	let sumword = text.match(wordRegex).length;
	
	console.log(word+' muncul sebanyak '+sumword+' kali');
}

sumFindWord('aaaaa','a');
