let weeks_day_number = 4;

weeks_day_number = Math.abs(weeks_day_number) % 7;

if(weeks_day_number === 0) console.log('Понедельник');
else if(weeks_day_number === 1) console.log('Вторник');
else if(weeks_day_number === 2) console.log('Среда');
else if(weeks_day_number === 3) console.log('Четверг');
else if(weeks_day_number === 4) console.log('Пятница');
else if(weeks_day_number === 5) console.log('Суббота');
else console.log('Воскресенье');