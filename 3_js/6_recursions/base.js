const getById = id => document.getElementById(id);
const getNumById = id => +getById(id).value;

const bool2str = bool => bool ? 'YES' : 'NO';