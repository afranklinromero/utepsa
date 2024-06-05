// CONSOLE STUFF
// Printing to the console
console.log("hola como estas");
console.log("hola" + " mundo");
console.log(2);
console.log(2+2);

// Console.log is not the only method for console
console.info();
console.warn();
console.error();

// You can write css to print some text to the website console! 
const style = `
    background:linear-gradient(#099e16, 
    #fff, #099e16);
    color:#000;
    padding: 5px 10px
`
console.log("%cViva SantaCruz", style);

console.groupCollapsed("Informacion a mostrar");
    console.log("UA ", navigator.userAgent);
    console.log("UA ", navigator.language);
console.groupEnd();

const users = [
    {name: "Adhemar", role: "Docente", status: "work"},
    {name: "luis", role: "student", status: "student"},
    {name: "andres", role: "student", status: "student"},
];
console.table(users);

console.assert(5>10, "5 is greater than 10");
console.assert(5<10, "5 is less than 10");

console.log(document.body);
console.dir(document.body);
// --------------------------------------------------------------------------------------

// VARIABLES 

// LET is for private variables. It uses a private scope. 
let number = 3;

// VAR is global. The value is not constant and it can be used throughout the entire application
var num = 3;

// CONST defines a constant value in a variable
const pi = 3.1416;


let age = 22;
let firstName = "andres";
let isMarried = false;

var gender = "male";

const gravity = 9.81;



console.log(typeof age);
console.log(typeof firstName);
console.log(typeof isMarried);
// --------------------------------------------------------------------------------------

// FUNCTIONS
function hello() {
    return "Hello!"
}
console.log(hello());
console.log(typeof hello);

// storing a function in a variable (anonymous function)
const bigHello = function hello() {
    return "Big Hello!";
}
console.log(bigHello);

// function as an object (OOP)
const newHello = new Function ("return 'hello';");
newHello;

// recursive function
const fa = function(callback) {
    callback();
}


// OPERATORS 
/*
a+b
a-b 
a*b
a%b modulus
a**b powers
*/ 


// Practise 

let exponent1 = 3;
let exponent2 = 4;

function power(exponent1, exponent2) {
    return exponent1**exponent2;
}

console.log(power(exponent1, exponent2));


let ternaryExpression = true;
// ternary operation: if A is true, return B, if false, return 9
console.log(ternaryExpression ? exponent2 : 9);