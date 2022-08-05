//variables

let btn = document.querySelector('#new-quote');
let quote = document.querySelector('.quote');
let person = document.querySelector('.person');

const quotes = [{
    quote: `"Ah, am die thenk you foreva"`,
    person: `Inugami Korone`
},{
    quote:`"What's 'let's go' in English?" Kiara: "Well, it's 'Let's go"`,
    person:`Polka`
},{
    quote:`"Watame wa~~ warukunai yo ne?"`,
    person:`Watame`
},{
    quote:`"I'm horny!"`,
    person:`houshoumarine`
},{
    quote:`"watah in the fire why?"`,
    person:`Inugami Korone`
},{
    quote:`"FAQ News! FAQ!!"`,
    person:`Miko`
}, ];

btn.addEventListener('click', function(){
    let random = Math.floor(Math.random()* quotes.length);
    quote.innerText = quotes[random].quote;
    person.innerText = quotes[random].person;


})