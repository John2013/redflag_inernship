const number = 321;

const str = number.toString();
let new_str = '';
for(let char in str){
	new_str = str[char] + new_str
}
new_str = +new_str;

console.log(new_str);