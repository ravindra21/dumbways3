function printDetail(totalDay) {
	if(totalDay <= 0) return 'invalid';

	let returnDay = 10;
	let leftDay = totalDay <= returnDay ? 0 : totalDay - returnDay;
	let mapel = leftDay * 1000;
	let novel = leftDay * 2000;
	let cerpen = leftDay * 1500;
	let total = mapel + cerpen + novel;

	console.log('Meminjam Selama: '+totalDay+' hari');
	console.log('Telat Mengembalikan: '+leftDay+' hari');
	console.log('Denda Buku Mata Pelajaran: '+mapel);
	console.log('Denda Novel: '+novel);
	console.log('Denda Cerpen: '+cerpen);
	console.log('Total: '+total)
}

printDetail(10);
