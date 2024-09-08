let stars = document.querySelectorAll(".star")
let btnRate = document.getElementById("btnRate")

stars.forEach(function(star) {
    star.addEventListener("click", function() {
        doStar(this.value)        
    });
});  
/* Get the value from the rate page */
const doStar = (inVal) => { 
    var s = inVal <=1 ? '':'s'     
    // Prompt for next
    btnRate.classList.remove('btn-disabled')
    btnRate.classList.add('animate-bounce')
    btnRate.innerHTML = 'next'
      document.getElementById("dynamic_content").innerHTML = `<p class=" mt-4">You gave us <strong>${inVal} star${s}</strong>. Now click the <span class="text-primary">NEXT</span> button</p>`
    }