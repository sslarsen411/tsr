let count = 0
//var content = document.getElementById("dynamic_content")
var back_btn = document.getElementById("back")
var next_btn = document.getElementById("next")
var start_btn = document.getElementById("start")

let char =  document.querySelector(".answer") 

if(char){ 
  char.addEventListener("keyup", (event) => {
    const typedCharacters = char.value.length;
    if (typedCharacters > 9){
      next_btn.classList.remove('btn-disabled')
      next_btn.classList.add('animate-bounce')
      next_btn.innerHTML = 'Next'
      }      
  })
}